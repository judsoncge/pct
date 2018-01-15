<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_DIARIAS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_diarias";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Diária de <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?>  
		para <?php echo retorna_nome_cidade($informacoes["ID_CIDADE_DESTINO"], $conexao_com_banco); ?></p>		
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
							<b>Beneficiário</b>:         <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?><br>
							<b>Matrícula</b>:            <?php echo retorna_matricula_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?><br>
							<b>Grupo</b>:                <?php echo retorna_nome_grupo(retorna_grupo_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco), $conexao_com_banco) ?><br>
							<hr>
							<h2>INFORMAÇÕES DA DIÁRIA</h2>
							<hr>
							<b>Destino</b>:                  <?php echo retorna_nome_cidade($informacoes["ID_CIDADE_DESTINO"], $conexao_com_banco) . " - " . retorna_uf_estado_cidade($informacoes["ID_CIDADE_DESTINO"], $conexao_com_banco); ?><br>
							<b>Meio de transporte</b>:       <?php echo $informacoes["NM_MEIO_TRANSPORTE"] ?><br>
							<b>Objetivo</b>:                 <?php echo $informacoes["NM_OBJETIVO"] ?><br>
							<b>Data início da viagem</b>:    <?php echo date_format(new DateTime($informacoes["DT_INICIO"]), 'd/m/Y')?><br>
							<b>Data término da viagem</b>:    <?php echo date_format(new DateTime($informacoes["DT_TERMINO"]), 'd/m/Y')?><br>
							<b>Número de diárias</b>         <?php echo $informacoes["NR_DIARIAS"] ?><br>
							<b>Tipo</b>:                     <?php echo $informacoes["NM_TIPO"] ?><br>
							<b>Valor pago</b>:               <?php echo "R$ " . number_format($informacoes["VL_PAGO"] , 2, ",", ".")?><br>
							<hr>
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>Número da portaria</b>:       <?php echo $informacoes["NM_NUMERO_PORTARIA"] ?><br>
							<b>Data de publicação</b>:       <?php echo date_format(new DateTime($informacoes["DT_PUBLICACAO"]), 'd/m/Y') ?><br>
							<b>Data de prestação de contas</b>:       <?php echo date_format(new DateTime($informacoes["DT_PRESTACAO_CONTAS"]), 'd/m/Y') ?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>