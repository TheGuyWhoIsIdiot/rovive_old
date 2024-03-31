<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

header("Content-Type: application/json");

if (isset($_COOKIE['_ROBLOSECURITY'])) {
    $authclass = new Auth;
    $userclass = new User;
    
    $authticket = $_COOKIE["_ROBLOSECURITY"];
    
    $ticket = $authclass->validateToken($authticket);
	$user = $userclass->getUser($ticket["user_id"]);

	$data = [
        "robux" => $user["currency"],
    ];
} else {
    $data = [
        "robux" => 10000000000000000,
    ];
}

$json = json_encode($data);

echo $json;
?>
