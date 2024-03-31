<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("Location: /");
}

$xcsrftoken = isset($_COOKIE["_ROBLOSECURITY"]) ? $_COOKIE["_ROBLOSECURITY"] : "";

$tab = isset($_GET["Page"]) ? $_GET["Page"] : "universes";


$assetTypeId = 0;

$gameid = 0;


$publicPlaces = "";
$gamepasses = "";
$badges = "";
$decals = "";
$meshes = "";
$shirts = "";
$tshirts = "";
$pants = "";
$accessories = "";
$faces = "";
$userads = "";
$models = "";

$games = array();
if ($tab == "universes") {
    $games = Game::getGamesByUserId($_SESSION["user"]["id"]);
}

$audios = array();
if ($tab == "audios") {
     $audios = Asset::getAssetsByCreator($_SESSION["user"]["id"], "Audio");
}
?>

<?php echo PageBuilder::buildHeader(); ?>

<link rel='stylesheet' href='/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css' />

<link rel='stylesheet' href='/css/page___18b9b017e0adf1f1cd825ac9d5e6da77_m.css' />

<script type='text/javascript' src='/js/e7fb88614e7198627d26045fbbe63a8d.js'></script>

<script type='text/javascript' src='/js/54b73269bcd426ec956755cb8cac7033.js'></script>

<script type='text/javascript' src='/js/d849afd828ec9246ad457b640dbb54b3.js.gzip'></script>
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

<script type='text/javascript' src='/js/3c677025192d35279b84591a1abe925b.js'></script>
<script type='text/javascript' src='/js/9964a42acdd8018a88782b0a21849eff1c04082e598c722c2cc27256864047ec.js'></script>

