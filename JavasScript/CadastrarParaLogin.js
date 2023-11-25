let Link_F_C_F_L = document.getElementById("CadastrarParaLogin");
let containerLoginBack = document.querySelector(".Login");
let containerCadastrarBack = document.querySelector(".Cadastrar");
function BackFormurns(event){
    event.preventDefault();
    containerCadastrarBack.style.transition = "2s";
    containerCadastrarBack.style.left = "calc(2*100% * -1)";
    containerCadastrarBack.style.opacity = "0";
    containerLoginBack.style.transition = "1s";
    containerLoginBack.style.opacity = "1";
    containerLoginBack.style.left = "50%";
}
Link_F_C_F_L.addEventListener('click', BackFormurns);
