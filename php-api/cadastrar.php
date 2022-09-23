<?php
//criando cabelho para quem que ter acesso na api

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

header("Access-Control-Allow-Headers: *");
//header("Access-Control-Allow-Headers: GET,PUT,DELETE,POST");

//formatos qye quero receber
//inculuido conexão
include_once 'conexao.php';

$response_json=file_get_contents("php://input");
//lendo
 $dados= json_decode($response_json, true);


if($dados){
   $query_produto="INSERT INTO produtos (titulo, descricao) VALUES (:titulo, :descricao)";
   $car_produto= $conn->prepare($query_produto);
   
   $car_produto->bindParam(':titulo', $dados['produto']['titulo']);
   $car_produto->bindParam(':descricao', $dados['produto']['descricao']);
   $car_produto->execute();
   //verificar
   if($car_produto->rowCount()){
    $response=[
        "erro"=>false,
        "messagem"=>"Produto cadastrado"
    ];
   }else{
    $response=[
        "erro"=>true,
        "messagem"=>"Produto não cadastrado"
    ];
   }
   
}else{
    $response=[
        "erro"=>true,
        "messagem"=>"Produto não cadastrado"
    ];
}

http_response_code(200);
echo json_encode($dados);