<?php

namespace models\worker;


use app\Application;
use PDO;

class Profession
{
    public static function getProfIdByName($prof)
    {
        $profQuery = 'SELECT id FROM professions WHERE prof = :prof';
        $stmt = Application::$pdo->prepare($profQuery);
        $stmt->execute(['prof' => $prof]);
        return $stmt->fetch()['id'];
    }

    public static function getProfessions()
    {
        $stmt = Application::$pdo->query('SELECT id, prof FROM professions');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}