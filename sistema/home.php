<?php 
include('head.php');
include('body.php');
$data = date("Y-m-d");
?>
<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<?php include('includes/mensagem.php'); ?>
	<p>
		<center><h2>Bem vindo(a) ao Painel de Controle da Transparência, <br><?php echo $_SESSION['nome']?>!</h2></center>
	</p>
</div>
