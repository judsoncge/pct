<?php

$p = retorna_permissao_servidor($_SESSION['id'], $permissao_verificar, $conexao_com_banco); 

if(!$p){
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../home.php?mensagem=Você não tem permissão para acessar essa página.&resultado=falha'>";
}	
?>

