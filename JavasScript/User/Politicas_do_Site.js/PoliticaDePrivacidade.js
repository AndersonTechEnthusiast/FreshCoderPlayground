let PoliticaDePrivacidade = document.getElementById("Política_de_Privacidade-PoliticasDoSite");
let PoliticaDePrivacidadeOverlay = document.getElementById("PoliticaDePrivacidadeOverlay");
let PoliticaDePrivacidadeTranslex = document.getElementById("PoliticaDePrivacidadeTranslex");
let PoliticaDePrivacidadeModal = document.getElementById("PoliticaDePrivacidadeModal");
function LinkPoliticaDePrivacidade(event)
{
    event.preventDefault();
    PoliticaDePrivacidadeOverlay.style.display = "block";
    PoliticaDePrivacidadeModal.style.display = "block";
    PoliticaDePrivacidadeTranslex.style.display = "block";
}
function OverlayPoliticaDePrivacidade()
{
    PoliticaDePrivacidadeOverlay.style.display = "none";
    PoliticaDePrivacidadeModal.style.display = "none";
    PoliticaDePrivacidadeTranslex.style.display = "none";
}
function TranslexPoliticaDePrivacidade()
{
    PoliticaDePrivacidadeOverlay.style.display = "none";
    PoliticaDePrivacidadeModal.style.display = "none";
    PoliticaDePrivacidadeTranslex.style.display = "none";
}
PoliticaDePrivacidade.addEventListener("click",LinkPoliticaDePrivacidade);
PoliticaDePrivacidadeOverlay.addEventListener("click",OverlayPoliticaDePrivacidade);
PoliticaDePrivacidadeTranslex.addEventListener("click",TranslexPoliticaDePrivacidade);