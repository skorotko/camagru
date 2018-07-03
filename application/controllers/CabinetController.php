<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/18/18
 * Time: 5:29 PM
 */

namespace application\controllers;


use application\models\Cabinet;

class CabinetController extends AppController
{
    public function cabinetAction()
    {
        session_start();
        if (!isset($_SESSION['login'])) {
            header("location: /authorization/login");
            exit;
        }
        $model = new Cabinet;
        $model->chosemethod($_POST);

    }

    public function outAction()
    {
        session_start();
        unset($_SESSION['login']);
        header("location: /authorization/login");
    }
}