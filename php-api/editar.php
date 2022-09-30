
<?php
//criando cabelho para quem que ter acesso na api

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

header("Access-Control-Allow-Headers: *");

include_once 'conexao.php';

$response_json=file_get_contents("php://input");
//lendo
 $dados= json_decode($response_json, true);

 if($dados){
   //query
$query_produto= "UPDATE produtos SET titulo=:titulo, descricao=:descricao WHERE id=:id";
//instanciando
$edit_produto= $conn->prepare($query_produto);
//substituido
$edit_produto->bindParam(':titulo',$dados['titulo'], PDO::PARAM_STR);
$edit_produto->bindParam(':descricao',$dados['descricao'], PDO::PARAM_STR);

$edit_produto->bindParam(':id', $dados['id'], PDO::PARAM_INT);

$edit_produto->execute();

if($edit_produto->rowCount()){
   $response=[
      "erro"=>false,
      "messagem"=>"produto editado com sucesso"
      //"data"=>$dados
   ];

}else{
   $response=[
      "erro"=>false,
      "messagem"=>"produto não editado com sucesso!!"
      //"data"=>$dados
   ];
}

}else{
    $response=[
        "erro"=>false,
        "messagem"=>"produto não editado com sucesso!"
        //"data"=>$dados
     ];
 }
 //um array
 /*$response=[
    "erro"=>false,
    "messagem"=>"",
    "data"=>$dados
 ];*/

 http_response_code(200);
 //converte array em um objeto
 echo json_encode($response);
