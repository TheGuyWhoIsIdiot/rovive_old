<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";

if (!isset($_SESSION["user"])) {
    header("Location: /");
}

if (!isset($_GET["id"])) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/404.php";
    exit;
}

$gameId = (int)$_GET["id"];

$gameclass = new Game;

$game = $gameclass->getGame($gameId);

if (!$game) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/404.php";
    exit;
}

if ($game["creator_id"] != $_SESSION["user"]["id"] && $_SESSION["user"]["admin"] < 2) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
    exit;
}


?>

<?= PageBuilder::buildHeader() ?>

<style>
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

    .form-control {
        height: 34px;
        padding: 6px 12px;
    }
</style>

<div class="content">
    <div class="alert alert-success" style="display: none;" id="updateSuccessMessage"></div>
    <div class="alert alert-warning" style="display: none;" id="updateErrorMessage"></div>

    <form class="updateGameForm" style="padding: 5px;" method="POST" action="/api/games/update">
        <h1>Configure</h1>
        <h4><?= htmlspecialchars($game["title"]) ?></h4>
        <div class="form-group">
            <label for="gameTitle">Title</label>
            <input type="text" class="form-control" name="gameTitle" id="gameTitle" placeholder="Title..." value="<?= htmlspecialchars($game["title"]) ?>">
        </div>
        <div class="form-group">
            <label for="gameDescription">Description</label>
            <textarea class="form-control" name="gameDescription" id="gameDescription" placeholder="Description..." rows="3"><?= htmlspecialchars($game["description"]) ?></textarea>
        </div>
        <div class="form-group">
            <label for="gameFileSelector">File</label>
            <input type="file" class="form-control" name="gameFile" id="gameFileSelector" accept=".rbxl,.rbxlx">
        </div>
        <div class="form-group">
            <button type="submit" class="btn-secondary-md" id="updatePlaceBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="goog-te-spinner spinner" style="display: none;" width="3%" height="auto" viewBox="0 0 66 66">
                    <circle class="goog-te-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                </svg>
                <span>Update game</span>
            </button>
        </div>
    </form>
</div>

<script defer>
    $(".updateGameForm").on("submit", function(e) {
        e.preventDefault();

        $("#updatePlaceBtn").attr("disabled", "disabled");
        $("#updatePlaceBtn span").text("Updating...");
        $("#updatePlaceBtn .spinner").show();


        let formdata = new FormData();
        formdata.append("id", <?= (int)$gameId ?>);
        formdata.append("title", document.getElementById("gameTitle").value);
        formdata.append("description", document.getElementById("gameDescription").value);
        if (document.getElementById("gameFileSelector").files[0]) {
            formdata.append("gameFile", document.getElementById("gameFileSelector").files[0]);
        }


        $.ajax({
            url: "/api/games/update",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#updatePlaceBtn").removeAttr("disabled");
                $("#updatePlaceBtn span").text("Update game");
                $("#updatePlaceBtn .spinner").hide();

                $("#updateSuccessMessage").fadeIn("fast");
                $("#updateSuccessMessage").text("Game updated successfully");
                setTimeout(function() {
                    $("#updateSuccessMessage").fadeOut("fast");
                }, 5000);
            },
            error: function(data) {
                $("#updatePlaceBtn").removeAttr("disabled");
                $("#updatePlaceBtn span").text("Update game");
                $("#updatePlaceBtn .spinner").hide();

                $("#updateErrorMessage").fadeIn("fast");
                $("#updateErrorMessage").text(data.responseText);
                setTimeout(function() {
                    $("#updateErrorMessage").fadeOut("fast");
                }, 5000);
            }
        });
    });
</script>

<?= PageBuilder::buildFooter() ?>