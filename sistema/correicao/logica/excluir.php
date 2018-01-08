<?php

include('../../banco-dados/conectar.php');
include('../banco-dados/funcoes.php');
session_start();

$id = $_GET['id'];

excluir_correicao($conexao_com_banco, $id);

Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

?>