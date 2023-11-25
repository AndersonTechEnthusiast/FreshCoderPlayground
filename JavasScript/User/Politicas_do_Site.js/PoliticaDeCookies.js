let PoliticaDeCookies = document.getElementById("Política_de_Cookies-PoliticasDoSite");
let PoliticaDeCookiesOverlay = document.getElementById("PoliticaDeCookiesOverlay");
let PoliticaDeCookiesTranslex = document.getElementById("PoliticaDeCookiesTranslex");
let PoliticaDeCookiesModal = document.getElementById("PoliticaDeCookiesModal");
function LinkPoliticaDeCookies(event)
{
    event.preventDefault();
    PoliticaDeCookiesOverlay.style.display = "block";
    PoliticaDeCookiesModal.style.display = "block";
    PoliticaDeCookiesTranslex.style.display = "block";
}
function OverlayPoliticaDeCookies()
{
    PoliticaDeCookiesOverlay.style.display = "none";
    PoliticaDeCookiesModal.style.display = "none";
    PoliticaDeCookiesTranslex.style.display = "none";
}
function TranslexPoliticaDeCookies()
{
    PoliticaDeCookiesOverlay.style.display = "none";
    PoliticaDeCookiesModal.style.display = "none";
    PoliticaDeCookiesTranslex.style.display = "none";
}
PoliticaDeCookies.addEventListener("click",LinkPoliticaDeCookies);
PoliticaDeCookiesOverlay.addEventListener("click",OverlayPoliticaDeCookies);
PoliticaDeCookiesTranslex.addEventListener("click",TranslexPoliticaDeCookies);