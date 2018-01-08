<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$beneficiario = $_POST["beneficiario"];

$orgao = retorna_orgao_servidor($beneficiario, $conexao_com_banco);

$grupo = retorna_grupo_servidor($beneficiario, $conexao_com_banco);

$destino = strtoupper($_POST["destino"]);

$objetivo = strtoupper($_POST["objetivo"]);

$meio_transporte = $_POST["meio_transporte"];

$data_inicio = $_POST["data_inicio"];

$numero_diarias = $_POST["numero_diarias"];

$tipo = $_POST["tipo"];

$nome_grupo = retorna_nome_grupo($grupo, $conexao_com_banco);

$valor = retorna_valor_diaria($numero_diarias, $tipo, $nome_grupo);

$numero_portaria = $_POST["numero_portaria"];

$data_publicacao = $_POST["data_publicacao"];

$data_prestacao_contas = $_POST["data_prestacao_contas"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_diaria($conexao_com_banco, $beneficiario, $orgao, $destino, $objetivo, $meio_transporte, $data_inicio, $numero_diarias, $tipo, $valor, $numero_portaria, $data_publicacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>