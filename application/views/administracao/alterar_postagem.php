<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Meu Blog - Admiistraxcao</title>
		<?php
	echo link_tag('https://fonts.googleapis.com/css?family=Roboto+Condensed');
	echo link_tag('assets/css/estilo.css');
?>
	</head>
	<body>
		<?php
			echo anchor(base_url("administracao/gerenciar"), " Bandas ").
			anchor(base_url("administracao/logout"), " Logout ").
			heading("Adicionar", 3);
			
		?>
		
		<div id="caixa-media">
			
			<?php
			$atributos = array('name'=>'formulario_postagem', 'id'=>'formulario_postagem');
			
			echo form_open(base_url('administracao/gerenciar/salvar_alteracao'), $atributos).
			form_hidden('id', $banda[0]->id).
			form_label("Nome: ", "txt_titulo").br().
			form_input('txt_titulo', $banda[0]->nome).br().
			form_label("Quantidade de integrantes: ", "txt_texto").br().
			form_input('txt_texto', $banda[0]->qtd_integrantes).br().
			form_label("Data de fundação: ", "data_criacao"). br().
			form_input('txt_data', $banda[0]->data_fundacao) . br().
			form_submit("btn_enviar", "Salvar").form_close();
		?>
		
		</div>
	</body>
</html>
