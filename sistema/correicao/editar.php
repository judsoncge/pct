<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_CORREICAO";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_correicao";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de <?php echo $informacoes["NM_PENALIDADE"] ?> em <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?></p>	
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $id ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número da Portaria</label>
										<input class="form-control" id="numero_portaria" name="numero_portaria" placeholder="Digite o numero da portaria" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_PORTARIA"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data da portaria no DOE-AL</label>
										<input class="form-control" id="data_portaria" name="data_portaria" type="date" value="<?php echo $informacoes["DT_PUBLICACAO_PORTARIA"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de Procedimento</label>
										<select class="form-control" id="tipo_procedimento" name="tipo_procedimento" required />
											<option value="<?php echo $informacoes["NM_TIPO_PROCEDIMENTO"] ?>"><?php echo $informacoes["NM_TIPO_PROCEDIMENTO"] ?></option>
											<option value="SINDICANCIA ADMINISTRATIVA">Sindicância Administrativa</option>
											<option value="PROCESSO ADMINISTRATIVO DISCIPLINAR">Processo Administrativo Disciplinar</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do Processo</label>
										<input class="form-control" id="processo" name="processo" placeholder="Complete com zeros os espaços vazios" type="text" maxlength="255" minlength="4" value="<?php echo $informacoes["NM_NUMERO_PROCESSO"] ?>" required />
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de Instauração</label>
										<input class="form-control" id="data_instauracao" name="data_instauracao" type="date" value="<?php echo $informacoes["DT_INSTAURACAO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Situação</label>
										<input class="form-control" id="situacao" name="situacao" placeholder="Digite a situação" type="text" maxlength="255" value="<?php echo $informacoes["NM_SITUACAO"] ?>" required />				  
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do decreto</label>
										<input class="form-control" id="numero_decreto" name="numero_decreto" placeholder="Digite o numero do decreto" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_DECRETO"] ?>" required />				  
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data do decreto no DOE-AL</label><input class="form-control" id="data_decreto" name="data_decreto" type="date" value="<?php echo $informacoes["DT_PUBLICACAO_DECRETO"] ?>" required />	  
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Penalidade</label>
										<select class="form-control" id="penalidade" name="penalidade" required />
											<option value="<?php echo $informacoes["NM_PENALIDADE"] ?>"><?php echo $informacoes["NM_PENALIDADE"] ?></option>
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
										<input class="form-control" id="motivo" name="motivo" placeholder="Digite o motivo" type="text" maxlength="255" value="<?php echo $informacoes["NM_MOTIVO"] ?>"required />				  
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Cargo Ocupado</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="cargo" name="cargo" required />
											<option value="<?php echo $informacoes["NM_CARGO_OCUPADO"] ?>"><?php echo $informacoes["NM_CARGO_OCUPADO"] ?></option>
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