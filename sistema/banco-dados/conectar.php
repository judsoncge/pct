<?php
//conecta-se com o banco de dados
//servidor para conexão com o banco de dados
$servidor_banco = '10.50.119.149';
//usuario para conexão com o banco de dados
$usuario_banco = 'desenvolvedor'; 
//senha para conexão com o banco de dados           
$senha_banco = 'cgeagt';       
//nome do banco de dados         
$nome_banco = 'pct';  

//conectando ao banco de dados ou mostra erro caso não consiga conectar
$conexao_com_banco = mysqli_connect($servidor_banco, $usuario_banco, $senha_banco, $nome_banco) or die(mysqli_error($nome_banco));

mysqli_query($conexao_com_banco, "SET NAMES 'utf8'");
mysqli_query($conexao_com_banco, 'SET character_set_connection=utf8');
mysqli_query($conexao_com_banco, 'SET character_set_client=utf8');
mysqli_query($conexao_com_banco, 'SET character_set_results=utf8');

?>