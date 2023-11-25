let EquipeEditorial = document.getElementById("Equipe_Editorial-Creditos");
let EquipeEditorialOverlay = document.getElementById("EquipeEditorialOverlay");
let EquipeEditorialTranslex = document.getElementById("EquipeEditorialTranslex");
let EquipeEditorialModal = document.getElementById("EquipeEditorialModal");
function LinkEquipeEditorial(event)
{
    event.preventDefault();
    EquipeEditorialOverlay.style.display = "block";
    EquipeEditorialModal.style.display = "block";
    EquipeEditorialTranslex.style.display = "block";
}
function OverlayEquipeEditorial()
{
    EquipeEditorialOverlay.style.display = "none";
    EquipeEditorialModal.style.display = "none";
    EquipeEditorialTranslex.style.display = "none";
}
function TranslexEquipeEditorial()
{
    EquipeEditorialOverlay.style.display = "none";
    EquipeEditorialModal.style.display = "none";
    EquipeEditorialTranslex.style.display = "none";
}
EquipeEditorial.addEventListener("click",LinkEquipeEditorial);
EquipeEditorialOverlay.addEventListener("click",OverlayEquipeEditorial);
EquipeEditorialTranslex.addEventListener("click",TranslexEquipeEditorial);