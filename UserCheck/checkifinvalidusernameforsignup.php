<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

function filter(string $text)
{
    $badlist = array_filter(explode(",", file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/badwords.txt")));
    $filterCount = count($badlist);

    for ($i = 0; $i < $filterCount; $i++) {
        if (preg_match('/' . $badlist[$i] . '/i', $text)) {
            return true;
        }
    }

    return false;
}


if (isset($_GET["username"])) {
    $username = $_GET["username"];

    $userClass = new User;
    $user = $userClass->getUserByUsername($username);

    if ($user) {
        exit(json_encode(
            array(
                "data" => 1,
            )
        ));
    } else {
        if (filter($username)) {
            exit(json_encode(
                array(
                    "data" => 2,
                )
            ));
        } else {
            exit(json_encode(
                array(
                    "data" => 100,
                )
            ));
        }
    }
}
