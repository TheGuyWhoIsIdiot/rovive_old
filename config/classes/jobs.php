<?php
// Roblox Compute Cloud Service gameserver job management class
class Jobs
{
    public static function createJob($jobId, $ip, $port, $placeId)
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO jobs (jobId, ip, port, placeId, startedAt, lastPingTime) VALUES (?, ?, ?, ?, ?, ?)");
        $currentTime = time();
        $stmt->execute([$jobId, $ip, $port, $placeId, $currentTime, $currentTime]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteJob($jobId)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM jobs WHERE jobId = ?");
        $stmt->execute([$jobId]);
    }

    public static function getAllJobsForPlaceId($placeId)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM jobs WHERE placeId = ?");
        $stmt->execute([$placeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getJob($jobId)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM jobs WHERE jobId = ?");
        $stmt->execute([$jobId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getBestJobForPlaceId($placeId)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM jobs WHERE placeId = ?");
        $stmt->execute([$placeId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function isPortUsed($port)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM jobs WHERE port = ?");
        $stmt->execute([$port]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function setJobVar($jobId, $key, $value)
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE jobs SET " . $key . " = ? WHERE jobId = ?");

        $stmt->execute([$value, $jobId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPlayerAmountForPlaceId($placeId)
    {
        global $pdo;
        
        $stmt = $pdo->prepare(
            "SELECT SUM(playerCount) as totalPlayerCount
            FROM jobs WHERE placeId = ?"
        );
        
        $stmt->execute([$placeId]);
        
        $result = $stmt->fetch();
        
        return $result['totalPlayerCount'];
    }

}
