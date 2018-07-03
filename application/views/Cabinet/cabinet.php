<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/apply_shake.css">
    <title>Camagru</title>
    <link href= "../../../public/css/cabinet.css" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="camagru">
        <div class="letter">Camagru</div>
        <div>
            <form  id="form1" action = "/Cabinet/cabinet" name="register"  method="POST">
                <div class="in">
                    <input id="enteredLogin" name="login" type="text" placeholder="Имя пользователя">
                    <div class="bott"><button id="change_login" onclick="return getNameOfField(this.id)">Сменить логин</button></div>
                </div>
            </form>
                <p id="errorLogin" style="color: red; position: relative; text-align: center"></p>
            <form  id="form2" action = "/Cabinet/cabinet" name="register_2"  method="POST">
                <div class="in">
                    <input type="password" id="enteredPass" name="pass" placeholder="Новый пароль">
                    <input type="password" id="enteredRepass" name="pass_rep" placeholder="Повторите пароль">
                    <div class="bott"><button id="change_pass" onclick="return getNameOfField(this.id)">Сменить пароль</button></div>
                </div>
            </form>
                <p id="errorPass" style="color: red; position: relative; text-align: center"></p>
            <form  id="form3" action = "/Cabinet/cabinet" name="register_3"  method="POST">
                <div class="in">
                    <input type="text" id="enteredName" name="f_s_name" placeholder="Имя и фамилия">
                    <div class="bott"><button id="change_name" onclick="return getNameOfField(this.id)">Сменить имя</button></div>
                </div>
            </form>
                <p id="errorName" style="color: red; position: relative; text-align: center"></p>
            <form  id="form4" action = "/Cabinet/cabinet" name="register_4"  method="POST">
                <div class="in">
                    <input type="text" id="enteredMail" name="email" placeholder="Эл.адрес">
                    <div class="bott"><button id="change_mail" onclick="return getNameOfField(this.id)">Сменить email</button></div>
                </div>
            </form>
                <p id="errorMail" style="color: red; position: relative; text-align: center"></p>
                <div id="error_em_us" class="error"><?=$error_email?></div>
        </div>
        <div id="error" class="error"></div>
    </div>
    <div class="login">
        <div><form><input id="check" type="checkbox" onclick="return check_php()"><a>Включить уведомления</a></form></div>
    </div>
    <div class="login">
        <div><a href="/main/mainpage" >Вход на главную страницу</a></div>
    </div>
</div>
<script src="../../../public/js/reg.js"></script>
<script src="../../../public/js/cabinet.js"></script>
</body>
</html>