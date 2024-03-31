<?php

// sorry we need another config file, we need to import some shit seperately haha so funny

define(
    "SITE_CONFIG",
    [
        "database" =>
        [
            "host" => "localhost",
            "schema" => "rovive",
            "username" => "root",
            "password" => ""
        ],

        "site" =>
        [
            "name" => "Rovive",
            "name_secondary" => "Rovive",
            "currencyName" => "Robux",
            "isSitetest" => false,
            "canSignup" => true,
            "orangethingyenabled" => false,
            "canLogin" => true
        ],

        "captcha" => // used for hCaptcha
        [
            "siteKey" => "f872976f-d658-4f51-93dd-07b64f03071e",
            "privateKey" => "ES_e22a4e8c35c94160afc18911f42d8859"
        ]
    ]
);

// database connection (PDO, cuz it kewl)

try {
    $pdo = new PDO('mysql:host=' . SITE_CONFIG["database"]["host"] . ';dbname=' . SITE_CONFIG["database"]["schema"], SITE_CONFIG["database"]["username"], SITE_CONFIG["database"]["password"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error, Please Contact The Administrator." . "\n" . $e); // oh no moment when this happens fuck, shit went wrong. - ariez
}