<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("You must be logged in to access this api");
}

if (!isset($_POST["title"]) || !isset($_POST["description"]) || !isset($_FILES["gameFile"])) {
    header("HTTP/1.1 400 Bad Request");
    exit("Missing parameters");
}

$title = htmlspecialchars(trim($_POST["title"]));
$desc = htmlspecialchars(trim($_POST["description"]));

$maxGameUploadLimit = 1024 * 1024 * 40; // 10mb


// handle file upload
$fileName = $_FILES["gameFile"]["name"];
$tmpName = $_FILES["gameFile"]["tmp_name"];
$fileSize = $_FILES["gameFile"]["size"];
$fileType = $_FILES["gameFile"]["type"];

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

if (pathinfo($fileName, PATHINFO_EXTENSION) !== "rbxl" && pathinfo($fileName, PATHINFO_EXTENSION) !== "rbxlx") {
    header("HTTP/1.1 400 Bad Request");
    exit("Invalid file type; must be .rbxl or .rbxlx");
}

// generate path
$generatedPath = "/assets/games/" . bin2hex(openssl_random_pseudo_bytes(16)) . "." . pathinfo($fileName, PATHINFO_EXTENSION);

// move file to server
if (!move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . $generatedPath)) {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to upload file");
}




$gameclass = new Game;

$game = $gameclass::create($_SESSION["user"]["id"], $title, $desc, $generatedPath);

if ($game) {
    exit($game);
} else {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to create game due to an unknown error");
}