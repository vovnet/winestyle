<?php

namespace controllers;


use views\View;

class CourseController
{
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    /**
     * Отображает страницу с настройками курса валют.
     */
    public function actionIndex()
    {
        session_start();

        if (!empty($_POST)) {
            $_SESSION['currency'] = htmlspecialchars($_POST['currency']);
            $_SESSION['rate'] = (float)$_POST['rate'];
        }

        $isRub = true;
        $rate = 0;

        if (isset($_SESSION['currency']) && isset($_SESSION['rate'])) {
            $isRub = ($_SESSION['currency'] == 'rus') ? true : false;
            $rate = $_SESSION['rate'];
        }

        $this->view->render('course', ['isRub' => $isRub, 'rate' => $rate]);
    }
}