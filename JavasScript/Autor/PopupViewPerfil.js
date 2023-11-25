let PerfilViewAutor = document.querySelector(".modal-View-Perfil-PopUp-Autor");
let PerfilViewAutorOverlay = document.getElementById("PerfilViewAutorOverlay");;
let PerfilViewAutorModal = document.getElementById("PerfilViewAutorModal");
function LinkPerfilViewAutor(event)
{
    event.preventDefault();
    PerfilViewAutorOverlay.style.display = "block";
    PerfilViewAutorModal.style.display = "block";
}
function OverlayPerfilViewAutor()
{
    PerfilViewAutorOverlay.style.display = "none";
    PerfilViewAutorModal.style.display = "none";
}
PerfilViewAutor.addEventListener("click",LinkPerfilViewAutor);
PerfilViewAutorOverlay.addEventListener("click",OverlayPerfilViewAutor);