<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";

$apiKey = isset($_GET["apiKey"]) ? $_GET["apiKey"] : "";
$jobId = isset($_GET["jobId"]) ? $_GET["jobId"] : "";

if ($apiKey !== "doyousuckdicks?123idkmanidont") {
	exit("key_invalid");
}


if (!empty($apiKey) && !empty($jobId)) {
	require_once $_SERVER["DOCUMENT_ROOT"] . "/SOAP.php";

	$jobClass = new Jobs;

	if ($jobClass->getJob($jobId)) {
    	$jobClass->setJobVar($jobId, "active", 1);
        $jobClass->setJobVar($jobId, "lastPingTime", time());
        renewLease($jobId, 64989, 4000);
    }

}