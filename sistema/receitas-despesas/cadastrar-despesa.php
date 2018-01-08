<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_RECEITAS_DESPESAS";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Despesa</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php?operacao=despesa" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo da despesa</label>
										<select class="form-control" id="tipo" name="tipo" required />
											<option value="">Selecione o tipo</option>
											<?php $lista = retorna_tipos_despesas($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_DESPESA ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Descrição</label>
										<input class="form-control" id="descricao" name="descricao" placeholder="Descreva a despesa" type="text" maxlength="255" required />
									</div>	
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor</label>
										<input class="form-control" id="valor" name="valor" type="number" step="0.01" required />	  
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