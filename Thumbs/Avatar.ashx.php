<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$id = isset($_GET['userId']) ? intval($_GET['userId']) : null;
$imagePath = $_SERVER['DOCUMENT_ROOT'] . '/Tools/RenderedUsers/' . $id . '.png';

if (file_exists($imagePath) && is_readable($imagePath)) {
    // Get the image MIME type
    $imageInfo = getimagesize($imagePath);
    $imageMimeType = $imageInfo['mime'];

    header("Content-Type: $imageMimeType");
    header("Content-Length: " . filesize($imagePath));

    readfile($imagePath);
} else {
    $defaultImagePath = $_SERVER['DOCUMENT_ROOT'] . '/img/Default_Avatar.png';
    header("Content-Type: image/png");
    header("Content-Length: " . filesize($defaultImagePath));
    readfile($defaultImagePath);
}

exit;
