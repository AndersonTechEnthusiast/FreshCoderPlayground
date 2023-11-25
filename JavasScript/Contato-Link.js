let Link_Document_Contato = document.getElementById("modal-link-contato");
let OverLay_Document_Contato = document.querySelector(".overlay-Contato");
let Modal_Document_Contato = document.querySelector(".modal-Contato");
let Transition_Document_Contato = document.querySelector(".Transition-Contato");

function ClickedLinkContato(event)
{
    event.preventDefault();
    OverLay_Document_Contato.style.display = "block";
    Transition_Document_Contato.style.display = "block";
    Modal_Document_Contato.style.display = "block";
}
function ClickedOverLayContato()
{
    OverLay_Document_Contato.style.display = "none";
    Transition_Document_Contato.style.display = "none";
    Modal_Document_Contato.style.display = "none";
}
function ClickedModalContato()
{
    OverLay_Document_Contato.style.display = "none";
    Transition_Document_Contato.style.display = "none";
    Modal_Document_Contato.style.display = "none";
}
function ClickedTransitionContato()
{
    OverLay_Document_Contato.style.display = "none";
    Transition_Document_Contato.style.display = "none";
    Modal_Document_Contato.style.display = "none";
}
Link_Document_Contato.addEventListener('click',ClickedLinkContato);
OverLay_Document_Contato.addEventListener('click',ClickedOverLayContato);
Transition_Document_Contato.addEventListener('click',ClickedTransitionContato);
Modal_Document_Contato.addEventListener('click',ClickedModalContato);
