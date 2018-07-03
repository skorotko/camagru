<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 5/25/18
 * Time: 1:12 PM
 */

namespace application\controllers;

use application\models\Log;
use application\models\Recovery;
use application\models\Reg;

class AuthorizationController extends AppController{

    public $params = [];
    public $error;
    public $query = [];

    public function loginAction(){
        $model = new Log;
        if(!empty($_POST['email']) && !empty($_POST['pass'])){
            $this->params = [$_POST['email'], $_POST['pass']];
            $this->error = $model->check_user_pass($this->params);
            if($this->error){
                $this->error_email = $this->error;
            }
        }
    }

    public function forgotpassAction(){
        $model = new Recovery;
        if(!empty($_POST['email'])){
            $this->params = [$_POST['email']];
            $this->error = $model->rec_pass($this->params);
        }
    }

    public function registrationAction(){

    }

    public function verificationAction(){
        $model = new Reg;
        if(!empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['pass_rep'])){
            $this->params = [$_POST['email'], $_POST['f_s_name'], $_POST['login'], $_POST['pass'], $_POST['pass_rep']];
            $this->error = $model->check_params($this->params);
            if($this->error){
                $this->error_email = $this->error;
            }
        }
    }

    public function accessAction(){
        $model = new Reg;
        $this->query = rtrim($_SERVER['QUERY_STRING'], '/');
        $this->query = explode("/", $this->query);
        $model->ver($this->query[2]);
    }
}