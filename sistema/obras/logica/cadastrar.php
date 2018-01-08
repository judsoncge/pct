<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$denominacao = strtoupper($_POST["denominacao"]);

$objeto = strtoupper($_POST["objeto"]);

$local = strtoupper($_POST["local"]);

$data_inicio = $_POST["data_inicio"];

$data_termino = $_POST["data_termino"];

$status = strtoupper($_POST["status"]);

$percentual_execucao = strtoupper($_POST["percentual_execucao"]);

$data_referencia = $_POST["data_referencia"];

$beneficiarios = strtoupper($_POST["beneficiarios"]);

$id_contrato = $_POST["id_contrato"];

$valor_obra = $_POST["valor_obra"];

$origem_recurso = strtoupper($_POST["origem_recurso"]);

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_obra($conexao_com_banco, $orgao, $denominacao, $objeto, $local, $data_inicio, $data_termino, $status, $percentual_execucao, $data_referencia, $beneficiarios, $id_contrato, $valor_obra, $origem_recurso, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>