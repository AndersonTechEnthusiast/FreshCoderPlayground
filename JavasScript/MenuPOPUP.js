let LinkFormularioCadastroAndLogin = document.getElementById("modal-link-Login");
let OverLay_FormularioCadastroAndLogin = document.querySelector(".overlay");
let Modal_FormularioCadastroAndLogin = document.querySelector(".modal");

function Link_FormularioCadastroAndLogin(event){
    event.preventDefault();
    OverLay_FormularioCadastroAndLogin.style.display = "block";
    Modal_FormularioCadastroAndLogin.style.display = "block";
}

function Overlay_Formulario(){
    OverLay_FormularioCadastroAndLogin.style.display = "none";
    Modal_FormularioCadastroAndLogin.style.display = "none";
}

LinkFormularioCadastroAndLogin.addEventListener("click",Link_FormularioCadastroAndLogin);
OverLay_FormularioCadastroAndLogin.addEventListener("click",Overlay_Formulario);

