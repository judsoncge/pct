<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_CORREICAO";
include("../includes/verificacao-permissao.php");
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de correição</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número da Portaria</label>
										<input class="form-control" id="numero_portaria" name="numero_portaria" placeholder="Digite o numero da portaria" type="text" maxlength="255" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Publicação da Portaria</label>
										<input class="form-control" id="data_portaria" name="data_portaria" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de Procedimento</label>
										<select class="form-control" id="tipo_procedimento" name="tipo_procedimento" required />
											<option value="">Selecione o tipo</option>
											<option value="SINDICANCIA ADMINISTRATIVA">Sindicância Administrativa</option>
											<option value="PROCESSO ADMINISTRATIVO DISCIPLINAR">Processo Administrativo Disciplinar</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do Processo</label>
										<input class="form-control" id="processo" name="processo" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" minlength="4" required />
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Instauração</label>
										<input class="form-control" id="data_instauracao" name="data_instauracao" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Situação</label>
										<input class="form-control" id="situacao" name="situacao" placeholder="Digite a situação" type="text" maxlength="255" required />				  
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do Decreto</label>
										<input class="form-control" id="numero_decreto" name="numero_decreto" placeholder="Digite o numero do decreto" type="text" maxlength="255" required />				  
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Publicação do Decreto</label><input class="form-control" id="data_decreto" name="data_decreto" type="date" required />	  
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Penalidade</label>
										<select class="form-control" id="penalidade" name="penalidade" required />
											<option value="">Selecione a penalidade</option>
											<option value="ARQUIVAMENTO DE PROCESSO">Arquivamento de Processo</option>
											<option value="APLICACAO DE PENALIDADE E ADVERTENCIA, OU SUSPENSAO ATE 30 DIAS">Aplicação de Penalidade e Advertência, ou Suspensão até 30 dias</option>
											<option value="INSTAURACAO DE UM PAD">Instauração de um PAD</option>
											<option value="ADVERTENCIA">Advertência</option>
											<option value="SUSPENSAO">Suspensão</option>
											<option value="DEMISSAO">Demissão</option>
											<option value="CASSSACAO DE APOSENTADORIA OU DISPONIBILIDADE">Cassação de Aposentadoria ou Disponibilidade</option>
											<option value="DESTITUICAO DE FUNCAO COMISSIONADA">Destituição de Função Comissionada</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Motivo</label>
										<input class="form-control" id="motivo" name="motivo" placeholder="Digite o motivo" type="text" maxlength="255" required />				  
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Cargo Ocupado</label>
										<select class="form-control" id="cargo" name="cargo" required />
											<option value="">Selecione o cargo</option>
											<?php $lista = retorna_cargos_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->NM_CARGO ?>"><?php echo $r->NM_CARGO ?></option>
											<?php } ?>
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