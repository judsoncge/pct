<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_OUVIDORIA";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_ouvidoria";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Ouvidoria da <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?> de <?php echo date_format(new DateTime($informacoes["DT_RECEBIMENTO_MANIFESTACAO"]), 'd/m/Y') ?></p>		
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
							<b>Número do Processo</b>:         
							<?php echo $informacoes["NM_NUMERO_PROCESSO"] ?><br>
							
							<b>Tipo da Manifestação</b>:       
							<?php echo $informacoes["NM_TIPO_MANIFESTACAO"] ?><br>
							
							<b>Característica da Manifestação</b>:       
							<?php echo $informacoes["NM_CARACTERISTICA_MANIFESTACAO"] ?><br>
							
							<b>Assunto</b>:       
							<?php echo $informacoes["NM_ASSUNTO"] ?><br>
							
							<b>Canal do Recebimento da Manifestação</b>:       
							<?php echo $informacoes["NM_CANAL_RECEBIMENTO_MANIFESTACAO"] ?><br>
							
							<b>Tipo de Pessoa</b>:       
							<?php echo $informacoes["NM_TIPO_PESSOA"] ?><br>
							
							<b>Órgão/Entidade Vinculado que foi Encaminhado</b>: 
							<?php echo retorna_sigla_orgao($informacoes["ID_ORGAO_VINCULADO_ENCAMINHADO"], $conexao_com_banco) ?><br>
							
							<b>Situação Atual</b>:       
							<?php echo $informacoes["NM_SITUACAO"] ?><br>
							
							<hr>
							<h2>INFORMAÇÕES DE DATAS</h2>
							<hr>
							
							<b>Data do Recebimento</b>:       
							<?php echo date_format(new DateTime($informacoes["DT_RECEBIMENTO_MANIFESTACAO"]), 'd/m/Y') ?><br>
							
							<b>Data da Abertura</b>:           
							<?php echo date_format(new DateTime($informacoes["DT_ABERTURA"]), 'd/m/Y') ?><br>
							
							<b>Data de e-mail de confirmação do recebimento</b>:       
							<?php echo date_format(new DateTime($informacoes["DT_EMAIL_CONFIRMACAO"]), 'd/m/Y') ?><br>
							
							<b>Data de e-mail de resposta do recebimento</b>:       
							<?php echo date_format(new DateTime($informacoes["DT_EMAIL_RESPOSTA"]), 'd/m/Y') ?><br>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>