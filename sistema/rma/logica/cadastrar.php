<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$classificacao_contabil = $_POST["classificacao_contabil"];

$saldo = $_POST["saldo"];

$saldo_anterior = $_POST["saldo_anterior"];

$entradas = $_POST["entradas"];

$entradas_extras = $_POST["entradas_extras"];

$saidas = $_POST["saidas"];

$saldo_atual = $_POST["saldo_atual"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_rma($conexao_com_banco, $orgao, $classificacao_contabil, $saldo, $saldo_anterior, $entradas, $entradas_extras, $saidas, $saldo_atual, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>