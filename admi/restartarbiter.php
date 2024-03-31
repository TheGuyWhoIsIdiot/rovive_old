<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

$userclass = new User;

$adminlevel = 0;

if (isset($_SESSION["user"])) {
    $user = $userclass::getUser($_SESSION["user"]["id"]);
    $adminlevel = $user["admin"];

    if ($adminlevel < 3) {
        $title = "Forbidden";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
        exit;
    }
} else {
    $title = "Forbidden";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
    exit;
}

?>
<?php echo PageBuilder::buildHeader(); ?>
<div class="content ">

    <div id="Skyscraper-Adp-Left" class="abp abp-container left-abp">
        <iframe name="Roblox_GameDetail_Left_160x600" allowtransparency="true" frameborder="0" height="612" scrolling="no" src="https://www.rbx2016.nl/user-sponsorship/empty" width="160" data-js-adtype="iframead"></iframe>
    </div>



    <div id="HomeContainer" class="row home-container" data-update-status-url="/home/updatestatus">

        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Admin Panel</h1>
                </div>
                <div class="col-md-9" style="overflow: visible">
                    <!-- <div class="navbar-expand-md md-auto text-center">
                                <h3 class="alert-warning" style="padding:0.9rem;">Admin panel is WIP.</h3>
                            </div> -->
                    <h3>Restart Arbiter</h3>
                    <p>Here you can restart the arbiter (game hosting system)</p>
                    <p>UPON RESTARTING IT, ALL ACITVE GAMES WILL SHUTDOWN.</p>
                    <p>&nbsp;</p>
                    <form action="/v1/admin/restartarbiter" method="post">
                        <input type="submit" value="RESTART ARBITER" class="btn-control-md btn-min-width">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo PageBuilder::buildFooter(); ?>