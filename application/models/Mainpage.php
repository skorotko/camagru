<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/24/18
 * Time: 4:06 PM
 */

namespace application\models;


class Mainpage extends \vendor\core\base\Model
{
    public $table = 'photo';
    public $photos;
    public $photo = '';

    public function photo_upload(){
        $counter = 0;
        $this->photos = $this->findAll();
        $this->photos = array_reverse($this->photos);
        foreach ($this->photos as $key) {
            $likes = $key['likes'];
            $src = $key['photo_name'];
            $pSrc = $src . "1";
            $aSrc = $src . "2";
            $dSrc = $src . "3";
            $rSrc = $src . "6";
                $counter++;
                $tmpCounter = $counter . "a";
                $this->photo = $this->photo
                    . "<div id='$tmpCounter' class=\"container_tmp hide\">"
                    . "<div class=\"row center-align\">"
                    . "<div class=\"col s12 grey darken-4\" style='border-radius: 5px'>"
                    . "<div style='display: flex; flex-direction: column'>"
                    . "<div>"
                    . "<img style='margin-top: 10px; width: 300px' width='200' src=" . "\"" . $key['photo_name'] . "\">"
                    . "</div>"
                    . "<div style='display: flex; justify-content: space-between; align-items: center'>"
                    . "<div>"
                    . "<figcaption>" . "<a id='$aSrc' onclick='addComment(this.id)'><div style='color: white; font-size: 15px'>Коментарии</div></a>"
                    . "</div>"
                    . "<div id='$pSrc'  class='p_like_img'>$likes</div>"
                    . "<img id=\"$src\" width='30px' height='30px' style='color: white' src=" . "\"" . "/images/like.png" . "\" class='like_img' onclick=\"addLike(this.id)\">"
                    . "</figcaption>"
                    . "<div>"
                    . "<div id='$rSrc' style='color: white; font-size: 15px; cursor: pointer' onclick='deletePhotos(this.id)'>Удалить</div>"
                    . "</div>"
                    . "</div>"
                    . "<div id='$dSrc'>"
                    . "</div></div></div></div></div>";
            }
        return $this->photo;
    }
}