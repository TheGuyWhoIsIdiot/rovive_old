<?php

if (str_ends_with($_SERVER['REQUEST_URI'], 'inventory/')) {
    require_once "inventory.php";
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$userid = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

$userclass = new User;
$user = $userclass::getUser($userid);

if ($user) {
    $title =  $user["username"] . "'s Profile";
} else {
    header("HTTP/1.1 404 Not Found");
    $title = "404 Not Found";

    require_once "404.php";
    exit;
}

$gameclass = new Game;
$jobClass = new Jobs;

$games = $gameclass::getGamesByUserId($userid);

// TODO: make this dynamic

$followersCount = 0;
$followingsCount = 0;
$friendsCount = 0;
$usermembership = $user["membership"];

$badgescount = 11;

?>

<?php echo PageBuilder::buildHeader(); ?>

<link rel="stylesheet" href="/css/page___9b1354f6392e505305c1aa8a1f7931d6_m.css" />
<script type='text/javascript' src='/js/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>

<div class="content ">

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">
                    

<iframe name="Roblox_Profile_Top_728x90" allowtransparency="true" frameborder="0" height="110" scrolling="no" src="https://web.archive.org/web/20161014183121if_/https://www.roblox.com/user-sponsorship/1" width="728" data-js-adtype="iframead" data-ruffle-polyfilled=""></iframe>

                </div>
            



<script type="text/javascript">
    var Roblox = Roblox || {};
</script>

<div class="profile-container ng-scope" ng-modules="robloxApp, profile, robloxApp.helpers">


<div class="section profile-header">

    <div class="section-content profile-header-content ng-scope" ng-controller="profileHeaderController">


<div data-userid="0" data-profileuserid="1" data-profileusername="test" data-friendscount="0" data-followerscount="484952" data-followingscount="0" data-acceptfriendrequesturl="/api/friends/acceptfriendrequest" data-incomingfriendrequestid="0" data-arefriends="false" data-friendurl="https://www.roblox.com/users/1/friends#!/friends" data-incomingfriendrequestpending="false" data-maysendfriendinvitation="true" data-friendrequestpending="false" data-sendfriendrequesturl="/api/friends/sendfriendrequest" data-removefriendrequesturl="/api/friends/removefriend" data-mayfollow="false" data-isfollowing="false" data-followurl="/user/follow" data-unfollowurl="/api/user/unfollow" data-canmessage="true" data-messageurl="/messages/compose?recipientId=1" data-canbefollowed="false" data-cantrade="false" data-isblockbuttonvisible="false" data-getfollowscript="" data-ismorebtnvisible="false" data-isvieweeblocked="false" data-mayimpersonate="false" data-impersonateurl="" data-mayupdatestatus="false" data-updatestatusurl="" data-statustext="Welcome to ROBLOX, the Imagination Platform. Make friends, explore, and play games!" data-editstatusmaxlength="254" profile-header-data="" profile-header-layout="profileHeaderLayout" class="hidden ng-isolate-scope"></div>
        <div class="profile-header-top">
        <div class="avatar avatar-headshot-lg card-plain profile-avatar-image">
            <span class="avatar-card-link avatar-image-link">
                            <img alt="<?= htmlspecialchars($user["username"]) ?>" class="avatar-card-image profile-avatar-thumb" ng-src="{{ '/api/getProfilePicture?id=<?= $userid ?>' }}" src="/api/getProfilePicture?id=<?= $userid ?>" thumbnail='{"Final":true,"Url":"/api/getProfilePicture?id=<?= $userid ?>","RetryUrl":null}' image-retry>
             </span>
            <script type="text/javascript">
                $("img.profile-avatar-thumb").on('load', function() {
                    if (Roblox && Roblox.Performance) {
                        Roblox.Performance.setPerformanceMark("head_avatar");
                    }
                });
            </script>
        </div>
            <div class="header-caption">
                <div class="header-title">
                            <h2>
                                <?= htmlspecialchars($user["username"]) ?>
                            </h2>
                            <?php if ($usermembership == "BuildersClub") { ?>
                                <span class="icon-bc" style="position: relative; top: 0.175em;"></span>
                            <?php } elseif ($usermembership == "TurboBuildersClub") { ?>
                                <span class="icon-tbc" style="position: relative; top: 0.175em;"></span>
                            <?php } elseif ($usermembership == "OutrageousBuildersClub") { ?>
                                <span class="icon-obc" style="position: relative; top: 0.175em;"></span>
                            <?php } ?>
                        </div>
                <div class="header-details">
                            <ul class="details-info">
                                <li>
                                    <div class="text-label">Friends</div>
                                    <a class="text-name" href="https://www.rovive.pro/users/<?= $userid ?>/friends#!/friends">
                                        <h3>
                                            <?= $friendsCount ?>
                                        </h3>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-label">Followers</div>
                                    <a class="text-name" href="https://www.rovive.pro/users/<?= $userid ?>/friends#!/followers">
                                        <h3>
                                            <?= $followersCount ?>
                                        </h3>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-label">Following</div>
                                    <a class="text-name" href="https://www.rovive.pro/users/<?= $userid ?>/friends#!/following">
                                        <h3>
                                            <?= $followingsCount ?>
                                        </h3>
                                    </a>
                                </li>
                            </ul>
                        <ul class="details-actions desktop-action">
                            <!-- ngIf: !profileHeaderLayout.areFriends --><li class="btn-friends ng-scope" ng-if="!profileHeaderLayout.areFriends">
                                <!-- ngIf: profileHeaderLayout.incomingFriendRequestPending -->
                                <!-- ngIf: !profileHeaderLayout.incomingFriendRequestPending
                                                && profileHeaderLayout.maySendFriendInvitation -->
                                <!-- ngIf: !profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && profileHeaderLayout.friendRequestPending -->
                                <!-- ngIf: !profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && !profileHeaderLayout.friendRequestPending --><button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            &amp;&amp; !profileHeaderLayout.maySendFriendInvitation
                                            &amp;&amp; !profileHeaderLayout.friendRequestPending" class="btn-control-md disabled ng-scope">
                                    Add Friend
                                </button><!-- end ngIf: !profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && !profileHeaderLayout.friendRequestPending -->
                            </li><!-- end ngIf: !profileHeaderLayout.areFriends -->
                            <!-- ngIf: profileHeaderLayout.areFriends -->
                            <li class="btn-messages">
                                <button class="btn-control-md" ng-disabled="!profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0" ng-click="sendMessage()" disabled="disabled">
                                    Message
                                </button>
                            </li>
                            <!-- ngIf: profileHeaderLayout.canBeFollowed -->
                        </ul>
                        <ul class="details-actions mobile-action" ng-class="{'three-item-list': profileHeaderLayout.canBeFollowed}">
                            <!-- ngIf: !profileHeaderLayout.areFriends --><li class="btn-friends ng-scope" ng-if="!profileHeaderLayout.areFriends">
                                <!-- ngIf: profileHeaderLayout.incomingFriendRequestPending -->
                                <!-- ngIf: !profileHeaderLayout.incomingFriendRequestPending
                                && profileHeaderLayout.maySendFriendInvitation -->
                                <!-- ngIf: !profileHeaderLayout.incomingFriendRequestPending
                            && !profileHeaderLayout.maySendFriendInvitation
                            && profileHeaderLayout.friendRequestPending -->
                                <!-- ngIf: !profileHeaderLayout.incomingFriendRequestPending
                            && !profileHeaderLayout.maySendFriendInvitation
                            && !profileHeaderLayout.friendRequestPending --><a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                            &amp;&amp; !profileHeaderLayout.maySendFriendInvitation
                            &amp;&amp; !profileHeaderLayout.friendRequestPending" class="action-friend-pending ng-scope">
                                    <div class="icon-friend-pending"></div>
                                    <div class="text-label small">Add Friend</div>
                                </a><!-- end ngIf: !profileHeaderLayout.incomingFriendRequestPending
                            && !profileHeaderLayout.maySendFriendInvitation
                            && !profileHeaderLayout.friendRequestPending -->
                            </li><!-- end ngIf: !profileHeaderLayout.areFriends -->
                            <!-- ngIf: profileHeaderLayout.areFriends -->
                            <li class="btn-messages center-icon">
                                <!-- ngIf: !(profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0) -->
                                <!-- ngIf: profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0 --><a ng-if="profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0" ng-click="sendMessage()" class="action-message ng-scope">
                                    <div class="icon-send-message"></div>
                                    <div class="text-label small">Message</div>
                                </a><!-- end ngIf: profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0 -->
                            </li>
                            <!-- ngIf: profileHeaderLayout.canBeFollowed -->
                        </ul>
                </div><!--header-details-->
<div class="header-userstatus">
    <div class="header-userstatus-text" ng-hide="profileHeaderLayout.statusFormShown">
        <span id="userStatusText" class="text-overflow ng-binding" ng-class="{'userstatus-editable' : profileHeaderLayout.mayUpdateStatus}" ng-bind="profileHeaderLayout.statusText | statusfilter" ng-click="revealStatusForm()">"not working yet"</span>
    </div>
</div>
            </div>
        </div>
        <p ng-show="profileHeaderLayout.hasError" class="small text-error header-details-error ng-binding ng-hide"></p>
        <div id="profile-header-more" class="profile-header-more ng-hide" ng-show="profileHeaderLayout.isMoreBtnVisible">
            <a id="popover-link" class="rbx-menu-item" data-toggle="popover" data-bind="profile-header-popover-content" data-original-title="" title="">
                <span class="icon-more"></span>
            </a>
            <div id="popover-content" class="rbx-popover-content" data-toggle="profile-header-popover-content">
                <ul class="dropdown-menu" role="menu">
                    <li ng-show="profileHeaderLayout.mayFollow" class="ng-hide">
                        <a ng-bind="profileHeaderLayout.isFollowing ? 'Unfollow' : 'Follow'" ng-click="follow()" id="profile-follow-user" class="ng-binding">Follow</a>
                    </li>
                        <li ng-show="profileHeaderLayout.canTrade" class="ng-hide"><a ng-click="tradeItems()" id="profile-trade-items">Trade Items</a></li>
                    <li ng-show="profileHeaderLayout.isBlockButtonVisible" class="ng-hide">
                        <a ng-bind="!profileHeaderLayout.isVieweeBlocked ? 'Block User' : 'Unblock User'" ng-click="blockUser()" id="profile-block-user" class="ng-binding">Block User</a>
                    </li>
                                                                            </ul>
            </div>
            <script type="text/javascript">
                $(function() {
                    $(".details-actions, .mobile-details-actions").on("click touchstart", ".profile-join-game", function() {
                        // NOTE: global var set due to legacy game launch code.
                        play_placeId = 0;
                        
                    });
                });
            </script>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-block-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Warning
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unblock this user?</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Unblock
                    </button>
                                    <button type="button" class="btn-fixed-width btn-secondary-md" ng-click="close()">
                        Cancel
                    </button>
            </div>
            </div><!-- /.modal-content -->
    </script>
</div>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-unblock-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Warning
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to block this user?</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Block
                    </button>
                                    <button type="button" class="btn-fixed-width btn-secondary-md" ng-click="close()">
                        Cancel
                    </button>
            </div>
                <p class="small modal-footer-note">When you&#39;ve blocked a user, neither of you can directly contact the other.</p>
            </div><!-- /.modal-content -->
    </script>
</div>
        </div>
    </div><!--profile-header-content-->
</div><!-- profile-header -->
    <div class="rbx-tabs-horizontal">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li class="rbx-tab active">
                <a class="rbx-tab-heading" href="#about" id="tab-about">
                    <span class="text-lead">About</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
            <li class="rbx-tab">
                <a class="rbx-tab-heading" href="#creations" id="tab-creations">
                    <span class="text-lead">Creations</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section profile-about ng-scope" ng-controller="profileUtilitiesController">
    <div class="container-header">
        <h3>About</h3>
    </div>
    <div class="section-content">
                            <div class="profile-about-content">
                                <p class="para-overflow-toggle para-height para-overflow-page-loading">
                                    <span class="profile-about-content-text"><?= htmlspecialchars((string)$user["about"]) ?></span>
                                    <span class="toggle-para">Read More</span>
                                </p>
                            </div>
        <div class="profile-about-footer">

                <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/abusereport/UserProfile?id=1&amp;redirectUrl=https%3A%2F%2Fwww.roblox.com%2Fusers%2F1%2Fprofile" class="abuse-report-link">
                    <span class="text-error">Report Abuse</span>
                </a>


<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-past-usernames-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Past Usernames
                </h5>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                            </div>
            </div><!-- /.modal-content -->
    </script>
</div>
        </div>
    </div>
</div>
<div class="container-list profile-avatar">
    <h3>Currently Wearing</h3>
    <div class="col-sm-6 profile-avatar-left">


<div id="UserAvatar" class="thumbnail-holder" data-reset-enabled-every-page="" data-3d-thumbs-enabled="" data-url="/web/20161014183121oe_/https://www.roblox.com/thumbnail/user-avatar?userId=1&amp;thumbnailFormatId=124&amp;width=300&amp;height=300" style="width:300px; height:300px;">
    <span class="thumbnail-span" data-3d-url="/avatar-thumbnail-3d/json?userId=1" data-js-files="https://js.rbxcdn.com/95518cef4aea4b89a95e61452d70c3bb.js"><img alt="ROBLOX" class="" src=/api/getAvatarImage?id=<?= $userid ?>"></span>
        <img class="user-avatar-overlay-image thumbnail-overlay" src="https://web.archive.org/web/20161014183121im_/https://images.rbxcdn.com/57ede1145c87db28cf51e2355909ee49.png" alt="">
    <span class="enable-three-dee btn-control btn-control-small" style="visibility: visible;">3D</span>
</div>


    </div>
        <div class="col-sm-6 profile-avatar-right">
            <div class="profile-avatar-mask">

<div class="profile-accoutrements-container ng-scope" ng-controller="profileAccoutrementsController">
<div data-numberofaccoutrements="8" data-accoutrementsperpage="8" data-intouchscreen="false" profile-accoutrements-data="" profile-accoutrements-layout="profileAccoutrementsLayout" class="hidden ng-isolate-scope"></div>
    <div id="accoutrements-slider" class="profile-accoutrements-slider ng-isolate-scope" profile-accoutrements-slider="" profile-accoutrements-layout="profileAccoutrementsLayout">
                    <ul class="accoutrement-items-container">
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Man-Left-Arm-item?id=86500054">
                        <img title="Man Left Arm" alt="Man Left Arm" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t1.rbxcdn.com/1eea2d0b26f722201e17dadde1a8c6d6">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Man-Right-Leg-item?id=86500078">
                        <img title="Man Right Leg" alt="Man Right Leg" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t7.rbxcdn.com/7782c1f13f93ad4cf121454858d8499f">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Man-Right-Arm-item?id=86500036">
                        <img title="Man Right Arm" alt="Man Right Arm" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t1.rbxcdn.com/6cd94102e9b74372a342a1dc42d28c31">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Man-Torso-item?id=86500008">
                        <img title="Man Torso" alt="Man Torso" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t0.rbxcdn.com/609e49bede812c68122ba0648729a805">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Man-Left-Leg-item?id=86500064">
                        <img title="Man Left Leg" alt="Man Left Leg" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t2.rbxcdn.com/8a5fc914ec02c7655a24b3a873e82b91">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/ROBLOX-Baseball-Cap-item?id=348212308">
                        <img title="ROBLOX Baseball Cap" alt="ROBLOX Baseball Cap" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t7.rbxcdn.com/e16d6d2bad27c3a4cc140076744b71f8">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Black-Jacket-with-Blue-Shirt-item?id=358249985">
                        <img title="Black Jacket with Blue Shirt" alt="Black Jacket with Blue Shirt" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t0.rbxcdn.com/a8d02410e8ad38d561bda7a4eab6e800">
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable="">
                    <a href="https://web.archive.org/web/20161014183121/https://www.roblox.com/Jeans-with-Red-Kicks-item?id=358252359">
                        <img title="Jeans with Red Kicks" alt="Jeans with Red Kicks" class="accoutrement-image" src="https://web.archive.org/web/20161014183121im_/https://t4.rbxcdn.com/b458eb0a27d93e72ce370741139e1938">
                    </a>
                </li>
                    </ul>

    </div><!--profile-accoutrement-slider-->
    <div id="accoutrements-page" class="profile-accoutrements-page-container ng-isolate-scope" profile-accoutrements-page="" profile-accoutrements-layout="profileAccoutrementsLayout">
        <span class="profile-accoutrements-page hidden page-active" ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 0}" ng-click="getAccoutrementsPage(0)"></span>
        <span class="profile-accoutrements-page hidden" ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 1}" ng-click="getAccoutrementsPage(1)"></span>
    </div>
