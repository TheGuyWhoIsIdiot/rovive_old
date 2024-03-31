<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';


$legendShown = isset($_GET['LegendExpanded']) ? intval($_GET['LegendExpanded']) : false;

$category = isset($_GET['Category']) ? intval($_GET['Category']) : 1;

$catalogHtml = "";
?>



<link rel='stylesheet' href='/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css' />

<link rel='stylesheet' href='/css/page___e002bb6d85eefef3195809ca218cdd34_m.css' />

<style type="text/css">
    #Body {
        padding: 5px;
    }
</style>

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
<script type='text/javascript' src='/js/MicrosoftAjax.js'></script>
<script type='text/javascript'>
    window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")
</script>



<script type='text/javascript' src='/js/54b73269bcd426ec956755cb8cac7033.js'></script>

<script type="text/javascript">
    if (Roblox && Roblox.EventStream) {
        Roblox.EventStream.Init("//ecsv2.rovive.pro/www/e.png",
            "//ecsv2.rovive.pro/www/e.png",
            "//ecsv2.rovive.pro/pe?t=studio",
            "//ecsv2.rovive.pro/pe?t=diagnostic");
    }
</script>



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2, 8, 20, 60]);
    }
</script>
<script type='text/javascript' src='/js/eb3e7cf793ba05d4bd3907cfedd575b3.js'></script>

<script type='text/javascript'>
    Roblox.config.externalResources = [];
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

<!-- <script type='text/javascript' src='/js/3c677025192d35279b84591a1abe925b.js'></script> -->


<script type="text/javascript">
    $(function() {
        Roblox.JSErrorTracker.initialize({
            'suppressConsoleError': true
        });
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

<script type="text/javascript">
    Roblox.FixedUI.gutterAdsEnabled = false;
</script>


<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
</script>

<script type="text/javascript">
    if (typeof(Roblox) === "undefined") {
        Roblox = {};
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
    Roblox.Endpoints.Urls['/my/character.aspx'] = 'https://www.rovive.pro/my/character.aspx';
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
    Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] =
        'https://assetgame.rovive.pro/asset-hash-thumbnail/image';
    Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.rovive.pro/asset-hash-thumbnail/json';
    Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.rovive.pro/asset-thumbnail-3d/json';
    Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.rovive.pro/asset-thumbnail/image';
    Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.rovive.pro/asset-thumbnail/json';
    Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.rovive.pro/asset-thumbnail/url';
    Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] =
        'https://assetgame.rovive.pro/asset/request-thumbnail-fix';
    Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.rovive.pro/avatar-thumbnail-3d/json';
    Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.rovive.pro/avatar-thumbnail/image';
    Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.rovive.pro/avatar-thumbnail/json';
    Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.rovive.pro/avatar-thumbnails';
    Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.rovive.pro/avatar/request-thumbnail-fix';
    Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.rovive.pro/bust-thumbnail/json';
    Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.rovive.pro/group-thumbnails';
    Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] =
        'https://www.rovive.pro/groups/getprimarygroupinfo.ashx';
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
    Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] =
        'https://www.rovive.pro/thumbnail/set-asset-media-sort-order';
    Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.rovive.pro/thumbnail/place-thumbnails';
    Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] =
        'https://www.rovive.pro/thumbnail/place-thumbnails-partial';
    Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.rovive.pro/thumbnail_holder/g';
    Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.rovive.pro/users/{id}/profile';
    Roblox.Endpoints.Urls['/service-workers/push-notifications'] =
        'https://www.rovive.pro/service-workers/push-notifications';
    Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] =
        'https://www.rovive.pro/notification-stream/notification-stream-data';
    Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] =
        'https://www.rovive.pro/api/friends/acceptfriendrequest';
    Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] =
        'https://www.rovive.pro/api/friends/declinefriendrequest';
    Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

<script type="text/javascript">
    if (typeof(Roblox) === "undefined") {
        Roblox = {};
    }
    Roblox.Endpoints = Roblox.Endpoints || {};
    Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>

<div id="catalog" data-empty-search-enabled="true">
    <div class="header" style="height:60px;">
        <div style="float:left;">
            <h1><a href="https://www.rovive.pro/catalog" id="CatalogLink">Catalog</a>
            </h1>
        </div>
        <div class="CatalogSearchBar">
            <input id="keywordTextbox" name="name" type="text" class="translate text-box text-box-small" />
            <div style="height:23px;border:1px solid #a7a7a7;padding:2px 2px 0px 2px;margin-right:6px;float:left;position:relative">
                <!--[if IE7]>
