<?php
$title = "Catalog";
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

?>

<?php echo PageBuilder::buildHeader(); ?>

<script type='text/javascript' src='/js/54b73269bcd426ec956755cb8cac7033.js'></script>

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

<div id="navContent" class="nav-content content logged-out">
    <div class="nav-content-inner">
        <div id="MasterContainer">
            <script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>

            <div>
                <div id="BodyWrapper" class="">
                    <div id="RepositionBody">
                        <div id="Body" class="body-width">


                            <style type="text/css">
                                #Body {
                                    padding: 5px;
                                }
                            </style>



                            <iframe name="CatalogFrame" allowtransparency="true" frameborder="0" height="1024" scrolling="no" sandbox="allow-forms allow-scripts allow-top-navigation allow-same-origin" src="/catalog/contents?CatalogContext=1&SortAggregation=3&LegendExpanded=true&Category=Featured" width="1024" data-js-adtype="iframead"></iframe>

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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='/js/fbdb5b64583278a8513645a997a89a3c.js'></script>

<?php echo PageBuilder::buildFooter(); ?>