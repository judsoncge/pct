<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$responsavel = $_POST["responsavel"];

$orgao = retorna_orgao_servidor($responsavel, $conexao_com_banco);

$numero = $_POST["numero"];

$tipo = $_POST["tipo"];

$cota_mensal = $_POST["cota_mensal"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

cadastrar_telefonia($conexao_com_banco, $orgao, $numero, $tipo, $cota_mensal, $responsavel, $data_ultima_atualizacao, $servidor_atualizou);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>