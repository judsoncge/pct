<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_CONVENIOS";
include("../includes/verificacao-permissao.php");
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de convênio</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo</label>
										<select class="form-control" id="tipo" name="tipo" required/>
											<option value="">Qual o tipo?</option>
											<option value="CONVÊNIO">CONVÊNIO</option>
											<option value="CONTRATO DE REPASSE">CONTRATO DE REPASSE</option>
											<option value="TERMO DE COMPROMISSO">TERMO DE COMPROMISSO</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Concedente</label>
										<input class="form-control" id="concedente" name="concedente" placeholder="Digite o concedente" type="text" maxlength="255" required/>				  
									</div>				
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Convenente</label>
										<select class="form-control" id="orgao" name="orgao" required/>
											<option value="">Selecione o órgão</option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">FECOEP?</label>
										<select class="form-control" id="fecoep" name="fecoep" required/>
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Objeto do convênio</label>
										<input class="form-control" id="objeto" name="objeto" placeholder="Digite o objeto" type="text" maxlength="255" required/>				  
									</div>				
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de início</label>
										<input class="form-control" id="data_inicio" name="data_inicio" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de término</label>
										<input class="form-control" id="data_termino" name="data_termino" type="date" required />
									</div>				
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do SIAFE</label>
										<input class="form-control" id="numero_siafe" name="numero_siafe" type="text" maxlength="255" required/>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do SICONV</label>
										<input class="form-control" id="numero_siconv" name="numero_siconv" type="text" maxlength="255" required/>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do SIAFI</label>
										<input class="form-control" id="numero_siafi" name="numero_siafi" type="text" maxlength="255" required/>
									</div> 
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de partida total</label>
										<input class="form-control" id="valor_partida_total" name="valor_partida_total" type="number" step="0.01" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de partida liberado</label>
										<input class="form-control" id="valor_partida_liberado" name="valor_partida_liberado" type="number" step="0.01" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de contrapartida total</label>
										<input class="form-control" id="valor_contrapartida_total" name="valor_contrapartida_total" type="number" step="0.01" required />	  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de contrapartida liberado</label>
										<input class="form-control" id="valor_contrapartida_liberado" name="valor_contrapartida_liberado" type="number" step="0.01" required />
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de aditivo</label>
										<input class="form-control" id="valor_aditivo" name="valor_aditivo" type="number" step="0.01" required />	  
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Prazo do aditivo</label>
										<input class="form-control" id="prazo_aditivo" name="prazo_aditivo" type="date" />	  
									</div> 
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data da última liberação</label>
										<input class="form-control" id="data_ultima_liberacao" name="data_ultima_liberacao" type="date"/>	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de prorrogação</label>
										<input class="form-control" id="data_prorrogacao" name="data_prorrogacao" type="date"/>	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de prestação de contas</label>
										<input class="form-control" id="data_prestacao_contas" name="data_prestacao_contas" type="date"/>	  
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