<div style="height:19px;width:131px;position:absolute;top:2px;left:2px;border:1px solid white"></div>
<div style="height:19px;width:15px;position:absolute;top:2px;right:2px;border:1px solid #aaa"></div>
<![endif]-->
                <select id="categoriesForKeyword" style="">
                    <option value="1" <?php if ($category == 1) { ?>selected=selected<?php } ?>>All Categories</option>
                    <option value="4" <?php if ($category == 4) { ?>selected=selected<?php } ?>>Body Parts</option>
                    <option value="3" <?php if ($category == 3) { ?>selected=selected<?php } ?>>Clothing</option>
                    <option value="2" <?php if ($category == 2) { ?>selected=selected<?php } ?>>Collectibles</option>
                    <option value="0" <?php if ($category == 0) { ?>selected=selected<?php } ?>>Featured</option>
                    <option value="5" <?php if ($category == 5) { ?>selected=selected<?php } ?>>Gear</option>
                    <option value="11" <?php if ($category == 11) { ?>selected=selected<?php } ?>>Accessories</option>
                </select>
            </div>
            <a id="submitSearchButton" href="#" class="btn-control btn-control-large top-level">Search</a>
        </div>
    </div>


    <div class="left-nav-menu divider-right">



        <div class="browseDropdownHeader"></div>

        <div id="dropdown" class="splashdropdownsplashdropdown roblox-hierarchicaldropdown">
            <ul id="dropdownUl" class="clearfix">

                <li class="subcategories" data-delay="never">
                    <a href="#category=featured" class="assetTypeFilter" data-category="0">Featured</a>
                    <ul class="slideOut" style="top:-1px;">
                        <li class="slideHeader"><span>Featured Types</span></li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="0" data-category="0">All Featured Items</a>
                        </li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="19" data-category="0">Featured
                                Accessories</a></li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="10" data-category="0">Featured Faces</a>
                        </li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="5" data-category="0">Featured Gear</a></li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="11" data-category="0">Featured Packages</a>
                        </li>
                    </ul>
                </li>

                <li class="subcategories">
                    <a href="#category=collectibles" class="assetTypeFilter collectiblesLink" data-category="2">Collectibles</a>
                    <ul class="slideOut" style="top:-32px;">
                        <li class="slideHeader"><span>Collectible Types</span></li>
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="2" data-category="2">All Collectibles</a>
                        </li>
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="19" data-category="2">Collectible
                                Accessories</a></li>
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="10" data-category="2">Collectible Faces</a>
                        </li>
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="5" data-category="2">Collectible Gear</a>
                        </li>
                    </ul>
                </li>
                <li class="slideHeader DropdownDivider divider-bottom" data-delay="ignore"></li>

                <li data-delay="always">
                    <a href="#category=all" class="assetTypeFilter" data-category="1">All Categories</a>
                </li>

                <li class="subcategories">
                    <a href="#category=clothing" class="assetTypeFilter" data-category="3">Clothing</a>
                    <ul class="slideOut" style="top:-97px;">
                        <li class="slideHeader"><span>Clothing Types</span></li>
                        <li><a href="#" class="assetTypeFilter" data-types="3" data-category="3">All Clothing</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="9" data-category="3">Hats</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="12" data-category="3">Shirts</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="13" data-category="3">T-Shirts</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="14" data-category="3">Pants</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="11" data-category="3">Packages</a></li>
                    </ul>
                </li>

                <li class="subcategories">
                    <a href="#category=bodyparts" class="assetTypeFilter" data-category="4">Body Parts</a>
                    <ul class="slideOut" style="top:-128px;">
                        <li class="slideHeader"><span>Body Part Types</span></li>
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="4" data-category="4">All Body Parts</a></li>
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="15" data-category="4">Heads</a></li>
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="10" data-category="4">Faces</a></li>
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="11" data-category="4">Packages</a></li>
                    </ul>
                </li>

                <li class="subcategories">
                    <a href="#category=gear" class="assetTypeFilter" data-category="5">Gear</a>
                    <ul class="slideOut" style="top:-159px;" style="border-right:0px;">
                        <div>
                            <li class="slideHeader"><span>Gear Types</span></li>
                            <li><a href="#geartype=All Gear" class="gearFilter" data-category="5" data-types="All">All Gear</a></li>
                            <li><a href="#geartype=Building" class="gearFilter" data-category="5" data-types="8">Building</a></li>
                            <li><a href="#geartype=Explosive" class="gearFilter" data-category="5" data-types="3">Explosive</a></li>
                            <li><a href="#geartype=Melee" class="gearFilter" data-category="5" data-types="1">Melee</a></li>
                            <li><a href="#geartype=Musical" class="gearFilter" data-category="5" data-types="6">Musical</a></li>
                            <li><a href="#geartype=Navigation" class="gearFilter" data-category="5" data-types="5">Navigation</a></li>
                            <li><a href="#geartype=Power Up" class="gearFilter" data-category="5" data-types="4">Power Up</a></li>
                            <li><a href="#geartype=Ranged" class="gearFilter" data-category="5" data-types="2">Ranged</a></li>
                            <li><a href="#geartype=Social" class="gearFilter" data-category="5" data-types="7">Social</a></li>
                            <li><a href="#geartype=Transport" class="gearFilter" data-category="5" data-types="9">Transport</a></li>
                        </div>

                    </ul>
                </li>

                <li class="subcategories">
                    <a href="#category=accessories" class="assetTypeFilter" data-category="11">Accessories</a>
                    <ul class="slideOut" style="top:-190px;">
                        <li class="slideHeader"><span>Accessory Types</span></li>
                        <li><a href="#" class="assetTypeFilter" data-types="19" data-category="11">All Accessories</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="9" data-category="11">Hats</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="20" data-category="11">Hair</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="21" data-category="11">Face</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="22" data-category="11">Neck</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="23" data-category="11">Shoulder</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="24" data-category="11">Front</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="25" data-category="11">Back</a></li>
                        <li><a href="#" class="assetTypeFilter" data-types="26" data-category="11">Waist</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <div id="legend" class="">
            <div class="header <% if (legendShown) { %>expanded<% } %>" id="legendheader">
                <h3>Legend</h3>
            </div>
            <div id="legendcontent" style="overflow: hidden; <% if (!legendShown) { %>display:none;<% } %>">
                <img src="https://images.rovive.pro/4fc3a98692c7ea4d17207f1630885f68.png" style="margin-left: -13px" />
                <div class="legendText"><b>Builders Club Only</b><br />
                    Only purchasable by Builders Club members.</div>

                <img src="https://images.rovive.pro/793dc1fd7562307165231ca2b960b19a.png" style="margin-left: -13px" />
                <div class="legendText"><b>Limited Items</b><br />
                    Owners of these discontinued items can re-sell them to other users
                    at any price.</div>

                <img src="https://images.rovive.pro/d649b9c54a08dcfa76131d123e7d8acc.png" style="margin-left: -13px" />
                <div class="legendText"><b>Limited Unique Items</b><br />
                    A limited supply originally sold by ROBLOX. Each unit is labeled
                    with a serial number. Once sold out, owners can re-sell them to
                    other users.
                </div>
            </div>
        </div>
    </div>
    <div class="right-content divider-left">
        <a href="https://www.rovive.pro/upgrades/robux?ctx=catalog" class="btn-medium btn-primary">Buy ROBUX</a>

        <h2>All Items on ROBLOX</h2>
        <div style="clear:both;"></div>
    </div>
    <%- catalogHtml %>
    <div style="clear:both" style="padding-top:20px"></div>
