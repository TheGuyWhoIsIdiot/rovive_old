<?php
// Loads the place file
header("content-type: text/plain");

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

function sign($script)
{
    $script = "\r\n" . $script;
    $signature = "";
    $key = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/game/Join.ashx/PrivateKey/PrivateKey.pem');
    openssl_sign($script, $signature, $key, OPENSSL_ALGO_SHA1);
    echo "--rbxsig" . sprintf("%%%s%%%s", base64_encode($signature), $script);
}

$gameclass = new Game;

if (isset($_GET['PlaceId'])) {
    $placeId = (int)$_GET['PlaceId'];

    $result = $gameclass->getGame($placeId);

    if (!$result) {
        sign("game:SetMessage(\"Game not found\")");
        exit;
    }

    if ($result["isUncopylocked"] != 1) {
        if (!isset($_SESSION["user"]["id"])) {
            sign("game:SetMessage(\"You must be logged in to do this action.\")");
            exit;
        }
        if ($_SESSION["user"]["id"] != $result["creator_id"]) {
            sign("game:SetMessage(\"You do not own this game.\")");
            exit;
        }
    }

    $filepath = $result['filepath'];

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $filepath)) {
sign('game:Load("' . 'https://www.rovive.pro' . $filepath . '")');
        exit;
    } else {
        sign("game:SetMessage(\"Cannot retrieve game at this time.\")");
        exit;
    }
} else {
    sign("");
    exit;
}
