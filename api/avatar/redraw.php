<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';

Avatar::regenAvatar($_SESSION["user"]["id"]);
sleep(2);
exit("Success");