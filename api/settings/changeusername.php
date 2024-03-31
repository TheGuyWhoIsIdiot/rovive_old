<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 403 Forbidden");
    echo "Please login.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userclass = new User;
    $economyClass = new Economy;

    if ($userclass->getUserByUsername($_POST["newUsername"])) {
        header("HTTP/1.1 400 Bad Request");
        exit("Username already taken.");
    }

    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST["newUsername"])) {
        header("HTTP/1.1 400 Bad Request");
        exit("Invalid username! Only letters and numbers are allowed.");
    }

    if ($economyClass->getCurrency($_SESSION["user"]["id"]) < 1000) {
        header("HTTP/1.1 400 Bad Request");
        echo "Insufficient funds.";
        exit;
    }

    if ($economyClass->commitTransaction($_SESSION["user"]["id"], 1, 1000, "Account username change")) {
        $newUsername = $_POST["newUsername"];

        $userclass->changeUsername($_SESSION["user"]["id"], $newUsername);
        echo "Successfully changed username.";
        exit;
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo "Failed to change username. Transaction failed.";
        exit;
    }

    exit;
}
