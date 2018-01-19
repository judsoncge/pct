<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "DEFINIR_PERMISSAO_CADASTRO";
include("../includes/verificacao-permissao.php");
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Defina as datas de cadastro</p>
	</div>
	<?php include('../includes/mensagem.php') ?>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/atualizar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data Inicial</label>
										<input class="form-control" id="data_inicial" name="data_inicial" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data Final</label>
										<input class="form-control" id="data_final" name="data_final" type="date" required />	  
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Defina os órgãos que poderão cadastrar: </label>
										<a href="javascript:cadastrar_marcar()">Todos</a> 
										ou 
										<a href="javascript:cadastrar_desmarcar()">Nenhum</a><br>
										<?php $lista = retorna_orgaos($conexao_com_banco);
										while($r = mysqli_fetch_object($lista)){ ?>
											<div class='col-md-12'>							
												<input type="checkbox" class="cadastra" name="<?php echo $r->ID ?>">
													<?php echo $r->CD_ORGAO . " - " .  $r->NM_ORGAO ?>
												</input>
											</div>
										<?php } ?>  
									</div> 
								</div>
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default" name="submit" value="Send" id="submit">Definir</button>
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