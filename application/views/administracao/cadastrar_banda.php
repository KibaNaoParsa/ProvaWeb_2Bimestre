<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Gerenciador de Bandas</title>
		<meta charset="utf-8">
		<?php
			echo link_tag('https://fonts.googleapis.com/css?family=Roboto+Condensed');
			echo link_tag('assets/css/estilo.css');
		?>
	</head>
	<body>
		<?php
			echo anchor(base_url("administracao/gerenciar"), "Home").anchor(base_url("administracao/gerenciar/gerarpdf"), "Relatório de Contratos").anchor(base_url("administracao/logout"), " Logout ").
			heading("Cadastrar banda: ", 3);
			
		?>
		
		<div id="caixa-media">
			<?php
			
			$atributos = array('name'=>'formulario_banda', 'id'=>'formulario_banda');
			echo form_open(base_url('administracao/gerenciar/adicionar'), $atributos).
				form_label("Nome da Banda: ", "txt_nomebanda").br().
				form_input('txt_titulo').br().
				form_label("Quantidade de integrantes: ", "d_texto").br().
				form_input('txt_texto').br().
				form_label("Dia de criação: ", "dia_criacao"). br().
				form_input('txt_dia') . br().
				form_label("Mês de criação: ", "mes_criacao"). br().
				form_input('txt_mes') . br().
				form_label("Ano de criação: ", "ano_criacao"). br().
				form_input('txt_ano') . br().br().

				form_submit("btn_enviar", "Cadastrar Banda").form_close()
		?>
		
		</div>
	</body>
</html>
