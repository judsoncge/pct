<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_COMBUSTIVEL";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_combustivel";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>
<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de combustível do Veículo <?php echo retorna_nome_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?>  
		da <?php echo retorna_sigla_orgao(retorna_orgao_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco),$conexao_com_banco) ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $informacoes["ID"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Veículo</label>
										<a href="../veiculos/cadastrar.php">cadastrar novo</a>
										<select class="form-control" id="veiculo" name="veiculo" required />
											<option value="<?php echo $informacoes["ID_VEICULO"] ?>"><?php echo retorna_nome_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?></option>
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
										<input class="form-control" id="data_abastecimento" name="data_abastecimento" type="date" value="<?php echo $informacoes["DT_ABASTECIMENTO"] ?>" required />	  
									</div> 
								</div> 							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Total abastecido</label>
										<input class="form-control" id="total_litros" name="total_litros" type="number" value="<?php echo $informacoes["NR_TOTAL_LITROS_ABASTECIDOS"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor do litro</label>
										<input class="form-control" id="valor_litro" name="valor_litro" type="number" step="0.01" value="<?php echo $informacoes["VL_LITRO_ABASTECIDO"] ?>" required />	  
									</div> 
								</div>							
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default" name="submit" value="Send" id="submit">Editar</button>
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