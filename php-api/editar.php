
<?php
//criando cabelho para quem que ter acesso na api

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

header("Access-Control-Allow-Headers: *");

include_once 'conexao.php';

include_once 'conexao.php';

$response_json=file_get_contents("php://input");
//lendo
 $dados= json_decode($response_json, true);

 if($dados){
    "UPDATE produtos SET titulo :titulo, descricao:descricao WHERE id=:id";
 $edit_produto= $conn->prepare($query_produto);

$edit_produto
  $response_json=[
    "erro"=>false,
    "messagem"=>"produto editado com sucesso",
    "data"=>$dados
}else{
    $response_json=[
        "erro"=>false,
        "messagem"=>"produto não editado com sucesso",
        "data"=>$dados
     ];
 }
 $response_json=[
    "erro"=>false,
    "messagem"=>"acesssoi",
    "data"=>$dados
 ];

 http_response_code(200);
 echo json_encode($response_json);

