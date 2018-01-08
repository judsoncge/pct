<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$orgao = retorna_orgao_servidor($_SESSION["id"], $conexao_com_banco);

$processo = $_POST["processo"];

$data_recebimento = $_POST["data_recebimento"];

$data_abertura = $_POST["data_abertura"];

$tipo_manifestacao = $_POST["tipo_manifestacao"];

$caracteristica = $_POST["caracteristica"];

$assunto = strtoupper($_POST["assunto"]);

$canal = $_POST["canal"];

$tipo_pessoa = $_POST["tipo_pessoa"];

$data_email_confirmacao = $_POST["data_email_confirmacao"];

$data_email_resposta = $_POST["data_email_resposta"];

$orgao_vinculado = $_POST["orgao_vinculado"];

$situacao = $_POST["situacao"];

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_ouvidoria($conexao_com_banco, $orgao, $processo, $data_recebimento, $data_abertura, $tipo_manifestacao, $caracteristica, $assunto, $canal, $tipo_pessoa, $data_email_confirmacao, $data_email_resposta, $orgao_vinculado, $situacao, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>