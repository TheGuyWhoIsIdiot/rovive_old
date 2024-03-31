<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if ($id == 0) {
    exit;
}

$gameclass = new Game;
$assetClass = new Asset;
$asset = $assetClass->getAsset($id);
$game = $gameclass->getGame($id);

if (isset($_GET['id']) && $id == 99585214) {
    header("location: /uploads/require_admin_cmds.rbxm");
    exit;
}

if (isset($_GET['id']) && $id == 54485486789) {
    header("Location: /uploads/Rick Astley - Never Gonna Give You Up.mp3");
    exit;
}

if (isset($_GET['id']) && isset($_GET["gamefetch"]) && $game) {
    // check for ip
    $ip = (string)$_SERVER["HTTP_CF_CONNECTING_IP"];
    if ($ip != "45.11.229.121" && $ip != "2a0e:97c0:3e3:f1::1" && $ip != "78.182.155.81" && $ip != "89.177.158.171" && $ip != "177.192.242.117") {
        header("HTTP/1.1 403 Forbidden");
        exit("You are not allowed to access this asset");
    }
    header("Content-Type: application/octet-stream");
    readfile($_SERVER['DOCUMENT_ROOT'] . $game["filepath"]);
    exit;
}

if (isset($_GET['id']) && $asset) {
    header("Content-Type: application/octet-stream");
    readfile($_SERVER['DOCUMENT_ROOT'] . $asset["filepath"]);
    exit;
}


if (isset($_GET['id'])) {
    header('Location: https://assetdelivery.roblox.com/v1/asset?id=' . $_GET['id']);
    exit;
}
