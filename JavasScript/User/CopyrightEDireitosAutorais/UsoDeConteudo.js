let UsoDeConteudo = document.getElementById("Uso_de_Conteúdo-CopyRight");
let UsoDeConteudoOverlay = document.getElementById("UsoDeConteudoOverlay");
let UsoDeConteudoTranslex = document.getElementById("UsoDeConteudoTranslex");
let UsoDeConteudoModal = document.getElementById("UsoDeConteudoModal");
function LinkUsoDeConteudo(event)
{
    event.preventDefault();
    UsoDeConteudoOverlay.style.display = "block";
    UsoDeConteudoModal.style.display = "block";
    UsoDeConteudoTranslex.style.display = "block";
}
function OverlayUsoDeConteudo()
{
    UsoDeConteudoOverlay.style.display = "none";
    UsoDeConteudoModal.style.display = "none";
    UsoDeConteudoTranslex.style.display = "none";
}
function TranslexUsoDeConteudo()
{
    UsoDeConteudoOverlay.style.display = "none";
    UsoDeConteudoModal.style.display = "none";
    UsoDeConteudoTranslex.style.display = "none";
}
UsoDeConteudo.addEventListener("click",LinkUsoDeConteudo);
UsoDeConteudoOverlay.addEventListener("click",OverlayUsoDeConteudo);
UsoDeConteudoTranslex.addEventListener("click",TranslexUsoDeConteudo);