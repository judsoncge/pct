<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$beneficiario = $_POST["beneficiario"];

$orgao = retorna_orgao_servidor($beneficiario, $conexao_com_banco);

$ordem_bancaria = strtoupper($_POST["ordem_bancaria"]);

$valor_material = $_POST["valor_material"];

$valor_pf = $_POST["valor_pf"];

$valor_pj = $_POST["valor_pj"];

$valor_recebido = $valor_material + $valor_pf + $valor_pj;

$valor_devolvido_consumo = $_POST["valor_devolvido_consumo"];

$valor_devolvido_pf = $_POST["valor_devolvido_pf"];

$valor_devolvido_pj = $_POST["valor_devolvido_pj"];

$data_recebimento = $_POST["data_recebimento"];

$data_prestacao_contas = $_POST["data_prestacao_contas"];

$v_datas = validar_datas_adiantamento($data_recebimento, $data_prestacao_contas);

if($v_datas!=""){
	echo "<script>alert('$v_datas')</script>";
	echo "<script>history.back();</script>";
	die();
}

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_adiantamento($conexao_com_banco, $beneficiario, $orgao, $valor_recebido, $data_recebimento, $ordem_bancaria, $valor_material, $valor_pf, $valor_pj, $valor_devolvido_consumo, $valor_devolvido_pf, $valor_devolvido_pj, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>