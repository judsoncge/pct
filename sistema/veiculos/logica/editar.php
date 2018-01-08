<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();

$placa = strtoupper($_POST["placa"]);

$locado_proprio = $_POST["locado_proprio"];

$locadora = strtoupper($_POST["locadora"]);

$padrao = $_POST["padrao"];

$valor_aluguel = $_POST["valor_aluguel"];

$modelo = strtoupper($_POST["modelo"]);

$renavam = $_POST["renavam"];

$ano_veiculo = $_POST["ano_veiculo"];

$licenciado = $_POST["licenciado"];

$condutor = $_POST["condutor"];

$orgao = retorna_orgao_servidor($condutor, $conexao_com_banco);

$orgao_cedido = $_POST["orgao_cedido"];

$termo_cessao = $_POST["termo_cessao"];

$manutencao = $_POST["manutencao"];

$logomarca = $_POST["logomarca"];

$seguro = $_POST["seguro"];

$chipado = $_POST["chipado"];

$mapa_controle = $_POST["mapa_controle"];

$recolhido_garagem = $_POST["recolhido_garagem"];

$multa = $_POST["multa"];

$avaria = strtoupper($_POST["avaria"]);

$observacoes = strtoupper($_POST["observacoes"]);

$data_ultima_atualizacao = Date("Y-m-d");

$servidor_atualizou = $_SESSION["id"];

$id = $_GET["id"];

editar_veiculos($conexao_com_banco, $placa, $locado_proprio, $locadora, $padrao, $valor_aluguel, $modelo, $renavam, $ano_veiculo, $licenciado, $orgao, $orgao_cedido, $termo_cessao, $manutencao, $logomarca, $seguro, $chipado, $mapa_controle, $condutor, $recolhido_garagem, $multa, $avaria, $observacoes, $data_ultima_atualizacao, $servidor_atualizou, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>