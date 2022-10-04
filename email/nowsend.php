<?php

#CHAMANDO O PHPMAILER
require_once("../composer/vendor/autoload.php");

#CHAMANDO AS CLASSES NECESSÁRIAS
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

#PROCESSO DE ENVIO

$file = scandir("../xlsx-files")[2];#arquivo da tabela final.

if(isset($_POST['agora'])){

    #ENVIANDO EMAIL
    $mail = new PHPMailer();#true se quiser ativar os debugs

    try {

        $mail->SMTPDebug = SMTP::DEBUG_OFF;#ativa o degub de client/server
        $mail->isSMTP();#indica que o metodo será SMTP
        $mail->Host = "smtp.gmail.com";#host do SMTP
        $mail->SMTPAuth = true;#indica que quer se autenticar no host do SMTP
        #AUTENTICANDO-SE NO SMTP
        $mail->Username = "uplab.developers@gmail.com";#usuário SMTP
        $mail->Password = "20512806";#senha SMTP
        $mail->Port=587;#587 ou 465 são as portas SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; #encripta a mensagem
        $mail->addAttachment("../xlsx-files/".$file);#adicionar anexo
        $mail->Body = utf8_decode("Email do site Beginner Tests, lista de clientes em anexo.");

        #quem ira enviar o email
        $mail->setFrom('uplab.developers@gmail.com');

        #assunto do email
        $mail->Subject = utf8_decode("Não responda. Lista dos Clientes - Site.");

        #quem ira receber o email
        $mail->addAddress('eucreio119@gmail.com');
        $mail->addAddress('amigod3d3us@gmail.com');

        #mandar email
        $mail->send();
        $_POST['status2'] = "Enviado!";

    } catch (Exception $e ) {

        $_POST['error2'] = "Algo deu errado. Fale com o administrador. [ERRO]: {$mail->ErrorInfo}";

    }
}