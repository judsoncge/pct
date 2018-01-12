<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$tipo = $_POST["tipo"];

$concedente = strtoupper($_POST["concedente"]);

$convenente = strtoupper($_POST["convenente"]);

$fecoep = $_POST["fecoep"];

$objeto = strtoupper($_POST["objeto"]);

$data_inicio = $_POST["data_inicio"];

$data_termino = $_POST["data_termino"];

$numero_siafe = $_POST["numero_siafe"];

$numero_siconv = $_POST["numero_siconv"];

$numero_siafi = $_POST["numero_siafi"];

$valor_partida = $_POST["valor_partida"];

$valor_partida_liberado = $_POST["valor_partida_liberado"];

$valor_contrapartida = $_POST["valor_contrapartida"];

$valor_contrapartida_liberado = $_POST["valor_contrapartida_liberado"];

$valor_aditivo_partida = $_POST["valor_aditivo_partida"];

$valor_aditivo_contrapartida = $_POST["valor_aditivo_contrapartida"];

$v_valores = validar_valores_convenio($valor_partida, $valor_aditivo_partida, $valor_partida_liberado, $valor_contrapartida, $valor_aditivo_contrapartida, $valor_contrapartida_liberado);

if($v_valores!=""){
	echo "<script>alert('$v_valores')</script>";
	echo "<script>history.back();</script>";
	die();
}

$data_ultima_liberacao = $_POST["data_ultima_liberacao"];

$data_prorrogacao = $_POST["data_prorrogacao"];

$data_prestacao_contas = $_POST["data_prestacao_contas"];

$v_datas = validar_datas_convenio($data_inicio, $data_termino, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas);

if($v_datas!=""){
	echo "<script>alert('$v_datas')</script>";
	echo "<script>history.back();</script>";
	die();
}

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_convenio($conexao_com_banco, $orgao, $tipo, $concedente, $convenente, $fecoep, $objeto, $data_inicio, $data_termino, $numero_siafe, $numero_siconv, $numero_siafi, $valor_partida, $valor_partida_liberado, $valor_contrapartida, $valor_contrapartida_liberado, $valor_aditivo_partida, $valor_aditivo_contrapartida, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>