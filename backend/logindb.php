<?php
session_start();

#entrando no banco
$db = new PDO("mysql:dbname=xlsx;host=localhost","root","");
//$db = new PDO("mysql:dbname=id17747588_xlsx;host=localhost","id17747588_watt1237","20512806@OkKK");

if (isset($_POST['btn'])) {
    
    #selecionando os registros dos adms
    $query = $db->query("SELECT * FROM adms WHERE admCode = "."'".$_POST['cod']."'");

    #executando e linkando os parametros
    $query->execute();

    $arrayinfo = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!isset($arrayinfo[0])) {
        $_POST['error'] = "<p>Código incorreto, preencha novamente.</p>";
    }else{
        $_SESSION['logado'];
        $_SESSION['logado'] = "ok";
    }

}
