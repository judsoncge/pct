<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
session_start();

//verificando se o CNPJ já está cadastrado no banco, pois não pode haver dois valores iguais
$CNPJ = $_POST['CNPJ'];

$existe_empresa = existe_empresa($conexao_com_banco, $CNPJ);  

if($existe_empresa==true){ 
	echo "<script>history.back();</script>";
	echo "<script>alert('Este CNPJ já está cadastrado. Tente outro')</script>";
	die();
}


//pegando o nome digitado pelo usuario no cadastro	
$nome = strtoupper($_POST['nome']);	

//cadastrando empresa
cadastrar_empresa($conexao_com_banco, $nome, $CNPJ);


echo "<script>history.back();</script>";
echo "<script>history.back();</script>";

?>