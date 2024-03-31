<?php

class Game
{

    public static function getGame($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getPopularGames($limit, $offset)
    {
        global $pdo;
        $stmt = $pdo->prepare("
        SELECT g.*
        FROM games g
        LEFT JOIN (
            SELECT j.placeId, SUM(j.playerCount) as totalPlayerCount
            FROM jobs j
            GROUP BY j.placeId
        ) j ON g.id = j.placeId
        WHERE g.status = 'public'
        ORDER BY j.totalPlayerCount DESC
        LIMIT :limit OFFSET :offset
    ");
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getPopularGamesTotal()
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM games WHERE status = 'public'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function searchTotal($query)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM games WHERE status = 'public' AND title LIKE :query");
        $stmt->bindValue(":query", "%$query%", PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function search($query, $limit, $offset)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM games WHERE status = 'public' AND title LIKE :query ORDER BY id DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(":query", "%$query%", PDO::PARAM_STR);
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getGamesByUserId($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM games WHERE creator_id = :id AND status = 'public'");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getGamesByUserIdTotal($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM games WHERE creator_id = :id AND status = 'public'");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function create($userid, $title, $description, $filepath)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO games (id, creator_id, title, description, filepath, created_at, updated_at) VALUES (:id, :userid, :title, :description, :filepath, :currenttime, :currenttime)");
        $stmt->bindValue(":id", Asset::getFreeId(), PDO::PARAM_INT);
        $stmt->bindValue(":userid", $userid, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":filepath", $filepath, PDO::PARAM_STR);
        $stmt->bindValue(":currenttime", time(), PDO::PARAM_INT);
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public static function update($gameid, $title, $description, $filepath)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE games SET title = :title, description = :description, filepath = :filepath, updated_at = :currenttime WHERE id = :gameid");
        $stmt->bindValue(":gameid", $gameid, PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":filepath", $filepath, PDO::PARAM_STR);
        $stmt->bindValue(":currenttime", time(), PDO::PARAM_INT);

        return $stmt->execute();
    }
}
