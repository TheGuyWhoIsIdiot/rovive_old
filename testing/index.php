<?php

//Create Connnection
$host = 'localhost'
$user = 'admin'
$password = 'fuckingNewPasswordCuzIdkCockNBallTortureFromWikipedia123'
$database = 'rovive'


$sqlLink = mysqli_connect($host, $user, $password, $database);

//If Error Connecting
if(!$sqlLink) {
    die('<center><br><h3>Error connecting to servers Database.');
}

$query = $sqlLink->query("SELECT * FROM users ORDER by id");
while($row = $query->fetch_array()){
    echo "<tr>";
    echo "<td>Id: ".$row['id']."</td>";
    echo "<td>Username:".$row['username']"</td>";
    echo "<td>is Admin?: ".$row['admin']."</td>";
    echo "<td>Currency: ".$row['currency']."</td>";
    echo "</tr>";
}
?>