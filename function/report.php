<?php
require('database_connection.php');

require('test_currency.php');
setlocale(LC_MONETARY, 'en_US');
 if(isset($_POST['data']) && $_POST['data'] != "")
   {
	   
	   
     $data=$_POST['data'];
	$s = "Select * from reference_letter where ref_letter_id = '$data'";
	$value = sprintf( '%06d', $data );
	
	if($run_sql = mysql_query($s))
	{
		$ref_user_id = mysql_result($run_sql,0,'ref_user_id');
		$Approver = mysql_result($run_sql,0,'ref_approver_EmpUserID');
	
		
		$sql1 = mysql_query("select * from reference_letter_details where reference_letter_id = '$data'");
		
		$ref_type_id = mysql_result($sql1,0,'ref_type_id');
		$bank_id = mysql_result($sql1,0,'bank_id');
		$ref_type_attn_to = mysql_result($sql1,0,'ref_type_attn_to');
		$ref_loc = mysql_result($sql1,0,'ref_loc');
		$p1 = mysql_result($sql1,0,'p1');
		$p1_1 = mysql_result($sql1,0,'p1_1');
		$p1_2 = mysql_result($sql1,0,'p1_2');
		$p1_3 = mysql_result($sql1,0,'p1_3');
		$p1_4 = mysql_result($sql1,0,'p1_4');
		$p1_5 = mysql_result($sql1,0,'p1_5');
		$p1_6 = mysql_result($sql1,0,'p1_6');
		$p1_7 = mysql_result($sql1,0,'p1_7');
		$p2 = mysql_result($sql1,0,'p2');
		$p2_1 = mysql_result($sql1,0,'p2_1');
		$p2_2 = mysql_result($sql1,0,'p2_2');
		$p2_3 = mysql_result($sql1,0,'p2_3');		
		$p2_4 = mysql_result($sql1,0,'p2_4');
		$p3 = mysql_result($sql1,0,'p3');
		$p4 = mysql_result($sql1,0,'p4');
		$p4_1 = mysql_result($sql1,0,'p4_1');
		$p4_3 = mysql_result($sql1,0,'p4_3');
		
		
		$sql4 = mysql_query("select * from reference_type where reference_type_id = '$ref_type_id'");
		$ref_type = mysql_result($sql4,0,'reference_type_name');
		
		$sql3 = mysql_query("select * from bank where BankID = '$bank_id'");
		$bank_name = mysql_result($sql3,0,'BankName');
		$addr_1 = mysql_result($sql3,0,'addr_1');
		$addr_2 = mysql_result($sql3,0,'addr_2');
		$addr_3 = mysql_result($sql3,0,'addr_3');
		$addr_4 = mysql_result($sql3,0,'addr_4');
   
   $sql10 = mysql_query("select * from users where EmpNo = '$Approver'");
		$approver_fullname = mysql_result($sql10,0,'FullName');
		$CorporateID = mysql_result($sql10,0,'CorporateTitle');
   }
	else{
		
	}   

define('FPDF_FONTPATH','./font/');

require('fpdf.php');




class PDF extends FPDF
{
function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
    $k=$this->k;
    if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
    {
        $x=$this->x;
        $ws=$this->ws;
        if($ws>0)
        {
            $this->ws=0;
            $this->_out('0 Tw');
        }
        $this->AddPage($this->CurOrientation);
        $this->x=$x;
        if($ws>0)
        {
            $this->ws=$ws;
            $this->_out(sprintf('%.3F Tw',$ws*$k));
        }
    }
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $s='';
    if($fill || $border==1)
    {
        if($fill)
            $op=($border==1) ? 'B' : 'f';
        else
            $op='S';
        $s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
    }
    if(is_string($border))
    {
        $x=$this->x;
        $y=$this->y;
        if(is_int(strpos($border,'L')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
        if(is_int(strpos($border,'T')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        if(is_int(strpos($border,'R')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        if(is_int(strpos($border,'B')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
    }
    if($txt!='')
    {
        if($align=='R')
            $dx=$w-$this->cMargin-$this->GetStringWidth($txt);
        elseif($align=='C')
            $dx=($w-$this->GetStringWidth($txt))/2;
        elseif($align=='FJ')
        {
            //Set word spacing
            $wmax=($w-2*$this->cMargin);
            $this->ws=($wmax-$this->GetStringWidth($txt))/substr_count($txt,' ');
            $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
            $dx=$this->cMargin;
        }
        else
            $dx=$this->cMargin;
        $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
        if($this->ColorFlag)
            $s.='q '.$this->TextColor.' ';
        $s.=sprintf('BT %.2F %.2F Td (%s) Tj ET',($this->x+$dx)*$k,($this->h-($this->y+.5*$h+.3*$this->FontSize))*$k,$txt);
        if($this->underline)
            $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
        if($this->ColorFlag)
            $s.=' Q';
        if($link)
        {
            if($align=='FJ')
                $wlink=$wmax;
            else
                $wlink=$this->GetStringWidth($txt);
            $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$wlink,$this->FontSize,$link);
        }
    }
    if($s)
        $this->_out($s);
    if($align=='FJ')
    {
        //Remove word spacing
        $this->_out('0 Tw');
        $this->ws=0;
    }
    $this->lasth=$h;
    if($ln>0)
    {
        $this->y+=$h;
        if($ln==1)
            $this->x=$this->lMargin;
    }
    else
        $this->x+=$w;
}
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
$date = date('dS F Y');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',11);
$pdf->SetLeftMargin(25);
$pdf->SetRightMargin(26);

$pdf->SetFont('Times','',11);
	$pdf->ln(40);

    $pdf->Cell(0,10,'Our ref: 10006 / '.$value,0,1,"L");
    $pdf->ln(1);
$pdf->SetFont('Times','',11);
	$pdf->Cell(0,10,$date,0,1);
	$pdf->ln(1);
	
	$pdf->SetFont('Times','B',11);
    $pdf->Cell(0,5,strtoupper($bank_name),0,1);
	
    $pdf->Cell(0,5,strtoupper($addr_1),0,1);

    $pdf->Cell(0,5,strtoupper($addr_2),0,1);
if($addr_3 != "")
{
    $pdf->Cell(0,5,strtoupper($addr_3),0,1);
}

if($addr_4 != "")
{
    $pdf->Cell(0,5,strtoupper($addr_4),0,1);
}
$pdf->ln(5);

	$pdf->SetFont('Times','',11);
	$pdf->write(5,'Attn: ',0,1);
	$pdf->SetFont('Times','BU',11);
	$pdf->write(5,ucfirst($ref_type_attn_to),0,1);
	$pdf->ln(5);

	$pdf->SetFont('Times','',11);
		$pdf->ln(5);
	$pdf->Cell(0,5,'Dear Sir / Madam,',0,1);
	$pdf->ln(5);


	$pdf->write(5,'Re:  ',0,1);
	$pdf->SetFont('Times','BU',11);
	$pdf->write(5,"REFERENCE ON EMPLOYMENT",0,1);
$pdf->ln(10);
$pdf->SetFont('Times','',11);

	$pdf->write(5,"This is to certify that ",0,1,'FJ',1);
	$pdf->SetFont('Times','BU',10);
	$pdf->write(5,strtoupper($title)." ".$fullname,0,1);
	$pdf->SetFont('Times','',11);
	$pdf->write(5," I.C No. ",0,1);
	$pdf->SetFont('Times','BU',10);
	$pdf->write(5,$ic,0,1);
	$pdf->SetFont('Times','',11);
	$pdf->write(5," is ".$user_type." employee of ",0,1);
	$pdf->SetFont('Times','BU',10);
	$pdf->write(5,$company,0,1);
	$pdf->SetFont('Times','',11);
	$pdf->write(5," since ",0,1);
	$pdf->SetFont('Times','BU',11);
	$pdf->write(5,$date_join,0,1);
	$pdf->write(5,".");
		$pdf->ln(10);		
		$pdf->SetFont('Times','',11);
	$pdf->write(5,$gender.' is engaged to the company with a basic salary of ');	
	$pdf->SetFont('Times','BU',10);
	$pdf->write(5,'Brunei Dollars : '.$basic_word.' ($'.$basicpoint.') only',0,1);
	$pdf->write(5,".");
$pdf->SetFont('Times','',11);	
	$pdf->write(5,' with fixed allowances of ');	
	$pdf->SetFont('Times','BU',10);
	$pdf->write(5,'Brunei Dollars : '.$allowance_word.' ($'.$allowance.') only',0,1);	
	$pdf->write(5,".");
$pdf->SetFont('Times','',11);
	$pdf->ln(10);
	$pdf->write(5,"We hope that the above statement would satisfy your requirement and further changes on the status of employment with the company would be furnished upon request.");
	
	$pdf->ln(10);
	if($ref_type_id != "12")
	{
		if($ref_type_id == "2")
			{
			$pdf->write(5,"This reference letter is issued upon employee's request for ".$ref_type.''.$end.".");
			}
			else{
				
			$pdf->write(5,"This reference letter is issued upon management approval for employee's request to apply for ".$ref_type.''.$end.".");
			}
	}
	


	$pdf->ln(10);
	$pdf->write(5,'Thank you.');
	
	$pdf->ln(20);
	$pdf->write(5,'Yours sincerely,');
	
	$pdf->ln(25);
	
	if($approver_fullname=="RAMLAH HJ RABAHA @ BAHA"){
		
	$pdf->write(5,"___________________________");
	}
	if($approver_fullname=="HJH SITI SOHANAH HJ METUSSIN"){
		
		$pdf->SetFont('Times','B',12);
	$pdf->write(5,"____________________________");
	}
	
		$pdf->ln(5);
		$pdf->SetFont('Times','B',10);
	$pdf->write(5,$approver_fullname);
	$pdf->ln(5);
	$pdf->write(5,$CorporateTitle);
		$pdf->ln(5);
	$pdf->write(5,'DST Group Human Resources ');
	
	
	
$pdf->Output();
?>