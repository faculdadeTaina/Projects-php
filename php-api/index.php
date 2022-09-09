
<?php
//criando cabelho para quem que ter acesso na api

header("Access-Control-Allow-Origin: *");
//formatos qye quero receber
header("Content-Type: application/json; charset-UTF-8");
//inculuido conexão
include_once 'conexao.php';

$query_produtos="SELECT id, titulo, descricao FROM produtos ORDER BY id DESC";
$result_produtos=$conn->prepare($query_produtos);
$result_produtos->execute();


//verifficar
if(($result_produtos) AND ($result_produtos->rowCount() !=0)){
    while($row_produto=$result_produtos->fetch(PDO::FETCH_ASSOC)){
       //lendo
        //var_dump($row_produto);
        extract($row_produto);

        $lista_produtos["records"][$id]=[
            'id'=>$id,
            'titulo'=>$titulo,
            'descricao'=>$descricao
        ];
        
    }
//dando a resposta
http_response_code(200);
//retornando os produtos em formato json
echo json_encode($lista_produtos);

};

?>