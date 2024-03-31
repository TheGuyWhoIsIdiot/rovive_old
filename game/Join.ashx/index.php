<?php

header("Content-Type: application/json");

require_once $_SERVER["DOCUMENT_ROOT"] . "/SOAP.php";



require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";


$authticket = isset($_COOKIE["_ROBLOSECURITY"]) ? $_COOKIE["_ROBLOSECURITY"] : "Invalid Auth Token";

$authclass = new Auth;
$userclass = new User;
$gameclass = new Game;
$gameUtils = new GameUtils;

$ticket = $authclass->validateToken($authticket);

if (!$ticket) {
    header("HTTP/1.1 401 Unauthorized");
    echo "Invalid Auth Ticket";
    exit;
}

$user = $userclass->getUser($ticket["user_id"]);

if ($user['ongoing_action_id'] > 0) {
    exit();
}

$username = $user["username"];
$userid = $user["id"];

$secondsInADay = 24 * 60 * 60;
$accountAge = floor((time() - $user["created_at"]) / $secondsInADay);

function authticket($id, $name, $charapp, $jobid)
{

    $privatekey1 = file_get_contents("./PrivateKey/PrivateKey.pem");

    $ticket = $id . "\n" . $jobid . "\n" . date('n\/j\/Y\ g\:i\:s\ A');
    openssl_sign($ticket, $sig, $privatekey1, OPENSSL_ALGO_SHA1);
    $sig = base64_encode($sig);
    $ticket2 = $id . "\n" . $name . "\n" . $charapp . "\n" . $jobid . "\n" . date('n\/j\/Y\ g\:i\:s\ A');
    openssl_sign($ticket2, $sig2, $privatekey1, OPENSSL_ALGO_SHA1);
    $sig2 = base64_encode($sig2);
    $final = date('n\/j\/Y\ g\:i\:s\ A') . ";" . $sig2 . ";" . $sig;
    return ($final);
}

$authkey = file_get_contents("./PrivateKey/PrivateKey.pem");

$jobClass = new Jobs;

$gameid = isset($_GET["placeId"]) ? intval($_GET["placeId"]) : 1;

$game = $gameclass->getGame($gameid);

$membership = $user["membership"];

$bestJob = $jobClass->getBestJobForPlaceId($gameid);

if (!$bestJob) {
    header("HTTP/1.1 400 Bad Request");
    echo "No job available";
    exit;
}

$ip = $bestJob["ip"];
$port = $bestJob["port"];
$jobid = $bestJob["jobId"];

$charapp = "https://www.rovive.pro/asset/CharacterFetch.ashx?userId=" . $userid . "&placeId=" . $gameid;

$creatorid = $game["creator_id"];

$joinscript = [
    // useless
    "ClientPort" => 0,
    "MachineAddress" => $ip,
    "ServerPort" => $port,
    "PingUrl" => "",
    "PingInterval" => 30,
    "UserName" => $username,
    "SeleniumTestMode" => false,
    "UserId" => $userid,
    "SuperSafeChat" => false,
    "CharacterAppearance" => $charapp,
    "ClientTicket" => authticket($userid, $username, $charapp, $jobid),
    "GameId" => $jobid,
    "PlaceId" => $gameid,
    "MeasurementUrl" => "",
    "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
    "BaseUrl" => "http://www.rovive.pro/",
    "ChatStyle" => "ClassicAndBubble",
    "VendorId" => "0",
    "ScreenShotInfo" => "",
    "VideoInfo" => "",
    "CreatorId" => $creatorid,
    "CreatorTypeEnum" => "User",
    "MembershipType" => $membership == "" ? "None" : $membership,
    "AccountAge" => $accountAge,
    "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
    "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
    "CookieStoreEnabled" => true,
    "IsRobloxPlace" => false,
    "GenerateTeleportJoin" => false,
    "IsUnknownOrUnder13" => false,
    "SessionId" => "",
    "DataCenterId" => 69420,
    "UniverseId" => $gameid,
    "BrowserTrackerId" => 0,
    "UsePortraitMode" => false,
    "FollowUserId" => 0
];
$data = json_encode($joinscript, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);


exit($gameUtils->sign($data));
