
<?php
include("database_connection.php");
include ("fpdf.php");

$batch_code = $_GET['batch_code'];
?>

<?php
class PDF extends FPDF
{
// Page header
function Header()
{


    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Head Of Department Copy',0,0,'C');
    $this->Cell(-30,25,"FOR INTERNAL USE ONLY",0,0,'C');
    // Line break
    $this->Ln(35);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}






$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//Retrieve the qualification holder details from the database
$query = "select * from student where batch_code LIKE '".$batch_code."'";


    $stmt = mysql_query($query);

    $text0 = '                                                                       ';
    $text1 = '                                     ';

    //heading
    $pdf->SetFont("Arial","B",10);

    $pdf->Cell(85,10,"Student Name",1,1,"L");
    $pdf->Cell(110,-10,"IC NO        ",1,1,"R");
    $pdf->Cell(125,10,"CONT. ",1,1,"R");
    $pdf->Cell(190,-10,"EMAIL                                      ",1,1,"R");
    //body of the pdf



//Display the qualification holders details on a pdf table using Cells
$pdf->SetFont("Arial","",8);
$x=0;
	
while( $record = mysql_fetch_array($stmt))
{
	$pdf->SetXY(10,(55+$x));
	$pdf->Cell(0,10,$record['student_name'],1,1,"L");
	
	
	$pdf->SetXY(95,(55+$x));
	$pdf->Cell(0,10,$record['ic_number'],1,1,"L");
	

	$pdf->SetXY(120,(55+$x));
	$pdf->Cell(0,10,$record['contact_number'],1,1,"L");
	
	$pdf->SetXY(135,(55+$x));
	$pdf->Cell(0,10,$record['email'],1,1,"L");
$x += 10;
}


$pdf->Output();  //Output data to the PDF
?>