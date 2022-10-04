<?php require_once('backend/logindb.php')?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM Login</title>
</head>
<style>
      html,body{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-color: #00b072;
    }
    #fundo-form{
        background-color: rgb(224, 224, 224);
        width: fit-content;
        align-self: center;
        border-radius: 16px;
        padding: 30px;
    }
    #fundo-form h1{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    #fundo-form form input[type="password"]{
        border: none;
        border-radius: 20px;
        width: 200px;
        height: 23px;
        padding: 4px;
    }
    #fundo-form form{
        align-items: center;
        display: flex;
        flex-direction: column;
        margin: 0;
    }
    #fundo-form form input[type="submit"]{
        border: none;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        border-radius: 20px;
        background-color: #00b072;
        font-size: 18px;
        margin-top: 18px;
        cursor: pointer;
        padding: 5px;
    }
    h1{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        margin: 8px 0px;
    }
    h2{
        font-family: Arial, Helvetica, sans-serif;
        margin: 10px 0px;
        font-size: 17px;
    }
    p{
        text-align: center;
        margin: 8px 0px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: #d9c034;
    }
    a{
        font-family: Arial, Helvetica, sans-serif;
        margin-top:20px;
    }
    ::placeholder{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>
<body>
    
<h1>Entre no gerenciador de dados</h1>
<h2>Digite o código passado pelo administrador.</h2>
    <div id="fundo-form">
        <form method="post">
            <input type="password"  placeholder="Digite o código aqui." name="cod">
            <input type="submit" name="btn" value="Entrar">
        </form>
    </div>
    <?php
    if (isset($_POST['error'])) {
        echo $_POST['error'];
    }
    ?>

    <a href="xlsx.php">Volte para o formulário</a>
</body>
</html>