<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$userid = $_GET['userId'];

$avatarClass = new Avatar;

$avataritems = $avatarClass->getAvatarItems($userid);

$avatarItemIds = array();

foreach ($avataritems as $item) {
    $avatarItemIds[] = "https://www.rovive.pro/asset/?id=".$item['itemId'];
}

// get the avatar items and put them side by side and divide them with a ;
$string = implode(";", $avatarItemIds);


?>
https://www.rovive.pro/asset/BodyColors.ashx?userId=<?= $userid ?><?= !empty($string) ? ";" . $string : '' ?>