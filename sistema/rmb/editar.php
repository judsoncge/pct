<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_RMB";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_rmb";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>
<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de Relatório de Movimentação de Bens</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $informacoes["ID"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de Patrimônio</label>
										<select class="form-control" id="tipo_patrimonio" name="tipo_patrimonio" required />
											<option value="<?php echo $informacoes["NM_TIPO_PATRIMONIO"] ?>">
												<?php echo $informacoes["NM_TIPO_PATRIMONIO"] ?>
											</option>
											<option value="MÓVEL">Móvel</option>
											<option value="IMÓVEL">Imóvel</option>
										</select>
									</div> 
								</div>	
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Denominação</label>
										<select class="form-control" id="classificacao_contabil" name="classificacao_contabil" />
											<option value="<?php echo $informacoes["ID_CLASSIFICACAO_CONTABIL"] ?>">
												<?php echo retorna_denominacao_contabil_rmb($informacoes["ID_CLASSIFICACAO_CONTABIL"],$conexao_com_banco) ?>
											</option>
											<?php $lista = retorna_denominacoes_contabeis_rmb($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_DENOMINACAO ?>
											</option><?php } ?>
										</select>
									</div> 
								</div>								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Saldo Anterior</label>
										<input class="form-control" id="saldo_anterior" name="saldo_anterior" type="number" step="0.01" value="<?php echo $informacoes["VL_SALDO_ATUAL"] ?>" readonly />  
									</div> 
								</div>	
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Entradas</label>
										<input class="form-control" id="entradas" name="entradas" type="number" step="0.01" />  
									</div> 
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Entradas Extras</label>
										<input class="form-control" id="entradas_extras" name="entradas_extras" type="number" step="0.01" />  
									</div> 
								</div>								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Saídas</label>
										<input class="form-control" id="saidas" name="saidas" type="number" step="0.01" />  
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