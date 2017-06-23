<?php
/**
 * Created by PhpStorm.
 * User: Anonimous
 * Date: 20.06.2017
 * Time: 11:30
 */

namespace views;


class View
{
    /**
     * @var string Имя шаблона по умолчанию.
     */
    public $layout = 'main_layout';


    /**
     * Отрисовка страницы.
     * @param $viewName Имя отображения.
     * @param null $data Данные.
     * @param bool|true $isLayout Нужно ли подключать общий шаблон.
     */
    public function render($viewName, $data = null, $isLayout = true)
    {
        if ($data != null && is_array($data)) {
            extract($data);
        }

        if ($isLayout) {
            include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR
                . 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR
                . $this->layout . '.php';
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR
                . $viewName . '.php';
        }
    }
}