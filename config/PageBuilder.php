<?php

class PageBuilder
{

    public static array $pageConfig =
    [
        "title" => "a",
        "og:site_name" => SITE_CONFIG["site"]["name"],
        "og:url" => "https://www.rovive.pro/",
        "og:description" => "An old roblox revival that goes for the win.",
        "og:image" => "https://www.rovive.pro/img/logoFull.png",
        "containerWidth" => "w-100",
        "includeNav" => true
    ];

    public static function buildHeader()
    {
        global $maintenance;
        global $maintenanceKey;



        ob_start();

?>
        <?php if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP']; ?>
        <!DOCTYPE html>
        <!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
        <!--[if gt IE 8]><!-->
        <html>
        <!--<![endif]-->

        <head>
            <title><?php echo self::$pageConfig["title"]; ?></title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />

            <meta name="author" content="Rovive" />
            <meta name="description" content="Rovive is a place to rœvive old Roblox!" />
            <meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
            <meta property="og:site_name" content="Rovive" />
            <meta property="og:title" content="Rovive" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="https://www.rovive.pro/" />
            <meta property="og:description" content="Rovive is a place to rœvive old Roblox!" />
            <meta property="og:image" content="/img/fb70fd2b56107a0d43f2f98658885702.jpg" />
            <meta property="fb:app_id" content="190191627665278">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:site" content="@Rovive">
            <meta name="twitter:title" content="Rovive">
            <meta name="twitter:description" content="Rovive is a place to rœvive old Roblox!">
            <meta name="twitter:creator">
            <meta name=twitter:image1 content="/img/fb70fd2b56107a0d43f2f98658885702.jpg" />
            <meta name="twitter:app:country" content="US">
            <meta name="twitter:app:name:iphone" content="Rovive Mobile">
            <meta name="twitter:app:id:iphone" content="431946152">
            <meta name="twitter:app:url:iphone">
            <meta name="twitter:app:name:ipad" content="Rovive Mobile">
            <meta name="twitter:app:id:ipad" content="431946152">
            <meta name="twitter:app:url:ipad">
            <meta name="twitter:app:name:googleplay" content="Rovive">
            <meta name="twitter:app:id:googleplay" content="com.rbx2016client">
            <meta name="twitter:app:url:googleplay" />

            <link href="/img/favicon.ico" rel="icon" />
            <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">
            <link rel="canonical" href="https://www.rovive.pro/request-error?code=404" />

            <link rel='stylesheet' href='/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css' />
            <link rel='stylesheet' href='/css/page___417cd0b19f327b5d8beb1ff56b4dfd82_m.css' />

            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

            <link rel="stylesheet" href="/css/main.css">


            <script type='text/javascript' src='/shut/realtime.js'></script>
            <script type='text/javascript' src='/js/jquery-1.11.1.min.js'></script>
            <script type='text/javascript'>
                window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")
            </script>
            <script type='text/javascript' src='/js/jquery-migrate-1.2.1.min.js'></script>
            <script type='text/javascript'>
                window.jQuery || document.write(
                    "<script type='text/javascript' src='/js/jquery-migrate-1.2.1.js'><\/script>")
            </script>

            <script src="/js/bootstrap.js"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />





            <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



            <script type="text/javascript">
                if (typeof(Roblox) === "undefined") {
                    Roblox = {};
                }

                if (typeof(Roblox.Endpoints) === "undefined") {
                    Roblox.Endpoints = {};
                }

                if (typeof(Roblox.Endpoints.Urls) === "undefined") {
                    Roblox.Endpoints.Urls = {};
                }


                Roblox.Endpoints = Roblox.Endpoints || {};
                Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
                Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://www.rovive.pro/api/item.ashx';
                Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.rovive.pro/asset/';
                Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.rovive.pro/client-status/set';
                Roblox.Endpoints.Urls['/client-status'] = 'https://www.rovive.pro/client-status';
                Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.rovive.pro/game/';
                Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.rovive.pro/game-auth/getauthticket';
                Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.rovive.pro/game/edit.ashx';
                Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.rovive.pro/game/getauthticket';
                Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.rovive.pro/game/placelauncher.ashx';
                Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.rovive.pro/game/preloader';
                Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.rovive.pro/game/report-stats';
                Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.rovive.pro/game/report-event';
                Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.rovive.pro/game/updateprerollcount';
                Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.rovive.pro/login/default.aspx';
                Roblox.Endpoints.Urls['/my/avatar'] = 'https://www.rovive.pro/my/avatar';
                Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.rovive.pro/my/money.aspx';
                Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.rovive.pro/chat/chat';
                Roblox.Endpoints.Urls['/presence/users'] = 'https://www.rovive.pro/presence/users';
                Roblox.Endpoints.Urls['/presence/user'] = 'https://www.rovive.pro/presence/user';
                Roblox.Endpoints.Urls['/friends/list'] = 'https://www.rovive.pro/friends/list';
                Roblox.Endpoints.Urls['/navigation/getCount'] = 'https://www.rovive.pro/navigation/getCount';
                Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.rovive.pro/catalog/browse.aspx';
                Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.rovive.pro/catalog/html';
                Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.rovive.pro/catalog/json';
                Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.rovive.pro/catalog/contents';
                Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.rovive.pro/catalog/lists.aspx';
                Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.rovive.pro/asset-hash-thumbnail/image';
                Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.rovive.pro/asset-hash-thumbnail/json';
                Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.rovive.pro/asset-thumbnail-3d/json';
                Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.rovive.pro/asset-thumbnail/image';
                Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.rovive.pro/asset-thumbnail/json';
                Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.rovive.pro/asset-thumbnail/url';
                Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.rovive.pro/asset/request-thumbnail-fix';
                Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.rovive.pro/avatar-thumbnail-3d/json';
                Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.rovive.pro/avatar-thumbnail/image';
                Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.rovive.pro/avatar-thumbnail/json';
                Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.rovive.pro/avatar-thumbnails';
                Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.rovive.pro/avatar/request-thumbnail-fix';
                Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.rovive.pro/bust-thumbnail/json';
                Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.rovive.pro/group-thumbnails';
                Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.rovive.pro/groups/getprimarygroupinfo.ashx';
                Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.rovive.pro/headshot-thumbnail/json';
                Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.rovive.pro/item-thumbnails';
                Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.rovive.pro/outfit-thumbnail/json';
                Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.rovive.pro/place-thumbnails';
                Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.rovive.pro/thumbnail/asset/';
                Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.rovive.pro/thumbnail/avatar-headshot';
                Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.rovive.pro/thumbnail/avatar-headshots';
                Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.rovive.pro/thumbnail/user-avatar';
                Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.rovive.pro/thumbnail/resolve-hash';
                Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.rovive.pro/thumbnail/place';
                Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.rovive.pro/thumbnail/get-asset-media';
                Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.rovive.pro/thumbnail/remove-asset-media';
                Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.rovive.pro/thumbnail/set-asset-media-sort-order';
                Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.rovive.pro/thumbnail/place-thumbnails';
                Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.rovive.pro/thumbnail/place-thumbnails-partial';
                Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.rovive.pro/thumbnail_holder/g';
                Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.rovive.pro/users/{id}/profile';
                Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.rovive.pro/service-workers/push-notifications';
                Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.rovive.pro/notification-stream/notification-stream-data';
                Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.rovive.pro/api/friends/acceptfriendrequest';
                Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.rovive.pro/api/friends/declinefriendrequest';
                Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
            </script>

            <script type="text/javascript">
                if (typeof(Roblox) === "undefined") {
                    Roblox = {};
                }
                Roblox.Endpoints = Roblox.Endpoints || {};
                Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
            </script>

            <!-- <link rel='stylesheet' class="dark-theme" href='/css/dark.css' /> -->
        </head>

        <body id="rbx-body" class="" data-performance-relative-value="0.000" data-internal-page-name="" data-send-event-percentage="0.00">

            <script>
                // Use matchMedia to check the user preference
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
                const userSystemTheme = prefersDark.matches ? "dark" : "light";

                let theme = "<%= theme %>";
                if (theme == "") {
                    theme = userSystemTheme;
                }

                if (theme === "dark") {
                    toggleDarkTheme(true);
                }

                // Listen for changes to the prefers-color-scheme media query
                prefersDark.addListener((mediaQuery) => toggleDarkTheme(mediaQuery.matches));

                // Add or remove the "dark" class based on if the media query matches
                function toggleDarkTheme(shouldAdd) {
                    if (shouldAdd) {
                        const heads = document.getElementsByTagName("head");
                        for (let i = 0; i < heads.length; i++) {
                            const head = heads[i];
                            const darkModeStyles = head.querySelector(".dark-theme");
                            if (darkModeStyles == null) {
                                const cssFile = document.createElement('link');
                                cssFile.rel = 'stylesheet';
                                cssFile.href = "/css/dark.css";
                                cssFile.classList.add("dark-theme");
                                head.appendChild(cssFile);
                            }
                        }
                    } else {
                        const darkTheme = document.getElementsByClassName("dark-theme");
                        for (let i = 0; i < darkTheme.length; i++) {
                            const element = darkTheme[i];
                            element.remove();
                        }
                    }
                }
            </script>
            <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.rovive\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm" data-as-http-regex="((blog|wiki|[^.]help|corp|polls|bloxcon|developer|devforum)\.roblox\.com|robloxlabs\.com)">
            </div>
            <div id="image-retry-data" data-image-retry-max-times="10" data-image-retry-timer="1500">
            </div>
            <div id="http-retry-data" data-http-retry-max-timeout="0" data-http-retry-base-timeout="0">
            </div>


            <div id="fb-root"></div>

            <div id="wrap" class="wrap no-gutter-ads logged-in" data-gutter-ads-enabled="false">
                <?php if (strpos($_SERVER["HTTP_USER_AGENT"], "ROBLOX Android App") == false) { ?>
                    <div id="header" class="navbar-fixed-top rbx-header" data-isfriendshiprealtimeupdateenabled="true" role="navigation">
                        <div class="container-fluid">
                            <div class="rbx-navbar-header">
                                <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">
                                    <span class="icon-nav-menu"></span>

                                </div>
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="https://www.rovive.pro/">
                                        <span class="icon-logo"></span>
                                        <span class="icon-logo-r"></span>
                                    </a>
                                </div>
                            </div>
                            <ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
                                <li>
                                    <a class="nav-menu-title" href="https://www.rovive.pro/games">Games</a>
                                </li>
                                <li>
                                    <a class="nav-menu-title" href="https://www.rovive.pro/catalog/">Catalog</a>
                                </li>
                                <li>
                                    <a class="nav-menu-title" href="https://www.rovive.pro/develop">Develop</a>
                                </li>
                                <li>
                                    <a class="buy-robux nav-menu-title" href="https://www.rovive.pro/upgrades/robux?ctx=nav">ROBUX</a>
                                </li>
                            </ul>
                            <!--rbx-navbar-->
                            <div id="navbar-universal-search" class="navbar-left rbx-navbar-search col-xs-5 col-sm-6 col-md-3" data-behavior="univeral-search" role="search">
                                <div class="input-group">

                                    <input id="navbar-search-input" class="form-control input-field" type="text" placeholder="Search" maxlength="120" />
                                    <div class="input-group-btn">
                                        <button id="navbar-search-btn" class="input-addon-btn" type="submit">
                                            <span class="icon-nav-search"></span>
                                        </button>
                                    </div>
                                </div>
                                <ul data-toggle="dropdown-menu" class="dropdown-menu" role="menu">
                                    <li class="rbx-navbar-search-option selected" data-searchurl="https://www.rovive.pro/search/users?keyword=">
                                        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span>
                                            in People</span>
                                    </li>
                                    <li class="rbx-navbar-search-option" data-searchurl="https://www.rovive.pro/games/?Keyword=">
                                        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span>
                                            in Games</span>
                                    </li>
                                    <li class="rbx-navbar-search-option" data-searchurl="https://www.rovive.pro/catalog/browse.aspx?CatalogContext=1&amp;Keyword=">
                                        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span>
                                            in Catalog</span>
                                    </li>
                                    <li class="rbx-navbar-search-option" data-searchurl="https://www.rovive.pro/groups/search.aspx?val=">
                                        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span>
                                            in Groups</span>
                                    </li>
                                    <li class="rbx-navbar-search-option" data-searchurl="https://www.rovive.pro/develop/library?CatalogContext=2&amp;Category=6&amp;Keyword=">
                                        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span>
                                            in Library</span>
                                    </li>
                                </ul>
                            </div>
                            <!--rbx-navbar-search-->

                            <div class="navbar-right rbx-navbar-right col-xs-4 col-sm-3">

                                <ul class="nav navbar-right rbx-navbar-icon-group">
                                    <?php if (isset($_SESSION["user"])) { ?>
                                        <li id="navbar-setting" class="navbar-icon-item">
                                            <a class="rbx-menu-item roblox-popover-close" data-toggle="popover" data-bind="popover-setting" data-viewport="#header" data-original-title="" title="">
                                                <span class="icon-nav-settings roblox-popover-close" id="nav-settings"></span>
                                                <span class="notification-red nav-setting-highlight hidden">0</span>
                                            </a>
                                            <div class="rbx-popover-content" data-toggle="popover-setting">
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a class="rbx-menu-item" href="https://www.rovive.pro/my/account">
                                                            <p>Settings</p>
                                                            <span class="notification-blue nav-setting-highlight hidden">0</span>
                                                        </a>
                                                    </li>
                                                    <?php if ($_SESSION["user"]["admin"] >= 1) { ?>
                                                        <li>
                                                            <a class="rbx-menu-item" href="https://www.rovive.pro/admi">
                                                                <p>Admin</p>
                                                            </a>
                                                        </li>
                                                    <?php } ?>

                                                    <li><a class="rbx-menu-item" href="https://www.rovive.pro/Help/Builderman.aspx" target="_blank">
                                                            <p>Help</p>
                                                        </a></li>
                                                    <li><a class="rbx-menu-item" data-behavior="logout" data-bind="/logout">
                                                            <p>Logout</p>
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li id="navbar-robux" class="navbar-icon-item">
                                            <a id="nav-robux-icon" class="rbx-menu-item" data-toggle="popover" data-bind="popover-robux" data-original-title="" title="">
                                                <span class="icon-nav-robux roblox-popover-close" id="nav-robux"></span>
                                                <span class="rbx-text-navbar-right" id="nav-robux-amount"><?= $_SESSION["user"]["currency"] ?></span>
                                            </a>
                                            <div class="rbx-popover-content" data-toggle="popover-robux">
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="https://www.rovive.pro/My/Money.aspx#/#Summary_tab" id="nav-robux-balance" class="rbx-menu-item"><?= $_SESSION["user"]["currency"] ?> ROBUX</a></li>
                                                    <li><a href="https://www.rovive.pro/upgrades/robux?ctx=navpopover" class="rbx-menu-item">Buy ROBUX</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } else { ?>
                                        <li class="login-action"><a id="head-login" href="/login" class="rbx-navbar-login nav-menu-title">Log In</a></li>
                                        <li class="login-action"><a class="rbx-navbar-signup nav-menu-title" href="/">Sign Up</a></li>
                                    <?php } ?>
                                    <li class="rbx-navbar-right-search" data-toggle="toggle-search">
                                        <a class="rbx-menu-icon rbx-menu-item">
                                            <span class="icon-nav-search-white"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- navbar right-->
                            <ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
                                <li>
                                    <a class="nav-menu-title" href="https://www.rovive.pro/games">Games</a>
                                </li>
                                <li>
                                    <a class="nav-menu-title" href="https://www.rovive.pro/catalog/">Catalog</a>
                                </li>
                                <li>
                                    <a class="nav-menu-title" href="https://www.rovive.pro/develop">Develop</a>
                                </li>
                                <li>
                                    <a class="buy-robux nav-menu-title" href="https://www.rovive.pro/upgrades/robux?ctx=nav">ROBUX</a>
                                </li>
                            </ul>
                            <!--rbx-navbar-->
                        </div>
                    </div>


                    <?php if (isset($_SESSION["user"])) { ?>
                        <!-- LEFT NAV MENU -->
                        <div id="navigation" class="rbx-left-col nav-show" data-behavior="left-col">
                            <ul>
                                <li class="text-lead">
                                    <a class="text-overflow" href="https://www.rovive.pro/users/<?= $_SESSION["user"]["id"] ?>/profile"><?= htmlspecialchars($_SESSION["user"]["username"]) ?></a>
                                </li>
                                <li class="rbx-divider"></li>
                            </ul>

                            <div class="rbx-scrollbar mCustomScrollbar _mCS_1 mCS_no_scrollbar" data-toggle="scrollbar" onselectstart="return false;">
                                <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 685px;" tabindex="0">
                                    <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                        <ul>
                                            <li><a href="https://www.rovive.pro/home" id="nav-home"><span class="icon-nav-home"></span><span>Home</span></a></li>
                                            <li><a href="https://www.rovive.pro/users/<?= $_SESSION["user"]["id"] ?>/profile" id="nav-profile"><span class="icon-nav-profile"></span><span>Profile</span></a></li>
                                            <li>
                                                <a href="/my/messages" id="nav-message" data-count="0">
                                                    <span class="icon-nav-message"></span><span>Messages</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.rovive.pro/users/<?= $_SESSION["user"]["id"] ?>/friends#!/friend-requests" id="nav-friends" data-count="999+">
                                                    <span class="icon-nav-friends"></span><span>Friends</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.rovive.pro/my/avatar" id="nav-character">
                                                    <span class="icon-nav-charactercustomizer"></span><span>Avatar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.rovive.pro/users/<?= $_SESSION["user"]["id"] ?>/inventory" id="nav-inventory">
                                                    <span class="icon-nav-inventory"></span><span>Inventory</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.rovive.pro/my/money.aspx#/#TradeItems_tab" id="nav-trade">
                                                    <span class="icon-nav-trade"></span><span>Trade</span>
                                            </li>
                                            <li>
                                                <a href="https://www.rovive.pro/my/groups.aspx" id="nav-group">
                                                    <span class="icon-nav-group"></span><span>Groups</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://forum.rovive.pro/forum/" id="nav-forum">
                                                    <span class="icon-nav-forum"></span><span>Forum</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://blog.rovive.pro" id="nav-blog">
                                                    <span class="icon-nav-blog"></span><span>Blog</span>
                                                </a>
                                            </li>
                                            <li class="rbx-upgrade-now">
                                                <a href="https://www.rovive.pro/premium/membership?ctx=leftnav" class="btn-secondary-md" id="upgrade-now-button">Upgrade Now</a>
                                            </li>
                                            <li class="font-bold small">
                                                Events
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 0px; max-height: 650px; top: 0px;" oncontextmenu="return false;">
                                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                        </div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        <?php } ?>




        <script type="text/javascript">
            var Roblox = Roblox || {};
            (function() {
                if (Roblox && Roblox.Performance) {
                    Roblox.Performance.setPerformanceMark("navigation_end");
                }
            })();
        </script>

        <div class="container-main">
            <noscript>
                <div>
                    <div class="alert-info" role="alert">
                        Please enable Javascript to use all the features on this site.
                    </div>
                </div>
            </noscript>
            <?php if ($maintenance) { ?>
                <div class="alert alert-info" role="alert">
                    Site is currently under maintenance.
                </div>
            <?php } ?>
            <?php if (SITE_CONFIG["site"]["isSitetest"]) { ?>
                <div class="alert alert-info" role="alert">
                    You are currently on the testing site and it may be unstable. Feel free to mess around and report bugs.
                </div>
            <?php } ?>
            <?php if (SITE_CONFIG["site"]["orangethingyenabled"]) { ?>
                <div class="alert alert-info" role="alert">
                    Welcome! We are still in beta stage. Probably We will have some bugs or vulnerabilities. If you find bugs or vulnerabilities please tell us.
                </div>
            <?php } ?>
        <?php
        return ob_get_clean();
    }
    # old text: You are currently on the testing site and it may be unstable. Feel free to mess around and report bugs.
    public static function buildFooter()
    {
        ob_start();
        ?>
        </div>

        <footer class="container-footer">
            <div class="footer">
                <ul class="row footer-links">
                    <li class="col-4 col-xs-1 footer-link">
                        <a href="/discord" class="text-footer-nav roblox-interstitial" target="_blank">
                            Discord
                        </a>
                    </li>
                    <li class="col-4 col-xs-1 footer-link">
                        <a href="http://help.rovive.pro/" class="text-footer-nav roblox-interstitial" target="_blank">
                            Help
                        </a>
                    </li>
                    <li class="col-4 col-xs-1 footer-link">
                        <a href="https://www.rovive.pro/Info/terms-of-service" class="text-footer-nav" target="_blank">
                            Terms
                        </a>
                    </li>
                    <li class="col-4 col-xs-1 footer-link">
                        <a href="https://www.rovive.pro/Info/Privacy.aspx" class="text-footer-nav privacy" target="_blank">
                            Privacy
                        </a>
                    </li>
                </ul>

                <p class="text-footer footer-note">
                    ©<?= date("Y") ?> Rovive
                </p>
            </div>
        </footer>

        </div>



        <script type="text/javascript">
            function urchinTracker() {}
        </script>


        <div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-game-launch-interface-enabled="True" data-is-protocol-handler-launch-enabled="True" data-is-user-logged-in="True" data-os-name="Windows" data-protocol-name-for-client="r2016-player" data-protocol-name-for-studio="r2016-studio" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true">
            <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
                <div id="Spinner" class="Spinner" style="padding:20px 0;">
                    <img data-delaysrc="/img/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
                </div>
                <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
                    <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block">
                        Starting Roblox...
                    </div>
                    <div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
                    <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
                </div>
                <div style="text-align:center;margin-top:1em">
                    <input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel" />
                </div>
            </div>
        </div>
        <div id="ProtocolHandlerStartingDialog" style="display:none;">
            <div class="modalPopup ph-modal-popup">
                <div class="ph-modal-header">

                </div>
                <div class="ph-logo-row">
                    <img data-delaysrc="/img/RoviveLetter.png" width="90" height="90" alt="R" />
                </div>
                <div class="ph-areyouinstalleddialog-content">
                    <p class="larger-font-size">
                        ROBLOX is now loading. Get ready to play!
                    </p>
                    <div class="ph-startingdialog-spinner-row">
                        <img data-delaysrc="/img/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
                    </div>
                </div>
            </div>
        </div>
        <div id="ProtocolHandlerAreYouInstalled" style="display:none;">
            <div class="modalPopup ph-modal-popup">
                <div class="ph-modal-header">
                    <span class="icon-close simplemodal-close"></span>
                </div>
                <div class="ph-logo-row">
                    <img data-delaysrc="/img/RoviveLetter.png" width="90" height="90" alt="R" />
                </div>
                <div class="ph-areyouinstalleddialog-content">
                    <p class="larger-font-size">
                        You're moments away from getting into the game!
                    </p>
                    <div>
                        <button type="button" class="btn btn-primary-md" id="ProtocolHandlerInstallButton">
                            Download and Install ROBLOX
                        </button>
                    </div>
                    <div class="small">
                        <a href="https://help.rovive.pro/hc/en-us/articles/204473560" class="text-name" target="_blank">Click here for help</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
            <p class="larger-font-size">
                <span class="icon-moreinfo"></span>

                Check <b>Remember my choice</b> and click
                <img data-delaysrc="/img/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />

                in the dialog box above to join games faster in the future!
            </p>
        </div>


        <div id="videoPrerollPanel" style="display:none">
            <div id="videoPrerollTitleDiv">
                Gameplay sponsored by:
            </div>
            <div id="content">
                <video id="contentElement" style="width:0; height:0;" />
            </div>
            <div id="videoPrerollMainDiv"></div>
            <div id="videoPrerollCompanionAd">
            </div>
            <div id="videoPrerollLoadingDiv">
                Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span><span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
                <div id="videoPrerollLoadingBar">
                    <div id="videoPrerollLoadingBarCompleted">
                    </div>
                </div>
            </div>
            <div id="videoPrerollJoinBC">
                <span>Get more with Builders Club!</span>
                <a href="https://www.rovive.pro/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                var videoPreRollDFP = Roblox.VideoPreRollDFP;
                if (videoPreRollDFP) {
                    var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                    videoPreRollDFP.showVideoPreRoll = false;
                    videoPreRollDFP.loadingBarMaxTime = 33000;
                    videoPreRollDFP.videoLoadingTimeout = 11000;
                    videoPreRollDFP.videoPlayingTimeout = 41000;
                    videoPreRollDFP.videoLogNote = "Guest";
                    videoPreRollDFP.logsEnabled = true;
                    videoPreRollDFP.excludedPlaceIds = "32373412";
                    videoPreRollDFP.adUnit = "/1015347/VideoPrerollUnder13";
                    videoPreRollDFP.adTime = 15;
                    videoPreRollDFP.isSwfPreloaderEnabled = false;
                    videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                    videoPreRollDFP.isAgeTargetingEnabled = true;
                    videoPreRollDFP.isAgeOrSegmentTargetingEnabled = true;
                    videoPreRollDFP.isCompanionAdRenderedByGoogleTag = true;
                    customTargeting.userAge = "Unknown";
                    customTargeting.userAgeOrSegment = "Unknown";
                    customTargeting.userGender = "Unknown";
                    customTargeting.gameGenres = "";
                    customTargeting.environment = "Production";
                    customTargeting.adTime = "15";
                    customTargeting.PLVU = false;
                    $(videoPreRollDFP.checkEligibility);
                }
            });
        </script>


