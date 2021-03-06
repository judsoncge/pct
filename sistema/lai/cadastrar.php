<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_LAI";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de LAI</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número de Processo Integra</label>
										<input class="form-control" id="processo" name="processo" placeholder="Digite o número do processo" type="text" maxlength="255" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número de Protocolo e-SIC</label>
										<input class="form-control" id="numero_protocolo" name="numero_protocolo" placeholder="Digite o número de protocolo" type="text" maxlength="255" required />				  
									</div>				
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Canal de Acesso</label>
										<select class="form-control" id="canal_acesso" name="canal_acesso" required />
											<option value="">Selecione</option>
											<option value="PRESENCIAL">PRESENCIAL</option>
											<option value="E-MAIL">E-MAIL</option>
											<option value="E-SIC">E-SIC</option>
										</select>
									</div> 
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Assunto</label>
										<input class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto" type="text" maxlength="255" required />				  
									</div>				
								</div>
							</div>
							<strong><h4>Prazo</h4></strong>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de recebimento da solicitação</label>
										<input class="form-control" id="dt_recebimento_solicitacao" name="dt_recebimento_solicitacao" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de abertura do processo</label>
										<input class="form-control" id="dt_abertura_processo" name="dt_abertura_processo" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de envio de resposta</label>
										<input class="form-control" id="dt_envio_resposta" name="dt_envio_resposta" type="date" required />	  
									</div> 
								</div>																	
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Prorrogação do prazo</label>
										<select class="form-control" id="prorrogacao" name="prorrogacao" required />
											<option value="">Selecione</option>
											<option value="SIM">SIM</option>
											<option value="NÃO">NÃO</option>											
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data final para expedição de resposta</label>
										<input class="form-control" id="dt_final_expedicao_resposta" name="dt_final_expedicao_resposta" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data final de recebimento de recurso</label>
										<input class="form-control" id="dt_final_recebimento_recurso" name="dt_final_recebimento_recurso" type="date" required />	  
									</div> 
								</div>
								
							</div>
							<strong><h4>Características do Solicitante</h4></strong>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de pessoa do solicitante</label>
										<select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required />
											<option value="">Selecione o tipo de pessoa</option>
											<option value="PESSOA FISICA">Pessoa Física</option>
											<option value="PESSOA JURIDICA">Pessoa Jurídica</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Unidade Federativa do solicitante</label>
										<select class="form-control" id="uf" name="uf" />
											<option value="">Selecione a UF</option>
											<?php $lista = retorna_ufs($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ESTADO . " - " . $r->UF_ESTADO ?></option><?php } ?>
										</select>
									</div> 
								</div>							
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Situação</label>
										<select class="form-control" id="situacao" name="situacao" required />
											<option value="">Selecione a situação</option>
											<option value="ATENDIDO">ATENDIDO</option>
											<option value="NEGADO">NEGADO</option>
											<option value=" EM TRAMITAÇÃO">EM TRAMITAÇÃO</option>
											<option value="REDIRECIONADO">REDIRECIONADO</option>
										</select>
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