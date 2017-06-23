<?php


namespace controllers;


use models\AddWorkerModel;
use models\worker\Profession;
use models\worker\Worker;
use views\View;

class WorkerController extends ControllerBase
{
    public $view;
    public $model;

    function __construct()
    {
        $this->view = new View();
        $this->model = new AddWorkerModel();
    }

    /**
     * Отображает страницу с добавлением нового сотрудника.
     */
    public function actionAdd()
    {
        $exist = false;
        if (!empty($_POST)) {
            $exist = true;
            $success = $this->addWorker();
        }

        $professions = Profession::getProfessions();

        $this->view->render('add_worker', [
            'professions' => $professions,
            'exist' => $exist,
            'success' => $success
        ]);
    }

    private function addWorker()
    {
        $worker = new Worker();
        $worker->firstName = htmlspecialchars($_POST['firstname']);
        $worker->lastName = htmlspecialchars($_POST['lastname']);
        $worker->profession = htmlspecialchars($_POST['prof']);
        $worker->salary = (int)$_POST['salary'];

        if ($worker->firstName == ''
            || $worker->lastName == ''
            || $worker->profession == ''
            || $worker->salary == 0
        ) {
            return false;
        }

        $worker->img = $this->loadImage();
        if ($worker->img == null) {
            $worker->img = '/images/no/no_photo.jpg';
        }

        $this->model->setWorker($worker);

        return true;
    }

    private function loadImage()
    {
        if ($_FILES['photo']['error'] == 0) {
            $folderName = $this->generateFolderName();
            $pathFolder = $_SERVER['DOCUMENT_ROOT'] . '/images/' . $folderName;
            if (!mkdir($pathFolder, 0700)) {
                die('Не удалось создать папку');
            }

            $imgPath = $pathFolder . '/' . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], $imgPath);

            preg_match('/(.+)?\.(.+)?$/', $_FILES['photo']['name'], $output);
            $thumbName = $output[1] . '_thumb.' . $output[2];
            $this->make_thumb($imgPath, $pathFolder, 48, $thumbName);

            return '/images/' . $folderName . '/' . $_FILES['photo']['name'];
        }

        return null;
    }

    private function generateFolderName()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $result = '';
        for ($i = 0; $i < 8; $i++)
            $result .= $characters[mt_rand(0, 36)];
        return $result;
    }

    private function make_thumb($src, $dest, $desiredWidth, $imgName)
    {
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        $desired_height = floor($height * ($desiredWidth / $width));

        $virtual_image = imagecreatetruecolor($desiredWidth, $desired_height);

        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desiredWidth, $desired_height, $width, $height);

        imagejpeg($virtual_image, $dest . '/' . $imgName);
    }
}