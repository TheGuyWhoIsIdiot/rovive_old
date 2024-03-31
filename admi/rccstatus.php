<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';


$userclass = new User;

$adminlevel = 0;

if (isset($_SESSION["user"])) {
    $user = $userclass::getUser($_SESSION["user"]["id"]);
    $adminlevel = $user["admin"];

    if ($adminlevel < 2) {
        $title = "Forbidden";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
        exit;
    }
} else {
    $title = "Forbidden";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
    exit;
}

echo PageBuilder::buildHeader();
echo PageBuilder::buildAdminNavbar();
require_once $_SERVER['DOCUMENT_ROOT'] . "/SOAP.php";


$RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", 64989);

echo("HelloWorld(): ".($RCCServiceSoap->HelloWorld() ?? "Failed!")."\n");
echo("GetVersion(): ".($RCCServiceSoap->GetVersion() ?? "Failed!")."\n");
echo("GetStatus(): ".($RCCServiceSoap->GetStatus()->environmentCount ?? "Failed!")."\n");

print_r($RCCServiceSoap->GetAllJobs());
//echo('GetAllJobs(): '.($RCCServiceSoap->GetAllJobs() ?? "Failed!")."\n");

echo PageBuilder::buildFooter(); 
