<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
session_start();

if($_GET["operacao"] == "servidor"){
	
	//verificando se o CPF já está cadastrado no banco, pois não pode haver dois valores iguais
	$CPF = $_POST['CPF'];

	$existe_servidor = existe_servidor($conexao_com_banco, $CPF);  

	if($existe_servidor==true){ 
		echo "<script>history.back();</script>";
		echo "<script>alert('Este CPF já está cadastrado. Tente outro')</script>";
		die();
	}


	//pegando o nome digitado pelo usuario no cadastro	
	$nome = strtoupper($_POST['nome']);	

	//pegando o orgao selecionado pelo usuario no cadastro
	$orgao = $_POST['orgao']; 

	//pegando a matricula digitada pelo usuario no cadastro
	$matricula = $_POST['matricula'];

	//pegando o cargo digitado pelo usuario no cadastro
	$cargo = strtoupper($_POST['cargo']); 

	//pegando o grupo selecionado pelo usuario no cadastro
	$grupo = $_POST['grupo']; 
	
	//pegando a condicao selecionada pelo usuario no cadastro
	$condicao = $_POST['condicao'];

	//pegando o email digitado pelo usuario no cadastro
	$email = $_POST['email']; 
	
	//pegando a CNH digitada pelo usuario no cadastro
	$CNH = $_POST['CNH']; 

	//cadastrando servidor e as permissoes dele
	$id = cadastrar_servidor($conexao_com_banco, $nome, $CPF, $CNH, $orgao, $matricula, $cargo, $grupo, $condicao, $email);

	$permissoes = retorna_campos_permissoes($conexao_com_banco);
		
	while($val = mysqli_fetch_object($permissoes)){
		
		if(isset($_POST[$val->COLUMN_NAME])){
			editar_permissao_servidor($conexao_com_banco, $id, $val->COLUMN_NAME, 1);
		}else{
			editar_permissao_servidor($conexao_com_banco, $id, $val->COLUMN_NAME, 0);
		}
	}
	
	Header("Location:../listar.php?mensagem=Cadastrado(a) com sucesso!&resultado=sucesso");
}

else if($_GET["operacao"] == "servidor2"){
	
	//verificando se o CPF já está cadastrado no banco, pois não pode haver dois valores iguais
	$CPF = $_POST['CPF'];

	$existe_servidor = existe_servidor($conexao_com_banco, $CPF);  

	if($existe_servidor==true){ 
		echo "<script>history.back();</script>";
		echo "<script>alert('Este CPF já está cadastrado. Tente outro')</script>";
		die();
	}


	//pegando o nome digitado pelo usuario no cadastro	
	$nome = $_POST['nome'];	

	//pegando o orgao selecionado pelo usuario no cadastro
	$orgao = $_SESSION["orgao"]; 

	//pegando a matricula digitada pelo usuario no cadastro
	$matricula = $_POST['matricula'];

	//pegando o cargo digitado pelo usuario no cadastro
	$cargo = $_POST['cargo']; 

	//pegando o grupo selecionado pelo usuario no cadastro
	$grupo = $_POST['grupo']; 
	
	//pegando a condicao selecionada pelo usuario no cadastro
	$condicao = $_POST['condicao'];

	//pegando o email digitado pelo usuario no cadastro
	$email = $_POST['email']; 
	
	//pegando a CNH digitada pelo usuario no cadastro
	$CNH = $_POST['CNH'] == "" ? NULL : $_POST['CNH']; 

	//cadastrando servidor e as permissoes dele
	$id = cadastrar_servidor($conexao_com_banco, $nome, $CPF, $CNH, $orgao, $matricula, $cargo, $grupo, $condicao, $email);
	
	echo "<script>history.back();</script>";
	
}




?>