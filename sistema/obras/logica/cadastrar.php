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

$situacao = strtoupper($_POST["situacao"]);

$percentual_execucao = strtoupper($_POST["percentual_execucao"]);

$data_referencia = $_POST["data_referencia"];

$m = validar_datas_obras($data_inicio, $data_termino, $data_referencia);

if($m!=""){
	echo "<script>alert('$m')</script>";
	echo "<script>history.back();</script>";
	die();
}

$beneficiarios = strtoupper($_POST["beneficiarios"]);

$id_contrato = $_POST["id_contrato"];

$valor_obra = $_POST["valor_obra"];

$origem_recurso = strtoupper($_POST["origem_recurso"]);

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_obra($conexao_com_banco, $orgao, $denominacao, $objeto, $local, $data_inicio, $data_termino, $situacao, $percentual_execucao, $data_referencia, $beneficiarios, $id_contrato, $valor_obra, $origem_recurso, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>