let NomeForm = document.getElementById("nome");
let EmailForm = document.getElementById("email");
let MensagemForm = document.getElementById("mensagem");
let ErrorMessageNome = document.getElementById("mensaggeErrorNome");
let ErrorMessageEmail = document.getElementById("mensaggeErrorEmail");
let ErrorMessageMensagge = document.getElementById("mensaggeErrorMensage");
let SubmitButtonEnviarForm = document.getElementById("submitForm");
function NomeFormVerificacion()
{
    if(NomeForm.value.length >= 40 || NomeForm.value.length >= 30 || NomeForm.value.length >= 20 || NomeForm.value.length >= 10)
    {
        NomeForm.value = NomeForm.value.slice(0,40);
        NomeForm.style.transition = "1s";
        NomeForm.style.border = "2px solid rgb(0,255,0)";
        NomeForm.style.color = 'rgb(0,255,0)';
        ErrorMessageNome.style.display = "none";
        return true;
    }
    else
    {
        NomeForm.style.transition = "1s";
        NomeForm.style.border = "2px solid red";
        NomeForm.style.color = "red";
        ErrorMessageNome.style.display = "block";
        ErrorMessageNome.style.width = "100%";
        ErrorMessageNome.style.textAlign = "center";
        ErrorMessageNome.style.color = "red";
        ErrorMessageNome.textContent = "O Nome Deve Ser Valido";
        return false;
    }
}
function EmailFormVerificacion()
{
    var RegexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(RegexEmail.test(EmailForm.value))
    {
        EmailForm.style.transition = "1s";
        EmailForm.style.border = "2px solid rgb(0,255,0)";
        EmailForm.style.color = "rgb(0,255,0)";
        ErrorMessageEmail.style.display = "none";
        return true;
    }
    else
    {
        EmailForm.style.transition = "1s";
        EmailForm.style.border = "2px solid red";
        EmailForm.style.color = "red";
        ErrorMessageEmail.style.display = "block";
        ErrorMessageEmail.style.width = "100%";
        ErrorMessageEmail.style.textAlign = "center";
        ErrorMessageEmail.style.color = "red";
        ErrorMessageEmail.textContent = "O E-mail Deve Ser Valido";
        return false;
    }
}
function MensagemFormVerificacion()
{
    if(MensagemForm.value.length >= 100)
    {
        MensagemForm.value = MensagemForm.value.slice(0,100);
        ErrorMessageMensagge.style.display = "block";
        ErrorMessageMensagge.style.width = "100%";
        ErrorMessageMensagge.style.textAlign = "center";
        ErrorMessageMensagge.style.color = "rgb(0,255,0)";
        ErrorMessageMensagge.textContent = "O Limite e de 100 caracteres";
        return true;
    }
    else
    {
        ErrorMessageMensagge.style.display = "none";
    }
}
function SubmitButtonEnviarFormVerificacion(event)
{
    if(NomeFormVerificacion() == true || EmailFormVerificacion() == true || MensagemFormVerificacion() == true)
    {
        return true;
    }
    else
    {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Informações Invalidas',
            text: 'As Informações Não Condizem com as Diretrizes',
            didClose: () =>
            {
                window.location.href = "Form.html";
            }
        });
    }
}
NomeForm.addEventListener("input",NomeFormVerificacion);
EmailForm.addEventListener("input",EmailFormVerificacion);
MensagemForm.addEventListener("input",MensagemFormVerificacion);
SubmitButtonEnviarForm.addEventListener("click",SubmitButtonEnviarFormVerificacion);