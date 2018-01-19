<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = retorna_orgao_servidor($_SESSION["id"], $conexao_com_banco);

$numero_portaria = $_POST["numero_portaria"];

$data_portaria = $_POST["data_portaria"];

$tipo_procedimento = $_POST["tipo_procedimento"];

$processo = $_POST["processo"];

$data_instauracao = $_POST["data_instauracao"];

$situacao = strtoupper($_POST["situacao"]);

$numero_decreto = $_POST["numero_decreto"];

$data_decreto = $_POST["data_decreto"];

$m = validar_datas_correicao($data_portaria, $data_instauracao, $data_decreto);

if($m!=""){
	echo "<script>alert('$m')</script>";
	echo "<script>history.back();</script>";
	die();
}

$penalidade = $_POST["penalidade"];

$motivo = strtoupper($_POST["motivo"]);

$cargo = $_POST["cargo"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_correicao($conexao_com_banco, $orgao, $numero_portaria, $data_portaria, $tipo_procedimento, $processo, $data_instauracao, $situacao, $numero_decreto, $data_decreto, $penalidade, $motivo, $cargo, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>