let PerfilView = document.getElementById("Modal-Link-Perfil-PopUp");
let PerfilViewOverlay = document.getElementById("PerfilViewOverlay");;
let PerfilViewModal = document.getElementById("PerfilViewModal");
function LinkPerfilView(event)
{
    event.preventDefault();
    PerfilViewOverlay.style.display = "block";
    PerfilViewModal.style.display = "block";
    PerfilViewTranslex.style.display = "block";
}
function OverlayPerfilView()
{
    PerfilViewOverlay.style.display = "none";
    PerfilViewModal.style.display = "none";
    PerfilViewTranslex.style.display = "none";
}
PerfilView.addEventListener("click",LinkPerfilView);
PerfilViewOverlay.addEventListener("click",OverlayPerfilView); 