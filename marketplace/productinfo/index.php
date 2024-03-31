<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

header('Content-Type: application/json');

$AssetId = intval($_GET['assetId']);


if ($AssetId === 0) {
    $response = array(
        "banableError" => true,
		"message" => "Please enter a valid Asset Id.",
        "realMessage" => "Sir you know what ur trying to do."
    );

    echo json_encode($response);
    exit;
}

$gameclass = new Game;
$userclass = new User;

$game = $gameclass::getGame($AssetId);

if (!$game) {
    $response = array(
        "error" => true,
        "message" => "Asset doesn't exist on our servers"
    );

    echo json_encode($response);
    exit;
}

$asset = array(
    "Name" => $game['title'],
    "Desc" => $game['description'],
    "Created" => $game['created_at'],
    "Updated" => $game['updated_at'],
    "Type" => 19,
    "CreatorId" => $game['creator_id'],
);

$Name = $asset['Name'];
$Desc = $asset['Desc'];
$Type = $asset['Type'];

$Creator = array(
    "Id" => $asset['CreatorId'],
    "Name" => $userclass::getUser($asset['CreatorId'])['username'],
    "CreatorType" => "User",
    "CreatorTargetId" => 0,
);

$Created = date('Y-m-dTH:i:s:P', $asset['Created']);
$Updated = date('Y-m-dTH:i:s:P', $asset['Updated']);

$PriceInRobux = true;
$PriceInTickets = false;
$Sales = 0;
$IsNew = false;
$IsForSale = true;
$IsPublicDomain = false;
$IsLimited = array(
    "Enabled" => false,
    "Unique" => false,
); // do it like IsLimited and IsLimitedUnique
$Remaining = false;
$MinimumMembershipLevel = 0;
$ContentRatingTypeId = 0;

$ProductInfo = array(
    "AssetId" => $AssetId,
    "ProductId" => $AssetId,
    "Name" => $Name,
    "Description" => $Desc,
    "AssetTypeId" => $Type,
    "Creator" => $Creator,
    "IconImageAssetId" => $AssetId,
    "Created" => $Created,
    "Updated" => $Updated,
    "PriceInRobux" => $PriceInRobux,
    "PriceInTickets" => $PriceInTickets,
    "Sales" => $Sales,
    "IsNew" => $IsNew,
    "IsForSale" => $IsForSale,
    "IsPublicDomain" => $IsPublicDomain,
    "IsLimited" => $IsLimited['Enabled'],
    "IsLimitedUnique" => $IsLimited['Unique'],
    "Remaining" => $Remaining,
    "MinimumMembershipLevel" => $MinimumMembershipLevel,
    "ContentRatingTypeId" => $ContentRatingTypeId,
);

echo json_encode($ProductInfo);
