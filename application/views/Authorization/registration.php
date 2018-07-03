<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
    <link href= "../../../public/css/reg.css" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="camagru">
        <div class="letter">Camagru</div>
        <div class="message">Зарегистрируйтесь, чтобы <br>смотреть фото и видео ваших<br> друзей.</div>
        <div>
            <form  id="form1" action = "/authorization/verification" name="register"  method="POST">
                <div class="in">
                    <input type="text" name="email" placeholder="Эл.адрес">
                    <input type="text" name="f_s_name" placeholder="Имя и фамилия">
                    <input type="text" name="login" placeholder="Имя пользователя">
                    <input type="password" name="pass"placeholder="Пароль">
                    <input type="password" name="pass_rep"placeholder="Повторите пароль">
                </div>
                <div class="bott" onclick="return validateForm()"><button>Регистрация</button></div>
                <div id="error_em_us" class="error"><?=$error_email?></div>
            </form>
        </div>
        <div id="error" class="error"></div>
    </div>
    <div class="login">
        <div class="message_3">Есть аккаунт? <a href="/authorization/login" >Вход</a></div>
    </div>
</div>
<script src="../../../public/js/reg.js"></script>
</body>
</html>