        <div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
            <div class="simplemodal-close">
                <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
            </div>
            <div class="Title">
                Choose Your Avatar
            </div>
            <div style="min-height: 275px; background-color: white;">
                <div style="clear:both; height:25px;"></div>

                <div style="text-align: center;">
                    <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
                    <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;">
                    </div>
                </div>
                <div style="clear:both; height:25px;"></div>
                <div class="RevisedFooter">
                    <div style="width:200px;margin:10px auto 0 auto;">
                        <a href="https://www.rovive.pro">
                            <div class="RevisedCharacterSelectSignup"></div>
                        </a>
                        <a class="HaveAccount" href="https://www.rovive.pro/newlogin">I have an account</a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function checkRobloxInstall() {
                window.location = 'https://www.rovive.pro/install/unsupported.aspx?osx=10.5';
                return false;
            }
        </script>

        <div id="InstallationInstructions" class="" style="display:none;">
            <div class="ph-installinstructions">
                <div class="ph-modal-header">
                    <span class="icon-close simplemodal-close"></span>
                    <h3 class="title">Thanks for playing ROBLOX</h3>
                </div>
                <div class="modal-content-container">
                    <div class="ph-installinstructions-body ">


                        <div class="ph-install-step ph-installinstructions-step1-of4">
                            <h1>1</h1>
                            <p class="larger-font-size">Click <strong>RobloxPlayer.exe</strong> to run the ROBLOX installer,
                                which just downloaded via your web browser.</p>
                            <img width="230" height="180" data-delaysrc="/img/8b0052e4ff81d8e14f19faff2a22fcf7.png" />
                        </div>
                        <div class="ph-install-step ph-installinstructions-step2-of4">
                            <h1>2</h1>
                            <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin
                                the installation process.</p>
                            <img width="230" height="180" data-delaysrc="/img/4a3f96d30df0f7879abde4ed837446c6.png" />
                        </div>
                        <div class="ph-install-step ph-installinstructions-step3-of4">
                            <h1>3</h1>
                            <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.
                            </p>
                            <img width="230" height="180" data-delaysrc="/img/6e23e4971ee146e719fb1abcb1d67d59.png" />
                        </div>
                        <div class="ph-install-step ph-installinstructions-step4-of4">
                            <h1>4</h1>
                            <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the
                                action!</p>
                            <div class="VisitButton VisitButtonContinueGLI">
                                <a class="btn btn-primary-lg disabled">Play</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="xsmall">
                    The ROBLOX installer should download shortly. If it doesn’t, start the <a href="#" class="text-link" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">download now.</a>
                </div>
            </div>
        </div>
        <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>


