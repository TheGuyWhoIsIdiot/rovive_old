<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";

$apiKey = isset($_GET["apiKey"]) ? $_GET["apiKey"] : "";
$jobId = isset($_GET["jobId"]) ? $_GET["jobId"] : "";
$players = isset($_GET["players"]) ? $_GET["players"] : "";

if ($apiKey !== "doyousuckdicks?123idkmanidont") {
	exit("key_invalid");
}


if (!empty($apiKey) && !empty($jobId) && !empty($players)) {
	require_once $_SERVER["DOCUMENT_ROOT"] . "/SOAP.php";

	$jobClass = new Jobs;

    $playerCount = count(array_filter(explode(",", $players)));

	if ($jobClass->getJob($jobId)) {
    	$jobClass->setJobVar($jobId, "playerCount", $playerCount);
        $jobClass->setJobVar($jobId, "players", $players);
        exit("success");
    }

}