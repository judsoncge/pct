<?php

include('../../banco-dados/conectar.php');
include('../../funcoes.php');
include('../banco-dados/funcoes.php');
date_default_timezone_set('America/Bahia');
session_start();


$data_inicial = $_POST['data_inicial'];

$data_final = $_POST['data_final'];


if($data_final < $data_inicial){
	echo "<script>alert('A data inicial não pode ser maior que a data final')</script>";
	echo "<script>history.back();</script>";
	die();	
}

$quantidade_atualizados = 0;

$orgao = 0;

$lista = retorna_orgaos($conexao_com_banco);

while($r = mysqli_fetch_object($lista)){ 

	$orgao = $r->ID;
	
	if(isset($_POST[$orgao])){
		
		$quantidade_atualizados += atualizar_datas_cadastro($data_inicial, $data_final, $orgao, $conexao_com_banco);
		
	}

}



if($quantidade_atualizados > 0){
	Header("Location:../atualizar.php?mensagem=Operação realizada com sucesso! $quantidade_atualizados órgãos atualizados!&resultado=sucesso");
}else{
	Header("Location:../atualizar.php?mensagem=Nenhum órgão atualizado!&resultado=falha");
}


?>