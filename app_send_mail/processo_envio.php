<?php

//print_r($_POST);
require "./bibliotecas/PHPMailer/Exception.php";
require "./bibliotecas/PHPMailer/OAuth.php";
require "./bibliotecas/PHPMailer/PHPMailer.php";
require "./bibliotecas/PHPMailer/POP3.php";
require "./bibliotecas/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Content{
    private $chanel=null;
    private $title=null;
    private $content=null;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
         $this->$atributo=$valor;
    }

    public function ContentValid(){
       // return $this->$atributo;
       //validando
       if(empty($this->chanel) || empty($this->title) || empty($this->content)){
        return false;
       }
       return true;
    }
}

//stanciando

$content=new Content();
//recuperando
$content->__set('chanel', $_POST['chanel']);
$content->__set('title', $_POST['title']);
$content->__set('content', $_POST['content']);

//print_r($content);

if(!$content->ContentValid()){
    echo "Mensagem válida";
    die()
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ssuporte222@gmail.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ssuporte222@gmail.com', 'Tainá');
    $mail->addAddress('ssuporte222@gmail.com', 'Tainá Ferreira');     //Add a recipient
// $mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('tainaferreira0987@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');
   
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Oi';
    $mail->Body    = 'Este é seu corpo <b>in bold!</b>';
    $mail->AltBody = 'oi';

    $mail->send();
    echo 'Não foi possivel enviar este email';
} catch (Exception $e) {
    echo "Detalhes: {$mail->ErrorInfo}";
}

