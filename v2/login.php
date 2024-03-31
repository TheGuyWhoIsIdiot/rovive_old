<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';


$headers = getallheaders();
$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (strpos($user_agent, 'Roblox') !== false) {
    $options = ['cost' => 10];
    $analyticsdata = password_hash("BJ@ynVL+ZP2xT-h8rXTPv@9yCbfS8Z%rb_TkCE^T=SUycJVjh6gaf8=92W7nvFtU", PASSWORD_BCRYPT, $options);
    setcookie("browserTrackerIds", $analyticsdata, time() + (460800 * 30), "/", '.rovive.pro');
}

header('Content-Type: application/json; charset=UTF-8; X-Robots-Tag: noindex');

function sendResponse($message, $statusCode = 200)
{
    http_response_code($statusCode);
    echo json_encode(['message' => $message]);
    exit();
}

function setCookies($username, $password, $roblosec, $uID)
{
    $expiryTime = time() + (460800 * 30);

    setcookie("username", $username, $expiryTime, "/", '.rovive.pro');
    setcookie("password", $password, $expiryTime, "/", '.rovive.pro');
    setcookie("access", "yes", time() + 24 * 60 * 60, "/", '.rovive.pro');
    setcookie(".RBXID", $roblosec, $expiryTime, "/", '.rovive.pro');
    setcookie("RBXEventTrackerV2", "CreateDate=" . date('n/j/Y g:i:s A') . "&rbxid=" . $uID . "&browserid=" . $uID, time() + 24 * 60 * 60, "/", '.rovive.pro');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data["username"]) && isset($data["password"])) {
        $username = urldecode($data['username']);
        $password = urldecode($data['password']);

        if (!$username || !$password) {
            sendResponse("Invalid username or password.", 403);
        }
        
        $auth = new Auth();

        $check = $auth->login($username, $password);

        if ($check) {
            $roblosec = $_COOKIE['_ROBLOSECURITY'];
            $uID = $check['id'];
            $banvalue = $check['ongoing_action_id'];

            if ($banvalue > 0) {
                $isbanned = true;
            } else {
                $isbanned = false;
            }

            setCookies($username, $hash, $roblosec, $uID);

            $response = [
                "user" => [
                    "id" => $uID,
                    "name" => strip_tags($username),
                    "displayName" => strip_tags($username)
                ],
                "isBanned" => $isbanned
            ];

            echo json_encode($response);
            exit();
        } else {
            sendResponse("Incorrect username.", 403);
            exit;
        }
    }
}

// If the code reaches here, there's an issue with the request
sendResponse("Invalid request.", 400);
