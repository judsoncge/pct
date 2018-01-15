<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$beneficiario = $_POST["beneficiario"];

$orgao = retorna_orgao_servidor($beneficiario, $conexao_com_banco);

$data_ida = $_POST["data_ida"];

$data_volta = $_POST["data_volta"];

$valor_ida =  $_POST["valor_ida"];

$valor_volta =  $_POST["valor_volta"];

$bilhete = $_POST["bilhete"];

$destino = strtoupper($_POST["destino"]);

$finalidade = strtoupper($_POST["finalidade"]);

$data_prestacao_contas = $_POST["data_prestacao_contas"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_passagem_aerea($conexao_com_banco, $beneficiario, $orgao, $data_ida, $data_volta, $valor_ida, $valor_volta, $bilhete, $finalidade, $destino, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>