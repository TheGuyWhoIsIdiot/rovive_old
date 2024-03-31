<?php
error_reporting(~E_ALL);
require("functions.php");

require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";


$authticket = isset($_COOKIE["_ROBLOSECURITY"]) ? $_COOKIE["_ROBLOSECURITY"] : "Invalid Auth Token";

$authclass = new Auth;
$userclass = new User;
$gameclass = new Game;

$ticket = $authclass->validateToken($authticket);

if (!$ticket) {
    header("HTTP/1.1 401 Unauthorized");
    echo "Invalid Auth Ticket";
    exit;
}

$user = $userclass->getUser($ticket["user_id"]);

$gameid = isset($_GET["placeId"]) ? intval($_GET["placeId"]) : 1;

$game = $gameclass->getGame($gameid);

$username = $user["username"];
$userid = $user["id"];

$secondsInADay = 24 * 60 * 60;
$accountAge = floor((time() - $user["created_at"]) / $secondsInADay);

header("content-type:text/plain");
$placeid = $gameid;
$ip = "45.11.229.121";
$port = 53640;
$id = $userid;
$user = $username;
$app = "https://www.rovive.pro/";
$membership = $_GET["membership"];
$f1 = str_replace("%user%",$user,file_get_contents("./joinguest.txt"));
$f2 = str_replace("%ip%",$ip,$f1);
$f3 = str_replace("%port%",$port,$f2);
$f4 = str_replace("%id%",$id,$f3);
$f5 = str_replace("%app%",$app,$f4);
$f6 = str_replace("%membership%",$app,$f5);
echo(sign($f6));
?>
