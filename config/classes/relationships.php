<?php

class Relationships
{

    public static function getFriends($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM relationships WHERE type = 'friend' AND (userId = :userid OR withUserId = :userid)");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getFollowers($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM relationships WHERE type = 'following' AND withUserId = :userid");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getFollowing($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM relationships WHERE type = 'following' AND userId = :userid");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function sendFriendRequest($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO relationships (userId, withUserId, type) VALUES (:userid, :withuserid, 'type')");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid, 'type' => 'friendrequest']);

        return true;
    }

    public static function acceptFriendRequest($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE relationships SET type = 'friend' WHERE userId = :userid AND withUserId = :withuserid AND type = 'friendrequest'");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }

    public static function declineFriendRequest($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM relationships WHERE userId = :userid AND withUserId = :withuserid AND type = 'friendrequest'");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }

    public static function unfriend($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM relationships WHERE userId = :userid AND withUserId = :withuserid AND type = 'friend'");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }

    public static function unfollow($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM relationships WHERE userId = :userid AND withUserId = :withuserid AND type = 'following'");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }

    public static function follow($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO relationships (userId, withUserId, type) VALUES (:userid, :withuserid, 'following')");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }

    public static function blockUser($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO relationships (userId, withUserId, type) VALUES (:userid, :withuserid, 'blocked')");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }

    public static function unblockUser($userid, $withuserid)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM relationships WHERE userId = :userid AND withUserId = :withuserid AND type = 'blocked'");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid]);

        return true;
    }


    public static function getAmountOfFriends($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM relationships WHERE type = 'friend' AND (userId = :userid OR withUserId = :userid)");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchColumn();
    }

    public static function getAmountOfFollowers($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM relationships WHERE type = 'following' AND withUserId = :userid");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchColumn();
    }

    public static function getAmountOfFollowing($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM relationships WHERE type = 'following' AND userId = :userid");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchColumn();
    }

    public static function getAmountOfFriendRequests($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM relationships WHERE type = 'friendrequest' AND withUserId = :userid");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchColumn();
    }

    public static function getAmountOfBlockedUsers($userid)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM relationships WHERE type = 'blocked' AND withUserId = :userid");
        $stmt->execute(['userid' => $userid]);

        return $stmt->fetchColumn();
    }
    

    public static function hasRelationship($userid, $withuserid, $type)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM relationships WHERE userId = :userid AND withUserId = :withuserid AND type = :type");
        $stmt->execute(['userid' => $userid, 'withuserid' => $withuserid, 'type' => $type]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
