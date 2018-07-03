<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
    <link href="../../../public/css/log.css" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="camagru">
        <div class="letter">Camagru</div>
        <div>
            <form name="login" action="/authorization/login" onsubmit="return validateForm()" method="POST">
                <div class="in">
                    <input type="text" name="email" placeholder="Имя пользователя или эл.адрес">
                    <input type="password" name="pass"placeholder="Пароль">
                </div>
                <div class="bott"><button>Войти</button></div>
            </form>
        </div>
        <div id="error" class = "error"><?=$error_email?></div>
        <div class="message_2"><a href="/authorization/forgotpass">Забыли пароль?</a></div>
    </div>
    <div class="login">
        <div class="message_3">Еще нет аккаунта? <a href="/authorization/registration" >Зарегистрируйтесь</a></div>
    </div>
    <div class="login">
        <div class="message_3"><a href="/galary/galary" >Просмотр галереи</a></div>
    </div>
</div>
<script src="../../../public/js/log.js"></script>
</body>
</html>