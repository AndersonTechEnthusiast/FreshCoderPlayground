<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/User/ColetaDeDados/ColetaDeDados.css">
    <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <section class="formColetadados">
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
           if(@$_SESSION['usuario']['Login'] == true && @$_SESSION['usuario']['nivel_acessos'] == 'usuario')
           {
            $METHOD = $_POST;
            if(implode('',array_keys($METHOD)) == 'valueNome')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Nome</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['usuario']['id'].'">
                        <div class="InputsBorder" id="BorderNome">
                            <i class="fa-regular fa-circle-user" id="IconNome"></i>
                            <input type="text" name="nome" class="Input" value="'.implode('',array_values($METHOD)).'" id="NomeVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorNome"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" value="Atualizar Nome" id="SubmitAtualizar">
                        </div>
                    </form>
                </div>
                ';
                echo 
                "
                    <script>
                        let Nome = document.getElementById('NomeVerificacion');
                        let Border = document.getElementById('BorderNome');
                        let Icone = document.getElementById('IconNome');
                        let MensageNome = document.getElementById('MenssageErrorNome');
                        let SubmitNome = document.getElementById('SubmitAtualizar');
                        function Verificicao()
                        {
                            Nome.value = Nome.value.replace(/[^a-zA-Z\s]/g,'');
                            if(
                                Nome.value.length >= 40 ||
                                Nome.value.length >= 30 ||
                                Nome.value.length >= 20 || 
                                Nome.value.length >= 10
                            )
                            {
                                Nome.value = Nome.value.slice(0,40);
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid rgb(0,255,0)';
                                Nome.style.transition = '1s';
                                Nome.style.color = 'rgb(0,255,0)';
                                MensageNome.style.display = 'none';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'rgb(0,255,0)';
                                return true;
                            }
                            else
                            {
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid red';
                                Nome.style.transition = '1s';
                                Nome.style.color = 'red';
                                MensageNome.style.display = 'block';
                                MensageNome.style.width = '100%';
                                MensageNome.style.textAlign = 'center';
                                MensageNome.style.color = 'red';
                                MensageNome.style.fontSize = '20px';
                                MensageNome.textContent = ' O Nome deve ser Completo ';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'red';
                                return false;
                            }
                        }
                        function Submit(event)
                        {
                            if(Verificicao() == true)
                            {
                                return true;
                            }
                            else
                            {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'A Informações Erradas',
                                    text:  'As Informações não foram enviadas , revize as diretrizes',
                                });
                            }
                        }
                        Nome.addEventListener('input',Verificicao);
                        SubmitNome.addEventListener('click',Submit);
                    </script>
                ";
            }
            else
            if(implode('',array_keys($METHOD)) == 'valueEmail')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Email</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['usuario']['id'].'">
                        <div class="InputsBorder" id="BorderEmail">
                            <i class="fa-solid fa-envelope" id="IconEmail"></i>
                            <input type="text" name="email" class="Input" value="'.implode('',array_values($METHOD)).'" id="EmailVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorEmail"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" id="SubmitAtualizar" value="Atualizar E-Mail">
                        </div>
                    </form>
                </div>
                ';
                echo 
                "
                    <script>
                        let Email = document.getElementById('EmailVerificacion');
                        let Border = document.getElementById('BorderEmail');
                        let Icone = document.getElementById('IconEmail');
                        let MensageEmail =  document.getElementById('MenssageErrorEmail');
                        let SubmitEmail = document.getElementById('SubmitAtualizar');
                        function Verificicao()
                        {
                            var RegexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                            if(RegexEmail.test(Email.value))
                            {
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid rgb(0,255,0)';
                                Email.style.transition = '1s';
                                Email.style.color = 'rgb(0,255,0)';
                                MensageEmail.style.display = 'none';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'rgb(0,255,0)';
                                return true;
                            }
                            else
                            {
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid red';
                                Email.style.transition = '1s';
                                Email.style.color = 'red';
                                MensageEmail.style.display = 'block';
                                MensageEmail.style.width = '100%';
                                MensageEmail.style.textAlign = 'center';
                                MensageEmail.style.color = 'red';
                                MensageEmail.style.fontSize = '20px';
                                MensageEmail.textContent = ' O Email deve ser Valido';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'red';
                                return false;
                            }
                        }
                        function Submit(event)
                        {
                            if(Verificicao() == true)
                            {
                                return true;
                            }
                            else
                            {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'A Informações Erradas',
                                    text:  'As Informações não foram enviadas , revize as diretrizes',
                                });
                            }
                        }
                        Email.addEventListener('input',Verificicao);
                        SubmitEmail.addEventListener('click',Submit);
                    </script>
                ";
            }
            else
            if(implode('',array_keys($METHOD)) == 'valueTelefone')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Telefone</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['usuario']['id'].'">
                        <div class="InputsBorder" id="BorderTelefone">
                            <i class="fa-solid fa-phone" id="IconTelefone"></i>
                            <input type="text" name="telefone" class="Input" value="'.implode('',array_values($METHOD)).'" id="TelefoneVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorTelefone"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" id="SubmitAtualizar" value="Atualizar Telefone">
                        </div>
                    </form>
                </div>
                ';

                echo 
                "
                    <script>
                    let Telefone = document.getElementById('TelefoneVerificacion');
                    let Border = document.getElementById('BorderTelefone');
                    let Icone = document.getElementById('IconTelefone');
                    let MensageTelefone =  document.getElementById('MenssageErrorTelefone');
                    let SubmitTelefone = document.getElementById('SubmitAtualizar');
                    function Verificicao()
                    {
                    
                        Telefone.value = Telefone.value.replace(/\D/g,'');
                        Telefone.value = Telefone.value.replace(/\s/g,'');
                        if(Telefone.value.length >= 11)
                        {
                            Telefone.value = Telefone.value.slice(0,11);
                            Telefone.value = Telefone.value.replace(/^(\d{2})(\d{5})(\d{4})/ , '($1) $2 - $3');
                            Telefone.style.transition = '1s';
                            Telefone.style.color = 'rgb(0,255,0)';
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid rgb(0,255,0)';
                            Telefone.style.transition = '1s';
                            Telefone.style.color = 'rgb(0,255,0)';
                            MensageTelefone.style.display = 'none';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'rgb(0,255,0)';
                            return true;
                        }
                        else
                        {
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid red';
                            Telefone.style.transition = '1s';
                            Telefone.style.color = 'red';
                            MensageTelefone.style.display = 'block';
                            MensageTelefone.style.width = '100%';
                            MensageTelefone.style.textAlign = 'center';
                            MensageTelefone.style.color = 'red';
                            MensageTelefone.style.fontSize = '20px';
                            MensageTelefone.textContent = '(XX) XXXXX - XXXX';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'red';
                            return false;
                        }
                    }
                    function Submit(event)
                    {
                        if(Verificicao() == true)
                        {
                            return true;
                        }
                        else
                        {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'A Informações Erradas',
                                text:  'As Informações não foram enviadas , revize as diretrizes',
                            });
                        }
                    }
                    Telefone.addEventListener('input',Verificicao);
                    SubmitTelefone.addEventListener('click',Submit);
                    </script>
                ";;
            }
            else
            if(implode('',array_keys($METHOD)) == 'valueSenha')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Senha</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['usuario']['id'].'">
                        <div class="InputsBorder" id="BorderSenha">
                            <i class="fa-solid fa-key" id="IconSenha"></i>
                            <i class="fa-solid fa-eye" id="Eye-Open"></i>
                            <i class="fa-regular fa-eye-slash" id="Eye-Close"></i>
                            <input type="password" name="senha" class="Input" value="'.implode('',array_values($METHOD)).'" id="SenhaVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorSenha"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" value="Atualizar Senha">
                        </div>
                    </form>
                </div>
                ';
                
                echo 
                "
                    <script>
                    let Senha = document.getElementById('SenhaVerificacion');
                    let Border = document.getElementById('BorderSenha');
                    let Icone = document.getElementById('IconSenha');
                    let MensageSenha =  document.getElementById('MenssageErrorSenha');
                    let SubmitSenha = document.getElementById('SubmitAtualizar');
                    function Verificicao()
                    {
                        if(Senha.value.length >= 8)
                        {
                            Senha.value = Senha.value.slice(0,8);
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid rgb(0,255,0)';
                            Senha.style.transition = '1s';
                            Senha.style.color = 'rgb(0,255,0)';
                            MensageSenha.style.display = 'none';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'rgb(0,255,0)';
                            return true;
                        }
                        else
                        {
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid red';
                            Senha.style.transition = '1s';
                            Senha.style.color = 'red';
                            MensageSenha.style.display = 'block';
                            MensageSenha.style.width = '100%';
                            MensageSenha.style.textAlign = 'center';
                            MensageSenha.style.color = 'red';
                            MensageSenha.style.fontSize = '20px';
                            MensageSenha.textContent = ' A Senha deve conter 8 Caracteres';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'red';
                            return false;
                        }
                    }
                    function Submit(event)
                    {
                        if(Verificicao() == true)
                        {
                            return true;
                        }
                        else
                        {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'A Informações Erradas',
                                text:  'As Informações não foram enviadas , revize as diretrizes',
                            });
                        }
                    }
                    Senha.addEventListener('input',Verificicao);
                    SubmitSenha.addEventListener('click',Submit);
                    </script>
                ";

            }
           }
           else
           if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
           {
            $METHOD = $_POST;
            if(implode('',array_keys($METHOD)) == 'valueNome')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Nome</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['autor']['id'].'">
                        <div class="InputsBorder" id="BorderNome">
                            <i class="fa-regular fa-circle-user" id="IconNome"></i>
                            <input type="text" name="nome" class="Input" value="'.implode('',array_values($METHOD)).'" id="NomeVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorNome"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" value="Atualizar Nome" id="SubmitAtualizar">
                        </div>
                    </form>
                </div>
                ';
                echo 
                "
                    <script>
                        let Nome = document.getElementById('NomeVerificacion');
                        let Border = document.getElementById('BorderNome');
                        let Icone = document.getElementById('IconNome');
                        let MensageNome = document.getElementById('MenssageErrorNome');
                        let SubmitNome = document.getElementById('SubmitAtualizar');
                        function Verificicao()
                        {
                            Nome.value = Nome.value.replace(/[^a-zA-Z\s]/g,'');
                            if(
                                Nome.value.length >= 40 ||
                                Nome.value.length >= 30 ||
                                Nome.value.length >= 20 || 
                                Nome.value.length >= 10
                            )
                            {
                                Nome.value = Nome.value.slice(0,40);
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid rgb(0,255,0)';
                                Nome.style.transition = '1s';
                                Nome.style.color = 'rgb(0,255,0)';
                                MensageNome.style.display = 'none';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'rgb(0,255,0)';
                                return true;
                            }
                            else
                            {
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid red';
                                Nome.style.transition = '1s';
                                Nome.style.color = 'red';
                                MensageNome.style.display = 'block';
                                MensageNome.style.width = '100%';
                                MensageNome.style.textAlign = 'center';
                                MensageNome.style.color = 'red';
                                MensageNome.style.fontSize = '20px';
                                MensageNome.textContent = ' O Nome deve ser Completo ';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'red';
                                return false;
                            }
                        }
                        function Submit(event)
                        {
                            if(Verificicao() == true)
                            {
                                return true;
                            }
                            else
                            {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'A Informações Erradas',
                                    text:  'As Informações não foram enviadas , revize as diretrizes',
                                });
                            }
                        }
                        Nome.addEventListener('input',Verificicao);
                        SubmitNome.addEventListener('click',Submit);
                    </script>
                ";
            }
            else
            if(implode('',array_keys($METHOD)) == 'valueEmail')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Email</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['autor']['id'].'">
                        <div class="InputsBorder" id="BorderEmail">
                            <i class="fa-solid fa-envelope" id="IconEmail"></i>
                            <input type="text" name="email" class="Input" value="'.implode('',array_values($METHOD)).'" id="EmailVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorEmail"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" id="SubmitAtualizar" value="Atualizar E-Mail">
                        </div>
                    </form>
                </div>
                ';
                echo 
                "
                    <script>
                        let Email = document.getElementById('EmailVerificacion');
                        let Border = document.getElementById('BorderEmail');
                        let Icone = document.getElementById('IconEmail');
                        let MensageEmail =  document.getElementById('MenssageErrorEmail');
                        let SubmitEmail = document.getElementById('SubmitAtualizar');
                        function Verificicao()
                        {
                            var RegexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                            if(RegexEmail.test(Email.value))
                            {
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid rgb(0,255,0)';
                                Email.style.transition = '1s';
                                Email.style.color = 'rgb(0,255,0)';
                                MensageEmail.style.display = 'none';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'rgb(0,255,0)';
                                return true;
                            }
                            else
                            {
                                Border.style.transition = '1s';
                                Border.style.border = '2px solid red';
                                Email.style.transition = '1s';
                                Email.style.color = 'red';
                                MensageEmail.style.display = 'block';
                                MensageEmail.style.width = '100%';
                                MensageEmail.style.textAlign = 'center';
                                MensageEmail.style.color = 'red';
                                MensageEmail.style.fontSize = '20px';
                                MensageEmail.textContent = ' O Email deve ser Valido';
                                Icone.style.transition = '1s';
                                Icone.style.color = 'red';
                                return false;
                            }
                        }
                        function Submit(event)
                        {
                            if(Verificicao() == true)
                            {
                                return true;
                            }
                            else
                            {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'A Informações Erradas',
                                    text:  'As Informações não foram enviadas , revize as diretrizes',
                                });
                            }
                        }
                        Email.addEventListener('input',Verificicao);
                        SubmitEmail.addEventListener('click',Submit);
                    </script>
                ";
            }
            else
            if(implode('',array_keys($METHOD)) == 'valueTelefone')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Telefone</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['autor']['id'].'">
                        <div class="InputsBorder" id="BorderTelefone">
                            <i class="fa-solid fa-phone" id="IconTelefone"></i>
                            <input type="text" name="telefone" class="Input" value="'.implode('',array_values($METHOD)).'" id="TelefoneVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorTelefone"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" id="SubmitAtualizar" value="Atualizar Telefone">
                        </div>
                    </form>
                </div>
                ';

                echo 
                "
                    <script>
                    let Telefone = document.getElementById('TelefoneVerificacion');
                    let Border = document.getElementById('BorderTelefone');
                    let Icone = document.getElementById('IconTelefone');
                    let MensageTelefone =  document.getElementById('MenssageErrorTelefone');
                    let SubmitTelefone = document.getElementById('SubmitAtualizar');
                    function Verificicao()
                    {
                    
                        Telefone.value = Telefone.value.replace(/\D/g,'');
                        Telefone.value = Telefone.value.replace(/\s/g,'');
                        if(Telefone.value.length >= 11)
                        {
                            Telefone.value = Telefone.value.slice(0,11);
                            Telefone.value = Telefone.value.replace(/^(\d{2})(\d{5})(\d{4})/ , '($1) $2 - $3');
                            Telefone.style.transition = '1s';
                            Telefone.style.color = 'rgb(0,255,0)';
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid rgb(0,255,0)';
                            Telefone.style.transition = '1s';
                            Telefone.style.color = 'rgb(0,255,0)';
                            MensageTelefone.style.display = 'none';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'rgb(0,255,0)';
                            return true;
                        }
                        else
                        {
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid red';
                            Telefone.style.transition = '1s';
                            Telefone.style.color = 'red';
                            MensageTelefone.style.display = 'block';
                            MensageTelefone.style.width = '100%';
                            MensageTelefone.style.textAlign = 'center';
                            MensageTelefone.style.color = 'red';
                            MensageTelefone.style.fontSize = '20px';
                            MensageTelefone.textContent = '(XX) XXXXX - XXXX';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'red';
                            return false;
                        }
                    }
                    function Submit(event)
                    {
                        if(Verificicao() == true)
                        {
                            return true;
                        }
                        else
                        {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'A Informações Erradas',
                                text:  'As Informações não foram enviadas , revize as diretrizes',
                            });
                        }
                    }
                    Telefone.addEventListener('input',Verificicao);
                    SubmitTelefone.addEventListener('click',Submit);
                    </script>
                ";;
            }
            else
            if(implode('',array_keys($METHOD)) == 'valueSenha')
            {
                echo 
                '
                <div class="containerColetaDados">
                    <form class="ColetadeDados" method="POST" action="Editar_Dados_coletados.php">
                        <div class="title">
                            <b> Editar Senha</b>
                        </div>
                        <input type="hidden" name="id" id="'.$_SESSION['autor']['id'].'">
                        <div class="InputsBorder" id="BorderSenha">
                            <i class="fa-solid fa-key" id="IconSenha"></i>
                            <i class="fa-solid fa-eye" id="Eye-Open"></i>
                            <i class="fa-regular fa-eye-slash" id="Eye-Close"></i>
                            <input type="password" name="senha" class="Input" value="'.implode('',array_values($METHOD)).'" id="SenhaVerificacion">
                        </div>
                        <div class="Mensage" id="MenssageErrorSenha"></div>
                        <div class="ButtonSubmit">
                            <input type="submit" class="InputSubmit" value="Atualizar Senha">
                        </div>
                    </form>
                </div>
                ';
                
                echo 
                "
                    <script>
                    let Senha = document.getElementById('SenhaVerificacion');
                    let Border = document.getElementById('BorderSenha');
                    let Icone = document.getElementById('IconSenha');
                    let MensageSenha =  document.getElementById('MenssageErrorSenha');
                    let SubmitSenha = document.getElementById('SubmitAtualizar');
                    function Verificicao()
                    {
                        if(Senha.value.length >= 8)
                        {
                            Senha.value = Senha.value.slice(0,8);
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid rgb(0,255,0)';
                            Senha.style.transition = '1s';
                            Senha.style.color = 'rgb(0,255,0)';
                            MensageSenha.style.display = 'none';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'rgb(0,255,0)';
                            return true;
                        }
                        else
                        {
                            Border.style.transition = '1s';
                            Border.style.border = '2px solid red';
                            Senha.style.transition = '1s';
                            Senha.style.color = 'red';
                            MensageSenha.style.display = 'block';
                            MensageSenha.style.width = '100%';
                            MensageSenha.style.textAlign = 'center';
                            MensageSenha.style.color = 'red';
                            MensageSenha.style.fontSize = '20px';
                            MensageSenha.textContent = ' A Senha deve conter 8 Caracteres';
                            Icone.style.transition = '1s';
                            Icone.style.color = 'red';
                            return false;
                        }
                    }
                    function Submit(event)
                    {
                        if(Verificicao() == true)
                        {
                            return true;
                        }
                        else
                        {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'A Informações Erradas',
                                text:  'As Informações não foram enviadas , revize as diretrizes',
                            });
                        }
                    }
                    Senha.addEventListener('input',Verificicao);
                    SubmitSenha.addEventListener('click',Submit);
                    </script>
                ";

            }
           }
        }
        else
        {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error De Metodo de Envio',
                        text: 'Desculpe, mas as Informações Foram Enviadas de Maneira Incorreta !!!',
                        didClose: () => {
                            window.location.href = '../Autor.php';
                        }
                    });
                </script>
            <?php
        }
    ?> 
    </section>
</body>
</html>
