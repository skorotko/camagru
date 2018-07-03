<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/26/18
 * Time: 6:14 PM
 */

namespace application\models;


class Likes extends \vendor\core\base\Model
{
    public $table = 'photo';

    public function control_likes(){
        $this->table = 'likes';

        $params1 = "\"" . $_POST['path']  . "\"";
        $params2 = "\"" . $_SESSION['login']  . "\"";
        $query = $this->findLikes2($params1, $params2);
        if(empty($query)){
            $this->add_who_likes();
        }else{
            $this->delete_who_likes($query[0]['id']);
        }
    }

    public function add_likes(){
        $this->table = 'photo';

        $query = $this->findOne($_POST['path'], 'photo_name');
        $query = $query[0]["id"];
        $res = "UPDATE {$this->table} SET likes=likes+1 WHERE id={$query}";
        $this->query($res);
    }

    public function add_who_likes(){
        $likes = [];
        $this->table = 'likes';

        $likes[0] = $_POST['path'];
        $likes[1] = $_SESSION['login'];
        $this->createLikes($likes);
        $this->add_likes();
    }

    public function delete_who_likes($id){
        $this->table = 'likes';
        $this->deleteLikes($id);
        $this->del_likes();
    }

    public function del_likes(){
        $this->table = 'photo';

        $query = $this->findOne($_POST['path'], 'photo_name');
        $query = $query[0]["id"];
        $res = "UPDATE {$this->table} SET likes=likes-1 WHERE id={$query}";
        $this->query($res);
    }
}