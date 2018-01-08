<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = retorna_orgao_servidor($_SESSION["id"], $conexao_com_banco);

$equipamento = $_POST["equipamento"];

$qtd_proprio = $_POST["qtd_proprio"];

$qtd_alugado = $_POST["qtd_alugado"];

$qtd_cedido = $_POST["qtd_cedido"];

$orgao_cedido = isset($_POST["orgao_cedido"]) ? $_POST["orgao_cedido"] : NULL;

$qtd_recebido = $_POST["qtd_recebido"];

$orgao_recebido =  isset($_POST["orgao_recebido"]) ? $_POST["orgao_recebido"] : NULL;

$total_disponivel = $qtd_proprio + $qtd_alugado + $qtd_cedido + $qtd_recebido;

$observacao = strtoupper($_POST["observacao"]);

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_ti($conexao_com_banco, $orgao, $equipamento, $qtd_proprio, $qtd_alugado, $qtd_cedido, $orgao_cedido, $qtd_recebido, $orgao_recebido, $total_disponivel, $observacao, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>