<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$tipo = $_POST["tipo"];

$concedente = strtoupper($_POST["concedente"]);

$orgao = $_POST["orgao"];

$fecoep = $_POST["fecoep"];

$objeto = strtoupper($_POST["objeto"]);

$data_inicio = $_POST["data_inicio"];

$data_termino = $_POST["data_termino"];

$numero_siafe = $_POST["numero_siafe"];

$numero_siconv = $_POST["numero_siconv"];

$numero_siafi = $_POST["numero_siafi"];

$valor_partida_total = $_POST["valor_partida_total"];

$valor_partida_liberado = $_POST["valor_partida_liberado"];

$valor_contrapartida_total = $_POST["valor_contrapartida_total"];

$valor_contrapartida_liberado = $_POST["valor_contrapartida_liberado"];

$valor_aditivo = $_POST["valor_aditivo"];

$prazo_aditivo = $_POST["prazo_aditivo"];

$data_ultima_liberacao = $_POST["data_ultima_liberacao"];

$data_prorrogacao = $_POST["data_prorrogacao"];

$data_prestacao_contas = $_POST["data_prestacao_contas"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_convenio($conexao_com_banco, $tipo, $concedente, $orgao, $fecoep, $objeto, $data_inicio, $data_termino, $numero_siafe, $numero_siconv, $numero_siafi, $valor_partida_total, $valor_partida_liberado, $valor_contrapartida_total, $valor_contrapartida_liberado, $valor_aditivo, $prazo_aditivo, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>