<div id="BodyWrapper" class="">
    <div id="RepositionBody">
        <div id="Body" class="body-width">
            <div id="TosAgreementInfo" data-terms-check-needed="True">
            </div>

            <script src="https://roblox-api.arkoselabs.com/fc/api/" async=""></script>
            <script type="text/javascript">
                var Roblox = Roblox || {};
                $(function() {
                    var funCaptcha = Roblox.FunCaptcha;
                    if (funCaptcha) {
                        var captchaTypes = [{
                            "Type": "ClothingUpload",
                            "PublicKey": "63E4117F-E727-42B4-6DAA-C8448E9B137F",
                            "ApiUrl": "https://captcha.rovive.pro/v1/funcaptcha/user"
                        }];
                        funCaptcha.addCaptchaTypes(captchaTypes, true);
                        funCaptcha.setMaxRetriesOnTokenValidationFailure(0);
                        funCaptcha.setPerAppTypeLoggingEnabled(false);
                        funCaptcha.setRetryIntervalRange(500, 1500);
                    }
                });

                // Necessary because of how FunCaptcha js executes callback
                // i.e. window["{function name}"]
                function reportFunCaptchaLoaded() {
                    if (Roblox.BundleDetector) {
                        Roblox.BundleDetector.reportResourceLoaded("funcaptcha");
                    }
                }
            </script>






            <input name="__RequestVerificationToken" type="hidden" value="<?= $xcsrftoken ?>">
            <div id="DevelopTabs" class="tab-container">
                <div id="MyCreationsTabLink" class="tab-active" data-url="/develop">
                    My Creations
                </div>
                <!-- <div id="GroupCreationsTabLink" class="" data-url="/develop/groups"
                                        data-default-get-url="/build/buildview">
                                        Group Creations
                                    </div> -->
                <div id="LibraryTabLink" data-url="/develop/library" data-library-get-url="/catalog/contents?CatalogContext=DevelopOnly&amp;Category=Models" class="">
                    Library
                </div>
                <div id="DevExTabLink" data-url="/develop/devex" class="">
                    Developer Exchange
                </div>

            </div>
            <div>
                <div id="MyCreationsTab" class="tab-active">




                    <div class="BuildPageContent" data-groupid="">


                        <input id="assetTypeId" name="assetTypeId" type="hidden" value="<?= $assetTypeId ?>">

                        <table id="build-page" data-asset-type-id="<?= $assetTypeId ?>" data-edit-opens-studio="True">
                            <tbody>
                                <tr>
                                    <td class="menu-area divider-right">


                                        <a href="https://www.rovive.pro/develop?Page=universes" class="tab-item <?php if ($tab == "universes" || $tab == "" || $tab == null) { ?>tab-item-selected<?php } ?>" data-text="Games">Games</a>
                                        <a class="tab-item tab-item-disabled">Places</a>
                                        <a href="https://www.rovive.pro/develop?Page=models" class="tab-item <?= $tab == "models" ? "tab-item-selected" : "" ?>">Models</a>
                                        <a href="https://www.rovive.pro/develop?Page=decals" class="tab-item <?php if ($tab == "decals") { ?>tab-item-selected<?php } ?>">Decals</a>
                                        <a href="https://www.rovive.pro/develop?Page=badges" class="tab-item <?php if ($tab == "badges") { ?>tab-item-selected<?php } ?>">Badges</a>
                                        <a href="https://www.rovive.pro/develop?Page=game-passes" class="tab-item <?php if ($tab == "game-passes") { ?>tab-item-selected<?php } ?>">Passes</a>
                                        <a href="https://www.rovive.pro/develop?Page=audios" class="tab-item <?php if ($tab == "audios") { ?>tab-item-selected<?php } ?>">Audio</a>
                                        <a class="tab-item tab-item-disabled">Animations</a>
                                        <a href="https://www.rovive.pro/develop?Page=meshes" class="tab-item <?php if ($tab == "meshes") { ?>tab-item-selected<?php } ?>">Meshes</a>
                                        <a href="https://www.rovive.pro/develop?Page=userads" class="tab-item <?php if ($tab == "userads") { ?>tab-item-selected<?php } ?>">User Ads</a>
                                        <a class="tab-item tab-item-disabled">Sponsored Games</a>
                                        <a href="https://www.rovive.pro/develop?Page=shirts" class="tab-item <?php if ($tab == "shirts") { ?>tab-item-selected<?php } ?>">Shirts</a>
                                        <a href="https://www.rovive.pro/develop?Page=tshirts" class="tab-item <?php if ($tab == "tshirts") { ?>tab-item-selected<?php } ?>">T-Shirts</a>
                                        <a href="https://www.rovive.pro/develop?Page=pants" class="tab-item <?php if ($tab == "pants") { ?>tab-item-selected<?php } ?>">Pants</a>
                                        <?php if ($_SESSION["user"]["admin"] > 0) { ?>
                                            <a href="https://www.rovive.pro/develop?Page=accessories" class="tab-item <?php if ($tab == "accessories") { ?>tab-item-selected<?php } ?>">Accessories</a>
                                        <?php } ?>
                                        <a href="https://www.rovive.pro/develop?Page=faces" class="tab-item <?php if ($tab == "faces") { ?>tab-item-selected<?php } ?>">Faces</a>
                                        <a class="tab-item tab-item-disabled">Plugins</a>

                                        <!-- <a href="https://www.rovive.pro/develop?View=9"
                                                                class="tab-item ">Places</a>
                                                            <a href="https://www.rovive.pro/develop?View=10"
                                                                class="tab-item ">Models</a>
                                                            <a href="https://www.rovive.pro/develop?View=13"
                                                                class="tab-item ">Decals</a>
                                                            <a href="https://www.rovive.pro/develop?View=21"
                                                                class="tab-item ">Badges</a>
                                                            <a href="https://www.rovive.pro/develop?View=3"
                                                                class="tab-item ">Audio</a>
                                                            <a href="https://www.rovive.pro/develop?View=24"
                                                                class="tab-item ">Animations</a>
                                                            <a href="https://www.rovive.pro/develop?View=40"
                                                                class="tab-item ">Meshes</a>
                                                            <a href="https://www.rovive.pro/develop?Page=ads"
                                                                class="tab-item ">User Ads</a>
                                                            <a href="https://www.rovive.pro/sponsorships/list"
                                                                class="tab-item ">Sponsored Games</a>
                                                            <a href="https://www.rovive.pro/develop?View=11"
                                                                class="tab-item ">Shirts</a>
                                                            <a href="https://www.rovive.pro/develop?View=2"
                                                                class="tab-item ">T-Shirts</a>
                                                            <a href="https://www.rovive.pro/develop?View=12"
                                                                class="tab-item ">Pants</a>
                                                            <a href="https://www.rovive.pro/develop?View=38"
                                                                class="tab-item ">Plugins</a> -->
                                    </td>

                                    <?php if ($tab == "universes" || $tab == "" || $tab == null) { ?>
                                        <!-- The Modal -->
                                        <div id="CreateNewGameModal" class="customModal">

                                            <!-- Modal content -->
                                            <div class="customModal-content">
                                                <span class="closeCustomModal">&times;</span>
                                                <div class="alert alert-success" style="display: none;" id="updateSuccessMessage"></div>
                                                <div class="alert alert-warning" style="display: none;" id="updateErrorMessage"></div>
                                                <style>
                                                    .customModal .alert {
                                                        margin-top: 20px;
                                                    }
                                                </style>
                                                <h4>Create New Game</h4>

                                                <form class="createNewGameModal" method="POST" action="/api/games/create">
                                                    <div class="form-group">
                                                        <label for="gameTitle">Title</label>
                                                        <input type="text" class="form-control" name="gameTitle" id="gameTitle" placeholder="Title...">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gameDescription">Description</label>
                                                        <textarea style="resize: vertical !important;" class="form-control" name="gameDescription" id="gameDescription" placeholder="Description..." rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gameFileSelector">File</label>
                                                        <input type="file" class="form-control" name="gameFile" id="gameFileSelector" accept=".rbxl,.rbxlx">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn-secondary-md" id="CreateNewPlaceModalButton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="goog-te-spinner spinner" style="display: none;" width="3%" height="auto" viewBox="0 0 66 66">
                                                                <circle class="goog-te-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                                                            </svg>
                                                            Create new game
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>

                                        <script defer>
                                            $(".customModal").appendTo("body"); // set their parent to the body

                                            $(".customModal").hide();



                                            $(".closeCustomModal").click(function() {
                                                $(".customModal").hide();
                                            });


                                            $(".createNewGameModal").submit(function(e) {
                                                e.preventDefault();

                                                $("#CreateNewPlaceModalOpener").attr("disabled", "disabled");
                                                $("#CreateNewPlaceModalButton").attr("disabled", "disabled");
                                                $("#CreateNewPlaceModalButton .spinner").show();

                                                let formdata = new FormData();
                                                formdata.append("title", document.getElementById("gameTitle").value);
                                                formdata.append("description", document.getElementById("gameDescription").value);
                                                formdata.append("gameFile", document.getElementById("gameFileSelector").files[0]);

                                                $.ajax({
                                                    url: "/api/games/create",
                                                    type: "POST",
                                                    data: formdata,
                                                    processData: false,
                                                    contentType: false,
                                                    success: function(data) {
                                                        window.location.reload();
                                                    },
                                                    error: function(data) {
                                                        $("#CreateNewPlaceModalOpener").removeAttr("disabled");
                                                        $("#CreateNewPlaceModalButton").removeAttr("disabled");
                                                        $("#CreateNewPlaceModalButton .spinner").hide();

                                                        $("#updateErrorMessage").fadeIn("fast");
                                                        $("#updateErrorMessage").text(data.responseText);
                                                        setTimeout(function() {
                                                            $("#updateErrorMessage").fadeOut("fast");
                                                        }, 5000);
                                                    }
                                                });
                                            });
                                        </script>

                                        <td class="content-area ">
                                            <p>Don't have Rovive Studio yet? <a href="/setup/download">Download it!</a></p>
                                            <button id="CreateNewPlaceModalOpener" role="button" class="btn-medium btn-primary" onclick="$('#CreateNewGameModal').show()">Create New Game</button>
                                            <table class="section-header">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-title">
                                                            <div>

                                                                <h2 class="header-text">Games</h2>
                                                                <span class="aside-text"></span>
                                                                <label class="checkbox-label active-only-checkbox"><input type="checkbox">Show Public
                                                                    Only</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="items-container ">
                                                <?php foreach ($games as $game) {
                                                    $id = $game["id"];
                                                    $name = $game["title"];

                                                    $filepath = $game["filepath"];
                                                    $icon = $game["icon"] != "" ? $game["icon"] : "/img/DefaultPlaceIcon.jpg";
                                                ?>
                                                    <table class="item-table" data-item-id="<?= $id ?>" data-rootplace-id="<?= $id ?>" data-configure-url="https://www.rovive.pro/universes/configure?id=<?= $id ?>" data-configure-localization-url="https://www.rovive.pro/localization/games/<?= $id ?>/configure" data-create-badge-url="https://www.rovive.pro/develop?selectedPlaceId=<?= $id ?>&amp;View=21" data-create-gamepass-url="https://www.rovive.pro/develop?selectedPlaceId=<?= $id ?>&amp;View=34" data-developerstats-url="https://create.rovive.pro/creations/experiences/<?= $id ?>/stats" data-advertise-url="https://www.rovive.pro/user-ads/create?targetId=<?= $id ?>&amp;targetType=Asset" data-activate-universe-url="https://www.rovive.pro/v1/universes/<?= $id ?>/activate" data-deactivate-universe-url="https://www.rovive.pro/v1/universes/<?= $id ?>/deactivate" data-type="universes">
                                                        <tbody>
                                                            <tr>
                                                                <td class="image-col universe-image-col" style="text-align: center">
                                                                    <a href="https://www.rovive.pro/games/<?= $id ?>/<?= htmlspecialchars(str_replace(" ", "-", $name)) ?>" class="game-image">
                                                                        <img src="<?= $icon ?>" alt="<?= htmlspecialchars($name) ?>">
                                                                    </a>
                                                                </td>
                                                                <td class="universe-name-col">
                                                                    <a class="title" href="https://www.rovive.pro/games/<?= $id ?>/<?= htmlspecialchars(str_replace(" ", "-", $name)) ?>"><?= htmlspecialchars($name); ?></a>
                                                                    <table class="details-table">
                                                                        <tbody>
                                                                            <tr>
                                                                            </tr>
                                                                            <tr class="activate-cell">
                                                                                <td class="ad-activate-cell"><a class="place-<?= $game["status"] == "public" ? "active" : "inactive" ?>" onclick="location.replace('https://www.rovive.pro/develop/?Page=universes&remove=<?= $id ?>');">
                                                                                        <?= $game["status"] == "public" ? "Activate" : "Deactivate" ?>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td class="edit-col">
                                                                    <a class="roblox-edit-button btn-control btn-control-large" href="javascript:;">Edit</a>
                                                                </td>
                                                                <td class="menu-col">
                                                                    <a class="roblox-config-button btn-control btn-control-large" href="/develop/configure?id=<?= $id ?>">Configure</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="separator"></div>
                                                <?php
                                                } ?>

                                                <div id="build-dropdown-menu" style="display: none;">
                                                    <a href="#" data-href-reference="configure-url">Configure
                                                        Game</a>
                                                    <a href="#" data-require-root-place="true" data-configure-place-template="https://www.rovive.pro/places/0/update">Configure
                                                        Start Place</a>
                                                    <a href="#" data-href-reference="configure-localization-url" id="configure-localization-link">Configure
                                                        Localization</a>
                                                    <a href="#" class="divider-top" data-href-reference="create-badge-url" data-require-root-place="true">Create Badge</a>
                                                    <a href="#" data-href-reference="create-gamepass-url" data-require-root-place="true">Create Pass</a>
                                                    <a href="#" data-href-reference="developerstats-url" data-require-root-place="true">Developer
                                                        Stats</a>
                                                    <a href="#" data-href-reference="advertise-url" class="divider-top">Advertise</a>
                                                    <a class="shutdown-all-servers-button divider-top" href="#" data-require-root-place="true">Shut
                                                        Down All Servers</a>
                                                </div>


                                                <div class="GenericModal modalPopup unifiedModal smallModal" style="display: none;">
                                                    <div class="Title"></div>
                                                    <div class="GenericModalBody">
                                                        <div>
                                                            <div class="ImageContainer">
                                                                <img class="GenericModalImage" alt="generic image">
                                                            </div>
                                                            <div class="Message"></div>
                                                        </div>
                                                        <div class="GenericModalButtonContainer">
                                                            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    Roblox = Roblox || {};
                                                    Roblox.BuildPage = Roblox.BuildPage || {};
                                                    Roblox.BuildPage.AlertURL =
                                                        "https://images.rovive.pro/43ac54175f3f3cd403536fedd9170c10.png";
                                                </script>

                                            </div>
                                        </td>
                                </tr>
                            <?php } ?>
                            <?php if ($tab == "game-passes") { ?>
                                <td class="content-area ">
                                    <h2>Create a Pass</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=34&amp;GroupId=&amp;targetPlaceId=<?php if ($gameid) { ?><?= $gameid ?><?php } ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Passes</h2>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="creation-context-filters-and-sorts">
                                                        <div class="option">
                                                            <label class="sort-label">Select from
                                                                Public Games:</label>
                                                            <select class="universe-selection-drop-down" size="1">
                                                                <?= $publicPlaces ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $gamepasses ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "badges") { ?>
                                <td class="content-area ">
                                    <h2>Create a Badge</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=21&amp;GroupId=&amp;targetPlaceId=<?php if ($gameid) { ?><?= $gameid ?><?php } ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Badges</h2>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="creation-context-filters-and-sorts">
                                                        <div class="option">
                                                            <label class="sort-label">Select from
                                                                Public Games:</label>
                                                            <select class="universe-selection-drop-down" size="1">
                                                                <?= $publicPlaces ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $badges ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "decals") { ?>
                                <td class="content-area ">
                                    <h2>Create a Decal</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=13&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Decals</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $decals ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "audios") { ?>
                                <td class="content-area ">
                                    <h2>Create a Audio</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=3&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Audios</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?php foreach ($audios as $audio) {
                                            $id = $audio["id"];
                                            $name = $audio["name"];

                                            $filepath = $audio["filepath"];
                                            $icon = "/img/eadc8982548a4aa4c158ba1dad61ff14.png";
                                        ?>
                                            <table class="item-table" data-item-id="<?= $id ?>" data-rootplace-id="<?= $id ?>" data-configure-url="https://www.rovive.pro/universes/configure?id=<?= $id ?>" data-configure-localization-url="https://www.rovive.pro/localization/games/<?= $id ?>/configure" data-create-badge-url="https://www.rovive.pro/develop?selectedPlaceId=<?= $id ?>&amp;View=21" data-create-gamepass-url="https://www.rovive.pro/develop?selectedPlaceId=<?= $id ?>&amp;View=34" data-developerstats-url="https://create.rovive.pro/creations/experiences/<?= $id ?>/stats" data-advertise-url="https://www.rovive.pro/user-ads/create?targetId=<?= $id ?>&amp;targetType=Asset" data-activate-universe-url="https://www.rovive.pro/v1/universes/<?= $id ?>/activate" data-deactivate-universe-url="https://www.rovive.pro/v1/universes/<?= $id ?>/deactivate" data-type="universes">
                                                <tbody>
                                                    <tr>
                                                        <td class="image-col" style="text-align: center">
                                                            <a href="https://www.rovive.pro/catalog/<?= $id ?>/<?= htmlspecialchars(str_replace(" ", "-", $name)) ?>" class="game-image">
                                                                <img src="<?= $icon ?>" alt="<?= htmlspecialchars($name) ?>">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="title" href="https://www.rovive.pro/catalog/<?= $id ?>/<?= htmlspecialchars(str_replace(" ", "-", $name)) ?>"><?= htmlspecialchars($name); ?></a>
                                                        </td>
                                                        <!--<td class="menu-col">
                                                            <a class="roblox-config-button btn-control btn-control-large" href="/develop/configure?id=<?= $id ?>">Configure</a>
                                                        </td>-->
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="separator"></div>
                                        <?php
                                        } ?>
                                        <div class="build-loading-container" style="display: none;">
                                            <div class="buildpage-loading-container">
                                                <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                            </div>
                                        </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "meshes") { ?>
                                <td class="content-area ">
                                    <h2>Create a Mesh</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=40&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Meshes</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $meshes ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "shirts") { ?>
                                <td class="content-area ">
                                    <h2>Create a Shirt</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=11&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Shirts</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $shirts ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "tshirts") { ?>
                                <td class="content-area ">
                                    <h2>Create a T-Shirt</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=2&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">T-Shirts</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $tshirts ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "pants") { ?>
                                <td class="content-area ">
                                    <h2>Create Pants</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=12&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Pants</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $pants ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "accessories") { ?>
                                <td class="content-area ">
                                    <h2>Create an Accessory</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=8&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Accessories</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $accessories ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "faces") { ?>
                                <td class="content-area ">
                                    <h2>Create a Face</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=18&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Faces</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $faces ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "userads") { ?>
                                <td class="content-area ">
                                    <h2>Create an Ad</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=22&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">User Ads</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $userads ?>
                                    </div>
                                    <div class="build-loading-container" style="display: none;">
                                        <div class="buildpage-loading-container">
                                            <img alt="^_^" class="" src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif">
                                        </div>
                                    </div>

                                </td>
                            <?php } ?>
                            <?php if ($tab == "models") { ?>
                                <td class="content-area ">
                                    <h2>Create a Model</h2>
                                    <iframe id="upload-iframe" class="place-specific-assets my-upload-iframe" src="/build/upload?assetTypeId=10&amp;GroupId=&amp;targetPlaceId=<?= $gameid ?>" frameborder="0" scrolling="no" data-target-universe-id="<?php if ($gameid) { ?><?= $gameid ?><?php } ?>"></iframe>
                                    <table class="section-header">
                                        <tbody>
                                            <tr>
                                                <td class="content-title">
                                                    <div>

                                                        <h2 class="header-text">Models</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="items-container ">
                                        <?= $models ?>
                                    </div>
                                </td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="Ads_WideSkyscraper">


                    </div>

                    <script type="text/javascript">
                        if (typeof Roblox === "undefined") {
                            Roblox = {};
                        }
                        if (typeof Roblox.BuildPage === "undefined") {
                            Roblox.BuildPage = {};
                        }
                        Roblox.BuildPage.Resources = {
                            active: "Public",
                            inactive: "Private",
                            activatePlace: "Make Place Public",
                            editGame: "Edit Game",
                            ok: "OK",
                            robloxStudio: "Roblox Studio",
                            openIn: "To edit this game, open to this page in ",
                            placeInactive: "Make Place Private",
                            toBuileHere: "To build here, please activate this place by clicking the ",
                            inactiveButton: "Inactive button. ",
                            createModel: "Create Model",
                            toCreate: "To create models, please use ",
                            makeActive: "Make Public",
                            makeInactive: "Make Private",
                            purchaseComplete: "Purchase Complete!",
                            youHaveBid: "You have successfully bid ",
                            confirmBid: "Confirm the Bid",
                            placeBid: "Place Bid",
                            cancel: "Cancel",
                            errorOccurred: "Error Occurred",
                            adDeleted: "Ad Deleted",
                            theAdWasDeleted: "The Ad has been deleted.",
                            confirmDelete: "Confirm Deletion",
                            areYouSureDelete: "Are you sure you want to delete this Ad?",
                            bidRejected: "Your bid was Rejected",
                            bidRange: "Bid value must be a number between ",
                            bidRange2: "Bid value must be a number greater than ",
                            and: " and ",
                            yourRejected: "Your bid was Rejected",
                            estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
                            estimatedImpressions: "Estimated Impressions ",
                            makeAdBid: "Make Ad Bid",
                            wouldYouLikeToBid: "Would you like to bid ",
                            verify: "Verify",
                            emailVerifiedTitle: "Verify Your Email",
                            emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the <a href='https://www.rovive.pro/my/account?confirmemail=1'>Account</a> page.",
                            continueText: "Continue",
                            profileRemoveTitle: "Remove from profile?",
                            profileRemoveMessage: "This game is private and listed on your profile, do you wish to remove it?",
                            profileAddTitle: "Add to profile?",
                            profileAddMessage: "This game is public, but not listed on your profile, do you wish to add it?",
                            deactivateTitle: "Make Game Private",
                            deactivateBody: "This will shut down any active servers <br /><br />Do you still want to make this game private?",
                            deactivateButton: "Make Private",
                            questionmarkImgUrl: "https://static.rovive.pro/images/Buttons/questionmark-12x12.png",
                            activationRequestFailed: "Request to make game public failed. Please retry in a few minutes!",
                            deactivationRequestFailed: "Request to make game private failed. Please retry in a few minutes!",
                            tooManyActiveMessage: "You have reached the maximum number of public places for your membership level. Make one of your existing places private before making this place public.",
                            activeSlotsMessage: "{0} of {1} public slots used"
                        };
                    </script>

                </div>

                <div id="AdPreviewModal" class="simplemodal-data" style="display: none;">
                    <div id="ConfirmationDialog" style="overflow: hidden">
                        <div id="AdPreviewContainer" style="overflow: hidden">
                        </div>
                    </div>
                </div>

                <div id="clothing-upload-fun-captcha-container">
                    <div id="clothing-upload-fun-captcha-backdrop"></div>
                    <div id="clothing-upload-fun-captcha-modal"></div>
                </div>

                <script type="text/javascript">
                    Roblox.CatalogValues = Roblox.CatalogValues || {};
                    Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
                    Roblox.CatalogValues.CatalogContext = 2;
                    Roblox.CatalogValues.CatalogContextDevelopOnly = 2;
                    Roblox.CatalogValues.ContainerID = "LibraryTab";

                    $(function() {
                        if (Roblox && Roblox.AdsHelper && Roblox.AdsHelper
                            .AdRefresher) {
                            Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled =
                                true;
                            Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds =
                                3000;
                        }
                    });
                </script>

                <script>
                    const gear = document.getElementsByClassName("gear-button-wrapper")[0];
                    setInterval(() => {
                        if (gear) {
                            gear.removeAttribute("style");
                        }
                    }, 50);
                </script>

                <div style="clear: both"></div>
            </div>

            <!-- <div id="LibraryTab" class="">
                                        <div class="loading" id="LibraryLoadingIndicatorContainer">
                                            <img id="LibraryLoadingIndicator"
                                                src="https://images.rovive.pro/ec4e85b0c4396cf753a06fade0a8d8af.gif"
                                                alt="Progress">
                                        </div>
                                    </div> -->
        </div>
    </div>
</div>

<style>
    .customModal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 2000;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .customModal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        border-radius: 10px;
        width: 80%;
        max-width: 500px;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .closeCustomModal {
        color: gray;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .closeCustomModal:hover,
    .closeCustomModal:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .customModal .form-control {
        height: 34px;
        padding: 6px 12px;
    }

    .goog-te-spinner {
        animation: goog-te-spinner-rotator 1.4s linear infinite;
        height: 20px;
        width: 20px;
        margin-right: 5px;
        display: inline-block;
        vertical-align: middle;
    }

    .goog-te-spinner-path {
        stroke-dasharray: 187;
        stroke-dashoffset: 0;
        stroke: #fff;
        transform-origin: center;
        animation: goog-te-spinner-dash 1.4s ease-in-out infinite;
    }

    @keyframes goog-te-spinner-rotator {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(270deg);
        }
    }

    @keyframes goog-te-spinner-dash {
        0% {
            stroke-dashoffset: 187;
        }

        50% {
            stroke-dashoffset: 46.75;
            transform: rotate(135deg);
        }

        100% {
            stroke-dashoffset: 187;
            transform: rotate(450deg);
        }
    }
</style>

<?php echo PageBuilder::buildFooter(); ?>