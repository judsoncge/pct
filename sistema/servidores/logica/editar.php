<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
session_start();

if($_GET["operacao"]=="info"){
	
	//verificando se o CPF já está cadastrado no banco, pois não pode haver dois valores iguais
	$CPF = $_POST['CPF'];

	if($_GET['CPF'] != $CPF){
		$existe_servidor = existe_servidor($conexao_com_banco, $CPF);  
		
		if($existe_servidor){
			echo "<script>history.back();</script>";
			echo "<script>alert('Este CPF já está cadastrado. Tente outro')</script>";
			die();
		}
	}
	
	//pegando o nome digitado pelo usuario na edição	
	$nome = strtoupper($_POST['nome']);	

	//pegando o orgao selecionado pelo usuario na edição
	$orgao = $_POST['orgao']; 
	
	//pegando a matricula digitada pelo usuario na edição
	$matricula = $_POST['matricula']; 
	
	//pegando o orgao digitado pelo usuario na edição
	$cargo = strtoupper($_POST['cargo']); 
	
	//pegando o grupo selecionado pelo usuario na edição
	$grupo = $_POST['grupo'];
	
	//pegando a condicao selecionada pelo usuario na edição
	$condicao = $_POST['condicao'];
	
	//pegando o email digitado pelo usuario na edição
	$email = $_POST['email']; 
	
	//pegando a CNH digitada pelo usuario na edição
	$CNH = $_POST['CNH'] == "" ? NULL : $_POST['CNH']; 

	//pegando o id de registro do servidor para editar
	$id = $_GET['id'];

	editar_servidor($conexao_com_banco, $nome, $CPF, $CNH, $orgao, $matricula, $cargo, $grupo, $condicao, $email, $id);
	
	$permissoes = retorna_campos_permissoes($conexao_com_banco);
	
	while($val = mysqli_fetch_object($permissoes)){
	
	if(isset($_POST[$val->COLUMN_NAME])){
		editar_permissao_servidor($conexao_com_banco, $id, $val->COLUMN_NAME, 1);
	}else{
		editar_permissao_servidor($conexao_com_banco, $id, $val->COLUMN_NAME, 0);
	}
}

	Header("Location:../listar.php?mensagem=Operação realizada com sucesso!&resultado=sucesso");

}elseif($_GET["operacao"]=="foto"){
	
	//pegando o id de registro do servidor para editar
	$id = $_SESSION['id'];
	
	//pegando o arquivo
	$file = $_FILES['arquivo_foto'];
	
	//pegando o caminho que será gravado o arquivo da foto selecionada
	$caminho = "../../../registros/fotos/";
	
	$nome_arquivo = cadastrar_anexo($file, $caminho);
	
	if($_SESSION["foto"]!= "default.jpg"){
		unlink($caminho.$_SESSION["foto"]);
	
	}

	editar_foto_servidor($conexao_com_banco, $nome_arquivo, $id);
	
	$_SESSION["foto"] = $nome_arquivo;
	
	Header("Location:../../home.php?mensagem=Editado com sucesso!&resultado=sucesso");
	
}elseif($_GET["operacao"]=="senha"){
	
	//pegando o id de registro do servidor para editar
	$id = $_SESSION['id'];
	
	//pegando a nova senha digitada pelo usuario
	$senha = $_POST["senha"];
	
	//pegando a confirmação de senha digitada pelo usuario
	$confirma_senha = $_POST["confirma_senha"];
	
	if($senha == $confirma_senha){
		editar_senha_servidor($conexao_com_banco, md5($senha), $id);
		Header("Location:../../home.php?mensagem=Editado com sucesso!&resultado=sucesso");
	
	}else{
		Header("Location:../editar-senha.php?mensagem=As senhas não correspondem!&resultado=falha");
	}

}		
?>