let LoginValue = document.getElementById("emailLogin");
let borderLoginValue = document.getElementById("emailcontainer");
let menssageErrorLoginValue = document.getElementById("Menssage-EmailLogin");
let IconeEmailInputEmailLogin = document.getElementById("IconEmail");

let PasswordValue = document.getElementById("passwordLogin");
let borderPasswordValue = document.getElementById("passwordcontainer");
let menssageErrorPasswordValue = document.getElementById("Menssage-PasswordLogin");
let IconePasswordInputPasswordLogin = document.getElementById("IconPassword");

let ButtonSubmitEnviar = document.getElementById("EnviarSubmitLogin");
function InputLogin_Email(){
    const RegexEmailLogin = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if(RegexEmailLogin.test(LoginValue.value)){
        borderLoginValue.style.transition = "1s";
        borderLoginValue.style.border = "2px groove rgb(0,255,0)";
        IconeEmailInputEmailLogin.style.transition = "1s";
        IconeEmailInputEmailLogin.style.background = "rgb(0,255,0)";
        IconeEmailInputEmailLogin.style.backgroundClip = "text";
        IconeEmailInputEmailLogin.style.webkitBackgroundClip = "text";
        IconeEmailInputEmailLogin.style.color = "transparent";
        LoginValue.style.transition = "1s";
        LoginValue.style.color = "rgb(0,255,0)";
        menssageErrorLoginValue.style.display = "none";
        return true;
    }
    else{
        borderLoginValue.style.transition = "1s";
        borderLoginValue.style.border = "2px groove red";
        IconeEmailInputEmailLogin.style.transition = "1s";
        IconeEmailInputEmailLogin.style.background = "red";
        IconeEmailInputEmailLogin.style.backgroundClip = "text";
        IconeEmailInputEmailLogin.style.webkitBackgroundClip = "text";
        IconeEmailInputEmailLogin.style.color = "transparent";
        LoginValue.style.transition = "1s";
        LoginValue.style.color = "red";
        menssageErrorLoginValue.style.display = "block";
        menssageErrorLoginValue.style.color = "red";
        menssageErrorLoginValue.style.width = "100%";
        menssageErrorLoginValue.style.alignItems = "center";
        menssageErrorLoginValue.style.fontFamily = "'Montserrat',sans-serif";
        menssageErrorLoginValue.textContent = "Insira um E-mail Válido";
        return false;
    }
}
function InputPassword_Email(){
    if(PasswordValue.value.length >= 8){
        PasswordValue.value = PasswordValue.value.slice(0,8);
        borderPasswordValue.style.transition = "1s";
        borderPasswordValue.style.border = "2px groove rgb(0,255,0)";
        PasswordValue.style.transition = "1s";
        PasswordValue.style.color = "rgb(0,255,0)";
        IconePasswordInputPasswordLogin.style.transition = "1s";
        IconePasswordInputPasswordLogin.style.background = "rgb(0,255,0)";
        IconePasswordInputPasswordLogin.style.backgroundClip = "text";
        IconePasswordInputPasswordLogin.style.webkitBackgroundClip = "text";
        IconePasswordInputPasswordLogin.style.color = "transparent";
        menssageErrorPasswordValue.style.display = "none";
        return true;
    }else{
        borderPasswordValue.style.transition = "1s";
        borderPasswordValue.style.border = "2px groove red";
        PasswordValue.style.transition = "1s";
        PasswordValue.style.color = "red";
        IconePasswordInputPasswordLogin.style.transition = "1s";
        IconePasswordInputPasswordLogin.style.background = "red";
        IconePasswordInputPasswordLogin.style.backgroundClip = "text";
        IconePasswordInputPasswordLogin.style.webkitBackgroundClip = "text";
        IconePasswordInputPasswordLogin.style.color = "transparent";
        menssageErrorPasswordValue.style.display = "block";
        menssageErrorPasswordValue.style.color = "red";
        menssageErrorPasswordValue.style.fontFamily = "'Montserrat',sans-serif";
        menssageErrorPasswordValue.textContent = "A senha deve conter pelo menos 8 caracteres";
    }
}
function SubmitEnviarLogin(event){
    if(
        InputLogin_Email() == true,
        InputPassword_Email() == true
    ){
        return true;        
    }else{
        event.preventDefault();
        alert("Error: as Diretrizes do Formulario não estão condizentes");
    }
}
LoginValue.addEventListener('input',InputLogin_Email);
PasswordValue.addEventListener('input',InputPassword_Email);
ButtonSubmitEnviar.addEventListener('click',SubmitEnviarLogin);