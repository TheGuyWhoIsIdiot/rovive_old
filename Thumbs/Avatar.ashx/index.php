<?php
header('Content-type: image/png');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
$errimg = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/Images/IDE/not-approved.png");
$penimg = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/Images/IDE/pending.png");

$id = (int) ($_GET['userId'] ?? die($errimg));
$x = (int) ($_GET['x'] ?? 200);
$y = (int) ($_GET['y'] ?? 100);

$AssetFetch = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$AssetFetch->execute([':id' => $id]);
$Results = $AssetFetch->fetch(PDO::FETCH_ASSOC);

switch (true) {
    case (!$Results):
        die($errimg);
        break;
}

$filename = ($_SERVER['DOCUMENT_ROOT'] . "/Tools/RenderedUsers/" . $id . "-closeup.png");

if (file_exists($filename)) {
    readfile($filename);
} else {
    die($errimg);
}

?>