<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_OUVIDORIA";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Ouvidoria</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do Processo</label>
										<input class="form-control" id="processo" name="processo" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" minlength="4" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Recebimento</label>
										<input class="form-control" id="data_recebimento" name="data_recebimento" type="date" required />	  
									</div> 
								</div> 							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Abertura</label>
										<input class="form-control" id="data_abertura" name="data_abertura" type="date" required />	  
									</div> 
								</div> 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo da Manifestação</label>
										<select class="form-control" id="tipo_manifestacao" name="tipo_manifestacao" required />
											<option value="">Selecione</option>
											<option value="SOLICITACAO DE PROVIDENCIA">SOLICITACAO DE PROVIDENCIA</option>
											<option value="RECLAMACAO">RECLAMACAO</option>
											<option value="DENUNCIA">DENUNCIA</option>
											<option value="SUGESTAO">SUGESTAO</option>
											<option value="ELOGIO">ELOGIO</option>
										</select>
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Característica da Manifestação</label>
										<input class="form-control" id="caracteristica" name="caracteristica" placeholder="Digite a caracteristica da manifestação" type="text" maxlength="255" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Assunto</label>
										<input class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto" type="text" maxlength="255" required />	  
									</div> 
								</div> 							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Canal de Recebimento</label>
										<select class="form-control" id="canal" name="canal" required />
											<option value="">Selecione</option>
											<option value="TELEFONE">TELEFONE</option>
											<option value="E-MAIL">E-MAIL</option>
											<option value="PRESENCIAL">PRESENCIAL</option>
										</select>
									</div> 
								</div>	 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de Pessoa</label>
										<select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required />
											<option value="">Selecione</option>
											<option value="FISICA">FISICA</option>
											<option value="JURIDICA">JURIDICA</option>
										</select>
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data E-mail de Confirmação</label>
										<input class="form-control" id="data_email_confirmacao" name="data_email_confirmacao" type="date" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data E-mail de Resposta</label>
										<input class="form-control" id="data_email_resposta" name="data_email_resposta"  type="date" required />
									</div> 
								</div>							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Órgão Vinculado Encaminhado</label>
										<select class="form-control" id="orgao_vinculado" name="orgao_vinculado" />
											<option value="">Selecione o órgão</option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>	 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Situação Atual</label>
										<input class="form-control" id="situacao" name="situacao" placeholder="Digite a situação" type="text" maxlength="255" required />	  
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