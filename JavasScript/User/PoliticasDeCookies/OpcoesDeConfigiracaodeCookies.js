let OpcaoesDeConfiguracoesdeCookies = document.getElementById("Opções_de_Configuração_de_Cookies-Cookies");
let OpcaoesDeConfiguracoesdeCookiesOverlay = document.getElementById("OpcaoesDeConfiguracoesdeCookiesOverlay");
let OpcaoesDeConfiguracoesdeCookiesTranslex = document.getElementById("OpcaoesDeConfiguracoesdeCookiesTranslex");
let OpcaoesDeConfiguracoesdeCookiesModal = document.getElementById("OpcaoesDeConfiguracoesdeCookiesModal");
function LinkOpcaoesDeConfiguracoesdeCookies(event)
{
    event.preventDefault();
    OpcaoesDeConfiguracoesdeCookiesOverlay.style.display = "block";
    OpcaoesDeConfiguracoesdeCookiesModal.style.display = "block";
    OpcaoesDeConfiguracoesdeCookiesTranslex.style.display = "block";
}
function OverlayOpcaoesDeConfiguracoesdeCookies()
{
    OpcaoesDeConfiguracoesdeCookiesOverlay.style.display = "none";
    OpcaoesDeConfiguracoesdeCookiesModal.style.display = "none";
    OpcaoesDeConfiguracoesdeCookiesTranslex.style.display = "none";
}
function TranslexOpcaoesDeConfiguracoesdeCookies()
{
    OpcaoesDeConfiguracoesdeCookiesOverlay.style.display = "none";
    OpcaoesDeConfiguracoesdeCookiesModal.style.display = "none";
    OpcaoesDeConfiguracoesdeCookiesTranslex.style.display = "none";
}
OpcaoesDeConfiguracoesdeCookies.addEventListener("click",LinkOpcaoesDeConfiguracoesdeCookies);
OpcaoesDeConfiguracoesdeCookiesOverlay.addEventListener("click",OverlayOpcaoesDeConfiguracoesdeCookies);
OpcaoesDeConfiguracoesdeCookiesTranslex.addEventListener("click",TranslexOpcaoesDeConfiguracoesdeCookies);