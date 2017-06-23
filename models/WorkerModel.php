<?php

namespace models;


use app\Application;
use app\Currency;
use PDO;

class WorkerModel
{

    public function getAllWorkers($date)
    {
        $q = "" . "SELECT w.id, w.firstname, w.lastname, prof.prof, w.photo, p.salary + p.bonus salary
            FROM workers w LEFT JOIN payment p
                ON w.id = p.id_worker
            LEFT JOIN professions prof
                ON w.id_prof = prof.id
            WHERE p.month = :date
            ORDER BY salary DESC";

        $stmt = Application::$pdo->prepare($q);
        $stmt->execute(['date' => $date]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as &$row) {
            preg_match('/(.+)?\.(.+)?$/', $row['photo'], $output);
            $row['thumb'] = $output[1] . '_thumb.' . $output[2];
            $row['salary'] = Currency::get($row['salary']);
        }

        return $res;
    }

    public function getSingleWorker($id)
    {
        $q = "" . "SELECT w.id, w.firstname, w.lastname, w.photo, w.salary, p.prof
            FROM workers w LEFT JOIN professions p
            ON w.id_prof = p.id
            WHERE w.id = :id";

        $stmt = Application::$pdo->prepare($q);
        $stmt->execute(['id' => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        $res['salary'] = Currency::get($res['salary']);

        return $res;
    }
}