<?php
    #INSERINDO CLIENTES
    #entrando no db
    $db = new PDO("mysql:dbname=xlsx;host=localhost","root","");
    //$db = new PDO("mysql:dbname=id17747588_xlsx;host=localhost","id17747588_watt1237","20512806@OkKK");

    #PROCESSO DO COMANDO
    if (isset($_POST["btn"])) {

        #as info digitadas pelo user
        $forminfos = array(
            "nome"=> $_POST["name"],
            "comida"=> $_POST["comida"],
            "num"=> intval($_POST["num"]) 
        );

        #INSERINDO AS INFORMAÇÕES NO BANCO
        #comando
        $cmdrowINSERT = $db->prepare("INSERT INTO users (nomeUser,comidaUser,numUser) VALUES(:NOME,:COMIDA,:NUMERO)");
        
        #possiveis erros de campo
        if (empty($forminfos["nome"])) {
            $_POST["status"] = "<h5>Atenção, o campo do seu nome é obrigatório.</h5>";
        }else{

            #INSERINDO OS PARAMETROS DO COMANDO

            #nome obrigatório
            $cmdrowINSERT->bindParam(":NOME",$forminfos["nome"]);

            #informação não obrigatória EMAIL
            if (empty($forminfos["comida"])){
                $NOfood = "N/A";
                $cmdrowINSERT->bindParam(":COMIDA",$NOfood);
            }else{
                $cmdrowINSERT->bindParam(":COMIDA",$forminfos["comida"]);
            }

            #informação não obrigatória TELEFONE
            if (empty($forminfos["num"])){
                $NOnum = "N/A";
                $cmdrowINSERT->bindParam(":NUMERO",$NOnum);
            }else{
                $cmdrowINSERT->bindParam(":NUMERO",$forminfos["num"]);
            }
            
            #mengagem de confirmação e execução
            if ($cmdrowINSERT->errorCode()) {
                $_POST["error"] = "<h5>Algo deu errado. Vai falar com o Vitão. [ERROR]: ".$cmdrowINSERT->errorCode()."</h5>";
            }else{
                $_POST["success"] = "<h5>Formulário enviado com sucesso!<br>Se quiser se cadastrar denovo, você pode :)<br>(pode ser um formulário fictício)</h5>";
                $cmdrowINSERT->execute();
            }

        }
    }
