<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$headers = getallheaders();

header('Content-Type: application/json; charset=UTF-8; X-Robots-Tag: noindex');

function processLoginForm($username, $password)
{
    $username = urldecode($username);
    $password = urldecode($password);
    if ($username && $password) {

        $auth = new Auth();
        $userClass = new User;

        $user = $userClass->getUserByUsername($username);

        if (!$auth->login($username, $password)) {
            $errorMsg = [
                "message" => "Incorrect username or password",
            ];
            http_response_code(403);
            echo json_encode($errorMsg);
            exit();
        } else {

            $roblosec = $_COOKIE['_ROBLOSECURITY'];
            $uID = $user['id'];
            setcookie(".ROBLOSECURITY", $roblosec, time() + (460800 * 30), "/", '.rovive.pro');
            setcookie("access", "yes", time() + 24 * 60 * 60, "/", '.rovive.pro');
            setcookie("RBXEventTrackerV2", "CreateDate=" . date('n/j/Y g:i:s A') . "&rbxid=" . $uID . "&browserid=" . $uID . "", time() + 24 * 60 * 60, "/", '.rovive.pro');

            $response = [
                "membershipType" => 4,
                "username" => $username,
                "isUnder13" => false,
                "countryCode" => "en_US",
                "userId" => $uID,
                "displayName" => $username
            ];
            exit(json_encode($response));
        }
    }
    exit();
}
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data["cvalue"]) && isset($data["password"])) {
    processLoginForm($data["cvalue"], $data["password"]);
}
if (isset($data["username"]) && isset($data["password"])) {
    processLoginForm($data["username"], $data["password"]);
}
if (isset($_POST["username"]) && isset($_POST["password"])) {
    processLoginForm($_POST["username"], $_POST["password"]);
}
if (isset($_GET["username"]) && isset($_GET["password"])) {
    processLoginForm($_GET["username"], $_GET["password"]);
}
exit();
