<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_TELEFONIA";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_telefonia";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de telefone da <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  
		com <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_RESPONSAVEL"], $conexao_com_banco) ?></p>	
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $id ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Responsável</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="responsavel" name="responsavel" required />
											<option value="<?php echo $informacoes["ID_SERVIDOR_RESPONSAVEL"] ?>"><?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_RESPONSAVEL"], $conexao_com_banco) ?></option>
											<?php $lista = retorna_servidores_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_SERVIDOR ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do telefone</label>
										<input class="form-control" id="telefone" name="numero" placeholder="Digite o numero de telefone" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo</label>
										<select class="form-control" id="tipo" name="tipo" required />
											<option value="<?php echo $informacoes["NM_TIPO"] ?>"><?php echo $informacoes["NM_TIPO"] ?></option>
											<option value="MOVEL">Móvel</option>
											<option value="FIXO">Fixo</option>
											<option value="MODEM">Modem</option>
											<option value="MOVEL MODEM">Móvel Modem</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Cota mensal</label>
										<input class="form-control" id="cota_mensal" name="cota_mensal" type="number" step="0.01" value="<?php echo $informacoes["VL_COTA_MENSAL"] ?>" required />  
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