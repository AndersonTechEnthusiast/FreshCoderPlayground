let Link_F_L_F_C = document.getElementById("LoginParaCadastrar");
let containerLogin = document.querySelector(".Login");
let containerCadastrar = document.querySelector(".Cadastrar");
function ContainerLogin(event){
    event.preventDefault();
    containerLogin.style.transition = "2s";
    containerLogin.style.left = "calc(2*100% * -1)";
    containerLogin.style.opacity = "0";
    containerCadastrar.style.transition = "1s";
    containerCadastrar.style.left = "50%";
    containerCadastrar.style.transform = "translate(-50% , -50%)";
    containerCadastrar.style.opacity = "1";
}
Link_F_L_F_C.addEventListener('click', ContainerLogin);