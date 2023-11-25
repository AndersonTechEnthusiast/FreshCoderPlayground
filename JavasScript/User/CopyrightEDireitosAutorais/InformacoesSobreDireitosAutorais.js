let Informações_sobre_Direitos_Autorais_CopyRight = document.getElementById("Informações_sobre_Direitos_Autorais-CopyRight");
let Informações_sobre_Direitos_Autorais_CopyRightOverlay = document.getElementById("Informações_sobre_Direitos_Autorais-CopyRightOverlay");
let Informações_sobre_Direitos_Autorais_CopyRightTranslex = document.getElementById("Informações_sobre_Direitos_Autorais-CopyRightTranslex");
let Informações_sobre_Direitos_Autorais_CopyRightModal = document.getElementById("Informações_sobre_Direitos_Autorais-CopyRightModal");
function LinkInformações_sobre_Direitos_Autorais_CopyRight(event)
{
    event.preventDefault();
    Informações_sobre_Direitos_Autorais_CopyRightOverlay.style.display = "block";
    Informações_sobre_Direitos_Autorais_CopyRightModal.style.display = "block";
    Informações_sobre_Direitos_Autorais_CopyRightTranslex.style.display = "block";
}
function OverlayInformações_sobre_Direitos_Autorais_CopyRight()
{
    Informações_sobre_Direitos_Autorais_CopyRightOverlay.style.display = "none";
    Informações_sobre_Direitos_Autorais_CopyRightModal.style.display = "none";
    Informações_sobre_Direitos_Autorais_CopyRightTranslex.style.display = "none";
}
function TranslexInformações_sobre_Direitos_Autorais_CopyRight()
{
    Informações_sobre_Direitos_Autorais_CopyRightOverlay.style.display = "none";
    Informações_sobre_Direitos_Autorais_CopyRightModal.style.display = "none";
    Informações_sobre_Direitos_Autorais_CopyRightTranslex.style.display = "none";
}
Informações_sobre_Direitos_Autorais_CopyRight.addEventListener("click",LinkInformações_sobre_Direitos_Autorais_CopyRight);
Informações_sobre_Direitos_Autorais_CopyRightOverlay.addEventListener("click",OverlayInformações_sobre_Direitos_Autorais_CopyRight);
Informações_sobre_Direitos_Autorais_CopyRightTranslex.addEventListener("click",TranslexInformações_sobre_Direitos_Autorais_CopyRight);