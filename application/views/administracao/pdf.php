<?php
	include_once "assets/fpdf/fpdf.php";
	
	//cria matriz com os titulos 
	//e argura das colunas
	$titulos = array(
		utf8_decode('Nome'), 
		utf8_decode('Integrantes'),
		utf8_decode('Fundação')
	);
	
	$larguras = array(250, 100, 130);
	$dados = array();
	
	foreach ($banda as $b) {
		$dados[] = array(utf8_decode($b->nome), $b->qtd_integrantes, date("d-m-Y", strtotime($b->data_fundacao)));
}
	
	$pdf = new FPDF('P', 'pt', 'A4');
	$pdf->AddPage();
	$pdf->SetFont('Times', 'B', 12);
	
	//cor de preenchimento e espessura de linha
	$pdf->SetFillColor(91, 59, 255);
	$pdf->SetTextColor(255);
	$pdf->SetLineWidth(1);
	
	//criar o cabeçalo da tabela
	$i = 0;
	foreach($titulos as $key){
		$pdf->Cell($larguras[$i], 15, $key, 1, 0, 'C', true);
		$i++;
	}
	
	//quebra de linha
	$pdf->Ln();
	$pdf->SetFillColor(200, 200, 200);
	$pdf->SetTextColor(0);
	$pdf->SetFont('Times', '', 12);
	
	//adiciona os dados
	$colore = false;
	$total = 0;
	foreach($dados as $linha){
		$col = 0;
		foreach($linha as $coluna){
			//se inteiro alinha a direita 
			if(is_int($coluna)){
				$pdf->Cell($larguras[$col], 14, number_format($coluna), 'LR', 0, 'R', $colore);
			}else{
				$pdf->Cell($larguras[$col], 14, $coluna, 'LR', 0, 'L', $colore);
			}
			$col++;
		}
		$pdf->Ln();
		$colore = !$colore;
	}
	
	$pdf->Cell(array_sum($larguras),0,'','T');
	    
	//calcula a largura das celulas
	$largura1 = array_sum($larguras)-$larguras[count($larguras)-1];
	$largura2 = array_sum($larguras)-$largura1;

	$pdf->OutPut();
?>

