<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

if (!isset($_SESSION["user"])) {
    header("HTTP/1.1 403 Forbidden");
    require_once $_SERVER['DOCUMENT_ROOT'] . '/403.php';
    exit();
}

$avatarClass = new Avatar;
$items = $avatarClass->getAvatarItems($_SESSION["user"]["id"]);

foreach ($items as $item) {
?>
    <div class="col-3 mt-4" id="item<?= (int)$item["itemId"] ?>">
        <div class="image-0-2-92">
            <div class="thumbWrapper-0-2-98"><img class="image-0-2-102 " src="/img/e6ea624485b22e528cc719f04560fe78Avatar.png">
            </div>
            <div class="wearButtonWrapper-0-2-94" style="bottom: 6.25em;">
                <div><button class="btn-0-2-99 wearButton-0-2-93 cancelButton-0-2-61" id="remove<?= (int)$item["itemId"] ?>" title="">Remove</button></div>
            </div>
        </div>
        <p class="itemName-0-2-91"><a href="/catalog/<?= (int)$item["itemId"] ?>/">bacon haiiiirrr</a></p>
        <div class="assetTypeWrapper-0-2-97"><span class="assetTypeLabel-0-2-95">Type:
            </span> <span class="assetType-0-2-96">bacon hair</span></div>
        <script>
            const btn = document.getElementById("remove<?= (int)$item["itemId"] ?>");
            btn.addEventListener("click", () => {
                $.ajax({
                    url: "/My/Character/Remove",
                    method: "POST",
                    data: {
                        "itemid": <?= (int)$item["itemId"] ?>
                    },
                    success: (res) => {
                        const item = document.getElementById("item<?= (int)$item["itemId"] ?>");
                        item.parentNode.removeChild(item);
                        const item2 = document.getElementById("wear<?= (int)$item["itemId"] ?>");
                        if (item2) {
                            item2.innerText = "Wear";
                            item2.classList.remove("cancelButton-0-2-61");
                            item2.classList.add("continueButton-0-2-62");
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });
            });
        </script>
    </div>
<?php
}
