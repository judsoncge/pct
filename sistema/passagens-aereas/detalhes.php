<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_PASSAGENS_AEREAS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_passagens_aereas";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Passagem de <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?>  
		<?php echo retorna_nome_cidade($informacoes["ID_CIDADE_DESTINO"], $conexao_com_banco); ?></p>		
	</div>
	
	<div class="container caixa-conteudo">
	<div id="uatualizacao">
		<span style="color: red;">Última atualização por <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_ATUALIZOU"], $conexao_com_banco) ?> em <?php echo date_format(new DateTime($informacoes["DT_ULTIMA_ATUALIZACAO"]), 'd/m/Y') ?></span>
	</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							
							<h2>INFORMAÇÕES DO BENEFICIÁRIO</h2>
							<hr>
							<b>Beneficiário</b>:
							<?php 
								echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) 
							?>
							<br>
							<b>Matrícula</b>:
							<?php 
								echo retorna_matricula_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco)
							?>
							<br>
							<b>Condição</b>:
							<?php 
								echo retorna_condicao_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) 
							?>
							<br>
							<hr>
							<h2>INFORMAÇÕES DA PASSAGEM</h2>
							<hr>
							<b>Destino</b>:
							<?php 
								echo retorna_nome_cidade($informacoes["ID_CIDADE_DESTINO"], $conexao_com_banco) . " - " . retorna_uf_estado_cidade($informacoes["ID_CIDADE_DESTINO"], $conexao_com_banco); 
							?>
							<br>
							<b>Finalidade</b>:
							<?php 
								echo $informacoes["NM_FINALIDADE"] 
							?>
							<br>
							<b>Data de ida</b>:
							<?php 
								echo date_format(new DateTime($informacoes["DT_IDA"]), 'd/m/Y') 
							?>
							<br>
							<b>Data de volta</b>:
							<?php 
								echo date_format(new DateTime($informacoes["DT_VOLTA"]), 'd/m/Y')
							?>
							<br>
							<hr>
							<h2>INFORMAÇÕES DE VALOR</h2>
							<hr>
							<b>Valor pago ida</b>:
							<?php
								echo "R$ " . number_format($informacoes["VL_IDA"] , 2, ",", ".")
							?>
							<br>
							<b>Valor pago volta</b>:
							<?php 
								echo "R$ " . number_format($informacoes["VL_VOLTA"] , 2, ",", ".")
							?>
							<br>
							<hr>
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>Número do Bilhete</b>:
							<?php 
								echo $informacoes["NM_NUMERO_BILHETE"] 
							?>
							<br>
							<b>Data de prestação de contas</b>:
							<?php 
								echo date_format(new DateTime($informacoes["DT_PRESTACAO_CONTAS"]), 'd/m/Y') 
							?>
							<br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>