</div>

<script>
    $('a').click(function(e) {
        e.preventDefault();
        window.top.location.href = $(this).attr('href');
    });
</script>

<script type="text/javascript">
    $(function() {
        Roblox.require(['Pages.Catalog', 'Pages.CatalogShared',
            'Widgets.HierarchicalDropdown'
        ], function(catalog) {
            var pagestate = {
                "Category": 1,
                "CurrencyType": 0,
                "SortType": 0,
                "SortAggregation": 3,
                "SortCurrency": 0,
                "AssetTypes": null,
                "Gears": null,
                "Genres": null,
                "Keyword": null,
                "PageNumber": 1,
                "Creator": null,
                "PxMin": 0,
                "PxMax": 0
            };
            catalog.init(pagestate, 1);
            Roblox.Widgets.HierarchicalDropdown.init();
            if (Roblox.CatalogValues.ContainerID) {
                $('#' + Roblox.CatalogValues.ContainerID).on(Roblox
                    .CatalogShared.CatalogLoadedViaAjaxEventName,
                    null, null, Roblox.CatalogShared
                    .handleCatalogLoadedViaAjaxEvent);
            }
        });

        Roblox.CatalogValues = Roblox.CatalogValues || {};
        Roblox.CatalogValues.CatalogContext = 1;
    });
</script>
<!--[if IE]>
<script type="text/javascript">
$(function () {
$('.BigInner').live('mouseenter', function () {
$(this).parents('.BigView').css('z-index', '6');
$('.SmallView').css('z-index', '1');
});
$('.BigInner').live('mouseleave', function () {
$(this).parents('.BigView').css('z-index', '1');
$('.SmallView').css('z-index', '6');
});
$('.SmallInner').live('mouseenter', function () {
$('.SmallView').css('z-index', '1');
$(this).parents('.SmallCatalogItemView').css('z-index', '6');
});
$('.SmallInner').live('mouseleave', function () {
$('.SmallView').css('z-index', '1');
$(this).parents('.SmallCatalogItemView').css('z-index', '1');
});
});
</script>
<![endif]-->
<script type="text/javascript">
    $(function() {
        Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
        Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;

        Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
        Roblox.CatalogValues.ContainerID = "catalog";

        Roblox.require(['Pages.CatalogShared'], function() {
            History.Adapter.bind(window, "statechange", function() {
                Roblox.CatalogShared.handleURLChange(History
                    .getState().data);
            });
        });
        History.replaceState({
            clickTargetID: "catalog",
            url: window.location.href
        }, document.title, window.location.href);
    });
</script>

<div style="clear:both"></div>