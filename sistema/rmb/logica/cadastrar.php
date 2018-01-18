<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$tipo_patrimonio = strtoupper($_POST["tipo_patrimonio"]);

$classificacao_contabil = $_POST["classificacao_contabil"];

$saldo_anterior = $_POST["saldo_anterior"];

$entradas = $_POST["entradas"];

$entradas_extras = $_POST["entradas_extras"];

$saidas = $_POST["saidas"];

$saldo_atual = $saldo_anterior + $entradas + $entradas_extras - $saidas;

$v_saldo = validar_saldo_rmb($saldo_anterior, $entradas, $entradas_extras, $saidas);

if($v_saldo!=""){
	echo "<script>alert('$v_saldo')</script>";
	echo "<script>history.back();</script>";
	die();
}

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_rmb($conexao_com_banco, $orgao, $tipo_patrimonio, $classificacao_contabil, $saldo_anterior, $entradas, $entradas_extras, $saidas, $saldo_atual, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>