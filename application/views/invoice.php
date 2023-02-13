<?php

class RPDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->SetFont('Arial','B',16);
        $this->Cell(0,6,'Supersonic Motors Payment Invoice',0,0,'C');
        $this->Image(base_url().'assets/img/logo-horizontal.png',6,26,66);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'SSM-Hyderabad Invoice Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$address_length = strlen($payment['address']);
$address_half = $address_length/2;
$total= $payment['payment_amount'];
$gst = ($total*18)/100;
$cp= $total-$gst;
// Instanciation of inherited class
$this->mypdf = new RPDF('P','mm','A5');
$this->mypdf->AliasNbPages();
$this->mypdf->AddPage();
$this->mypdf->SetFont('Times','',12);
$this->mypdf->SetY(26);
$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,'Invoice #:  '.$payment['payment_id'],0,1,'L');
$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,'Created:  '. date('F m, Y'),0,1,'L');
$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,'Paid on:  '.$payment['payment_date_time'],0,1,'L');
$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,'Due Date:  '.$payment['payment_due_date'],0,1,'L');
$this->mypdf->SetY(56);

$this->mypdf->SetFont('Times','B',12);
$this->mypdf->SetX(8);
$this->mypdf->Cell(0,6,'Supersonic Motors',0,0,'L');
$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,ucwords($payment['org_name']),0,1,'L');
$this->mypdf->SetFont('Times','',12);
$this->mypdf->SetX(8);
$this->mypdf->Cell(0,6,'24-379, Kukatpally, Hyderabad',0,0,'L');
$this->mypdf->SetX(86);
$this->mypdf->MultiCell(0,6,substr(ucwords($payment['address']),0,$address_half),0);
$this->mypdf->SetX(8);
$this->mypdf->Cell(0,6,'Telangana, India 500055',0,0,'L');
$this->mypdf->SetX(86);
$this->mypdf->MultiCell(0,6,substr(ucwords($payment['address']),$address_half,$address_length),0);
$this->mypdf->SetX(8);
$this->mypdf->Cell(0,6,'info@supersonicmotors.in',0,0,'L');
$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,$payment['email'],0,1,'L');

$this->mypdf->SetFont('Times','B',12);
$this->mypdf->SetY(86);
$this->mypdf->SetX(6);
$this->mypdf->Cell(0,6,'#','T',0,'L');
$this->mypdf->SetX(26);
$this->mypdf->Cell(0,6,'Description',0,0,'L');
$this->mypdf->SetX(120);
$this->mypdf->Cell(0,6,'Price',0,1,'L');

$this->mypdf->SetFont('Times','',12);
$this->mypdf->SetX(6);
$this->mypdf->Cell(0,6,'1','T',0,'L');
$this->mypdf->SetX(26);
$this->mypdf->Cell(0,6,'Inovoice of Supersonic Motors CRM ('.($payment['payment_amount']/2000).' month)',0,0,'L');
$this->mypdf->SetX(120);
$this->mypdf->Cell(0,6,'Rs. '.$cp,0,1,'L');

$this->mypdf->SetX(66);
$this->mypdf->Cell(0,6,'GST(CGST+SGST = 18%)',0,0,'L');
$this->mypdf->SetX(120);
$this->mypdf->Cell(0,6,'Rs. '.$gst,0,1,'L');

$this->mypdf->SetX(86);
$this->mypdf->Cell(0,6,'Total','T',0,'L');
$this->mypdf->SetX(120);
$this->mypdf->Cell(0,6,'Rs. '.$total,0,1,'L');

$this->mypdf->SetFont('Arial','',8);
$this->mypdf->SetY(136);
$this->mypdf->Cell(0,6,'Note:-',0,1,'L');
$this->mypdf->Cell(0,6,'Thank you for makeing payment with us',0,1,'L');
$this->mypdf->Cell(0,6,'In case of any issue please contact our customer care number- +91-8801-005610.',0,1,'L');
$this->mypdf->Cell(0,6,'The product carries only mantainance warranty and no returns will be entertained.',0,1,'L');

$this->mypdf->Output();
?>