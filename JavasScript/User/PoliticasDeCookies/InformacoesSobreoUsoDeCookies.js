let InformacoesSobreoUsoDeCookies = document.getElementById("Informações_sobre_o_Uso_de_Cookies-Cookies");
let InformacoesSobreoUsoDeCookiesOverlay = document.getElementById("InformacoesSobreoUsoDeCookiesOverlay");
let InformacoesSobreoUsoDeCookiesTranslex = document.getElementById("InformacoesSobreoUsoDeCookiesTranslex");
let InformacoesSobreoUsoDeCookiesModal = document.getElementById("InformacoesSobreoUsoDeCookiesModal");
function LinkInformacoesSobreoUsoDeCookies(event)
{
    event.preventDefault();
    InformacoesSobreoUsoDeCookiesOverlay.style.display = "block";
    InformacoesSobreoUsoDeCookiesModal.style.display = "block";
    InformacoesSobreoUsoDeCookiesTranslex.style.display = "block";
}
function OverlayInformacoesSobreoUsoDeCookies()
{
    InformacoesSobreoUsoDeCookiesOverlay.style.display = "none";
    InformacoesSobreoUsoDeCookiesModal.style.display = "none";
    InformacoesSobreoUsoDeCookiesTranslex.style.display = "none";
}
function TranslexInformacoesSobreoUsoDeCookies()
{
    InformacoesSobreoUsoDeCookiesOverlay.style.display = "none";
    InformacoesSobreoUsoDeCookiesModal.style.display = "none";
    InformacoesSobreoUsoDeCookiesTranslex.style.display = "none";
}
InformacoesSobreoUsoDeCookies.addEventListener("click",LinkInformacoesSobreoUsoDeCookies);
InformacoesSobreoUsoDeCookiesOverlay.addEventListener("click",OverlayInformacoesSobreoUsoDeCookies);
InformacoesSobreoUsoDeCookiesTranslex.addEventListener("click",TranslexInformacoesSobreoUsoDeCookies);