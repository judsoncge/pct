<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$veiculo = $_POST["veiculo"];

$data_abastecimento = $_POST["data_abastecimento"];

$total_litros = $_POST["total_litros"];

$valor_litro =  $_POST["valor_litro"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_combustivel($conexao_com_banco, $veiculo, $data_abastecimento, $total_litros, $valor_litro, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>