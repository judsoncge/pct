<?php

include('../../banco-dados/conectar.php');
include('../banco-dados/funcoes.php');
session_start();

$id = $_GET['id'];

excluir_rma($conexao_com_banco, $id);

Header("Location:../listar.php?mensagem=O registro foi excluído com sucesso!&resultado=sucesso");

?>