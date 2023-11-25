let PerguntasFrequentes = document.getElementById("Perguntas_Frequentes-FAQ");
let PerguntasFrequentesOverlay = document.getElementById("PerguntasFrequentesOverlay");
let PerguntasFrequentesTranslex = document.getElementById("PerguntasFrequentesTranslex");
let PerguntasFrequentesModal = document.getElementById("PerguntasFrequentesModal");
function LinkPerguntasFrequentes(event)
{
    event.preventDefault();
    PerguntasFrequentesOverlay.style.display = "block";
    PerguntasFrequentesModal.style.display = "block";
    PerguntasFrequentesTranslex.style.display = "block";
}
function OverlayPerguntasFrequentes()
{
    PerguntasFrequentesOverlay.style.display = "none";
    PerguntasFrequentesModal.style.display = "none";
    PerguntasFrequentesTranslex.style.display = "none";
}
function TranslexPerguntasFrequentes()
{
    PerguntasFrequentesOverlay.style.display = "none";
    PerguntasFrequentesModal.style.display = "none";
    PerguntasFrequentesTranslex.style.display = "none";
}
PerguntasFrequentes.addEventListener("click",LinkPerguntasFrequentes);
PerguntasFrequentesOverlay.addEventListener("click",OverlayPerguntasFrequentes);
PerguntasFrequentesTranslex.addEventListener("click",TranslexPerguntasFrequentes);