<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Meu Blog</title>
        <?php
	        echo link_tag('https://fonts.googleapis.com/css?family=Roboto+Condensed');
	        echo link_tag('assets/css/estilo.css');
        ?>
    </head>
<body>
	<?php
		echo anchor(base_url("administracao/login"),"Login");
	?>
    
</body>
</html>
