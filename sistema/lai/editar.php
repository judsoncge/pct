<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_LAI";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_lai";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Editar LAI do(a) <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>
		de Número <?php echo $informacoes["NM_NUMERO_PROCESSO"] ?>
		</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $informacoes["ID"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número de Processo</label>
										<input class="form-control" id="numero_processo" name="numero_processo" placeholder="Digite o número do processo" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_PROCESSO"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número de Protocolo e-SIC</label>
										<input class="form-control" id="numero_protocolo" name="numero_protocolo" placeholder="Digite o número de protocolo" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_PROTOCOLO"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Canal de Acesso</label>
										<select class="form-control" id="canal_acesso" name="canal_acesso" required />
											<option value="<?php echo $informacoes["NM_CANAL_ACESSO"] ?>">
												<?php echo $informacoes["NM_CANAL_ACESSO"] ?>
											</option>
											<option value="FISICO">Físico</option>
											<option value="TELEFONE">Telefone</option>
											<option value="SITE">Site</option>
										</select>
									</div> 
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Assunto</label>
										<input class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto" type="text" maxlength="255" value="<?php echo $informacoes["NM_ASSUNTO"] ?>" required />				  
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de abertura do processo</label>
										<input class="form-control" id="dt_abertura_processo" name="dt_abertura_processo" type="date" value="<?php echo $informacoes["DT_ABERTURA_PROCESSO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de recebimento da solicitação</label>
										<input class="form-control" id="dt_recebimento_solicitacao" name="dt_recebimento_solicitacao" type="date" value="<?php echo $informacoes["DT_RECEBIMENTO_SOLICITACAO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data final para expedição de resposta</label>
										<input class="form-control" id="dt_final_expedicao_resposta" name="dt_final_expedicao_resposta" type="date" value="<?php echo $informacoes["DT_FINAL_EXPEDICAO_RESPOSTA"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Prorrogação do prazo</label>
										<input class="form-control" id="prorrogacao" name="prorrogacao" type="date" value="<?php echo $informacoes["DT_PRORROGACAO"] ?>" required />	  
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de envio de resposta</label>
										<input class="form-control" id="dt_envio_resposta" name="dt_envio_resposta" type="date" value="<?php echo $informacoes["DT_ENVIO_RESPOSTA"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data final de recebimento de recurso</label>
										<input class="form-control" id="dt_final_recebimento_recurso" name="dt_final_recebimento_recurso" type="date" value="<?php echo $informacoes["DT_FINAL_RECEBIMENTO_RECURSO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de pessoa do solicitante</label>
										<select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required />
											<option value="<?php echo $informacoes["NM_TIPO_PESSOA"] ?>">
												<?php echo $informacoes["NM_TIPO_PESSOA"] ?>
											</option>
											<option value="PESSOA FISICA">Pessoa Física</option>
											<option value="PESSOA JURIDICA">Pessoa Jurídica</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Unidade Federativa do solicitante</label>
										<select class="form-control" id="uf" name="uf" />
											<option value="<?php echo $informacoes["ID_UF"] ?>">
												<?php 
													$uf = mysqli_fetch_object(retorna_uf($informacoes["ID_UF"], $conexao_com_banco));
													echo $uf->NM_NOME . " - " . $uf->NM_SIGLA 
												?>
											</option>
											<?php $lista = retorna_ufs($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>">
												<?php echo $r->NM_NOME . " - " . $r->NM_SIGLA ?>
											</option><?php } ?>
										</select>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Situação</label>
										<input class="form-control" id="situacao" name="situacao" placeholder="Digite a situação do solicitante" type="text" maxlength="255" value="<?php echo $informacoes["NM_SITUACAO"] ?>" required />				  
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