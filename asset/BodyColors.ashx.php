<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";

header("Content-Type: application/xml");

$userclass = new User;

$user = $userclass->getUser($_GET["userId"]);

$bodycolors = json_decode($user["bodycolors"]);

function getBodyPartColor($bodypart) {
    global $bodycolors;

    return isset($bodycolors->$bodypart) ? $bodycolors->$bodypart : 1;
}

$headColor = getBodyPartColor("HeadColor");
$leftArmColor = getBodyPartColor("LeftArmColor");
$leftLegColor = getBodyPartColor("LeftLegColor");
$rightArmColor = getBodyPartColor("RightArmColor");
$rightLegColor = getBodyPartColor("RightLegColor");
$torsoColor = getBodyPartColor("TorsoColor");
?>
<?php echo "<?" ?>xml version="1.0" encoding="utf-8" ?>
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.rovive.pro/roblox.xsd" version="4">
    <External>null</External>
    <External>nil</External>
    <Item class="BodyColors">
        <Properties>
            <int name="HeadColor"><?php echo $headColor; ?></int>
            <int name="LeftArmColor"><?php echo $leftArmColor; ?></int>
            <int name="LeftLegColor"><?php echo $leftLegColor; ?></int>
            <string name="Name">Body Colors</string>
            <int name="RightArmColor"><?php echo $rightArmColor; ?></int>
            <int name="RightLegColor"><?php echo $rightLegColor; ?></int>
            <int name="TorsoColor"><?php echo $torsoColor; ?></int>
            <bool name="archivable">true</bool>
        </Properties>
    </Item>
</roblox>