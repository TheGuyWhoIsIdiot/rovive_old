<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$assetId = (int) ($_GET['productId'] ?? die(json_encode(["message" => "Unable to process request."])));

$GetAssetInfo = $pdo->prepare("SELECT id, name, moreinfo, creatorid, creatorname, createdon, updatedon, rsprice FROM gamepasses WHERE id = :pid");
$GetAssetInfo->execute([':pid' => $assetId]);
$AssetInfo = $GetAssetInfo->fetch(PDO::FETCH_ASSOC);

$AssetJSON = [
    "AssetId" => $AssetInfo['id'],
    "ProductId" => $AssetInfo['id'],
    "Name" => $AssetInfo['name'],
    "Description" => $AssetInfo['moreinfo'],
    "AssetTypeId" => 0,
    "Creator" => [
        "Id" => $AssetInfo['creatorid'],
        "Name" => $AssetInfo['creatorname'],
    ],
    "IconImageAssetId" => $AssetInfo['id'],
    "Created" => $AssetInfo['createdon'],
    "Updated" => $AssetInfo['updatedon'],
    "PriceInRobux" => $AssetInfo['rsprice'],
    "PriceInTickets" => 0,
    "Sales" => 0,
    "IsNew" => true,
    "IsForSale" => true,
    "IsPublicDomain" => false,
    "IsLimited" => false,
    "IsLimitedUnique" => false,
    "Remaining" => 0,
    "MinimumMembershipLevel" => 0,
    "ContentRatingTypeId" => 0,
];

die(json_encode($AssetJSON, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
?>