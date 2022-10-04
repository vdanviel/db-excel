<?php require_once("backend/formInsert.php")?>
<?php require_once("backend/generator.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digite as informações</title>
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
    #fundo-form form input[type="text"],input[type="email"],input[type="number"]{
        border: none;
        border-radius: 20px;
        width: 200px;
        height: 23px;
    }
    /*tirando o scroll do inpur number*/
    input[type=number]::-webkit-inner-spin-button { 
        -webkit-appearance: none;
    }
    input[type=number] { 
        -moz-appearance: textfield;
        appearance: textfield;

    }
    #fundo-form form{
        align-items: center;
        display: flex;
        flex-direction: column;
        margin: 0;
    }
    i{
        color: #efe930;
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
    p{
        text-align: center;
        margin: 8px 0px;
        margin-bottom: 32px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    h2:first-child{
        margin-top: 0;
    }
    h2{
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        margin-top:8px;
        margin-bottom:3px;
        font-size: 17px;
    }
    h4{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        margin: 5px 0px;
    }
    h5{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        margin: 5px 0px;
        margin-top: 10px;
        width: fit-content;
    }
    h6{
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 4px;
        margin-bottom: 8px;
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
    <h1>Coleta de informações</h1>
    <p>Bom oque vai acontecer aqui é que o site vai coletar<br> as informações desse formulário<br> para o banco de dados, e depois converter a tabela para Excel.<br><i>Somente os campos com * são obrigatórios.</i></p>
    <div id="fundo-form">
        <form method="post">
            <h2>Nome:*</h2>
            <input type="text" name="name">
            <h2>Comida Favorita:</h2>
            <input type="text" name="comida">
            <h2>Número da Sorte:</h2><h6>(algum número que você goste)</h6>
            <input type="number" name="num">
            <input type="submit" name="btn" value="Enviar">
            <?php
                if (isset($_POST["btn"])) {

                    if (isset($_POST["status"])) {
                        echo $_POST["status"];
                        unset($_POST["status"]);
                    }

                    if (isset($_POST["success"]) ){
                        echo $_POST["success"];
                        unset($_POST["success"]);

                    }elseif(isset($_POST["error"])){
                        echo $_POST["error"];
                        unset($_POST["error"]);

                    }
                }
            ?>
        </form>
    </div>

    <a href="login.php">Você é um administrador? Log-in.</a>

</body>
</html>