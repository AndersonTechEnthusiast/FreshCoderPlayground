let Link_Document_Services = document.getElementById("modal-link-Services");
let OverLay_Document_Services = document.querySelector(".overlay-Services");
let Modal_Document_Services = document.querySelector(".modal-Services");
let Transition_Document_Services = document.querySelector(".Transition-Services");

function ClickedLinkServices(event)
{
    event.preventDefault();
    OverLay_Document_Services.style.display = "block";
    Transition_Document_Services.style.display = "block";
    Modal_Document_Services.style.display = "block";
}
function ClickedOverLayServices()
{
    OverLay_Document_Services.style.display = "none";
    Transition_Document_Services.style.display = "none";
    Modal_Document_Services.style.display = "none";
}
function ClickedModalServices()
{
    OverLay_Document_Services.style.display = "none";
    Transition_Document_Services.style.display = "none";
    Modal_Document_Services.style.display = "none";
}
function ClickedTransitionServices()
{
    OverLay_Document_Services.style.display = "none";
    Transition_Document_Services.style.display = "none";
    Modal_Document_Services.style.display = "none";
}
Link_Document_Services.addEventListener('click',ClickedLinkServices);
OverLay_Document_Services.addEventListener('click',ClickedOverLayServices);
Transition_Document_Services.addEventListener('click',ClickedTransitionServices);
Modal_Document_Services.addEventListener('click',ClickedModalServices);
