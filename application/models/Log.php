<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/8/18
 * Time: 1:11 PM
 */

namespace application\models;


class Log extends \vendor\core\base\Model{

    public $query;
    public $table = 'users';

    public function check_user_pass($params){
        $params[0] = htmlspecialchars($params[0]);
        if(($this->query = $this->findOne($params[0], 'email')) || ($this->query = $this->findOne($params[0], 'login'))){
            $pass = $this->query[0]["pass"];
            if(password_verify("$params[1]", "$pass")){
                if($this->query[0]["access_reg"] == 1){
                    session_start();
                    $_SESSION['login'] = $this->query[0]["login"];
                    header("location: /main/mainpage");
            }else{
                 return "Подтвердите email";
            }
            }else{
                return "Неверный пользователь или пароль";
            }
        }else{
            return "Неверный пользователь или пароль";
        }
    }
}
