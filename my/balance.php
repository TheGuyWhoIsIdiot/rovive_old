<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$authclass = new Auth;
$userclass = new User;

$authticket = $_COOKIE["_ROBLOSECURITY"];

$ticket = $authclass->validateToken($authticket);

if (!$ticket) {
    header("HTTP/1.1 403 Forbidden");
    $data = array();
}

$user = $userclass->getUser($ticket["user_id"]);

$robux = $user["currency"];

$data = array("robux" => $robux);
$jsonData = json_encode($data);
header('Content-Type: application/json');
exit($jsonData);