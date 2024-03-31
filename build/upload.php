<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("You must be logged in to access this API");
}

if (!isset($_GET["assetTypeId"])) {
    header("HTTP/1.1 400 Bad Request");
    exit("Missing parameters");
}

$assetTypeId = (int)$_GET["assetTypeId"];

?>

<link rel='stylesheet' href='/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css' />

<link rel='stylesheet' href='/css/page___18b9b017e0adf1f1cd825ac9d5e6da77_m.css' />

<script type='text/javascript' src='/js/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>
    window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")
</script>
<script type='text/javascript' src='/js/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>
    window.jQuery || document.write(
        "<script type='text/javascript' src='/js/jquery-migrate-1.2.1.js'><\/script>")
</script>

<style>
    .hidden {
        display: none;
    }
</style>

<?php if ($assetTypeId == 3) { ?>
    <div id="audio-bucket-data" data-max-audio-size="20480000" data-max-audio-length="420" data-audio-enabled="false" data-audio-size="8388608" data-audio-price="0" data-shortsoundeffect-enabled="true" data-shortsoundeffect-size="786432" data-shortsoundeffect-price="0" data-longsoundeffect-enabled="true" data-longsoundeffect-size="1835008" data-longsoundeffect-price="0" data-music-enabled="true" data-music-size="8388608" data-music-price="0" data-longmusic-enabled="true" data-longmusic-size="20480000" data-longmusic-price="0"></div>
    <div class="form-row">Audio uploads must be less than 7 minutes and smaller than 5.5 MB.</div>
    <div class="form-row">
        <label for="file">Find your .mp3 or .ogg file:</label>
        <input id="file" type="file" accept="audio/mpeg,audio/wav,audio/ogg" name="file" tabindex="1">
        <span id="file-error" class="error"></span>
    </div>
    <div class="form-row">
        <label for="name">Audio Name:</label>
        <input id="name" type="text" class="text-box text-box-medium" name="name" maxlength="50" tabindex="2">
        <span id="name-error" class="error"></span>
    </div>
    <div class="form-row submit-buttons">
        <a id="upload-button" class="btn-medium btn-primary" data-freeaudio-enabled="true" tabindex="4">Upload<span class=""></span></a>
        <span id="loading-container" class="hidden"><img src="/img/ec4e85b0c4396cf753a06fade0a8d8af.gif"></span>
        <div id="upload-fee-item-result-error" class="status-error hidden">Something went wrong</div>
        <div id="upload-fee-item-result-success" class="status-confirm hidden">
            <div><a id="upload-fee-confirmation-link" target="_top">Audio</a> successfully created!</div>
        </div>
    </div>
    <script defer>
        $("#upload-button").on("click", function() {
            $("#upload-button").addClass("hidden");
            $("#loading-container").removeClass("hidden");

            $("#upload-fee-item-result-error").addClass("hidden");
            $("#upload-fee-item-result-success").addClass("hidden");

            $("#file-error").addClass("hidden");
            $("#name-error").addClass("hidden");

            let formdata = new FormData();
            formdata.append("title", document.getElementById("name").value);
            formdata.append("assetFile", document.getElementById("file").files[0]);
            formdata.append("assetTypeId", <?php echo $assetTypeId; ?>);

            $.ajax({
                url: "/api/asset/create",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    window.location.reload();
                },
                error: function(data) {
                    $("#loading-container").addClass("hidden");
                    $("#upload-button").removeClass("hidden");

                    $("#upload-fee-item-result-error").removeClass("hidden");
                    $("#upload-fee-item-result-success").addClass("hidden");

                    $("#upload-fee-item-result-error").text(data.responseText);
                },
                complete: function(data) {
                    $("#loading-container").addClass("hidden");
                    $("#upload-button").removeClass("hidden");
                }
            });
        });
    </script>
<?php } elseif ($assetTypeId == 34) { ?>
    <div class="form-row">
        <label for="file">Icon:</label>
        <input id="file" type="file" accept="png/jpeg" name="file" tabindex="1">
        <span id="file-error" class="error"></span>
    </div>
    <div class="form-row">
        <label for="name">Gamepass Name:</label>
        <input id="name" type="text" class="text-box text-box-medium" name="name" maxlength="50" tabindex="2">
        <span id="name-error" class="error"></span>
    </div>
    <div class="form-row">
        <label for="name">Place Id:</label>
        <input id="name" type="text" class="text-box text-box-medium" name="id" maxlength="50" tabindex="2">
        <span id="name-error" class="error"></span>
    </div>
    <div class="form-row submit-buttons">
        <a id="upload-button" class="btn-medium btn-primary" data-freeaudio-enabled="true" tabindex="4">Upload<span class=""></span></a>
        <span id="loading-container" class="hidden"><img src="/img/ec4e85b0c4396cf753a06fade0a8d8af.gif"></span>
        <div id="upload-fee-item-result-error" class="status-error hidden">Something went wrong</div>
        <div id="upload-fee-item-result-success" class="status-confirm hidden">
            <div><a id="upload-fee-confirmation-link" target="_top">Gamepass</a> successfully created!</div>
        </div>
    </div>
    <script defer>
        $("#upload-button").on("click", function() {
            $("#upload-button").addClass("hidden");
            $("#loading-container").removeClass("hidden");

            $("#upload-fee-item-result-error").addClass("hidden");
            $("#upload-fee-item-result-success").addClass("hidden");

            $("#file-error").addClass("hidden");
            $("#name-error").addClass("hidden");

            let formdata = new FormData();
            formdata.append("title", document.getElementById("name").value);
            formdata.append("assetFile", document.getElementById("file").files[0]);
            formdata.append("gameId", document.getElementById("id").value[0]);

            $.ajax({
                url: "/api/gamepass/create",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    window.location.reload();
                },
                error: function(data) {
                    $("#loading-container").addClass("hidden");
                    $("#upload-button").removeClass("hidden");

                    $("#upload-fee-item-result-error").removeClass("hidden");
                    $("#upload-fee-item-result-success").addClass("hidden");

                    $("#upload-fee-item-result-error").text(data.responseText);
                },
                complete: function(data) {
                    $("#loading-container").addClass("hidden");
                    $("#upload-button").removeClass("hidden");
                }
            });
        });
    </script>
<?php } ?>
