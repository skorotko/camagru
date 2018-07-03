function  validateForm() {
    var valid = true;
    var email = document.forms["login"]["email"].value;
    var my_div = null;
    var pass = document.forms["login"]["pass"].value;
    var input_0 = document.getElementsByTagName("input");
    var camagru = document.getElementsByClassName("camagru");

    if(email==null || email=="")
    {
        input_0[0].style.borderColor = "red";
        my_div = document.getElementById("error");
        valid =  false;
    }
    else
        input_0[0].style.borderColor = "green";
    if(pass==null || pass=="")
    {
        input_0[1].style.borderColor = "red";
        my_div = document.getElementById("error");
        camagru[0].style.height = "335px";
        my_div.innerHTML = "К сожалению, вы ввели неверный<br>пароль. Проверьте свой пароль еще<br> раз.";
        valid =  false;
    }
    else
        input_0[1].style.borderColor = "green";
    if(document.getElementById("error").innerHTML.length != 0){
        input_0[0].style.borderColor = "red";
        input_0[1].style.borderColor = "red";
        camagru[0].style.height = "335px";
    }
    return valid;
}