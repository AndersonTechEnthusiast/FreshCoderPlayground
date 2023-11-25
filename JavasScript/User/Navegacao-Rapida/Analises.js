let Analise = document.getElementById("Análises-NavegacaoRapida(Explicacao)");
let AnaliseOverlay = document.getElementById("AnaliseOverlay");
let AnaliseTranslex = document.getElementById("AnaliseTranslex");
let AnaliseModal = document.getElementById("AnaliseModal");
function LinkAnalise(event)
{
    event.preventDefault();
    AnaliseOverlay.style.display = "block";
    AnaliseModal.style.display = "block";
    AnaliseTranslex.style.display = "block";
}
function OverlayAnalise()
{
    AnaliseOverlay.style.display = "none";
    AnaliseModal.style.display = "none";
    AnaliseTranslex.style.display = "none";
}
function TranslexAnalise()
{
    AnaliseOverlay.style.display = "none";
    AnaliseModal.style.display = "none";
    AnaliseTranslex.style.display = "none";
}
Analise.addEventListener("click",LinkAnalise);
AnaliseOverlay.addEventListener("click",OverlayAnalise);
AnaliseTranslex.addEventListener("click",TranslexAnalise);