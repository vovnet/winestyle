<?php


namespace controllers;


use models\SalaryModel;
use models\worker\Profession;
use views\View;

class SalaryController extends ControllerBase
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
        $this->model = new SalaryModel();
    }

    /**
     * Страница с начислением зарплаты/премии по профессиям.
     */
    public function actionIndex()
    {
        $exec = false;

        if (!empty($_POST)) {
            $exec = true;
            $profName = htmlspecialchars($_POST['prof']);
            $bonus = (int)$_POST['bonus'];
            $date = htmlspecialchars($_POST['date']). '-01';
            $this->model->setSalary($profName, $bonus, $date);
        }

        $professions = Profession::getProfessions();
        $this->view->render('salary', ['professions' => $professions, 'exec' => $exec]);
    }
}