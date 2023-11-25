let Link_Document_SobreNos = document.getElementById("modal-link-SobreNos");
let OverLay_Document_SobreNos = document.querySelector(".overlay-SobreNos");
let Modal_Document_SobreNos = document.querySelector(".modal-SobreNos");
let Transition_Document_SobreNos = document.querySelector(".Transition");

function ClickedLinkSobreNos(event)
{
    event.preventDefault();
    OverLay_Document_SobreNos.style.display = "block";
    Transition_Document_SobreNos.style.display = "block";
    Modal_Document_SobreNos.style.display = "block";
}
function ClickedOverLaySobreNos()
{
    OverLay_Document_SobreNos.style.display = "none";
    Transition_Document_SobreNos.style.display = "none";
    Modal_Document_SobreNos.style.display = "none";
}
function ClickedModalSobreNos()
{
    OverLay_Document_SobreNos.style.display = "none";
    Transition_Document_SobreNos.style.display = "none";
    Modal_Document_SobreNos.style.display = "none";
}
function ClickedTransitionSobreNos()
{
    OverLay_Document_SobreNos.style.display = "none";
    Transition_Document_SobreNos.style.display = "none";
    Modal_Document_SobreNos.style.display = "none";
}
Link_Document_SobreNos.addEventListener('click',ClickedLinkSobreNos);
OverLay_Document_SobreNos.addEventListener('click',ClickedOverLaySobreNos);
Transition_Document_SobreNos.addEventListener('click',ClickedTransitionSobreNos);
Modal_Document_SobreNos.addEventListener('click',ClickedModalSobreNos);
