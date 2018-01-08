<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$operacao = $_GET["operacao"];

if($operacao=="receita"){

	$orgao = $_SESSION["orgao"];
	
	$tipo = $_POST["tipo"];
	
	$mes = date('m');
	
	$ano = date('Y');

	$descricao = strtoupper($_POST["descricao"]);
	
	$valor = $_POST["valor"];

	$data_ultima_atualizacao = Date("Y-m-d");

	$servidor_atualizou = $_SESSION["id"];

	cadastrar_receita($conexao_com_banco, $orgao, $tipo, $mes, $ano, $descricao, $valor, $data_ultima_atualizacao, $servidor_atualizou);
	
	$o = retorna_permissao_servidor($_SESSION['id'], "VISAO_TODOS_ORGAOS", $conexao_com_banco);	

	if($o){
		Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");
	}else{
		Header("Location:../listar-por-orgao.php?orgao=$orgao&mensagem=Operação realizada com sucesso!&resultado=sucesso");
	}

}

elseif($operacao=="despesa"){
	
	$orgao = $_SESSION["orgao"];
	
	$tipo = $_POST["tipo"];
	
	$mes = date('m');
	
	$ano = date('Y');

	$descricao = strtoupper($_POST["descricao"]);
	
	$valor = $_POST["valor"];

	$data_ultima_atualizacao = Date("Y-m-d");

	$servidor_atualizou = $_SESSION["id"];

	cadastrar_despesa($conexao_com_banco, $orgao, $tipo, $mes, $ano, $descricao, $valor, $data_ultima_atualizacao, $servidor_atualizou);
	
	$o = retorna_permissao_servidor($_SESSION['id'], "VISAO_TODOS_ORGAOS", $conexao_com_banco);	

	if($o){
		Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");
	}else{
		Header("Location:../listar-por-orgao.php?orgao=$orgao&mensagem=Operação realizada com sucesso!&resultado=sucesso");
	}
	
	
}

?>