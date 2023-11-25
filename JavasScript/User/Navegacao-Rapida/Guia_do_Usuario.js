let GuiaDoUsuario = document.getElementById("Guia_do_Usuário-NavegacaoRapida(Explicacao)");
let GuiaDoUsuarioOverlay = document.getElementById("GuiaDoUsuarioOverlay");
let GuiaDoUsuarioTranslex = document.getElementById("GuiaDoUsuarioTranslex");
let GuiaDoUsuarioModal = document.getElementById("GuiaDoUsuarioModal");
function LinkGuiaDoUsuario(event)
{
    event.preventDefault();
    GuiaDoUsuarioOverlay.style.display = "block";
    GuiaDoUsuarioModal.style.display = "block";
    GuiaDoUsuarioTranslex.style.display = "block";
}
function OverlayGuiaDoUsuario()
{
    GuiaDoUsuarioOverlay.style.display = "none";
    GuiaDoUsuarioModal.style.display = "none";
    GuiaDoUsuarioTranslex.style.display = "none";
}
function TranslexGuiaDoUsuario()
{
    GuiaDoUsuarioOverlay.style.display = "none";
    GuiaDoUsuarioModal.style.display = "none";
    GuiaDoUsuarioTranslex.style.display = "none";
}
GuiaDoUsuario.addEventListener("click",LinkGuiaDoUsuario);
GuiaDoUsuarioOverlay.addEventListener("click",OverlayGuiaDoUsuario);
GuiaDoUsuarioTranslex.addEventListener("click",TranslexGuiaDoUsuario);