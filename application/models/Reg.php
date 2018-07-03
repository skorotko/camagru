<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 5/25/18
 * Time: 3:38 PM
 */

namespace application\models;


class Reg extends \vendor\core\base\Model{

    public $table = 'users';
    public $error_login;
    public $query;

    public function check_params($params){
        $params[1] = htmlspecialchars($params[1]);
        $params[2] = htmlspecialchars($params[2]);
        if(!$this->findOne($params[0], 'email')){
            if(!$this->findOne($params[2], 'login')){
                $params[3] = password_hash($params[3], PASSWORD_DEFAULT);
                $params[4] = password_hash($params[4], PASSWORD_DEFAULT);
                $params[5] = md5(uniqid(rand(), true));
                $params[6] = 0;
                $this->createUsers($params);
                mail("$params[0]", "Подтверждение регистрации", "Для продолжения регистрации перейдите по ссылке 10.111.2.4:8080/authorization/access/$params[5].");
            }else{
                return "Пользователь с таким 'Имя пользователя' <br> существует";
            }
        }else{
            return "Пользователь с таким 'Эл.адрес' <br> существует";
        }
    }

    public function ver($query){
        if(($this->query = $this->findOne($query, 'verif_reg'))) {
            $this->query = $this->query[0]["id"];
            $res = "UPDATE {$this->table} SET access_reg=1 WHERE id={$this->query}";
            $this->query($res);
            $res = "UPDATE {$this->table} SET verif_reg=NULL WHERE id={$this->query}";
            $this->query($res);
        }else
        {
            header("location: /error/404");
        }
    }

}