</div>
            </div>
        </div>
</div>

    <div class="section profile-collections ng-scope" ng-controller="profileCollectionsController">
        <div class="container-header">
            <h3>Collections</h3>
            <div class="collection-btns">
                            </div>
        </div>
        <div class="section-content">
                    <ul class="hlist collections-list item-list">
                    <li class="list-item asset-item collections-item">
                        <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/Spider-Cap-item?id=515680795" class="collections-link" title="Spider Cap">
                            <img src="https://web.archive.org/web/20161014183121im_/https://t0.rbxcdn.com/6c6b9d4f7f5c8f748d7537c3f37a67ef" alt="Spider Cap" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/6c6b9d4f7f5c8f748d7537c3f37a67ef&quot;,&quot;RetryUrl&quot;:null}" image-retry="" class="ng-isolate-scope">
                            <span class="text-overflow item-name">Spider Cap</span>
                        </a>
            
                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/Golden-Soccer-Beanie-item?id=512451395" class="collections-link" title="Golden Soccer Beanie">
                            <img src="https://web.archive.org/web/20161014183121im_/https://t5.rbxcdn.com/23553e96009e4b512a761b88cda447a5" alt="Golden Soccer Beanie" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t5.rbxcdn.com/23553e96009e4b512a761b88cda447a5&quot;,&quot;RetryUrl&quot;:null}" image-retry="" class="ng-isolate-scope">
                            <span class="text-overflow item-name">Golden Soccer Beanie</span>
                        </a>
            
                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/Donum-Praefectus-item?id=521961959" class="collections-link" title="Donum Praefectus">
                            <img src="https://web.archive.org/web/20161014183121im_/https://t3.rbxcdn.com/8c383f94532d40da669497c1cac44cd2" alt="Donum Praefectus" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t3.rbxcdn.com/8c383f94532d40da669497c1cac44cd2&quot;,&quot;RetryUrl&quot;:null}" image-retry="" class="ng-isolate-scope">
                            <span class="text-overflow item-name">Donum Praefectus</span>
                        </a>
            
                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/Cursed-Gift-of-Trapped-Souls-item?id=520992743" class="collections-link" title="Cursed Gift of Trapped Souls">
                            <img src="https://web.archive.org/web/20161014183121im_/https://t3.rbxcdn.com/014d1b4aa5b4f75178583724a4e3694d" alt="Cursed Gift of Trapped Souls" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t3.rbxcdn.com/014d1b4aa5b4f75178583724a4e3694d&quot;,&quot;RetryUrl&quot;:null}" image-retry="" class="ng-isolate-scope">
                            <span class="text-overflow item-name">Cursed Gift of Trapped Souls</span>
                        </a>
            
                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/Friendly-Skeleton-Head-item?id=517261392" class="collections-link" title="Friendly Skeleton Head">
                            <img src="https://web.archive.org/web/20161014183121im_/https://t5.rbxcdn.com/9199a393dcc8659920949866f24b959d" alt="Friendly Skeleton Head" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t5.rbxcdn.com/9199a393dcc8659920949866f24b959d&quot;,&quot;RetryUrl&quot;:null}" image-retry="" class="ng-isolate-scope">
                            <span class="text-overflow item-name">Friendly Skeleton Head</span>
                        </a>
            
                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/Dragon-Crown-of-Ancient-Magic-item?id=520970478" class="collections-link" title="Dragon Crown of Ancient Magic">
                            <img src="https://web.archive.org/web/20161014183121im_/https://t2.rbxcdn.com/8719e2526e76c13c675d23c6f6ad4575" alt="Dragon Crown of Ancient Magic" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t2.rbxcdn.com/8719e2526e76c13c675d23c6f6ad4575&quot;,&quot;RetryUrl&quot;:null}" image-retry="" class="ng-isolate-scope">
                            <span class="text-overflow item-name">Dragon Crown of Ancient Magic</span>
                        </a>
            
                    </li>

        </ul>

        </div>
    </div>



    <div class="container-list ng-scope" ng-controller="profileGridController" ng-init="init('group-list','group-container')">
    <div class="container-header">
        <h3>Groups</h3>
        <div class="container-buttons">
            <button class="profile-view-selector btn-secondary-xs" title="Slideshow View" type="button" ng-click="updateDisplay(false)" ng-class="{'btn-secondary-xs': !isGridOn, 'btn-control-xs': isGridOn}">
                <span class="icon-slideshow selected" ng-class="{'selected': !isGridOn}"></span>
            </button>
            <button class="profile-view-selector btn-control-xs" title="Grid View" type="button" ng-click="updateDisplay(true)" ng-class="{'btn-secondary-xs': isGridOn, 'btn-control-xs': !isGridOn}">
                <span class="icon-grid" ng-class="{'selected': isGridOn}"></span>
            </button>
        </div>
    </div>
    <div class="profile-slide-container">
            <div ng-show="isGridOn" class="ng-hide">
                <ul class="hlist game-cards group-list" style="max-height: -8px" horizontal-scroll-bar="loadMore()">
                                <li class="list-item group-container shown" data-index="0" ng-class="{'shown': 0 < visibleItems}">


