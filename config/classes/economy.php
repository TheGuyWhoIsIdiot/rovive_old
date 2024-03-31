<?php

class Economy
{
    public static function giveCurrency($amount, $userId)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT currency FROM users WHERE id = :id');
        $stmt->bindValue(':id', $userId);
        $stmt->execute();
        $currentCurrency = $stmt->fetch()['currency'];

        $newCurrency = $currentCurrency + $amount;

        $stmt = $pdo->prepare('UPDATE users SET currency = :newCurrency WHERE id = :id');
        $stmt->bindValue(':newCurrency', $newCurrency);
        $stmt->bindValue(':id', $userId);
        $stmt->execute();

        return true;
    }

    public static function takeCurrency($amount, $userId)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT currency FROM users WHERE id = :id');
        $stmt->bindValue(':id', $userId);
        $stmt->execute();
        $currentCurrency = $stmt->fetch()['currency'];

        $newCurrency = $currentCurrency - $amount;

        $stmt = $pdo->prepare('UPDATE users SET currency = :newCurrency WHERE id = :id');
        $stmt->bindValue(':newCurrency', $newCurrency);
        $stmt->bindValue(':id', $userId);
        $stmt->execute();

        return true;
    }

    public static function getCurrency($userId)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT currency FROM users WHERE id = :id');
        $stmt->bindValue(':id', $userId);
        $stmt->execute();

        return $stmt->fetch()['currency'];
    }

    public static function logTransaction($fromUserId, $toUserId, $amount, $name)
    {
        global $pdo;

        $stmt = $pdo->prepare('INSERT INTO transactions (fromUserId, toUserId, amount, name, date) VALUES (:fromUserId, :toUserId, :amount, :name, :date)');
        $stmt->bindValue(':fromUserId', $fromUserId);
        $stmt->bindValue(':toUserId', $toUserId);
        $stmt->bindValue(':amount', $amount);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':date', time());
        $stmt->execute();

        return true;
    }

    public static function commitTransaction($fromUserId, $toUserId, $amount, $name = "Transaction")
    {
        self::takeCurrency($amount, $fromUserId);
        self::giveCurrency($amount, $toUserId);
        self::logTransaction($fromUserId, $toUserId, $amount, $name);

        return true;
    }

    public static function getTransaction($id)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM transactions WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function rollbackTransaction($id)
    {
        global $pdo;

        $transaction = self::getTransaction($id);

        $stmt = $pdo->prepare('DELETE FROM transactions WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        self::giveCurrency($transaction['amount'], $transaction['fromUserId']);
        self::takeCurrency($transaction['amount'], $transaction['toUserId']);

        return true;
    }
}
