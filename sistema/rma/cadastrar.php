<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_RMA";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Relatório de Movimentação do Almoxarifado</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">								
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Denominação</label>
										<select class="form-control" id="classificacao_contabil" name="classificacao_contabil"  required />
											<option value="">Selecione a denominação</option>
											<?php $lista = retorna_denominacoes_contabeis_rma($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_DENOMINACAO ?>
											</option><?php } ?>
										</select>
									</div> 
								</div>								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Saldo Anterior</label>
										<input class="form-control" id="saldo_anterior" name="saldo_anterior" type="number" step="0.01" required />  
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