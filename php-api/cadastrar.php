<?php
//criando cabelho para quem que ter acesso na api

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Headers: GET,PUT,DELETE,POST");

//formatos qye quero receber
header("Content-Type: application/json; charset-UTF-8");
//inculuido conexão
include_once 'conexao.php';