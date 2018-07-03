<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 7/2/18
 * Time: 12:12 PM
 */

namespace application\controllers;


use application\models\Galary;

class GalaryController extends AppController
{
    public function galaryAction(){
        $model = new Galary();
        $this->photo = $model->view();
    }
}