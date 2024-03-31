<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$gameclass = new Game;
$game = $gameclass::getGame(intval($_GET['placeId']));

$userclass = new User;

require_once $_SERVER["DOCUMENT_ROOT"] . "/SOAP.php";

$jobClass = new Jobs;

$playerAmount = (int)$jobClass->getPlayerAmountForPlaceId($game["id"]);

$runningGames = $jobClass->getAllJobsForPlaceId($game["id"]);

?>

<?php if (count($runningGames) == 0) { ?>
    <div class="col-xs-12 section-content-off">There are currently no running games.</div>
<?php } ?>
<?php foreach ($runningGames as $runningGame) { ?>
    <?php
    //split the , into an array
    $playersstring = (string)$runningGame["players"];
    $players = explode(",", $playersstring);
    // remove empty values
    $players = array_filter($players);
    ?>
    <li class="stack-row rbx-game-server-item">
        <div class="section-header">
            <div class="link-menu rbx-game-server-menu"></div>
        </div>
        <div class="section-left rbx-game-server-details">
            <div class="rbx-game-status rbx-game-server-status"><?= $runningGame["playerCount"] ?> of <?= (int)$game["server_size"] ?> players max</div>
            <?php if ($runningGame["FPS"] < 50) { ?>
                <div class="rbx-game-server-alert">
                    <span class="icon-remove"></span>Slow Game
                </div>
            <?php } ?>
            <button class="btn-full-width btn-control-xs rbx-game-server-join" onclick="playJobId('<?= $runningGame['jobId'] ?>')" data-placeid>Join</button>
        </div>
        <div class="section-right rbx-game-server-players">
            <?php foreach ($players as $player) { ?>
                <div class="player-avatar">
                    <span class='avatar avatar-headshot-sm player-avatar'>
                        <a class='avatar-card-link' href="/users/<?= $player ?>/profile">
                            <img class='avatar-card-image' src='/api/getProfilePicture?id=<?= $player ?>'>
                        </a>
                    </span>
                </div>
            <?php } ?>
        </div>
    </li>
<?php } ?>