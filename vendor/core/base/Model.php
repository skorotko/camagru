<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 5/25/18
 * Time: 3:37 PM
 */

namespace vendor\core\base;

use vendor\core\Db;


abstract class Model{
    protected $pdo;
    protected $table;
    protected $pk = 'id';

    public function __construct(){
        $this->pdo = Db::instance();
    }

    public function query($sql){
        return $this->pdo->execute($sql);
    }

    public function findAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = ''){
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = []){
        return $this->pdo->query($sql, $params);
    }

    public function findLike($str, $filed, $table = ''){
        $table = $table ?: $this->table;
        $sql  = "SELECT * FROM $table WHERE $filed LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }

    public function createUsers($params = []){
        $sql = "INSERT INTO users (email, f_s_name, login, pass, rep_pass, verif_reg, access_reg) VALUES (?,?,?,?,?,?,?)";
        return $this->pdo->execute($sql, $params);
    }

    public function createPhoto($params = []){
        $sql = "INSERT INTO photo (photo_name, login) VALUES (?,?)";
        return $this->pdo->execute($sql, $params);
    }

    public function createLikes($params = []){
        $sql = "INSERT INTO likes (path, login) VALUES (?,?)";
        return $this->pdo->execute($sql, $params);
    }

    public function findLikes2($params1, $params2){
        $sql = "SELECT * FROM {$this->table} WHERE path=$params1 AND login=$params2";
        return $this->pdo->query($sql);
    }

    public function deleteLikes($id){
        $sql = "DELETE FROM likes WHERE id = $id";
        return $this->pdo->execute($sql);
    }

    public function addcomments($params = []){
        $sql = "INSERT INTO comments (path, login, comment) VALUES (?,?,?)";
        return $this->pdo->execute($sql, $params);
    }

    public function findAllComments($photo) {
        $sql = "SELECT * FROM comments WHERE path = $photo";
        return $this->pdo->query($sql);
    }
    public function deletePhoto($photo) {
        $sql = "DELETE FROM photo WHERE photo_name = $photo";
        return $this->pdo->execute($sql);
    }
    public function deleteComments($photo) {
        $sql = "DELETE FROM comments WHERE path = $photo";
        return $this->pdo->execute($sql);
    }
    public function delLikes($photo) {
        $sql = "DELETE FROM likes WHERE path = $photo";
        return $this->pdo->execute($sql);
    }
}