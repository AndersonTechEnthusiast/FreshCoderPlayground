let ComecarAPostarNoSiteConquestGo = document.getElementById("TornarSeAutor");
let ComecarAPostarNoSiteConquestGoOverlay = document.getElementById("ComecarAPostarNoSiteConquestGoOverlay");
let ComecarAPostarNoSiteConquestGoTranslex = document.getElementById("ComecarAPostarNoSiteConquestGoTranslex");
let ComecarAPostarNoSiteConquestGoModal = document.getElementById("ComecarAPostarNoSiteConquestGoModal");
function LinkComecarAPostarNoSiteConquestGo(event)
{
    event.preventDefault();
    ComecarAPostarNoSiteConquestGoOverlay.style.display = "block";
    ComecarAPostarNoSiteConquestGoModal.style.display = "block";
    ComecarAPostarNoSiteConquestGoTranslex.style.display = "block";
}
function OverlayComecarAPostarNoSiteConquestGo()
{
    ComecarAPostarNoSiteConquestGoOverlay.style.display = "none";
    ComecarAPostarNoSiteConquestGoModal.style.display = "none";
    ComecarAPostarNoSiteConquestGoTranslex.style.display = "none";
}
function TranslexComecarAPostarNoSiteConquestGo()
{
    ComecarAPostarNoSiteConquestGoOverlay.style.display = "none";
    ComecarAPostarNoSiteConquestGoModal.style.display = "none";
    ComecarAPostarNoSiteConquestGoTranslex.style.display = "none";
}
ComecarAPostarNoSiteConquestGo.addEventListener("click",LinkComecarAPostarNoSiteConquestGo);
ComecarAPostarNoSiteConquestGoOverlay.addEventListener("click",OverlayComecarAPostarNoSiteConquestGo);
ComecarAPostarNoSiteConquestGoTranslex.addEventListener("click",TranslexComecarAPostarNoSiteConquestGo);