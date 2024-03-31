<?php

class Avatar
{
    public static function getAvatarItems($userId)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM avatarItems WHERE userId = :id");
        $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setAvatarItems($userId, $items)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM avatarItems WHERE userId = :id");
        $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();

        foreach ($items as $item) {
            $stmt = $pdo->prepare("INSERT INTO avatarItems (userId, itemId) VALUES (:userId, :itemId)");
            $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
            $stmt->bindValue(":itemId", $item, PDO::PARAM_INT);
            $stmt->execute();
        }

        return true;
    }

    public static function regenAvatar($userId)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/SOAP.php';
        generateAvatarImages($userId);
    }
}