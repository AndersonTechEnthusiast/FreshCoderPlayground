let SitesAfiliados = document.getElementById("Sites_Afiliados-LinksUteis");
let SitesAfiliadosOverlay = document.getElementById("SitesAfiliadosOverlay");
let SitesAfiliadosTranslex = document.getElementById("SitesAfiliadosTranslex");
let SitesAfiliadosModal = document.getElementById("SitesAfiliadosModal");
function LinkSitesAfiliados(event)
{
    event.preventDefault();
    SitesAfiliadosOverlay.style.display = "block";
    SitesAfiliadosModal.style.display = "block";
    SitesAfiliadosTranslex.style.display = "block";
}
function OverlaySitesAfiliados()
{
    SitesAfiliadosOverlay.style.display = "none";
    SitesAfiliadosModal.style.display = "none";
    SitesAfiliadosTranslex.style.display = "none";
}
function TranslexSitesAfiliados()
{
    SitesAfiliadosOverlay.style.display = "none";
    SitesAfiliadosModal.style.display = "none";
    SitesAfiliadosTranslex.style.display = "none";
}
SitesAfiliados.addEventListener("click",LinkSitesAfiliados);
SitesAfiliadosOverlay.addEventListener("click",OverlaySitesAfiliados);
SitesAfiliadosTranslex.addEventListener("click",TranslexSitesAfiliados);