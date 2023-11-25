let UserValue = document.getElementById("User");
let borderUser = document.getElementById("usuariocontainer");
let iconeUserCadastrar = document.getElementById("IconUser");
let menssageErrorUsuarioCadastrar = document.getElementById("menssage-UserCadastrar");

let EmailCadastrarValue = document.getElementById("emailCadastrar")
let borderEmailCadastrar = document.getElementById("containeremail-Cadastrar");
let iconeEmailCadastrar = document.getElementById("iconEmailCadastrar");
let menssageErrorEmailCadastrar = document.getElementById("menssage-EmailCadastrar");

let TelefonecadastrarValue = document.getElementById("Telefone");
let borderTelefoneCadastrar = document.getElementById("containertelefone");
let iconeTelefoneCadastrar = document.getElementById("iconTelefone");
let menssageErrorTelefoneCadastrar = document.getElementById("menssage-TelefoneCadastrar");

let PasswordCadastrarValue = document.getElementById("passwordCadastrar");
let borderPasswordCadastrar = document.getElementById("containerpassword-Cadastrar");
let iconePassowordCadastrar = document.getElementById("IconPasswordCadastrar");
let menssageErrorPasswordCadastrar = document.getElementById("menssage-Passwordcadastrar");

let ButtonEnviarCadastrar = document.getElementById("EnviarSubmitCadastrar");
function UsuarioVerificacion(){
    UserValue.value = UserValue.value.replace(/\d/g,'');
    if(UserValue.value.length >= 40 || UserValue.value.length >= 30 || UserValue.value.length >= 20 || UserValue.value.length >= 10){
        UserValue.value = UserValue.value.slice(0,40);
        borderUser.style.transition = "1s";
        borderUser.style.border = "2px groove rgb(0,255,0)";
        UserValue.style.transition = "1s";
        UserValue.style.color = "rgb(0,255,0)";
        iconeUserCadastrar.style.transition = "1s";
        iconeUserCadastrar.style.background = "rgb(0,255,0)";
        iconeUserCadastrar.style.backgroundClip = "text";
        iconeUserCadastrar.style.webkitBackgroundClip = "text";
        iconeUserCadastrar.style.color = "transparent";
        menssageErrorUsuarioCadastrar.style.display = "none";
        return true;
    }else{
        UserValue.value = UserValue.value.slice(0,40);
        borderUser.style.transition = "1s";
        borderUser.style.border = "2px groove red";
        UserValue.style.transition = "1s";
        UserValue.style.color = "red";
        iconeUserCadastrar.style.transition = "1s";
        iconeUserCadastrar.style.background = "red";
        iconeUserCadastrar.style.backgroundClip = "text";
        iconeUserCadastrar.style.webkitBackgroundClip = "text";
        iconeUserCadastrar.style.color = "transparent";
        menssageErrorUsuarioCadastrar.style.display = "block";
        menssageErrorUsuarioCadastrar.style.color = "red";
        menssageErrorUsuarioCadastrar.style.fontFamily = "'Montserrat',sans-serif";
        menssageErrorUsuarioCadastrar.textContent = "Nome Completo";
        return false;
    }
}
function EmailVerificacion(){
    const EmailRegexCadastrar = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if(EmailRegexCadastrar.test(EmailCadastrarValue.value)){
        borderEmailCadastrar.style.transition = "1s";
        borderEmailCadastrar.style.border = "2px groove rgb(0,255,0)";
        EmailCadastrarValue.style.transition = "1s";
        EmailCadastrarValue.style.color = "rgb(0,255,0)";
        iconeEmailCadastrar.style.transition = "1s";
        iconeEmailCadastrar.style.background = "rgb(0,255,0)";
        iconeEmailCadastrar.style.backgroundClip = "text";
        iconeEmailCadastrar.style.webkitBackgroundClip = "text";
        menssageErrorEmailCadastrar.style.display = "none";
        return true;
    }
    else{
        borderEmailCadastrar.style.transition = "1s";
        borderEmailCadastrar.style.border = "2px groove red";
        EmailCadastrarValue.style.transition = "1s";
        EmailCadastrarValue.style.color = "red";
        iconeEmailCadastrar.style.transition = "1s";
        iconeEmailCadastrar.style.background = "red";
        iconeEmailCadastrar.style.backgroundClip = "text";
        iconeEmailCadastrar.style.webkitBackgroundClip = "text";
        menssageErrorEmailCadastrar.style.display = "block";
        menssageErrorEmailCadastrar.style.color = "red";
        menssageErrorEmailCadastrar.style.fontFamily = "'Montserrat',sans-serif";
        menssageErrorEmailCadastrar.textContent = "O E-mail deve ser Valido";
        return false;
    }
}
function TelefoneVerificacion(){
    TelefonecadastrarValue.value = TelefonecadastrarValue.value.replace(/\D/g,'');
    if(TelefonecadastrarValue.value.length >= 11){
        TelefonecadastrarValue.value = TelefonecadastrarValue.value.slice(0,11);
        TelefonecadastrarValue.value = TelefonecadastrarValue.value.replace(/^(\d{2})(\d{5})(\d{4})/ , '($1) $2 - $3');
        borderTelefoneCadastrar.style.transition = "1s";
        borderTelefoneCadastrar.style.border = "2px groove rgb(0,255,0)";
        TelefonecadastrarValue.style.color = "rgb(0,255,0)";
        iconeTelefoneCadastrar.style.transition = "1s";
        iconeTelefoneCadastrar.style.background = "rgb(0,255,0)";
        iconeTelefoneCadastrar.style.backgroundClip = "text";
        iconeTelefoneCadastrar.style.webkitBackgroundClip = "text";
        iconeTelefoneCadastrar.style.color = "transparent";
        menssageErrorTelefoneCadastrar.style.display = "none";
        return true;
    }else{
        borderTelefoneCadastrar.style.transition = "1s";
        borderTelefoneCadastrar.style.border = "2px groove red";
        TelefonecadastrarValue.style.color = "red";
        iconeTelefoneCadastrar.style.transition = "1s";
        iconeTelefoneCadastrar.style.background = "red";
        iconeTelefoneCadastrar.style.backgroundClip = "text";
        iconeTelefoneCadastrar.style.webkitBackgroundClip = "text";
        iconeTelefoneCadastrar.style.color = "transparent";
        menssageErrorTelefoneCadastrar.style.display = "block";
        menssageErrorTelefoneCadastrar.style.color = "red";
        menssageErrorTelefoneCadastrar.style.fontFamily = "'Montserrat',sans-serif";
        menssageErrorTelefoneCadastrar.textContent = "coloque seu DD";
        return false;
    }
}
function PasswordVerificacion(){
    if(PasswordCadastrarValue.value.length >= 8){
        PasswordCadastrarValue.value = PasswordCadastrarValue.value.slice(0,8);
        borderPasswordCadastrar.style.transition = "1s";
        borderPasswordCadastrar.style.border = "2px groove rgb(0,255,0)";
        PasswordCadastrarValue.style.transition = "1s";
        PasswordCadastrarValue.style.color = "rgb(0,255,0)";
        iconePassowordCadastrar.style.transition = "1s";
        iconePassowordCadastrar.style.background = "rgb(0,255,0)";
        iconePassowordCadastrar.style.backgroundClip = "text";
        iconePassowordCadastrar.style.webkitBackgroundClip = "text";
        iconePassowordCadastrar.style.color = "transparent";
        menssageErrorPasswordCadastrar.style.display = "none";
        return true;
    }
    else{
        borderPasswordCadastrar.style.transition = "1s";
        borderPasswordCadastrar.style.border = "2px groove red";
        PasswordCadastrarValue.style.transition = "1s";
        PasswordCadastrarValue.style.color = "red";
        iconePassowordCadastrar.style.transition = "1s";
        iconePassowordCadastrar.style.background = "red";
        iconePassowordCadastrar.style.backgroundClip = "text";
        iconePassowordCadastrar.style.webkitBackgroundClip = "text";
        iconePassowordCadastrar.style.color = "transparent";
        menssageErrorPasswordCadastrar.style.display = "block";
        menssageErrorPasswordCadastrar.style.color = "red";
        menssageErrorPasswordCadastrar.style.fontFamily = "'Montserrat',sans-serif";
        menssageErrorPasswordCadastrar.textContent = "A senha deve conter pelo Menos 8 caracteres";
        return false;
    }
}
function ButtonSUbmitCadastrar(event){
    if(
        UsuarioVerificacion() == true,
        EmailVerificacion() == true,
        TelefoneVerificacion() == true,
        PasswordVerificacion() == true
    ){
        return true;
    }else{
        event.preventDefault();
        alert("Error: Os Dados Não Condizem com as Diretrizes");
    }
}
UserValue.addEventListener("input",UsuarioVerificacion);
EmailCadastrarValue.addEventListener("input",EmailVerificacion);
TelefonecadastrarValue.addEventListener("input",TelefoneVerificacion);
PasswordCadastrarValue.addEventListener("input",PasswordVerificacion);
ButtonEnviarCadastrar.addEventListener("click", ButtonSUbmitCadastrar);