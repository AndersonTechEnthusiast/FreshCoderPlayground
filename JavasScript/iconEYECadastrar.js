let IconEyeOpenCadastrar = document.getElementById("eye-openCadastrar"); 
let IconEyeCloseCadastrar = document.getElementById("eye-closeCadastrar"); 
let ValuePasswordCadastrar = document.getElementById("passwordCadastrar"); 
function EyeCloseCadastrar(){
    IconEyeOpenCadastrar.style.display = "block";
    IconEyeCloseCadastrar.style.display = "none";
    ValuePasswordCadastrar.type = "password";
}
function EyeOpenCadastrar(){
    IconEyeCloseCadastrar.style.display = "block";
    IconEyeOpenCadastrar.style.display = "none";
    ValuePasswordCadastrar.type = "text";
}
IconEyeOpenCadastrar.addEventListener("click",EyeOpenCadastrar);
IconEyeCloseCadastrar.addEventListener("click",EyeCloseCadastrar);
