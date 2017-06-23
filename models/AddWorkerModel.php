<?php


namespace models;


use app\Application;
use models\worker\Profession;
use models\worker\Worker;
use PDO;

class AddWorkerModel
{

    /**
     * Сохраняет в базу нового сотрудника.
     * @param Worker $worker
     */
    public function setWorker(Worker $worker)
    {
        $profId = Profession::getProfIdByName($worker->profession);

        $q = ''.'INSERT INTO workers
                (firstname, lastname, id_prof, salary, photo)
            VALUES
                (:fname, :lname, :id, :salary, :photo)';

        $stmt = Application::$pdo->prepare($q);

        $stmt->execute([
            'fname' => $worker->firstName,
            'lname' => $worker->lastName,
            'id' => $profId,
            'salary' => $worker->salary,
            'photo' => $worker->img
        ]);
    }

}