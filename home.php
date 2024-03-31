<?php
$title = "Home";
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("Location: /");
    exit;
}

$userclass = new User;
$user = $userclass::getUser($_SESSION["user"]["id"]);

if (!$user) {
    header("Location: /");
    exit;
}

$relationshipClass = new Relationships;

$friendCount = $relationshipClass->getAmountOfFriends($_SESSION["user"]["id"]);
$friends = $relationshipClass->getFriends($_SESSION["user"]["id"]);

?>

<?php echo PageBuilder::buildHeader(); ?>

<link rel="stylesheet" href="/css/page___532f8fc30ac54e7ea2b94313bac1040e_m.css" />
<link rel="stylesheet" href="/css/page___91a92cde8068f8f83e91716d43aef526_m.css" />

<div class="content">
    <div id="Skyscraper-Abp-Left" class="abp abp-container left-abp"></div>
    <div id="HomeContainer" class="row home-container">
        <div class="col-xs-12 home-header"><a href="/users/<?= $_SESSION["user"]["id"] ?>/profile" class="avatar avatar-headshot-lg"> <img alt="avatar" src="/api/getProfilePicture?id=<?= $_SESSION["user"]["id"] ?>" id="home-avatar-thumb" class="avatar-card-image"> </a>
            <script>
                $("img#home-avatar-thumb").on('load', function() {
                    if (Roblox && Roblox.Performance) {
                        Roblox.Performance.setPerformanceMark("head_avatar");
                    }
                });
            </script>
            <div class="home-header-content non-bc">
                <h1><a href="https://www.rovive.pro/users/<?= $_SESSION["user"]["id"] ?>/profile"> Hello, <?= htmlspecialchars($_SESSION["user"]["username"]) ?>! </a></h1>
            </div>
        </div>
        <div class="col-xs-12 section home-friends">
            <div class="container-header">
                <h3>Friends (<?= $friendCount ?>)</h3><a href="https://www.rovive.pro/users/friends" class="btn-secondary-xs btn-more btn-fixed-width">See All</a>
            </div>
            <div class="section-content">

                <ul class="hlist friend-list">
                    <?php foreach ($friends as $friend) { ?>
                        <?php $friendsId = $friend["userId"] == $_SESSION["user"]["id"] ? $friend["withUserId"] : $friend["userId"]; ?>
                        <?php $username = htmlspecialchars($userclass->getUser($friendsId)["username"]); ?>
                        <li id="friend_<?= $friendsId ?>" class="list-item friend">
                            <div class="avatar-container"><a href="https://www.rovive.pro/users/<?= $friendsId ?>/profile" class="avatar avatar-card-fullbody friend-link" title="<?= $username ?>">
                                    <span class="avatar-card-link friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=<?= $friendsId ?>" data-orig-retry-url="/avatar-thumbnail/json?userId=<?= $friendsId ?>&amp;width=100&amp;height=100&amp;format=png">
                                        <img alt="<?= $username ?>" class="avatar-card-image" src="/api/getProfilePicture?id=<?= $friendsId ?>">
                                    </span>
                                    <span class="text-overflow friend-name">
                                        <?= $username ?>
                                    </span>
                                </a>
                                <span class="avatar-status friend-status icon-online hidden" title="Online"></span>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <div id="recently-visited-places" class="col-xs-12 container-list home-games">
            <div id="recently-visited-places-header" class="container-header">
                <h3>Recently Played</h3><a href="https://www.rovive.pro/games?sortFilter=6" class="btn-secondary-xs btn-more btn-fixed-width">See All</a>
            </div>
            <div id="recently-visited-places-list" class="game-card-list">
                <div id="recently-visited-places-content-spinner" class="loading-animated game-card-list-spinner">
                    <div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div id="recently-visited-places-content" class="hidden"></div>
            </div>
        </div>
        <div id="my-favorites-games" class="col-xs-12 container-list home-games">
            <div id="my-favorites-games-header" class="container-header">
                <h3>My Favorites</h3><a href="https://www.rovive.pro/users/145914210/favorites#!/places" class="btn-secondary-xs btn-more btn-fixed-width">See All</a>
            </div>
            <div id="my-favorites-games-list" class="">
                <div id="my-favorites-games-content-spinner" class="loading-animated game-card-list-spinner" style="display: none;">
                    <div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div id="my-favorites-games-content" class="">
                    <ul class="hlist game-cards "></ul>
                </div>
            </div>
        </div>
        <div id="game-item-card-template" class="hidden">
            <li class="list-item game-card">
                <div class="game-card-container"><a id="game-card-link" href="gameCardLink" class="game-card-link">
                        <div id="game-card-thumb-container" class="game-card-thumb-container"><img class="game-card-thumb" alt="title" thumbnail="" image-retry=""></div>
                        <div id="game-card-title" class="text-overflow game-card-name" title="title"></div>
                        <div id="game-card-name-secondary" class="game-card-name-secondary"></div>
                        <div class="game-card-vote">
                            <div class="vote-bar" data-voting-processed="true">
                                <div class="vote-thumbs-up"><span class="icon-like-gray-16x16"></span></div>
                                <div id="vote-container" class="vote-container" data-upvotes="0" data-downvotes="0">
                                    <div class="vote-background"></div>
                                    <div class="vote-percentage" style="width: 0%;"></div>
                                    <div class="vote-mask">
                                        <div class="segment seg-1"></div>
                                        <div class="segment seg-2"></div>
                                        <div class="segment seg-3"></div>
                                        <div class="segment seg-4"></div>
                                    </div>
                                </div>
                                <div class="vote-thumbs-down"><span class="icon-dislike-gray-16x16"></span></div>
                            </div>
                            <div class="vote-counts">
                                <div class="vote-down-count"></div>
                                <div class="vote-up-count"></div>
                            </div>
                        </div>
                    </a>
                    <div class="game-card-footer">
                        <div class="creator"><span class="text-label xsmall text-overflow" id="game-card-creator-by"></span></div>
                    </div>
                </div>
            </li>
        </div>
        <div id="friend-activity" class="col-xs-12 container-list home-games">
            <div class="container-header">
                <h3>Friend Activity</h3><a href="https://www.rovive.pro/games?sortFilter=17" class="btn-secondary-xs btn-more btn-fixed-width">See All</a>
            </div>
            <ul class="hlist game-cards"></ul>
        </div>
        <div class="col-xs-12 col-sm-6 home-right-col">
            <div class="section">
                <div class="section-header">
                    <h3>Blog News</h3><a href="https://blog.rovive.pro" class="btn-control-xs btn-more btn-fixed-width">See More</a>
                </div>
                <div class="section-content">
                    <ul class="blog-news">
                        <li class="news"><span class="text-overflow news-link"><a href="https://blog.rovive.pro/2018/03/striking-gold-interview-berezaa/" ref="news-article" class="text-name text-lead">Striking Gold: An Interview with berezaa</a></span></li>
                        <li class="news"><span class="text-overflow news-link"><a href="https://blog.rovive.pro/2018/02/add-friends-phone-contacts/" ref="news-article" class="text-name text-lead">Add Phone Contacts as Friends</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 home-left-col">
            <div class="section" id="feed-container" data-update-status-url="/home/updatestatus.json">
                <div class="section-header">
                    <h3>My Feed</h3>
                </div>
                <div class="section-content">
                    <div class="form-horizontal flex-box" id="statusForm" role="form">
                        <div class="form-group"><input class="form-control input-field" id="txtStatusMessage" maxlength="254" placeholder="What are you up to?" value="">
                            <p class="form-control-label">Status update failed.</p>
                        </div><a type="button" class="btn-primary-md" id="shareButton">Share</a> <img id="loadingImage" class="share-login" alt="Sharing..." src="https://roblox-xi.vercel.app/ec4e85b0c4396cf753a06fade0a8d8af.gif" height="17" width="48">
                    </div>
                    <ul class="vlist feeds"></ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        var Roblox = Roblox || {};
        Roblox.I18nData = Roblox.I18nData || {};
        Roblox.I18nData.isI18nEnabledOnGames = true;
    </script>
    <script>
        $(function() {
            var name = 'Exoticswagsniper';
            var hashRegex = '^0000';
            var devType = 'Computer';
            if (Roblox && Roblox.Hashcash) {
                Roblox.Home.doProofOfWork(name, hashRegex, devType);
            }
        });
    </script>
    <div id="Skyscraper-Abp-Right" class="abp abp-container right-abp"></div>
</div>

<?php echo PageBuilder::buildFooter(); ?>