<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/21/18
 * Time: 5:33 PM
 */

namespace application\models;


class Maincam extends \vendor\core\base\Model
{
    public $table = 'photo';
    public $photo = [];

    public function savefoto($params, $sticker){
        $img = $params;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img = base64_decode($img);
        $img1 = imagecreatefromstring($img);
        if($sticker !== 'false') {
            $img2 = imagecreatefrompng($sticker);
            if ($img1 and $img2) {
                $x2 = imagesx($img2);
                $y2 = imagesy($img2);
                imagecopyresampled($img1, $img2, 90, 20, 0, 0, $x2, $y2, $x2, $y2);
                header('Content-type: image/jpeg');
                $img = uniqid() . '.jpeg';
                imagejpeg($img1, "images_users/$img");
            }
        }else{
            header('Content-type: image/jpeg');
            $img = uniqid() . '.jpeg';
            imagejpeg($img1, "images_users/$img");
        }
        $this->photo[0] = '/images_users/' . $img;
        $this->photo[1] = $_SESSION['login'];
        $this->createPhoto($this->photo);
        exit;
    }
}