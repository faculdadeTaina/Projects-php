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

if( $content->ContentValid()){
    echo "Mensagem válida";
}else{
    echo "Mensagem invalida";
}
