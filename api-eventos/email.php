<?php

$data = json_decode(file_get_contents("php://input"));
$mensagem = $data->mensagem;
$assunto = $data->assunto;

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'micaela.canal@universo.univates.br');
define('GPWD', '********');

function smtpmailer($para, $de, $de_nome, $assunto, $corpo)
{
    $corpo .= "\n\nEsta é uma mensagem automática. Favor não responder.";

    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();        // Ativar SMTP
    $mail->SMTPDebug = 1;        // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;        // Autenticação ativada
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';    // SMTP utilizado
    $mail->Port = 587;        // A porta 587 deverá estar aberta em seu servidor
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = iconv(mb_detect_encoding($assunto), 'windows-1252', $assunto);
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Mensagem enviada!';
        return true;
    }
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER),
if (smtpmailer(GUSER, GUSER, 'Eventos', $assunto, $mensagem)) {
}

if (!empty($error)) echo $error;
?>