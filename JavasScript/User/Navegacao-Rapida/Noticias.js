let Noticias = document.getElementById("Notícias-NavegacaoRapida(Explicacao)");
let NoticiasOverlay = document.getElementById("NoticiasOverlay");
let NoticiasTranslex = document.getElementById("NoticiasTranslex");
let NoticiasModal = document.getElementById("NoticiasModal");
function LinkNoticias(event)
{
    event.preventDefault();
    NoticiasOverlay.style.display = "block";
    NoticiasModal.style.display = "block";
    NoticiasTranslex.style.display = "block";
}
function OverlayNoticias()
{
    NoticiasOverlay.style.display = "none";
    NoticiasModal.style.display = "none";
    NoticiasTranslex.style.display = "none";
}
function TranslexNoticias()
{
    NoticiasOverlay.style.display = "none";
    NoticiasModal.style.display = "none";
    NoticiasTranslex.style.display = "none";
}
Noticias.addEventListener("click",LinkNoticias);
NoticiasOverlay.addEventListener("click",OverlayNoticias);
NoticiasTranslex.addEventListener("click",TranslexNoticias);