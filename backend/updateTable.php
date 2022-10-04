<?php
    #GERANDO O XLSX

    $db = new PDO("mysql:dbname=xlsx;host=localhost","root","");
    //$db = new PDO("mysql:dbname=id17747588_xlsx;host=localhost","id17747588_watt1237","20512806@OkKK");

    #antigo nome da tabela (na hora de codar é nesse)
    $filename = "Tabela dos Clientes.csv";

    #definindo a data/hora para Brasil
    date_default_timezone_set('America/Sao_Paulo');
    $date = strval(date("d.m.y"));#data atual
    $time = strval(date("H.i"));#tempo atual
    #novo nome do arquivo
    $new_filename = "Tabela_Clientes(".$date.")(".$time.").xlsx";

    #abrindo arquivo
    $csv = fopen($filename,"w+");

    #CHAMANDO AS INFORMAÇÕES DA TABELA
    $cmdrowSELECT = $db->prepare("SELECT * FROM users ORDER BY idUser DESC");
    #executando
    $cmdrowSELECT->execute();

    #array das informações gerais:
    $arraySELECT = $cmdrowSELECT->fetchAll(PDO::FETCH_ASSOC);

    #PEGANDO OS CABEÇALHOS DA TABELA. (SOMENTE OS CABEÇALHOS.)
    $headers = array();#os cabeçalhos estão nesta variável.
    foreach ($arraySELECT[0] as $key => $value) {
        
        array_push($headers, $key);

    }
    #escrevendo os cabeçalhos na tabela .csv
    fwrite($csv,implode(",",$headers)."\r\n");

    #PEGANDO AS INFORMAÇÕES DA TABELA.
    foreach ($arraySELECT as $user) {
        
        $data = array();#as informações ficaram aqui
        foreach ($user as $key => $value) {
            array_push($data,$value);
        }
        #escrevendo as informações na tabela
        fwrite($csv,implode(",",$data)."\r\n");
    }

    #converter o arquivo para XLSX

    #diretório onde as tabelas ficam
    $files_array = scandir("../xlsx-files");

    foreach ($files_array as $value) {
        if (!in_array($value,array(".",".."))) 
            
            if ($value != $new_filename) {
                unlink("../xlsx-files/".$value);
            }
        
    }

    #TRANSFORMANDO CSV EM XLSX
    rename($filename, "../xlsx-files/".$new_filename);
    
    fclose($csv);
