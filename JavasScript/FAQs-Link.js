let Link_Document_FAQs = document.getElementById("modal-link-FAQs");
let OverLay_Document_FAQs = document.querySelector(".overlay-FAQs");
let Modal_Document_FAQs = document.querySelector(".modal-FAQs");
let Transition_Document_FAQs = document.querySelector(".Transition-FAQs");

function ClickedLinkFAQs(event)
{
    event.preventDefault();
    OverLay_Document_FAQs.style.display = "block";
    Transition_Document_FAQs.style.display = "block";
    Modal_Document_FAQs.style.display = "block";
}
function ClickedOverLayFAQs()
{
    OverLay_Document_FAQs.style.display = "none";
    Transition_Document_FAQs.style.display = "none";
    Modal_Document_FAQs.style.display = "none";
}
function ClickedModalFAQs()
{
    OverLay_Document_FAQs.style.display = "none";
    Transition_Document_FAQs.style.display = "none";
    Modal_Document_FAQs.style.display = "none";
}
function ClickedTransitionFAQs()
{
    OverLay_Document_FAQs.style.display = "none";
    Transition_Document_FAQs.style.display = "none";
    Modal_Document_FAQs.style.display = "none";
}
Link_Document_FAQs.addEventListener('click',ClickedLinkFAQs);
OverLay_Document_FAQs.addEventListener('click',ClickedOverLayFAQs);
Transition_Document_FAQs.addEventListener('click',ClickedTransitionFAQs);
Modal_Document_FAQs.addEventListener('click',ClickedModalFAQs);
