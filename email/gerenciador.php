<?php require_once("../backend/updateTable.php")?>
<?php require_once("nowsend.php")?>
<?php require_once("../backend/logindb.php");?>

<!--se n estiver logado, vai para o login-->
<?php
if (isset($_SESSION['logado']) == false) {
    header('Location: https://beginnertests.000webhostapp.com/xlsx-gerador/login.php');
}else{
    $_SESSION['logado'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador do Evento</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Work+Sans&display=swap');
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    html,body{
        width:100%;
        height:100%;
        display: flex;
        justify-content: center;
    }
    body{
        background-color: #dcf7fc;
    }
    body div{
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    h3{
        font-family: 'Work Sans', sans-serif;
        font-size: 30px;
        margin: 21px 0px;
    }
    h3:last-child{
        font-family: 'Work Sans', sans-serif;
        font-size: 30px;
        margin: 0;
    }
    p {
        font-family: 'Work Sans', sans-serif;
        margin: 0px;
        margin-top:8px;
    }
    div form:first-child > p {
        font-family: 'Work Sans', sans-serif;
        margin: 0;
    }
    div:first-child a{
        border: none;
        font-family: 'Work Sans', sans-serif;
        border-radius: 20px;
        background-color: #0274de;
        font-size: 20px;
        padding: 10px;
        margin: 5px;
        color: #dcf7fc;
        cursor: pointer;
    }
    label{
        font-family: 'Work Sans', sans-serif;
    }
    input[type="submit"]{
        border: none;
        font-family: 'Work Sans', sans-serif;
        border-radius: 20px;
        background-color: #0274de;
        font-size: 20px;
        padding: 10px;
        color: #dcf7fc;
        cursor: pointer;
    }
    .status{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: bold;
    }
    .error{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: tomato;
        font-weight: bold;
    }
    /*BOTÃO RADIO*/
    :root{
        --white:#fff;
        --smoke-white:#f1f3f5;
        --blue:#4169e1;
    }
    .container{
        position:relative;
        width:100%;
        height:100%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .selector{
        position: relative;
        background: azure;
        margin: 16px;
        width: 100%;
        height: 15vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-radius: 10px;
    }
    .selecotr-item{
        position:relative;
        flex-basis:calc(70% / 3);
        height:100%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .selector-item_radio{
        appearance:none;
        display:none;
    }
    .selector-item_label{
        position: relative;
        height: 100%;
        width: 143px;
        text-align: center;
        border-radius: 9999px;
        font-weight: 900;
        padding-top: 3px;
        transition-duration: .5s;
        transition-property: transform, color, box-shadow;
        transform: none;
        cursor: pointer;
    }
    .selector-item_radio:checked + .selector-item_label{
        background-color: #0274de;
        color: var(--white);
        transform: translateY(-2px);
    }
    @media (max-width:480px) {
        .selector{
            width: 90%;
        }
    }
</style>
<body>
    <div>
        <h3>Configure as informações do evento</h3>

        <form method="post">
            <h3>Enviar email agora?</h3>
            <input type="submit" name="agora" value="Enviar Corrente de Email"/>
        </form>
        <?php
                if (isset($_POST['status2'])) {
                    echo "<p>".$_POST['status2']."</p>";
                }elseif (isset($_POST['error2'])) {
                    echo "<p class='error'>".$_POST['status2']."</p>";
                }
        ?>

        <h3>Baixar a tabela dos clientes cadastrados, atualizada.</h3>
        <a href="<?php echo "../xlsx-files/".scandir("../xlsx-files")[2]?>" download="<?php scandir("../xlsx-files")[2]?>">Baixar</a>
    </div>
</body>
</html>