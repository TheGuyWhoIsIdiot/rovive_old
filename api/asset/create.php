<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("You must be logged in to access this api");
}

if (!isset($_POST["title"]) || !isset($_POST["assetTypeId"]) || !isset($_FILES["assetFile"])) {
    header("HTTP/1.1 400 Bad Request");
    exit("Missing parameters");
}

$title = htmlspecialchars(trim($_POST["title"]));
$assetTypeId = (int)$_POST["assetTypeId"];

$maxGameUploadLimit = 1024 * 1024 * 8; // 8mb


// handle file upload
$fileName = $_FILES["assetFile"]["name"];
$tmpName = $_FILES["assetFile"]["tmp_name"];
$fileSize = $_FILES["assetFile"]["size"];
$fileType = $_FILES["assetFile"]["type"];

if ($fileName == "") {
    header("HTTP/1.1 400 Bad Request");
    exit("Missing file");
}

if ($fileSize > $maxGameUploadLimit) {
    header("HTTP/1.1 400 Bad Request");
    exit("File too big");
}


// check if file exists
if (file_exists($fileName)) {
    header("HTTP/1.1 400 Bad Request");
    exit("File already exists");
}

if (pathinfo($fileName, PATHINFO_EXTENSION) !== "mp3" && pathinfo($fileName, PATHINFO_EXTENSION) !== "ogg") {
    header("HTTP/1.1 400 Bad Request");
    exit("Invalid file type: must be .ogg or .mp3");
}

// generate path
$generatedPath = "/assets/library/" . bin2hex(openssl_random_pseudo_bytes(16)) . "." . pathinfo($fileName, PATHINFO_EXTENSION);

// move file to server
if (!move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . $generatedPath)) {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to upload file");
}


$assetClass = new Asset;

$assetTypes = $assetClass->getAssetTypes();

$assetType = $assetTypes[$assetTypeId];

$asset = $assetClass->addAsset($title, $assetType, "item", $generatedPath, $_SESSION["user"]["id"], "notyetapproved", "", $assetType, 0, 0, 0);

if ($asset) {
    exit("Success");
} else {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to create asset due to an unknown error");
}