<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_COMBUSTIVEL";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Combustível</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Veículo</label>
										<a href="../veiculos/cadastrar.php">cadastrar novo</a>
										<select class="form-control" id="veiculo" name="veiculo" required />
											<option value="">Selecione o veículo</option>
											<?php $lista = retorna_veiculos_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo retorna_nome_veiculo($r->ID, $conexao_com_banco) ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de abastecimento</label>
										<input class="form-control" id="data_abastecimento" name="data_abastecimento" type="date" required />	  
									</div> 
								</div> 							
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Total abastecido</label>
										<input class="form-control" id="total_litros" name="total_litros" type="number" required />	  
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor do litro</label>
										<input class="form-control" id="valor_litro" name="valor_litro" type="number" step="0.01" required />	  
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Cota semanal</label>
										<input class="form-control" id="cota_semanal" name="cota_semanal" type="number" required />	  
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