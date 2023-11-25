let LinksParceiros = document.getElementById("Parceiros-LinksUteis");
let LinksParceirosOverlay = document.getElementById("LinksParceirosOverlay");
let LinksParceirosTranslex = document.getElementById("LinksParceirosTranslex");
let LinksParceirosModal = document.getElementById("LinksParceirosModal");
function LinkLinksParceiros(event)
{
    event.preventDefault();
    LinksParceirosOverlay.style.display = "block";
    LinksParceirosModal.style.display = "block";
    LinksParceirosTranslex.style.display = "block";
}
function OverlayLinksParceiros()
{
    LinksParceirosOverlay.style.display = "none";
    LinksParceirosModal.style.display = "none";
    LinksParceirosTranslex.style.display = "none";
}
function TranslexLinksParceiros()
{
    LinksParceirosOverlay.style.display = "none";
    LinksParceirosModal.style.display = "none";
    LinksParceirosTranslex.style.display = "none";
}
LinksParceiros.addEventListener("click",LinkLinksParceiros);
LinksParceirosOverlay.addEventListener("click",OverlayLinksParceiros);
LinksParceirosTranslex.addEventListener("click",TranslexLinksParceiros);