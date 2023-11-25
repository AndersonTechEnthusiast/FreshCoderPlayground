let Lupa = document.getElementById("IconLupa");
let Send = document.getElementById("IconSend");
let Search = document.getElementById("Pesquisa");
let MensageError = document.getElementById("Mensage-Error");
let SubmitSerach = document.getElementById("ButtonSearch");

function Pesquisar()
{
    if(
        Search.value.length >= 40 ||
        Search.value.length >= 30 ||
        Search.value.length >= 20 ||
        Search.value.length >= 10 )
    {
        Search.value = Search.value.slice(0,40);
        Search.style.transition = '1s';
        Search.style.borderBottom = '5px solid rgb(50, 0, 230)';
        MensageError.style.display = 'none';
        return true;
    }
    else
    {
        Search.style.transition = '1s';
        Search.style.borderBottom = '5px solid red';
        MensageError.style.display = 'block';
        MensageError.style.width = '100%';
        MensageError.style.textAlign = 'center';
        MensageError.style.color = 'red';
        MensageError.style.fontSize = '20px';
        MensageError.textContent = "Insira um Nome de Jogo ou Categoria Valido por favor";
        return false;
    }
}
function SubmitPesquisar(event)
{
    if(Pesquisar() == true)
    {
        return true;
    }
    else
    {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Categoria Inexistente',
            text: 'A Categoria Inserida no Campo de Pesquisa Não existe, Verifique se a Categoria esta Escrita Corretamente',
        });
    }
}
Search.addEventListener('input', Pesquisar);
SubmitSerach.addEventListener('click',SubmitPesquisar);