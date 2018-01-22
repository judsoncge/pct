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
		<?php if(!$c){ 
			echo '<div class="alert alert-warning" role="alert" id="mensagem_aviso"><center>O seu órgão não está no período de cadastro/edição. Apenas as visualizações dos módulos estão disponíveis.</center></div>';
		 } ?>
	</p>
</div>
