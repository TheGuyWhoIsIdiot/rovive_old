<?php

if (!isset($_POST["placeId"])) {
    header("HTTP/1.1 400 Bad Request");
    exit("Missing placeId");
}

$gameid = (int)$_POST["placeId"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SOAP.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("You must be logged in to access this api");
}

$gameclass = new Game;
$jobClass = new Jobs;

$game = $gameclass::getGame($gameid);

if (!$game) {
    header("HTTP/1.1 404 Not Found");
    exit("Game not found");
}

if ($game["creator_id"] != $_SESSION["user"]["id"] && $_SESSION["user"]["admin"] < 2) {
    header("HTTP/1.1 403 Forbidden");
    exit("You do not own this game");
}

foreach ($jobClass::getAllJobsForPlaceId($gameid) as $job) {
    closeJob($job["jobId"], 64989);
    $jobClass::deleteJob($job["jobId"]);
}

header("HTTP/1.1 200 OK");
exit("success");