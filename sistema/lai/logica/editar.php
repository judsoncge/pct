<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = $_SESSION["orgao"];

$numero_processo = $_POST["processo"];

$numero_protocolo = $_POST["numero_protocolo"];

$canal_acesso = strtoupper($_POST["canal_acesso"]);

$assunto = strtoupper($_POST["assunto"]);

$dt_abertura_processo = $_POST["dt_abertura_processo"];

$dt_recebimento_solicitacao = $_POST["dt_recebimento_solicitacao"];

$dt_final_expedicao_resposta = $_POST["dt_final_expedicao_resposta"];

$prorrogacao = $_POST["prorrogacao"];

$dt_envio_resposta = $_POST["dt_envio_resposta"];

$dt_final_recebimento_recurso = $_POST["dt_final_recebimento_recurso"];

$v_prazo = validar_prazo($dt_abertura_processo, $dt_recebimento_solicitacao, $dt_final_expedicao_resposta, $prorrogacao, $dt_envio_resposta, $dt_final_recebimento_recurso);

if($v_prazo!=""){
	echo "<script>alert('$v_prazo')</script>";
	echo "<script>history.back();</script>";
	die();
}

$tipo_pessoa = strtoupper($_POST["tipo_pessoa"]);

$uf = $_POST["uf"];

$situacao = strtoupper($_POST["situacao"]);

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_lai($conexao_com_banco, $orgao, $numero_processo, $numero_protocolo, $canal_acesso, $assunto, $dt_abertura_processo, $dt_recebimento_solicitacao, $dt_final_expedicao_resposta, $prorrogacao, $dt_envio_resposta, $dt_final_recebimento_recurso, $tipo_pessoa, $uf, $situacao, $data_ultima_atualizacao, $servidor_atualizou, $id);


Header("Location:../listar.php?mensagem=Editado com sucesso!&resultado=sucesso");

?>