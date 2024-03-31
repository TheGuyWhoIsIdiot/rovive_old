<?php
header("Content-Type: application/xml");

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rovive');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
    die("Oppsies! we are having some issues with the connection of the server :). heres is the error: " . mysqli_connect_error());
}
// TODO: make this dynamic (load stuff from db)

$headColor = 208;
$leftArmColor = 1003;
$leftLegColor = 1003;
$rightArmColor = 1003;
$rightLegColor = 1003;
$torsoColor = 1003;
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