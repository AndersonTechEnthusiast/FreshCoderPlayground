let IconEyeOpenLogin = document.getElementById("eye-openLogin");
let IconEyeCloseLogin = document.getElementById("eye-closeLogin");
let ValuePassword = document.getElementById("passwordLogin");

function EyeOpenLogin(){
    IconEyeOpenLogin.style.display = "none";
    IconEyeCloseLogin.style.display = "block";
    ValuePassword.type = "text";
}
function EyeCloseLogin(){
    IconEyeOpenLogin.style.display = "block";
    IconEyeCloseLogin.style.display = "none";
    ValuePassword.type = "password";
}

IconEyeOpenLogin.addEventListener("click", EyeOpenLogin);
IconEyeCloseLogin.addEventListener("click",EyeCloseLogin);
