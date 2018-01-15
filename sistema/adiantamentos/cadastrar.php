<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_ADIANTAMENTOS";
include("../includes/verificacao-permissao.php");
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de adiantamento</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Beneficiário</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="beneficiario" name="beneficiario" required />
											<option value="">Selecione o beneficiário</option>
											<?php $lista = retorna_servidores_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_SERVIDOR ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data do recebimento</label>
										<input class="form-control" id="data_recebimento" name="data_recebimento" type="date" required />	  
									</div> 
								</div>								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de prestação de contas</label>
										<input class="form-control" id="data_prestacao_contas" name="data_prestacao_contas" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Ordem bancária</label>
										<input class="form-control" id="ordem_bancaria" name="ordem_bancaria" placeholder="Digite a ordem bancária" type="text" maxlength="255" required />				  
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de material de consumo</label>
										<input class="form-control" id="valor_material" name="valor_material" type="number" step="0.01" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de serviços de terceiros PF</label>
										<input class="form-control" id="valor_pf" name="valor_pf" type="number" step="0.01" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de serviços de terceiros PJ</label>
										<input class="form-control" id="valor_pj" name="valor_pj" type="number" step="0.01" required />  
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de material de consumo devolvido</label>
										<input class="form-control" id="valor_devolvido_consumo" name="valor_devolvido_consumo" type="number" step="0.01" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de serviços de terceiros PF devolvido</label>
										<input class="form-control" id="valor_devolvido_pf" name="valor_devolvido_pf" type="number" step="0.01" required />  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de serviços de terceiros PJ devolvido</label>
										<input class="form-control" id="valor_devolvido_pj" name="valor_devolvido_pj" type="number" step="0.01" required />  
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