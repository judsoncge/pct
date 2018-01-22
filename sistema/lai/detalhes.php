<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_LAI";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_lai";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>LAI do(a) <?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  de Número: <?php echo $informacoes["NM_NUMERO_PROCESSO"] ?> 	
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
							
							<h2>INFORMAÇÕES GERAIS</h2>
							<hr>							
							<b>Número de Processo Integra</b>: <?php echo $informacoes["NM_NUMERO_PROCESSO"]?><br>
							<b>Número de Protocolo e-SIC</b>:	<?php echo $informacoes["NM_NUMERO_PROTOCOLO"] ?> <br>
							<b>Canal de Acesso</b>:	<?php echo $informacoes["NM_CANAL_ACESSO"] ?><br>	
							<b>Assunto</b>:	<?php echo $informacoes["NM_ASSUNTO"] ?><br>	
							<hr>							
							<h2>INFORMAÇÕES DE PRAZO</h2>
							<hr>
							<b>Data de Abertura do Processo</b>: <?php echo date_format(new DateTime($informacoes["DT_ABERTURA_PROCESSO"]), 'd/m/Y') ?><br>
							<b>Data de Recebimento da Solicitação</b>: <?php echo date_format(new DateTime($informacoes["DT_RECEBIMENTO_SOLICITACAO"]), 'd/m/Y') ?><br>
							<b>Data Final para Expedição de Resposta</b>: <?php echo date_format(new DateTime($informacoes["DT_FINAL_EXPEDICAO_RESPOSTA"]), 'd/m/Y') ?><br>
							<b>Prorrogação</b>: <?php echo $informacoes["NM_PRORROGACAO"] ?><br>
							<b>Data de Envio de Resposta</b>: <?php echo date_format(new DateTime($informacoes["DT_ENVIO_RESPOSTA"]), 'd/m/Y') ?><br>
							<b>Data Final de Recebimento de Recurso</b>: <?php echo date_format(new DateTime($informacoes["DT_FINAL_RECEBIMENTO_RECURSO"]), 'd/m/Y') ?><br>
							<hr>							
							<h2>CARACTERÍSTICAS DO SOLICITANTE</h2>
							<hr>
							<b>Tipo de Pessoa</b>: <?php echo $informacoes["NM_TIPO_PESSOA"]?><br>
							<b>Unidade Federativa</b>: 
								<?php 
									$uf = mysqli_fetch_object(retorna_uf($informacoes["ID_UF"], $conexao_com_banco));
									echo $uf ? ($uf->NM_ESTADO . " - " . $uf->UF_ESTADO) : '';
								?><br>
							<b>Situação</b>: <?php echo $informacoes["NM_SITUACAO"]?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>