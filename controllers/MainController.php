<?php

namespace controllers;


use app\Application;
use models\worker\Worker;
use models\WorkerModel;
use views\View;

class MainController extends ControllerBase
{
    public $view;
    public $model;

    function __construct()
    {
        $this->view = new View();
        $this->model = new WorkerModel();
    }

    /**
     * Выводит данные о зарплатах сотрудников за указанный месяц.
     */
    public function actionIndex()
    {
        $date = '2017-01-01';

        if (isset(Application::$rout->routes[3])) {
            $date = Application::$rout->routes[3];
        }

        $this->view->render('main', ['workers' => $this->model->getAllWorkers($date)]);
    }

    /**
     * Отправляет json данные о сотруднике запрашиваемом через POST.
     */
    public function actionWorker()
    {
        $data = $this->model->getSingleWorker($_POST['id']);
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        echo $json;
    }
}