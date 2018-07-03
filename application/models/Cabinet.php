<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/19/18
 * Time: 2:33 PM
 */

namespace application\models;

class Cabinet extends \vendor\core\base\Model
{
    public $query = [];
    public $table = 'users';

    public function chosemethod($params){
        if(key($params) == 'login'){
            $this->login(htmlspecialchars(current($params)));
        }else if(key($params) == 'pass'){
            $this->pass(current($params));
        }else if(key($params) == 'f_s_name'){
            $this->f_s_name(htmlspecialchars(current($params)));
        }else if(key($params) == 'email'){
            $this->email(htmlspecialchars(current($params)));
        }else if(key($params) == 'check'){
            $this->check_box(current($params));
        }else
            return;
    }

    public function login($params){
        if(!$this->findOne($params, 'login')){
            $this->query = $this->findOne($_SESSION['login'], 'login');
            $this->query = $this->query[0]["id"];
            $old_login = "\"" . $_SESSION['login'] . "\"";
            $_SESSION['login'] = $params;
            $params = "\"" . $params  . "\"";
            $res = "UPDATE {$this->table} SET login=$params WHERE id={$this->query}";
            $this->query($res);
            $res = "UPDATE photo SET login=REPLACE(login, $old_login, $params)";
            $this->query($res);
            $res = "UPDATE likes SET login=REPLACE(login, $old_login, $params)";
            $this->query($res);
            $res = "UPDATE comments SET login=REPLACE(login, $old_login, $params)";
            $this->query($res);
        }else{
            return "Пользователь с таким 'Имя пользователя' <br> существует";
        }
    }


    public function email($params){
        if(!$this->findOne($params, 'email')){
            $this->query = $this->findOne($_SESSION['login'], 'login');
            $this->query = $this->query[0]["id"];
            $params = "\"" . $params  . "\"";
            $res = "UPDATE {$this->table} SET email=$params WHERE id={$this->query}";
            $this->query($res);
        }else{
            return "Пользователь с таким 'Эл.адрес' <br> существует";
        }
    }

    public function pass($params){
        $pass_new = "\"" . password_hash($params, PASSWORD_DEFAULT) . "\"";
        $pass_rep = "\"" . password_hash($params, PASSWORD_DEFAULT)  . "\"";
        $this->query = $this->findOne($_SESSION['login'], 'login');
        $this->query = $this->query[0]["id"];
        $res = "UPDATE {$this->table} SET pass=$pass_new WHERE id={$this->query}";
        $this->query($res);
        $res = "UPDATE {$this->table} SET rep_pass=$pass_rep WHERE id={$this->query}";
        $this->query($res);
    }

    public function f_s_name($params){
        $this->query = $this->findOne($_SESSION['login'], 'login');
        $this->query = $this->query[0]["id"];
        $params = "\"" . $params  . "\"";
        $res = "UPDATE {$this->table} SET f_s_name=$params WHERE id={$this->query}";
        $this->query($res);
    }

    public function check_box($params){
        $this->query = $this->findOne($_SESSION['login'], 'login');
        $check = $this->query[0]["notification"];
        $this->query = $this->query[0]["id"];
        if($params == 'true'){
            $res = "UPDATE {$this->table} SET notification=1 WHERE id={$this->query}";
            $this->query($res);
            echo "1";
            exit;
        }else if($params == 'false'){
            $res = "UPDATE {$this->table} SET notification=0 WHERE id={$this->query}";
            $this->query($res);
            echo "0";
            exit;
        }else{
            echo $check;
            exit;
        }
    }
}