        <div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
        <iframe id="downloadInstallerIFrame" name="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

        <script type='text/javascript' src='/js/fbdb5b64583278a8513645a997a89a3c.js'></script>

        <script type="text/javascript">
            Roblox.Client._skip = '/install/unsupported.aspx';
            Roblox.Client._CLSID = '';
            Roblox.Client._installHost = '';
            Roblox.Client.ImplementsProxy = false;
            Roblox.Client._silentModeEnabled = false;
            Roblox.Client._bringAppToFrontEnabled = false;
            Roblox.Client._currentPluginVersion = '';
            Roblox.Client._eventStreamLoggingEnabled = false;


            Roblox.Client._installSuccess = function() {
                if (GoogleAnalyticsEvents) {
                    GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                    GoogleAnalyticsEvents.FireEvent(['Plugin', 'Install Success']);
                    if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                        Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                    }
                }
            }


            if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
                window.location.hash = '';
                var continuation = '(' + $.cookie('chromeInstall') + ')';
                play_placeId = $.cookie('chromeInstallPlaceId');
                Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
                $.cookie('chromeInstallPlaceId', null);
                $.cookie('chromeInstallLaunchMode', null);
                $.cookie('chromeInstall', null);
                RobloxLaunch._GoogleAnalyticsCallback = function() {
                    var isInsideRobloxIDE = 'website';
                    if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                        isInsideRobloxIDE = 'Studio';
                    };
                    GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                    GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
                    EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin');
                    if (typeof Roblox.GamePlayEvents != 'undefined') {
                        Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                    }
                };
                Roblox.Client.ResumeTimer(eval(continuation));
            }
        </script>


        <div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
            <style>
                .genericmodal-close {
                    display: block !important;
                }
            </style>
            <a class="genericmodal-close ImageButton closeBtnCircle_20h" style=""></a>
            <div class="Title"></div>
            <div class="GenericModalBody">
                <div class="TopBody">
                    <div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click>
                        <img class="GenericModalImage" alt="generic image" />
                    </div>
                    <div class="Message"></div>
                </div>
                <div class="ConfirmationModalButtonContainer GenericModalButtonContainer">
                    <a href id="roblox-confirm-btn"><span></span></a>
                    <a href id="roblox-decline-btn"><span></span></a>
                </div>
                <div class="ConfirmationModalFooter">

                </div>
            </div>
            <script type="text/javascript">
                Roblox = Roblox || {};
                Roblox.Resources = Roblox.Resources || {};

                //<sl:translate>
                Roblox.Resources.GenericConfirmation = {
                    yes: "Yes",
                    No: "No",
                    Confirm: "Confirm",
                    Cancel: "Cancel"
                };
                //</sl:translate>
            </script>
        </div>

        <div id="modal-confirmation" class="modal-confirmation" data-modal-type="confirmation">
            <div id="modal-dialog" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                        </button>
                        <h5 class="modal-title"></h5>
                    </div>

                    <div class="modal-body">
                        <div class="modal-top-body">
                            <div class="modal-message"></div>
                            <div class="modal-image-container roblox-item-image" data-image-size="medium" data-no-overlays data-no-click>
                                <img class="modal-thumb" alt="generic image" />
                            </div>
                        </div>
                        <div class="modal-btns">
                            <a href id="confirm-btn"><span></span></a>
                            <a href id="decline-btn"><span></span></a>
                        </div>
                        <div class="loading modal-processing">
                            <img class="loading-default" src='/img/4bed93c91f909002b1f17f05c0ce13d1.gif' alt="Processing..." />
                        </div>
                    </div>
                    <div class="modal-footer text-footer">

                    </div>
                </div>
            </div>
            <script type="text/javascript">
                Roblox = Roblox || {};
                Roblox.Resources = Roblox.Resources || {};

                //<sl:translate>
                Roblox.Resources.Dialog = {
                    yes: "Yes",
                    No: "No",
                    Confirm: "Confirm",
                    Cancel: "Cancel"
                };
                //</sl:translate>
            </script>
        </div>




        <script type="text/javascript">
            var Roblox = Roblox || {};
            Roblox.jsConsoleEnabled = false;
        </script>


        <script type='text/javascript' src='/js/6df9bc0534efbd8f409e764c1c275374.js' defer></script>






        <script type='text/javascript'>
            Roblox.config = Roblox.config || {};
            Roblox.config.paths = Roblox.config.paths || {};

            Roblox.config.paths['Pages.Catalog'] = '/js/943dbead6327ef7e601925fc45ffbeb0.js';
            Roblox.config.paths['Pages.CatalogShared'] = '/js/496e8f05b3aabfcd72a147ddb49aaf1e.js';
            Roblox.config.paths['Widgets.AvatarImage'] = '/js/6bac93e9bb6716f32f09db749cec330b.js';
            Roblox.config.paths['Widgets.DropdownMenu'] = '/js/7b436bae917789c0b84f40fdebd25d97.js';
            Roblox.config.paths['Widgets.GroupImage'] = '/js/33d82b98045d49ec5a1f635d14cc7010.js';
            Roblox.config.paths['Widgets.HierarchicalDropdown'] =
                '/js/3368571372da9b2e1713bb54ca42a65a.js';
            Roblox.config.paths['Widgets.ItemImage'] = '/js/e79fc9c586a76e2eabcddc240298e52c.js';
            Roblox.config.paths['Widgets.PlaceImage'] = '/js/31df1ed92170ebf3231defcd9b841008.js';
            Roblox.config.paths['Widgets.SurveyModal'] = '/js/d6e979598c460090eafb6d38231159f6.js';
        </script>


        <script>
            $(function() {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>




        <script type="text/javascript">
            var Roblox = Roblox || {};
            Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

            Roblox.UpsellAdModal.Resources = {
                //<sl:translate>
                title: "Remove Ads Like This",
                body: "Builders Club members do not see external ads like these.",
                accept: "Upgrade Now",
                decline: "No, thanks"
                //</sl:translate>
            };
        </script>

        <script defer>
            Roblox.SearchBox = {};
            Roblox.SearchBox.Resources = {
                search: "Search",
                zeroResults: "No Search Results Found"
            };


            Roblox.GamesPageContainerBehavior = Roblox.GamesPageContainerBehavior || {};

            Roblox.GamesPageContainerBehavior.Resources = {
                pageTitle: "Games - Roblox"
            };
            var defaultGamesListsCsv = "1,8,11,16,3";
            Roblox.GamesPageContainerBehavior.FilterValueToGamesListsIdSuffixMapping = {
                "default": defaultGamesListsCsv.split(',')
            };
            Roblox.GamesPageContainerBehavior.IsUserLoggedIn = false;
            Roblox.GamesPageContainerBehavior.adRefreshRateMilliSeconds = 3000;
            Roblox.GamesPageContainerBehavior.MinimumNumberOfGamesForPersonalizedByLikedToAppear = 1;
            Roblox.GamesPageContainerBehavior.DeviceTypeId = 1;
            Roblox.GamesPageContainerBehavior.isCreateNewAd = true;
            Roblox.GamesPageContainerBehavior.setIntervalId = null;


            Roblox.GamesListBehavior = Roblox.GamesListBehavior || {};
            Roblox.GamesListBehavior.RefreshAdsInGamesPageEnabled = true;
            Roblox.GamesListBehavior.isUserEligibleForMultirowFirstSort = false;
        </script>


        <script type='text/javascript' src='/js/1c0f28e0c99de276b80e6d82fa3d455a.js' defer></script>
        </body>

        </html>
    <?php return ob_get_clean();
    }

    public static function buildAdminNavbar()
    {
        ob_start();
    ?>

        <nav class="rbx-header" aria-label="Admin navigation bar">
            <div class="container">
                <ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
                    <li class="nav-item">
                        <a class="nav-menu-title" href="/admi/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-menu-title roblox-popover-close" data-toggle="popover" data-bind="popover-moderation" data-original-title="" title="">
                            Moderation
                        </a>
                        <div class="rbx-popover-content" data-toggle="popover-moderation">
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="rbx-menu-item" href="/admi/moderation">Moderation</a></li>
                                <li><a class="rbx-menu-item" href="/admi/viewmoderation">View moderation</a></li>
                                <li><a class="rbx-menu-item" href="/admi/resetUsername">Username reset</a></li>
                                <li><a class="rbx-menu-item" href="/admi/logs">Admin Logs</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>

<?php
        return ob_get_clean();
    }
}
