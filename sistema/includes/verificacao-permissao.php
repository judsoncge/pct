<?php

$p = retorna_permissao_servidor($_SESSION['id'], $permissao_verificar, $conexao_com_banco); 

$nome_permissao = split("_", $permissao_verificar, 2);

$nome = $nome_permissao[0];

if((!$p or !$c) and ($nome=="CADASTRAR" or $nome=="GERENCIAR")){
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../home.php?mensagem=Você não tem permissão para acessar essa página.&resultado=falha'>";
}	
?>

