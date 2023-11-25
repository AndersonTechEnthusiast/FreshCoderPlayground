let Desenvolvedores = document.getElementById("Desenvolvedores-Creditos");
let DesenvolvedoresOverlay = document.getElementById("DesenvolvedoresOverlay");
let DesenvolvedoresTranslex = document.getElementById("DesenvolvedoresTranslex");
let DesenvolvedoresModal = document.getElementById("DesenvolvedoresModal");
function LinkDesenvolvedores(event)
{
    event.preventDefault();
    DesenvolvedoresOverlay.style.display = "block";
    DesenvolvedoresModal.style.display = "block";
    DesenvolvedoresTranslex.style.display = "block";
}
function OverlayDesenvolvedores()
{
    DesenvolvedoresOverlay.style.display = "none";
    DesenvolvedoresModal.style.display = "none";
    DesenvolvedoresTranslex.style.display = "none";
}
function TranslexDesenvolvedores()
{
    DesenvolvedoresOverlay.style.display = "none";
    DesenvolvedoresModal.style.display = "none";
    DesenvolvedoresTranslex.style.display = "none";
}
Desenvolvedores.addEventListener("click",LinkDesenvolvedores);
DesenvolvedoresOverlay.addEventListener("click",OverlayDesenvolvedores);
DesenvolvedoresTranslex.addEventListener("click",TranslexDesenvolvedores);