<?php

// asset class

class Asset
{
    public static function getAssetTypes()
    {
        return array(
            1 => 'Image',
            2 => 'TShirt',
            3 => 'Audio',
            4 => 'Mesh',
            5 => 'Lua',
            8 => 'Hat',
            9 => 'Place',
            10 => 'Model',
            11 => 'Shirt',
            12 => 'Pants',
            13 => 'Decal',
            17 => 'Head',
            18 => 'Face',
            19 => 'Gear',
            21 => 'Badge',
            24 => 'Animation',
            27 => 'Torso',
            28 => 'RightArm',
            29 => 'LeftArm',
            30 => 'LeftLeg',
            31 => 'RightLeg',
            32 => 'Package',
            34 => 'GamePass',
            38 => 'Plugin',
            40 => 'MeshPart',
            41 => 'HairAccessory',
            42 => 'FaceAccessory',
            43 => 'NeckAccessory',
            44 => 'ShoulderAccessory',
            45 => 'FrontAccessory',
            46 => 'BackAccessory',
            47 => 'WaistAccessory',
            48 => 'ClimbAnimation',
            49 => 'DeathAnimation',
            50 => 'FallAnimation',
            51 => 'IdleAnimation',
            52 => 'JumpAnimation',
            53 => 'RunAnimation',
            54 => 'SwimAnimation',
            55 => 'WalkAnimation',
            56 => 'PoseAnimation',
            57 => 'EarAccessory',
            58 => 'EyeAccessory',
            61 => 'EmoteAnimation',
            62 => 'Video',
            64 => 'TShirtAccessory',
            65 => 'ShirtAccessory',
            66 => 'PantsAccessory',
            67 => 'JacketAccessory',
            68 => 'SweaterAccessory',
            69 => 'ShortsAccessory',
            70 => 'LeftShoeAccessory',
            71 => 'RightShoeAccessory',
            72 => 'DressSkirtAccessory',
            73 => 'FontFamily',
            76 => 'EyebrowAccessory',
            77 => 'EyelashAccessory',
            78 => 'MoodAnimation',
            79 => 'DynamicHead'
        );
    }

    public static function getAsset($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM library WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getFreeId() // void src
    {
        global $pdo;

        // Get the maximum value from the library table
        $libraryQuery = $pdo->prepare("SELECT MAX(id) AS max_id FROM library");
        $libraryQuery->execute();
        $libraryMaxId = $libraryQuery->fetch(PDO::FETCH_ASSOC)['max_id'];

        // Get the maximum value from the games table
        $gamesQuery = $pdo->prepare("SELECT MAX(id) AS max_id FROM games");
        $gamesQuery->execute();
        $gamesMaxId = $gamesQuery->fetch(PDO::FETCH_ASSOC)['max_id'];

        // Find the maximum of the two maximum values
        $maxId = max($libraryMaxId, $gamesMaxId);

        // Increment the maximum value until no rows exist in library or games with that id
        $nextId = $maxId + 1;
        while (true) {
            $libraryCheckQuery = $pdo->prepare("SELECT COUNT(*) AS count FROM library WHERE id = :id");
            $libraryCheckQuery->execute(array(':id' => $nextId));

            $libraryCount = $libraryCheckQuery->fetch(PDO::FETCH_ASSOC)['count'];

            $gamesCheckQuery = $pdo->prepare("SELECT COUNT(*) AS count FROM games WHERE id = :id");
            $gamesCheckQuery->execute(array(':id' => $nextId));

            $gamesCount = $gamesCheckQuery->fetch(PDO::FETCH_ASSOC)['count'];

            if ($libraryCount == 0 && $gamesCount == 0) {
                // No rows found in both library and games, use $nextId as the new ID
                break;
            }
            $nextId++;
        }
        return $nextId;
    }

    public static function getAssetsByCreator($creatorId)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM library WHERE creatorId = :creatorId");
        $stmt->bindValue(":creatorId", $creatorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function addAsset($name, $description, $type, $fileUrl, $creatorId, $status, $GearType, $type2, $offsale, $sold, $limited)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO library (id, name, description, ItemType, price, creatorId, filepath, status, GearType, type, type2, offsale, sold, limited)
                           VALUES (:id, :name, :description, :ItemType, :price, :creatorId, :filepath, :status, :GearType, :type, :type2, :offsale, :sold, :limited)");

        $id = self::getFreeId();
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":ItemType", 1, PDO::PARAM_INT);
        $stmt->bindValue(":price", 0, PDO::PARAM_INT);
        $stmt->bindValue(":creatorId", $creatorId, PDO::PARAM_INT);
        $stmt->bindValue(":filepath", $fileUrl, PDO::PARAM_STR);
        $stmt->bindValue(":status", $status, PDO::PARAM_STR);
        $stmt->bindValue(":GearType", $GearType, PDO::PARAM_INT);
        $stmt->bindValue(":type", $type, PDO::PARAM_STR);
        $stmt->bindValue(":type2", $type2, PDO::PARAM_STR);
        $stmt->bindValue(":offsale", $offsale, PDO::PARAM_INT);
        $stmt->bindValue(":sold", $sold, PDO::PARAM_INT);
        $stmt->bindValue(":limited", $limited, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function deleteAsset($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM library WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function approveAsset($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE library SET status = 'approved' WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function disapproveAsset($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE library SET status = 'disapproved', name = '[ Content Deleted ]', description = '[ Content Deleted ]', fileurl = :file_url, offsale = 1 WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $asset = self::getAsset($id);

        $fileUrl = "";

        if ($asset["type2"] == "Sound") {
            $fileUrl = "/uploads/disapproved.mp3";
        }

        $stmt->bindValue(":file_url", $fileUrl, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function updateAsset($id, $key, $value)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE library SET " . $key . " = :value WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":value", $value, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
