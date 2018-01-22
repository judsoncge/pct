<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_CONTRATOS";
include("../includes/verificacao-permissao.php");

?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de contrato</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Contratado(a)</label>
										<a href="../empresas/cadastrar.php">cadastrar novo</a>
										<select class="form-control" id="empresa" name="empresa" required />
											<option value="">Selecione a empresa</option>
											<?php $lista = retorna_empresas($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_EMPRESA ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Órgão</label>
										<select class="form-control" id="orgao" name="orgao" required />
											<option value="">Selecione o órgão</option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Gestor do Contrato</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="gestor" name="gestor" required />
											<option value="">Selecione o beneficiário</option>
											<?php $lista = retorna_servidores_orgao_nao_bolsista($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_SERVIDOR ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Objeto do contrato</label>
										<input class="form-control" id="objeto" name="objeto" placeholder="Digite o objeto" type="text" maxlength="255" required />				  
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Modalidade</label>
										<select class="form-control" id="modalidade" name="modalidade" required />
											<option value="">Selecione</option>
											<option value="CONCORRÊNCIA">CONCORRÊNCIA</option>
											<option value="CONVITE">CONVITE</option>
											<option value="DISPENSA DE LICITAÇÃO">DISPENSA DE LICITAÇÃO</option>
											<option value="DISPENSA DE LICITAÇÃO EM RAZÃO DA EMERGÊNCIA">DISPENSA DE LICITAÇÃO EM RAZÃO DA EMERGÊNCIA</option>
											<option value="DISPENSA DE LICITAÇÃO EM RAZÃO DO VALOR">DISPENSA DE LICITAÇÃO EM RAZÃO DO VALOR</option>
											<option value="INEXIBILIDADE DE LICITAÇÃO">INEXIBILIDADE DE LICITAÇÃO</option>
											<option value="PREGÃO">PREGÃO</option>
											<option value="REGIME DIFERENCIADO DE LICITAÇÃO">REGIME DIFERENCIADO DE LICITAÇÃO</option>
											<option value="TOMADA DE PREÇOS">TOMADA DE PREÇOS</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Processo Administrativo </label>
										<input class="form-control" id="processo" name="processo" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" minlength="4" required />
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Vinculação</label>
										<input class="form-control" id="vinculacao" name="vinculacao" placeholder="Digite a vinculação" type="text" maxlength="255" required />
									</div> 
								</div>
							</div>
							<strong><h4>Vigência</h4></strong>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de assinatura</label>
										<input class="form-control" id="data_assinatura" name="data_assinatura" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de publicação</label>
										<input class="form-control" id="data_publicacao" name="data_publicacao" type="date" required />	  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de início</label>
										<input class="form-control" id="data_inicio" name="data_inicio" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de término</label>
										<input class="form-control" id="data_termino" name="data_termino" type="date" required />
									</div>				
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do contrato (complete com zeros os espaços vazios na frente)</label>
										<input class="form-control" id="numero_contrato" name="numero_contrato" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" required />
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do contrato no SIAFI (complete com zeros os espaços vazios na frente)</label>
										<input class="form-control" id="numero_contrato_siafi" name="numero_contrato_siafi" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" />
									</div> 
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor Global</label>
										<input class="form-control" id="valor_global" name="valor_global" type="number" step="0.01" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor empenhado</label>
										<input class="form-control" id="valor_empenhado" name="valor_empenhado" type="number" step="0.01" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor liquidado</label>
										<input class="form-control" id="valor_liquidado" name="valor_liquidado" type="number" step="0.01" required />	  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor pago até o momento</label>
										<input class="form-control" id="valor_pago" name="valor_pago" type="number" step="0.01" required />
									</div>				
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">É prorrogável?</label>
										<select class="form-control" id="prorrogavel" name="prorrogavel" required/>
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Termo Aditivo</label>
										<input class="form-control" id="termo" name="termo" type="number" required />	  
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