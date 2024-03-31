<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
$authclass = new Auth;
$id = $_SESSION["user"]["id"] ?? null;

$name = $_SESSION["user"]["username"] ?? null;
$token = isset($_COOKIE["_ROBLOSECURITY"]) ? $_COOKIE["_ROBLOSECURITY"] : (isset($_SESSION["user"]["token"]) ? $_SESSION["user"]["token"] : "");

$RBXTICKET = $token;

switch(true){
    case ($RBXTICKET):
        echo $name . ":" . $id . ":" . $token;
        break;
    default:
        echo "Guest:". rand(0,9999);
        break;
}
?>
