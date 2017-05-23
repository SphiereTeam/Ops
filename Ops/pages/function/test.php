<?php

require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
}

/* // Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
} */
}

// Instanciation of inherited class
$date = date('d M y');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->SetLeftMargin(25);
$pdf->SetRightMargin(25);

	$pdf->ln(40);

    $pdf->Cell(0,10,'Our Ref: ',0,1,"L");
    $pdf->ln(1);

	$pdf->Cell(0,10,'Date:  '.$date,0,1);
	$pdf->ln(1);

    $pdf->Cell(0,5,'BIBD AT-TAMWIL BERHAD ',0,1);

    $pdf->Cell(0,5,'UNIT 1, BANGUNAN IBU PEJABAT, PERSEKUTUAN PENGAKAP ',0,1);

    $pdf->Cell(0,5,'KOMPLEKS PENGAKAP, JALAN GADONG ',0,1);

    $pdf->Cell(0,5,'NEGARA BRUNEI DARUSSALAM ',0,1);
$pdf->ln(5);
	$pdf->Cell(0,5,'Attn: ',0,1);
	$pdf->ln(5);

	$pdf->Cell(0,5,'Dear Sir / Madam',0,1);
	$pdf->ln(5);


	$pdf->write(5,'Re:  ',0,1);
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,'REFERENCE ON EMPLOYMENT',0,1);
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
	$pdf->write(5,"This is to certify that ",0,1);
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,"SAHRUL BAKTHIAR BIN TAHA,",0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->write(5," I.C No. ",0,1);
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,"00-303809",0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->write(5," is a permanent employee of ",0,1);
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,"DST COMMUNICATIONS SDN. BHD.",0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->write(5," since ",0,1);
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,"2nd July 2012 ",0,1);
		$pdf->ln(10);
		


		$pdf->SetFont('Arial','',11);
	$pdf->write(5,'He is engaged to the company with a basic salary of ');	
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,'Brunei Dollars : Two Thousand and Eighty Five ($2,085.00) only');
$pdf->SetFont('Arial','',11);	
	$pdf->write(5,' with fixed allowances of ');	
	$pdf->SetFont('Arial','BU',11);
	$pdf->write(5,'Brunei Dollars: Five Hundred Seventy One and Cents Twenty Five ($571.25) only.');	
$pdf->SetFont('Arial','',11);
	$pdf->ln(10);
		
	$pdf->write(5,"We hope that the above statement would satisfy your requirement and further changes on the status of employment with the company would be furnished upon request.");
	
	$pdf->ln(10);
	$pdf->write(5,"This reference letter is issued upon management approval for employee's request to apply for");
	$pdf->write(5," Car Financing ");
	$pdf->write(5,"from your esteemed bank.");

	$pdf->ln(10);
	$pdf->write(5,'Thank You.');
	
	$pdf->ln(20);
	$pdf->write(5,'Yours Sincerely,');
	
	$pdf->ln(25);
	$pdf->write(5,'________________________________________');
		$pdf->ln(5);
		$pdf->SetFont('Arial','B',10);
	$pdf->write(5,'HAJAH SITI SOHANAH BINTI HAJI METUSSIN');
	$pdf->ln(5);
	$pdf->write(5,'Manager');
		$pdf->ln(5);
	$pdf->write(5,'DST Group Human Resources ');
	
	
	
$pdf->Output();
?>