<?php

//incluindo a conexão com o banco de dados
include("../banco-dados/conectar.php");

//as variaveis pegam o que foi digitado pelo usuário na página index para efetuar o login
$CPF = $_POST['CPF'];

//a senha digitada pelo usuário é codificada em md5 para a busca no banco
$senha = md5($_POST['senha']); 

//fazendo a query para buscar se existe um servidor que tem as credenciais digitadas pelo usuário no index
$retornoquery = mysqli_query($conexao_com_banco, "SELECT * FROM tb_servidores WHERE CPF_SERVIDOR='$CPF' AND SENHA='$senha'");

//a variavel recebe o número de registros encontrados pela query executada
$num_registros = mysqli_affected_rows($conexao_com_banco);

//se encontrou um registro...
if($num_registros == 1){
	
	//a variavel é um array que pega as informações do servidor no banco de dados
	$servidor = mysqli_fetch_array($retornoquery);
	
	//a variavel é um array que pega as informações do servidor no banco de dados
	$permissoes = mysqli_fetch_array($retornoquery);
		
	//a variável recebe um número randômico para ser variável de sessão	
	$num = rand(100000,900000);
	
	//iniciando a sessão
	session_start();
	
	//setando todas as variáveis de sessão do usuário, como número de sessão e as informações gravadas no banco
	$_SESSION['numLogin']									= $num;
	$_SESSION['id']										    = $servidor['ID'];
	$_SESSION['nome']										= $servidor['NM_SERVIDOR'];
	$_SESSION['CPF']										= $servidor['CPF_SERVIDOR'];
	$_SESSION['foto']										= $servidor['NM_ARQUIVO_FOTO'];
	$_SESSION['orgao']										= $servidor['ID_ORGAO'];
	$orgao 													= $servidor['ID_ORGAO'];						
	
	//fazendo a query para buscar as datas e ver se o órgão dele está permitido a cadastrar
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT DT_INICIAL_CADASTRO, DT_FINAL_CADASTRO FROM tb_orgaos WHERE ID='$orgao'");

	//a variavel as datas que vieram do banco
	$datas = mysqli_fetch_row($retornoquery);
	
	$data_inicial = $datas[0];
	
	$data_final = $datas[1];
	
	$data_hoje = Date("Y-m-d");
	
	if($data_inicial <= $data_hoje and $data_hoje <= $data_final){
		$_SESSION["periodo-cadastro"] = true;
	}else{
		$_SESSION["periodo-cadastro"] = false;
	}
	
	header("Location:../home.php");	


}else{
	header("Location:../../index.php?err=Usuário ou senha incorretos.");	
}


?>