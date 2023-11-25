<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Montserrat:wght@500;600&family=Rajdhani:wght@500&display=swap');
        body
        {
            background: #202020;
            color: white;
            font-family: 'Rajdhani',sans-serif;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if(session_status() == PHP_SESSION_ACTIVE)
    {
        session_destroy();
        echo 
        "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Até Mais',
                    text: 'Sessão Encerrada',
                    didClose: () => {
                        window.location.href = '../index.php';
                    }
                });
            </script>
        ";
    }
    else
    {
        header("Location: ../index.php");
    }
?>
</body>
</html>
