<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$tipo_patrimonio = strtoupper($_POST["tipo_patrimonio"]);

$classificacao_contabil = $_POST["classificacao_contabil"];

$saldo = $_POST["saldo"];

$saldo_anterior = $_POST["saldo_anterior"];

$entradas = $_POST["entradas"];

$entradas_extras = $_POST["entradas_extras"];

$saidas = $_POST["saidas"];

$saldo_atual = $_POST["saldo_atual"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_rmb($conexao_com_banco, $orgao, $tipo_patrimonio, $classificacao_contabil, $saldo, $saldo_anterior, $entradas, $entradas_extras, $saidas, $saldo_atual, $data_ultima_atualizacao, $servidor_atualizou, $id);


Header("Location:../listar.php?mensagem=Editado com sucesso!&resultado=sucesso");

?>