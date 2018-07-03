<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/8/18
 * Time: 3:27 PM
 */

namespace application\controllers;

use application\models\Maincam;
use application\models\Mainpage;

class MainController extends AppController{

    public function mainpageAction(){
        session_start();
        if(!isset($_SESSION['login'])){
            header("location: /authorization/login");
            exit;
        }
        $this->login = $_SESSION['login'];
        $model = new Mainpage;
        $this->photo = $model->photo_upload();
        if(!empty($_POST))
        {
            $model = new Maincam;
            $model->savefoto($_POST['imageDataURL'], substr($_POST['src'], 0, -1));
        }
    }
}