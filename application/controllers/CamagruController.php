<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/26/18
 * Time: 5:47 PM
 */

namespace application\controllers;


use application\models\Comments;
use application\models\DeletePhoto;
use application\models\Likes;

class CamagruController extends AppController{

    public function likesAction(){
        session_start();
        $model = new Likes;
        $model->control_likes();
        /*MainController::mainpage();*/
        exit;
    }

    public function loadCommentsAction(){
        session_start();
        $model = new Comments();
        $model->view_comments();
        exit;
    }

    public function commentsAction(){
        session_start();
        $model = new Comments();
        $model->add_comment();
        exit();
    }

    public function deletePhotoAction(){
        session_start();
        $model = new DeletePhoto();
        $model->deleteUserPhoto($_POST['deleteId']);
        exit;
    }
}