<div class="game-card">
    <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/groups/group.aspx?gid=7" class="card-item game-card-container">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb card-thumb" data-src="https://web.archive.org/web/20161014183121/https://t5.rbxcdn.com/429652f9f057a5f78d3a2e1e315d204b" alt="Roblox" src="https://web.archive.org/web/20161014183121im_/https://t5.rbxcdn.com/429652f9f057a5f78d3a2e1e315d204b">
        </div>
        <div class="text-overflow game-card-name" title="Roblox" ng-non-bindable="">
            Roblox
        </div>
        <div class="text-overflow game-card-name-secondary">

            196K+ Members
        </div>
        <div class="text-overflow game-card-name-secondary" ng-non-bindable="">
            Owner
        </div>
    </a>
</div>

                                </li>
                                <li class="list-item group-container shown" data-index="1" ng-class="{'shown': 1 < visibleItems}">


<div class="game-card">
    <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/groups/group.aspx?gid=127081" class="card-item game-card-container">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb card-thumb" data-src="https://web.archive.org/web/20161014183121/https://t7.rbxcdn.com/c71faf11c893b989fdc2f42d3d1ba80e" alt="Roblox Wiki" src="https://web.archive.org/web/20161014183121im_/https://t7.rbxcdn.com/c71faf11c893b989fdc2f42d3d1ba80e">
        </div>
        <div class="text-overflow game-card-name" title="Roblox Wiki" ng-non-bindable="">
            Roblox Wiki
        </div>
        <div class="text-overflow game-card-name-secondary">

            19K+ Members
        </div>
        <div class="text-overflow game-card-name-secondary" ng-non-bindable="">
            Wiki System Operator
        </div>
    </a>
