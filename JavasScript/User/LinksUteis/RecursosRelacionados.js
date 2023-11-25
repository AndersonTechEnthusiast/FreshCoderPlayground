let RecursosRelacionados = document.getElementById("Recursos_Relacionados-LinksUteis");
let RecursosRelacionadosOverlay = document.getElementById("RecursosRelacionadosOverlay");
let RecursosRelacionadosTranslex = document.getElementById("RecursosRelacionadosTranslex");
let RecursosRelacionadosModal = document.getElementById("RecursosRelacionadosModal");
function LinkRecursosRelacionados(event)
{
    event.preventDefault();
    RecursosRelacionadosOverlay.style.display = "block";
    RecursosRelacionadosModal.style.display = "block";
    RecursosRelacionadosTranslex.style.display = "block";
}
function OverlayRecursosRelacionados()
{
    RecursosRelacionadosOverlay.style.display = "none";
    RecursosRelacionadosModal.style.display = "none";
    RecursosRelacionadosTranslex.style.display = "none";
}
function TranslexRecursosRelacionados()
{
    RecursosRelacionadosOverlay.style.display = "none";
    RecursosRelacionadosModal.style.display = "none";
    RecursosRelacionadosTranslex.style.display = "none";
}
RecursosRelacionados.addEventListener("click",LinkRecursosRelacionados);
RecursosRelacionadosOverlay.addEventListener("click",OverlayRecursosRelacionados);
RecursosRelacionadosTranslex.addEventListener("click",TranslexRecursosRelacionados);