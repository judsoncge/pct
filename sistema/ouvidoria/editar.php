<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_OUVIDORIA";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_ouvidoria";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de ouvidoria da <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?> de <?php echo date_format(new DateTime($informacoes["DT_RECEBIMENTO_MANIFESTACAO"]), 'd/m/Y') ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $informacoes["ID"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do Processo</label>
										<input class="form-control" id="processo" name="processo" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" minlength="4" value="<?php echo $informacoes["NM_NUMERO_PROCESSO"] ?>" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Recebimento</label>
										<input class="form-control" id="data_recebimento" name="data_recebimento" type="date" value="<?php echo $informacoes["DT_RECEBIMENTO_MANIFESTACAO"] ?>" required />	  
									</div> 
								</div> 							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Abertura</label>
										<input class="form-control" id="data_abertura" name="data_abertura" type="date" value="<?php echo $informacoes["DT_RECEBIMENTO_MANIFESTACAO"] ?>" required />	  
									</div> 
								</div> 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo da Manifestação</label>
										<select class="form-control" id="tipo_manifestacao" name="tipo_manifestacao" required />
											<option value="<?php echo $informacoes["NM_TIPO_MANIFESTACAO"] ?>"><?php echo $informacoes["NM_TIPO_MANIFESTACAO"] ?></option>
											<option value="SOLICITACAO DE PROVIDENCIA">Solicitação de Providência</option>
											<option value="RECLAMACAO">Reclamação</option>
											<option value="DENUNCIA">Denúncia</option>
											<option value="SUGESTAO">Sugestão</option>
											<option value="ELOGIO">Elogio</option>
										</select>
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Característica da Manifestação</label>
										<input class="form-control" id="caracteristica" name="caracteristica" placeholder="Digite a caracteristica da manifestação" type="text" maxlength="255" value="<?php echo $informacoes["NM_CARACTERISTICA_MANIFESTACAO"] ?>" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Assunto</label>
										<input class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto" type="text" maxlength="255" value="<?php echo $informacoes["NM_ASSUNTO"] ?>" required />	  
									</div> 
								</div> 							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Canal de Recebimento</label>
										<select class="form-control" id="canal" name="canal" required />
											<option value="<?php echo $informacoes["NM_CANAL_RECEBIMENTO_MANIFESTACAO"] ?>"><?php echo $informacoes["NM_CANAL_RECEBIMENTO_MANIFESTACAO"] ?></option>
											<option value="TELEFONE">Telefone</option>
											<option value="ONLINE">Online</option>
											<option value="PRESENCIAL">Presencial</option>
										</select>
									</div> 
								</div>	 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de Pessoa</label>
										<select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required />
											<option value="<?php echo $informacoes["NM_TIPO_PESSOA"] ?>"><?php echo $informacoes["NM_TIPO_PESSOA"] ?></option>
											<option value="FISICA">Física</option>
											<option value="JURIDICA">Jurídica</option>
										</select>
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data E-mail de confirmação</label>
										<input class="form-control" id="data_email_confirmacao" name="data_email_confirmacao" type="date" value="<?php echo $informacoes["DT_EMAIL_CONFIRMACAO"] ?>" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data E-mail de resposta</label>
										<input class="form-control" id="data_email_resposta" name="data_email_resposta"  type="date" value="<?php echo $informacoes["DT_EMAIL_RESPOSTA"] ?>" required />
									</div> 
								</div>							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Órgão Vinculado Encaminhado</label>
										<select class="form-control" id="orgao_vinculado" name="orgao_vinculado" />
											<option value="<?php echo $informacoes["ID_ORGAO_VINCULADO_ENCAMINHADO"] ?>"><?php echo retorna_nome_orgao($informacoes["ID_ORGAO_VINCULADO_ENCAMINHADO"], $conexao_com_banco) ?></option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>	 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Situação Atual</label>
										<select class="form-control" id="situacao" name="situacao" required />
											<option value="<?php echo $informacoes["NM_SITUACAO"] ?>"><?php echo $informacoes["NM_SITUACAO"] ?></option>
											<option value="OUVIDORIA">Ouvidoria</option>
											<option value="AGUARDANDO RESPOSTA">Aguardando Resposta</option>
										</select>
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