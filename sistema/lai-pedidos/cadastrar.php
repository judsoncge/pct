<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_LAI_PEDIDOS";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de LAI - Pedido</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">				
				<div class="container">					
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Classificação de Informação</label>
										<input class="form-control" id="pedidos_classificacao_informacao" name="pedidos_classificacao_informacao" type="number" placeholder="Digite o total de pedidos de classificação" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Desclassificação de Informação</label>
										<input class="form-control" id="pedidos_desclassificacao_informacao" name="pedidos_desclassificacao_informacao" type="number" placeholder="Digite o total de pedidos de desclassificação" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Reavaliação de Informação</label>
										<input class="form-control" id="pedidos_reavaliacao_informacao" name="pedidos_reavaliacao_informacao" type="number" placeholder="Digite o total de pedidos de reavaliação" required />  
									</div> 
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Pedidos Atendidos</label>
										<input class="form-control" id="pedidos_atendidos" name="pedidos_atendidos" type="number" placeholder="Digite o total de pedidos atendidos" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Pedidos Não Atendidos</label>
										<input class="form-control" id="pedidos_nao_atendidos" name="pedidos_nao_atendidos" type="number" placeholder="Digite o total de pedidos não atendidos" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Pedidos Indeferidos</label>
										<input class="form-control" id="pedidos_indeferidos" name="pedidos_indeferidos" type="number" placeholder="Digite o total de pedidos indeferidos" required />  
									</div> 
								</div>
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default" name="submit" value="Send" id="submit">Cadastrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

</div>
<!-- /#Conteúdo da Página/-->

</div>

<?php include('../foot.php')?>