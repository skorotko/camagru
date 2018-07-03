<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 7/1/18
 * Time: 3:27 PM
 */

namespace application\models;


class DeletePhoto extends \vendor\core\base\Model
{
    public $table = 'photo';

    public function deleteUserPhoto($photo) {
        $query = $this->findOne($photo, 'photo_name');
        if($query[0]['login'] === $_SESSION['login']) {
            $this->deletePhoto("\"" . $photo . "\"");
            $this->deleteComments("\"" . $photo . "\"");
            $this->delLikes("\"" . $photo . "\"");
        }else{
            exit;
        }
    }
}