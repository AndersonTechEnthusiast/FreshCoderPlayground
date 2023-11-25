let CategoriaDeJogos = document.getElementById("Categorias_de_Jogos-NavegacaoRapida(Explicacao)");
let CategoriaDeJogosOverlay = document.getElementById("CategoriaDeJogosOverlay");
let CategoriaDeJogosTranslex = document.getElementById("CategoriaDeJogosTranslex");
let CategoriaDeJogosModal = document.getElementById("CategoriaDeJogosModal");
function LinkCategoriaDeJogos(event)
{
    event.preventDefault();
    CategoriaDeJogosOverlay.style.display = "block";
    CategoriaDeJogosModal.style.display = "block";
    CategoriaDeJogosTranslex.style.display = "block";
}
function OverlayCategoriaDeJogos()
{
    CategoriaDeJogosOverlay.style.display = "none";
    CategoriaDeJogosModal.style.display = "none";
    CategoriaDeJogosTranslex.style.display = "none";
}
function TranslexcategoriaDeJogos()
{
    CategoriaDeJogosOverlay.style.display = "none";
    CategoriaDeJogosModal.style.display = "none";
    CategoriaDeJogosTranslex.style.display = "none";
}
CategoriaDeJogos.addEventListener("click",LinkCategoriaDeJogos);
CategoriaDeJogosOverlay.addEventListener("click",OverlayCategoriaDeJogos);
CategoriaDeJogosTranslex.addEventListener("click",TranslexcategoriaDeJogos);