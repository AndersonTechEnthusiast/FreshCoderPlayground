let Autores = document.getElementById("Autores-Creditos");
let AutoresOverlay = document.getElementById("AutoresOverlay");
let AutoresTranslex = document.getElementById("AutoresTranslex");
let AutoresModal = document.getElementById("AutoresModal");
function LinkAutores(event)
{
    event.preventDefault();
    AutoresOverlay.style.display = "block";
    AutoresModal.style.display = "block";
    AutoresTranslex.style.display = "block";
}
function OverlayAutores()
{
    AutoresOverlay.style.display = "none";
    AutoresModal.style.display = "none";
    AutoresTranslex.style.display = "none";
}
function TranslexAutores()
{
    AutoresOverlay.style.display = "none";
    AutoresModal.style.display = "none";
    AutoresTranslex.style.display = "none";
}
Autores.addEventListener("click",LinkAutores);
AutoresOverlay.addEventListener("click",OverlayAutores);
AutoresTranslex.addEventListener("click",TranslexAutores);