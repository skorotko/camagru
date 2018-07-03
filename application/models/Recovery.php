<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/11/18
 * Time: 4:37 PM
 */

namespace application\models;


class Recovery extends \vendor\core\base\Model{

    public $query;
    public $table = 'users';

    public function rec_pass($params){
        if($this->query = $this->findOne($params[0], 'email')){
            $pass = uniqid();
            $pass_new = "\"" . password_hash($pass, PASSWORD_DEFAULT) . "\"";
            $pass_rep = "\"" . password_hash($pass, PASSWORD_DEFAULT)  . "\"";
            $this->query = $this->query[0]["id"];
            $res = "UPDATE {$this->table} SET pass=$pass_new WHERE id={$this->query}";
            $this->query($res);
            $res = "UPDATE {$this->table} SET rep_pass=$pass_rep WHERE id={$this->query}";
            $this->query($res);
            mail("$params[0]", "Восстановление пароля", "Был сгенерирован новый пароль $pass, для изменения пароля перейдиете в личный кабинет.");
        }else{
            echo "nizz9";
        }
    }
}