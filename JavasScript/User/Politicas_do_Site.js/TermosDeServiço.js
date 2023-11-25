let TermosDeServico = document.getElementById("Termos_de_Serviço-PoliticasDoSite");
let TermosDeServicoOverlay = document.getElementById("TermosDeServicoOverlay");
let TermosDeServicoTranslex = document.getElementById("TermosDeServicoTranslex");
let TermosDeServicoModal = document.getElementById("TermosDeServicoModal");
function LinkTermosDeServico(event)
{
    event.preventDefault();
    TermosDeServicoOverlay.style.display = "block";
    TermosDeServicoModal.style.display = "block";
    TermosDeServicoTranslex.style.display = "block";
}
function OverlayTermosDeServico()
{
    TermosDeServicoOverlay.style.display = "none";
    TermosDeServicoModal.style.display = "none";
    TermosDeServicoTranslex.style.display = "none";
}
function TranslexTermosDeServico()
{
    TermosDeServicoOverlay.style.display = "none";
    TermosDeServicoModal.style.display = "none";
    TermosDeServicoTranslex.style.display = "none";
}
TermosDeServico.addEventListener("click",LinkTermosDeServico);
TermosDeServicoOverlay.addEventListener("click",OverlayTermosDeServico);
TermosDeServicoTranslex.addEventListener("click",TranslexTermosDeServico);