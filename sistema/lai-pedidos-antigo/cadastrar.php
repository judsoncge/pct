<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_RECEITAS_DESPESAS";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Receita</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo da receita</label>
										<select class="form-control" id="tipo" name="tipo" required />
											<option value="">Selecione o tipo</option>
											<?php $lista = retorna_tipos_receitas($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_RECEITA ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Mês referência</label>
										<select class="form-control" id="mes_referencia" name="mes_referencia" required />
											<option value="">Selecione o mês</option>
											<option value="1">Janeiro</option>
											<option value="2">Fevereiro</option>
											<option value="3">Março</option>
											<option value="4">Abril</option>
											<option value="5">Maio</option>
											<option value="6">Junho</option>
											<option value="7">Julho</option>
											<option value="8">Agosto</option>
											<option value="9">Setembro</option>
											<option value="10">Outubro</option>
											<option value="11">Novembro</option>
											<option value="12">Dezembro</option>
										</select>
									</div> 
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Ano referência</label>
										<select class="form-control" id="ano_referencia" name="ano_referencia" required />
											<option value="">Selecione o ano</option>
											<?php $a = date('Y'); for($i = $a-2; $i <= $a; $i++){ ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>	
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Início</label>
										<input class="form-control" id="data_inicio" name="data_inicio" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Término</label>
										<input class="form-control" id="data_termino" name="data_termino" type="date" required />	  
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Status da Obra</label>
										<input class="form-control" id="status" name="status" placeholder="Digite o status da obra" type="text" maxlength="255" required />				  
									</div>			
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Percentual de Execução da Obra</label>
										<input class="form-control" id="percentual_execucao" name="percentual_execucao" placeholder="Digite o percentual de execução" type="text" maxlength="255" required />				  
									</div>	
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Referência de Execução</label>
										<input class="form-control" id="data_referencia" name="data_referencia" type="date" required />	  
									</div> 	
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Beneficiários</label>
										<input class="form-control" id="beneficiarios" name="beneficiarios" placeholder="Digite os beneficiários" type="text" maxlength="255" required />				  
									</div>			
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número de Contrato</label>
										<select class="form-control" id="id_contrato" name="id_contrato" />
											<option value="">Selecione o contrato</option>
											<?php $lista = retorna_numero_contratos_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_NUMERO_CONTRATO ?>
											</option><?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor da Obra</label>
										<input class="form-control" id="valor_obra" name="valor_obra" type="number" step="0.01" required />  
									</div> 
								</div>		
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Origem dos Recursos</label>
										<input class="form-control" id="origem_recurso" name="origem_recurso" placeholder="Informar todas as fontes dos recursos" type="text" maxlength="255" required				  
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