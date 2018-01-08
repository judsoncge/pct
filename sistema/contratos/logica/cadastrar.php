<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$empresa = $_POST["empresa"];

$orgao = $_POST["orgao"];

$gestor = strtoupper($_POST["gestor"]);

$objeto = strtoupper($_POST["objeto"]);

$modalidade = $_POST["modalidade"];

$processo = $_POST["processo"];

$vinculacao = strtoupper($_POST["vinculacao"]);

$data_assinatura = $_POST["data_assinatura"];

$data_inicio = $_POST["data_inicio"];

$data_publicacao = $_POST["data_publicacao"];

$data_termino = $_POST["data_termino"];

$numero_contrato = $_POST["numero_contrato"];

$numero_contrato_siafi = $_POST["numero_contrato_siafi"];

$valor_global = $_POST["valor_global"];

$valor_empenhado = $_POST["valor_empenhado"];

$valor_liquidado = $_POST["valor_liquidado"];

$valor_pago = $_POST["valor_pago"];

$prorrogavel = $_POST["prorrogavel"];

$termo = $_POST["termo"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_contrato($conexao_com_banco, $empresa, $orgao, $gestor, $objeto, $modalidade, $processo, $vinculacao, $data_assinatura, $data_inicio, $data_publicacao, $data_termino, $numero_contrato, $numero_contrato_siafi, $valor_global, $valor_empenhado, $valor_liquidado, $valor_pago, $prorrogavel, $termo, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>