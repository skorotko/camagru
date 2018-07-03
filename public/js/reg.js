function  validateForm() {
    var valid = true;
    var email = document.forms["register"]["email"].value;
    var atpos_email = email.indexOf("@");
    var dotpos_email = email.lastIndexOf(".");
    var my_div = null;
    var login = document.forms["register"]["login"].value;
    var pass = document.forms["register"]["pass"].value;
    var pass_rep = document.forms["register"]["pass_rep"].value;
    var camagru = document.getElementsByClassName("camagru");
    var input_0 = document.getElementsByTagName("input");

    if(email==null || email=="")
    {
        input_0[0].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Поля обязательные к заполнению!";
        valid =  false;
    }
    else if(atpos_email < 1 || dotpos_email < atpos_email + 2 || dotpos_email + 2 >= email.length)
    {
        input_0[0].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Введите валидный адрес!";
        valid = false;
    }
    else
        input_0[0].style.borderColor = "green";
    if(login==null || login=="")
    {
        input_0[2].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Поля обязательные к заполнению!";
        valid =  false;
    }
    else if(login.length <= 4 || login.length >= 20)
    {
        input_0[2].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Введите логин от 4 до 20 символов!";
        valid = false;
    }
    else if(/^[a-zA-Z1-9]+$/.test(login) === false){
        input_0[2].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "В логине должны быть<br>только латинские буквы!";
        valid = false;
    }
    else if(parseInt(login.substr(0, 1))){
        input_0[2].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Логин должен начинаться с буквы!";
        valid = false;
    }
    else
        input_0[2].style.borderColor = "green";
    if(pass==null || pass=="")
    {
        input_0[3].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Поля обязательные к заполнению!";
        valid =  false;
    }
    else if(/(?=.*[0-9])/.test(pass) === false){
        input_0[3].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Пароль должен содержать<br>хотя бы одно число!";
        valid =  false;
    }
    else if(/(?=.*[a-z])/.test(pass) === false){
        input_0[3].style.borderColor = "red";
        my_div = document.getElementById("error");
        camagru[0].style.height = "630px";
        my_div.innerHTML = "Пароль должен содержать<br>хотя бы одну латинскую букву <br>в нижнем регистре!";
        valid =  false;
    }
    else if(/(?=.*[A-Z])/.test(pass) === false){
        input_0[3].style.borderColor = "red";
        my_div = document.getElementById("error");
        camagru[0].style.height = "630px";
        my_div.innerHTML = "Пароль должен содержать<br>хотя бы одну латинскую букву <br>в верхнем регистре!";
        valid =  false;
    }
     else if(/[0-9a-zA-Z]{6,}/.test(pass) === false){
        input_0[3].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Пароль должен содержать<br>не менее 6 символов!";
        valid =  false;
     }
    else
        input_0[3].style.borderColor = "green";
    if(pass_rep==null || pass_rep=="")
    {
        input_0[4].style.borderColor = "red";
        my_div = document.getElementById("error");
        my_div.innerHTML = "Поля обязательные к заполнению!";
        valid =  false;
    }
    else if(pass != pass_rep)
    {
        my_div = document.getElementById("error");
        my_div.innerHTML = "Пароли не совпадают!";
        input_0[4].style.borderColor = "red";
        valid = false;
    }
    else
        input_0[4].style.borderColor = "green";
    if(document.getElementById("error_em_us").innerHTML.length != 0){
        /*document.getElementById("error_em_us").style.display = 'none';*/
        document.getElementById("error_em_us").innerHTML = '';
        valid = false;
    }
    return valid;
}