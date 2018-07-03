<?php
/**
 * Created by PhpStorm.
 * User: skorotko
 * Date: 6/29/18
 * Time: 3:37 PM
 */

namespace application\models;


class Comments extends \vendor\core\base\Model
{
    public function add_comment(){
        $comments = [];
        $this->table = 'likes';

        $comments[0] = htmlspecialchars(stripslashes($_POST['photo']));
        $comments[1] = $_SESSION['login'];
        $comments[2] = htmlspecialchars(stripslashes("<b>" . "<p align='left'>" . $_SESSION['login'] . ":" . "<p>" . "</b>" . "<p align='left'>" . $_POST['comment'] . "<p>"));
        $this->addcomments($comments);
        $this->table = 'photo';
        $findUserPhoto = $this->findOne($_POST['photo'], "photo_name");
        if ($findUserPhoto[0]['login'] !== $_SESSION['login']) {
            $this->table = 'users';
            if ($findMail = $this->findOne($findUserPhoto[0]['login'], "login")) {
                if ($findMail[0]['notification']) {
                    $this->sendNotification($findMail[0]['email']);
                }
            }
        }
        echo $_SESSION['login'];
        exit;
    }

    public function view_comments(){
        $tmpComments = '';
        $allComments = $this->findAllComments("\"" . $_POST['commentId'] . "\"");
        $allComments = array_reverse($allComments);
        if (!count($allComments)) {
            echo "";
            exit;
        }else {
            foreach ($allComments as $key => $value) {
                $tmpComments = $tmpComments . htmlspecialchars_decode($value['comment']);
            }
            echo $tmpComments;
            exit;
        }
    }

    public function sendNotification($mail){
        $encoding = "utf-8";
        $from_name = "Camagru Notification";
        $from_mail = "vsarapin@student.unit.ua";
        $mail_subject = "You have new comment";
        $mail_message = "Вам оставили комментарий под Вашим фото";
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );
        $header = "Content-type: text/html; charset=" . $encoding . " \r\n";
        $header .= "From: " . $from_name . " <" . $from_mail . "> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: " . date("r (T)") . " \r\n";
        $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);
        mail($mail, $mail_subject, $mail_message, $header);
    }
}