</div>

                                </li>

</ul>

                <a ng-click="loadMore()" class="btn btn-control-xs load-more-button ng-hide" ng-show="2 > 6 * NumberOfVisibleRows">Load More</a>
            </div>

            <div id="groups-switcher" class="switcher slide-switcher groups ng-isolate-scope" switcher="" itemscount="switcher.groups.itemsCount" currpage="switcher.groups.currPage" ng-hide="isGridOn">
                                <ul class="slide-items-container switcher-items hlist">
                    <li class="switcher-item slide-item-container active" ng-class="{'active': switcher.groups.currPage == 0}" data-index="0">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/groups/group.aspx?gid=7">
                                        <img class="slide-item-image" src="https://web.archive.org/web/20161014183121im_/https://t3.rbxcdn.com/65d1038ec411a6bb13798ce55e0f2a5c" data-src="https://web.archive.org/web/20161014183121/https://t0.rbxcdn.com/3597d7e6997a16570ebf3641fa2fa27b" data-emblem-id="365259670">


                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 text-overflow slide-item-container-right groups">
                            <div class="slide-item-info">
                                <h2 class="slide-item-name groups" ng-non-bindable="">Roblox</h2>
                                <p class="text-description slide-item-description groups" ng-non-bindable="">Official fan club of ROBLOX!</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Members</div>
                                        <div class="text-lead slide-item-members-count">196K+</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Rank</div>
                                        <div class="text-lead text-overflow slide-item-my-rank groups" ng-non-bindable="">Owner</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.groups.currPage == 1}" data-index="1">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="https://web.archive.org/web/20161014183121/https://web.roblox.com/groups/group.aspx?gid=127081">
                                        <img class="slide-item-image" data-src="https://web.archive.org/web/20161014183121/https://t6.rbxcdn.com/6a8c7ed1d6e449d83f75d4643713daf8" data-emblem-id="364871961">


                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 text-overflow slide-item-container-right groups">
                            <div class="slide-item-info">
                                <h2 class="slide-item-name groups" ng-non-bindable="">Roblox Wiki</h2>
                                <p class="text-description para-overflow slide-item-description groups" ng-non-bindable="">Roblox Wiki: http://wiki.roblox.com/ =================================
