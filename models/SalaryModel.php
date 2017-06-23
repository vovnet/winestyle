<?php


namespace models;


use app\Application;
use PDO;

class SalaryModel
{

    /**
     * Начисляет зарплату сотрудникам переданной профессии.
     * @param $profName Название профессии.
     * @param $bonus Размер премии.
     * @param $date За какой месяц начислить.
     */
    public function setSalary($profName, $bonus, $date)
    {
        $q = '' . 'SELECT w.id, w.salary FROM workers w
            JOIN professions p
            ON w.id_prof = p.id
            WHERE p.prof = :prof';

        $stmt = Application::$pdo->prepare($q);
        $stmt->execute(['prof' => $profName]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $row) {
            $q = '' . 'INSERT INTO payment
                (id_worker, month, salary, bonus)
                VALUES (:id, :month, :salary, :bonus)';

            $stmt = Application::$pdo->prepare($q);

            $stmt->execute([
                'id' => $row['id'],
                'month' => $date,
                'salary' => $row['salary'],
                'bonus' => $bonus
            ]);
        }


    }
}