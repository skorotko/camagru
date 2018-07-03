<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
    <link href="../../../public/css/forgotpass.css" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="camagru">
        <div class="letter">Camagru</div>
        <div class="message">Чтобы восстановить пароль,<br>введите ваш<br>email.</div>
        <div>
            <form name="login" action="/authorization/forgotpass" onsubmit="return validateForm()" method="POST">
                <div class="in">
                    <input type="text" name="email" placeholder="Эл.адрес">
                </div>
                <div class="bott"><button>Восстановить</button></div>
            </form>
        </div>
        <div id="error" class = "error"><?=$error_email?></div>
    </div>
    <div class="login">
        <div class="message_3">Еще нет аккаунта? <a href="/authorization/registration" >Зарегистрируйтесь</a></div>
        <div class="message_3">Или <a href="/authorization/login" >Войти</a></div>
    </div>
</div>
<script src="../../../public/js/log.js"></script>
</body>
</html>