The official Roblox Wiki group.  The purpose of this group is:      

1) Normal users to give the wiki staff ideas and suggestions.
2) The wiki staff to collaborate in a more organized and efficient manner.

Wiki applications are always open. The application can be found here: http://polls.roblox.com/roblox-wiki-writer-application

Please join if you are a wiki supporter and would like to share your ideas to the people actually who write the wiki.
</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Members</div>
                                        <div class="text-lead slide-item-members-count">19K+</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Rank</div>
                                        <div class="text-lead text-overflow slide-item-my-rank groups" ng-non-bindable="">Wiki System Operator</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                        </ul>

                    <a class="carousel-control left" data-switch="prev"><span class="icon-carousel-left"></span></a>
                    <a class="carousel-control right" data-switch="next"><span class="icon-carousel-right"></span></a>

    </div>
</div>
</div>




    <div class="section ng-scope" ng-controller="profileUtilitiesController">
                   <?php if ($badgescount > 0) { ?>
                        <div class="container-header">
                            <h3>Roblox Badges (<?= $badgescount ?>)</h3>
                        </div>
                    <?php } elseif ($badgescount > 6) { ?>
                        <div class="btn-secondary-md " id="seebtn" style="width: 5.5em; height: 1.5em; float: right; margin-top: -2em;">
                            <a style="position: relative; bottom: 0.45em; font-size: 0.85em;" id="seebtnt">See More</a>
                        </div>
                        <script>
                            const btn = document.getElementById("seebtn");
                            const btnt = document.getElementById("seebtnt");
                            btn.onclick = function() {
                                const extraBadgerow = document.getElementById("badgerow-2");
                                if (btnt.innerText == "See More") {
                                    extraBadgerow.style.display = "block";
                                    btnt.innerText = "See Less";
                                } else {
                                    extraBadgerow.style.display = "none";
                                    btnt.innerText = "See More";
                                }
                            }
                        </script>
                    <?php } ?>

                    <div class="section-content">
                        <div class="row d-none d-lg-flex">
                            <div class="col-12">
                                <div class="card pt-4 pb-4 pe-4 ps-4">
                                    <ul class="hlist badge-list ng-isolate-scope" truncate="" layout-content="layoutContent" ng-class="{'badge-list-more': !layoutContent.showMore}">
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge6" class="badge-link" title="Homestead">
                                                <span class="icon-homestead" title="Homestead"></span>
                                                <span class="text-overflow item-name">Homestead</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge7" class="badge-link" title="Bricksmith">
                                                <span class="icon-bricksmith" title="Bricksmith"></span>
                                                <span class="text-overflow item-name">Bricksmith</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge3" class="badge-link" title="Combat Initiation">
                                                <span class="icon-combat-initiation" title="Combat Initiation"></span>
                                                <span class="text-overflow item-name">Combat Initiation</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge12" class="badge-link" title="Veteran">
                                                <span class="icon-veteran" title="Veteran"></span>
                                                <span class="text-overflow item-name">Veteran</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge4" class="badge-link" title="Warrior">
                                                <span class="icon-warrior" title="Warrior"></span>
                                                <span class="text-overflow item-name">Warrior</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge2" class="badge-link" title="Friendship">
                                                <span class="icon-friendship" title="Friendship"></span>
                                                <span class="text-overflow item-name">Friendship</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge5" class="badge-link" title="Bloxxer">
                                                <span class="icon-bloxxer" title="Bloxxer"></span>
                                                <span class="text-overflow item-name">Bloxxer</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge8" class="badge-link" title="Inviter">
                                                <span class="icon-inviter" title="Inviter"></span>
                                                <span class="text-overflow item-name">Inviter</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge1" class="badge-link" title="Administrator">
                                                <span class="icon-administrator" title="Administrator"></span>
                                                <span class="text-overflow item-name">Administrator</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge18" class="badge-link" title="Welcome To The Club">
                                                <span class="icon-welcome-to-the-club" title="Welcome To The Club"></span>
                                                <span class="text-overflow item-name">Welcome To The Club</span>
                                            </a>
                                        </li>
                                        <li class="list-item badge-item asset-item"="">
                                            <a href="/Badges.aspx#Badge16" class="badge-link" title="Outrageous Builders Club">
                                                <span class="icon-outrageous-builders-club" title="Outrageous Builders Club"></span>
                                                <span class="text-overflow item-name">Outrageous Builders Club</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="section profile-statistics">
                        <h3>Statistics</h3>

                        <div class="section-content">
                            <ul class="profile-stats-container">
                                <li class="profile-stat">
                                    <p class="text-label">Join Date</p>
                                    <p class="text-lead">
                                        <?= date("Y-m-d", $user["created_at"]) ?>
                                    </p>
                                </li>
                                <li class="profile-stat">
                                    <p class="text-label">Place Visits</p>
                                    <p class="text-lead">
                                        0
                                    </p>
                                </li>
                                <li class="profile-stat">
                                    <p class="text-label">Forum Posts</p>
                                    <p class="text-lead">0</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
                <div class="tab-pane" id="creations" profile-empty-tab>
                    <?php if (empty($games)) { ?>
                        <div class="col-xs-12 section-content-off section-content">
                            <?= htmlspecialchars($user["username"]) ?> has no creations.
                        </div>
                    <?php } else { ?>
                        <div class="profile-game">
                            <script defer>
                                // handle game view switcher
                                let isGridOn = false;

                                function updateGamesDisplay(isGrid, btn) {
                                    console.log("switched view to: ", isGrid);
                                    isGridOn = isGrid;

                                    $(".profile-view-selector").toggleClass("btn-secondary-xs", false);
                                    $(".profile-view-selector").toggleClass("btn-control-xs", true);

                                    $(".profile-view-selector").find("span").toggleClass("selected", false);

                                    $(btn).find("span").toggleClass("selected", true)
                                    $(btn).toggleClass("btn-secondary-xs", true)
                                    $(btn).toggleClass("btn-control-xs", false)

                                    if (isGrid == true) {
                                        $(".game-grid").removeClass("hidden");
                                        $(".slide-switcher").addClass("hidden");
                                    } else {
                                        $(".game-grid").addClass("hidden");
                                        $(".slide-switcher").removeClass("hidden");
                                    }
                                }
                            </script>
                            <div class="container-header">
                                <h3>Games</h3>
                                <div class="container-buttons">
                                    <button class="profile-view-selector slideshow-selector btn-secondary-xs" title="Slideshow View" type="button" onclick="updateGamesDisplay(false, this)">
                                        <span class="icon-slideshow"></span>
                                    </button>
                                    <button class="profile-view-selector grid-selector btn-control-xs" title="Grid View" type="button" onclick="updateGamesDisplay(true, this)">
                                        <span class="icon-grid"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="game-grid hidden">
                                <ul class="hlist game-cards ">
                                    <?php foreach ($games as $game) { ?>
                                        <li class="list-item game-card">
                                            <div class="game-card-container">
                                                <a href="/games/<?= $game["id"] ?>/" class="game-card-link">
                                                    <div class="game-card-thumb-container">
                                                        <img class="game-card-thumb ng-isolate-scope" src="<?= $game["icon"] != "" ? $game["icon"] : "/img/DefaultPlaceIcon.jpg" ?>" alt="<?= htmlspecialchars($game["title"]) ?>">
                                                    </div>
                                                    <div class="text-overflow game-card-name" title="<?= htmlspecialchars($game["title"]) ?>"="">
                                                        <?= htmlspecialchars($game["title"]) ?>
                                                    </div>
                                                    <div class="game-card-name-secondary">
                                                        <?= (int)$jobClass->getPlayerAmountForPlaceId($game["id"]) ?> Playing
                                                    </div>
                                                    <div class="game-card-vote">
                                                        <div class="vote-bar">
                                                            <div class="vote-thumbs-up">
                                                                <span class="icon-thumbs-up"></span>
                                                            </div>
                                                            <div class="vote-container" data-upvotes="0" data-downvotes="0" data-voting-processed="false">
                                                                <div class="vote-background "></div>
                                                                <div class="vote-percentage" style="width: 0%;"></div>
                                                                <div class="vote-mask">
                                                                    <div class="segment seg-1"></div>
                                                                    <div class="segment seg-2"></div>
                                                                    <div class="segment seg-3"></div>
                                                                    <div class="segment seg-4"></div>
                                                                </div>
                                                            </div>
                                                            <div class="vote-thumbs-down">
                                                                <span class="icon-thumbs-down"></span>
                                                            </div>
                                                        </div>
                                                        <div class="vote-counts">
                                                            <div class="vote-down-count">0</div>
                                                            <div class="vote-up-count">3,591</div>

                                                        </div>
                                                    </div>
                                                </a>
                                                <span class="game-card-footer">
                                                    <span class="text-label xsmall">By </span>
                                                    <a class="text-link xsmall text-overflow" href="/users/<?= (int)$game["creator_id"] ?>"><?= htmlspecialchars($userclass->getUser($game["creator_id"])["username"]) ?></a>
                                                </span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>

                                <a ng-click="loadMore()" class="btn btn-control-xs load-more-button" ng-show="7 > 6 * NumberOfVisibleRows">Load More</a>
                            </div>
                            <div id="games-switcher" class="switcher slide-switcher games" switcher itemscount="switcher.games.itemsCount" currpage="switcher.games.currPage">

                                <ul class="slide-items-container switcher-items hlist">
                                    <?php foreach ($games as $game) { ?>
                                        <li class="switcher-item slide-item-container active" ng-class="{'active': switcher.games.currPage == 0}" data-index="0">
                                            <div class="col-sm-6 slide-item-container-left">
                                                <div class="slide-item-emblem-container"><a href="/games/<?= $game["id"] ?>/"> <img class="slide-item-image ng-isolate-scope" src="<?= $game["icon"] != "" ? $game["icon"] : "/img/DefaultPlaceIcon.jpg" ?>" alt="<?= htmlspecialchars($game["title"]) ?>" data-emblem-id="<?= $game["id"] ?>" /></a></div>
                                            </div>
                                            <div class="col-sm-6 slide-item-container-right games">
                                                <div class="slide-item-info">
                                                    <h2 class="text-overflow slide-item-name games" ng-non-bindable=""><?= htmlspecialchars($game["title"]) ?></h2>
                                                    <p class="text-description para-overflow slide-item-description games" ng-non-bindable=""><?= htmlspecialchars($game["description"]) ?></p>
                                                </div>
                                                <div class="slide-item-stats">
                                                    <ul class="hlist">
                                                        <li class="list-item"><!-- ngIf: appMeta.isI18nEnabled -->
                                                            <div class="text-label slide-item-stat-title ng-binding ng-scope" ng-if="appMeta.isI18nEnabled" ng-bind="'Label.Playing' | translate">Playing</div><!-- end ngIf: appMeta.isI18nEnabled --><!-- ngIf: !appMeta.isI18nEnabled -->
                                                            <div class="text-lead slide-item-members-count"><?= (int)$jobClass->getPlayerAmountForPlaceId($game["id"]) ?></div>
                                                        </li>
                                                        <li class="list-item"><!-- ngIf: appMeta.isI18nEnabled -->
                                                            <div class="text-label slide-item-stat-title ng-binding ng-scope" ng-if="appMeta.isI18nEnabled" ng-bind="'Label.Visits' | translate">Visits</div><!-- end ngIf: appMeta.isI18nEnabled --><!-- ngIf: !appMeta.isI18nEnabled -->
                                                            <div class="text-lead text-overflow slide-item-my-rank games"><?= (int)$game["visits"] ?></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <?php if (count($games) > 1) { ?>
                                    <a class="carousel-control left" data-switch="prev"><span class="icon-carousel-left"></span></a>
                                    <a class="carousel-control right" data-switch="next"><span class="icon-carousel-right"></span></a>
                                <?php } ?>


                            </div>
                        </div>
                </div>
            <?php } ?>



            </div>


        </div>
    </div>
</div>
</div>    <div class="profile-ads-container">
        <div id="ProfilePageAdDiv1" class="profile-ad"></div>
        <div id="ProfilePageAdDiv2" class="profile-ad"></div>
    </div>
</div>

            
        </div>

<?php echo PageBuilder::buildFooter(); ?>