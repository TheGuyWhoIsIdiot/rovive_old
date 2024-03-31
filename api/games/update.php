<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("You must be logged in to access this api");
}

if (!isset($_POST["id"])) {
    header("HTTP/1.1 400 Bad Request");
    exit("Missing id");
}

$gameclass = new Game;

$game = $gameclass::getGame($_POST["id"]);

if (!$game) {
    header("HTTP/1.1 404 Not Found");
    exit("Game not found");
}

if ($game["creator_id"] != $_SESSION["user"]["id"] && $_SESSION["user"]["admin"] < 2) {
    header("HTTP/1.1 403 Forbidden");
    exit("You do not own this game");
}

$title = isset($_POST["title"]) ? htmlspecialchars_decode(trim($_POST["title"])) : $game["title"];
$desc = isset($_POST["description"]) ? htmlspecialchars_decode(trim($_POST["description"])) : $game["description"];

$maxGameUploadLimit = 1024 * 1024 * 40; // 10mb

$filepath = $game["filepath"];

if (isset($_FILES["gameFile"])) {
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

    // get rid of the old file
    unlink($_SERVER['DOCUMENT_ROOT'] . $filepath);

    // generate path
    $generatedPath = "/assets/games/" . bin2hex(openssl_random_pseudo_bytes(16)) . "." . pathinfo($fileName, PATHINFO_EXTENSION);
    $filepath = $generatedPath;

    // move file to server
    if (!move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . $generatedPath)) {
        header("HTTP/1.1 500 Internal Server Error");
        exit("Failed to upload file");
    }
}

$result = $gameclass->update($game["id"], $title, $desc, $filepath);

if ($result) {
    exit("Success");
} else {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to update game due to an unknown error");
}
