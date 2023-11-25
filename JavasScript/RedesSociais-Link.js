let Link_Document_RedesSociais = document.getElementById("modal-link-RedesSociais");
let OverLay_Document_RedesSociais = document.querySelector(".overlay-RedesSociais");
let Modal_Document_RedesSociais = document.querySelector(".modal-RedesSociais");
let Transition_Document_RedesSociais = document.querySelector(".Transition-RedesSociais");

function ClickedLinkRedesSociais(event)
{
    event.preventDefault();
    OverLay_Document_RedesSociais.style.display = "block";
    Transition_Document_RedesSociais.style.display = "block";
    Modal_Document_RedesSociais.style.display = "block";
}
function ClickedOverLayRedesSociais()
{
    OverLay_Document_RedesSociais.style.display = "none";
    Transition_Document_RedesSociais.style.display = "none";
    Modal_Document_RedesSociais.style.display = "none";
}
function ClickedModalRedesSociais()
{
    OverLay_Document_RedesSociais.style.display = "none";
    Transition_Document_RedesSociais.style.display = "none";
    Modal_Document_RedesSociais.style.display = "none";
}
function ClickedTransitionRedesSociais()
{
    OverLay_Document_RedesSociais.style.display = "none";
    Transition_Document_RedesSociais.style.display = "none";
    Modal_Document_RedesSociais.style.display = "none";
}
Link_Document_RedesSociais.addEventListener('click',ClickedLinkRedesSociais);
OverLay_Document_RedesSociais.addEventListener('click',ClickedOverLayRedesSociais);
Transition_Document_RedesSociais.addEventListener('click',ClickedTransitionRedesSociais);
Modal_Document_RedesSociais.addEventListener('click',ClickedModalRedesSociais);
