var file = document.getElementById("inImg");
var img = document.getElementById("image");

function PreviewView(Var)
{
    img.src = URL.createObjectURL(Var.target.files[0])
}
file.addEventListener("change",PreviewView);