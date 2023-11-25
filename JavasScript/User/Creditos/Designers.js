let Desingners = document.getElementById("Designers-Creditos");
let DesingnersOverlay = document.getElementById("DesingnersOverlay");
let DesingnersTranslex = document.getElementById("DesingnersTranslex");
let DesingnersModal = document.getElementById("DesingnersModal");
function LinkDesingners(event)
{
    event.preventDefault();
    DesingnersOverlay.style.display = "block";
    DesingnersModal.style.display = "block";
    DesingnersTranslex.style.display = "block";
}
function OverlayDesingners()
{
    DesingnersOverlay.style.display = "none";
    DesingnersModal.style.display = "none";
    DesingnersTranslex.style.display = "none";
}
function TranslexDesingners()
{
    DesingnersOverlay.style.display = "none";
    DesingnersModal.style.display = "none";
    DesingnersTranslex.style.display = "none";
}
Desingners.addEventListener("click",LinkDesingners);
DesingnersOverlay.addEventListener("click",OverlayDesingners);
DesingnersTranslex.addEventListener("click",TranslexDesingners);