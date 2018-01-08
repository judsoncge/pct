<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$pedidos_classificacao_informacao = $_POST["pedidos_classificacao_informacao"];

$pedidos_desclassificacao_informacao = $_POST["pedidos_desclassificacao_informacao"];

$pedidos_reavaliacao_informacao = $_POST["pedidos_reavaliacao_informacao"];

$pedidos_atendidos = $_POST["pedidos_atendidos"];

$pedidos_nao_atendidos = $_POST["pedidos_nao_atendidos"];

$pedidos_indeferidos = $_POST["pedidos_indeferidos"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_lai_pedidos($conexao_com_banco, $orgao, $pedidos_classificacao_informacao, $pedidos_desclassificacao_informacao, $pedidos_reavaliacao_informacao, $pedidos_atendidos, $pedidos_nao_atendidos, $pedidos_indeferidos, $data_ultima_atualizacao, $servidor_atualizou, $id);



Header("Location:../listar.php?mensagem=Editado com sucesso!&resultado=sucesso");

?>