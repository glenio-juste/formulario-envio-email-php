<?php

/* gmail bloqueia o envio de email: 

   Entrar no e-mail e ir em 'Gerenciar sua conta Google' e acessar o aba de 'Segurança'. Procurar por 
   'Acesso a app menos seguro' e clicar em 'Ativar acesso (não recomendado)'.
   No 'Acesso a app menos seguro', no 'Permitir aplicativos menos seguros' clicar no btn de ativação.

   ** Não esquecer que após o teste de envio, voltar a configuração para NÃO 'Permitir aplicativos menos seguros'.
*/

date_default_timezone_set('America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* para capturar o valores dos campos do formulário:
    $nome = $_POST['nome'];

    Operador ternário

    $nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';    

    A var $nome recebe o nome que está no input da tela (name="nome"). 
    O isset verifica se a variável é definida. O '?' é se for verdadeiro. O ':' é se for falso.

    (...) então, se for verdairo, passa para a var $nome o valor do input (name="nome"), senão passa 'Não informado'

    * isset => caso o usuário não digite a variável, o isset é para não dar erro no PHP.
    O isset não verifica se é diferente de vazio
*/

/*  O trim é para não permitir que o usuário digite só espaço no campo
    O utf8_decode é para não dar erro de caracter no email 
    O !empty é para verificar se o campo não está vazio */



if ((isset($_POST['email']) && !empty(trim($_POST['email']))) &&   // verificar se email/mensagem está setada e não está em branco
        (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {

    $nome = !empty($_POST['nome']) ? $_POST['nome'] : 'Não informado';
    $email = $_POST['email'];
    $assunto = !empty($_POST['assunto']) ? utf8_decode($_POST['assunto']) : 'Não informado';
    $mensagem = $_POST['mensagem'];
    $data = date('d/m/Y H:i:s');

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'email@email.com';
    $mail->Password = 'sua_senha';
    $mail->Port = 587;

    $mail->setFrom('email@email.com');
    $mail->addAddress('email@email.com');

    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = "Nome:  {$nome}<br>
                       Email: {$email}<br>
                       Mensagem: {$mensagem}<br>
                       Data/hora: {$data} ";

    if ($mail->send()) {
        echo 'Email enviado com sucesso.';
    } else {
        echo 'Email nao enviado.';
    }
} else {
    echo 'E-mail não enviado: informar o e-mail e a mesagem.';
}
