<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$beneficiario = $_POST["beneficiario"];

$orgao = $_GET["orgao"];

$grupo = retorna_grupo_servidor($beneficiario, $conexao_com_banco);

$destino = strtoupper($_POST["destino"]);

$objetivo = strtoupper($_POST["objetivo"]);

$meio_transporte = $_POST["meio_transporte"];

$data_publicacao = $_POST["data_publicacao"];

$data_inicio = $_POST["data_inicio"];

$data_termino = $_POST["data_termino"];

$data_prestacao_contas = $_POST["data_prestacao_contas"];

$m = validar_datas_diaria($data_publicacao, $data_inicio, $data_termino, $data_prestacao_contas);

if($m!=""){
	echo "<script>alert('$m')</script>";
	echo "<script>history.back();</script>";
	die();
}

$numero_diarias = $_POST["numero_diarias"];

$tipo = $_POST["tipo"];

$nome_grupo = retorna_nome_grupo($grupo, $conexao_com_banco);

$valor = retorna_valor_diaria($numero_diarias, $tipo, $nome_grupo);

$numero_portaria = $_POST["numero_portaria"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_diaria($conexao_com_banco, $beneficiario, $orgao, $destino, $objetivo, $meio_transporte, $data_inicio, $data_termino, $numero_diarias, $tipo, $valor, $numero_portaria, $data_publicacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>