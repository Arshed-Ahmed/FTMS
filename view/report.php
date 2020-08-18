<?php
ob_start();
//include('includes/config.php');
require('../tcpdf/tcpdf.php');


    $pdf= new TCPDF('P' , 'mm' , 'A4');

    $pdf->AddPage();
  // Logo
    $pdf->Image('drivenow_logo.png',10,10,35);
  
  //make a dummy empty cell as a vertical spacer
    //$pdf->Cell(189,10,'',0,1);
  //$pdf->Cell(189,5,'',0,1);
  
   //set font to Helvetica, bold, 14pt
    $pdf->SetFont('Helvetica','B',14);
  //Cell (width, height, text, border,end line,[align])
  $pdf->Cell(42,5,'',0,0);
  $pdf->Cell(89,5,'ESP Tex & Tailors(Pvt)Ltd',0,0);
  $pdf->Cell(59,5,'Employee details',0,1);// end of line
  
  
  //set font to Helvetica, regular
  $pdf->SetFont('Helvetica','',12);
  $pdf->Cell(42,5,'',0,0);
  $pdf->Cell(89,5,'288,Peradeniya road ,Kandy.',0,0);
  $pdf->Cell(59,5,'',0,1);// end of line
  
  $pdf->Cell(42,5,'',0,0);
  $pdf->Cell(89,5,'Phone : +94776109911',0,0);
  $pdf->Cell(25,5,'Date :',0,0);
  // $pdf->Cell(34,5,$invoice['PostingDate'],0,1);// end of line
  
  // $pdf->Cell(42,5,'',0,0);
  // $pdf->Cell(89,5,'Fax : +94-81-2605371',0,0);
  // $pdf->Cell(25,5,'Invoice #',0,0);
  // $pdf->Cell(34,5,$invoice['in_id'],0,1);// end of line
  
  // $pdf->Cell(42,5,'',0,0);
  // $pdf->Cell(89,5,'',0,0);
  // //$pdf->Cell(25,5,'Customer ID',0,0);
  // //$pdf->Cell(34,5,$invoice['cus_id'],0,1);// end of line
  
  // //make a dummy empty cell as a vertical spacer
  //   $pdf->Cell(189,10,'',0,1);
  
  // //billing address
  // $pdf->SetFont('Helvetica','B',12);
  // $pdf->Cell(100,5,'Bill to :',0,1);// end of line
  
  // //add dummy cell at beginning of each line for indentation
  // $pdf->SetFont('Helvetica','',12);
  // $pdf->Cell(10,5,'',0,0);
  // $pdf->Cell(90,5,$invoice['cus_name'],0,1);// end of line

  // $pdf->Cell(10,5,'',0,0);
  // $pdf->Cell(90,5,$invoice['address'],0,1);// end of line
  
  // $pdf->Cell(10,5,'',0,0);
  // $pdf->Cell(90,5,$invoice['phone'],0,1);// end of line
  
  // //$pdf->Cell(10,5,'',0,0);
  // //$pdf->Cell(90,5,$invoice['ContactNo'],0,1);// end of line
  
  // //make a dummy empty cell as a vertical spacer
  //   $pdf->Cell(189,10,'',0,1);
  
  
  // //Invoice contents
  // $pdf->SetFont('Helvetica','B',12);
  
  // $pdf->Cell(130,5,'Description',1,0);
  // $pdf->Cell(20,5,'Overdue',1,0);
  // $pdf->Cell(38,5,'Rental Fee',1,1,'C');// end of line
  
  // $pdf->SetFont('Helvetica','',12);
  // $pdf->Cell(65,5,'From Date',1,0);
  // $pdf->Cell(65,5,$invoice['from_date'],1,0);
  // $pdf->Cell(20,5,number_format($invoice['overdue']),1,0,'R');
  // $pdf->Cell(38,5,number_format($invoice['rental_f']),1,1,'R');// end of line
  // $pdf->Cell(65,5,'To Date',1,0);
  // $pdf->Cell(65,5,$invoice['to_date'],1,1);// end of line
  // $pdf->Cell(65,5,'Driver Detail',1,0);
  // $pdf->Cell(65,5,$invoice['driver'],1,1);// end of line
  // $pdf->Cell(65,5,'Vehicle ID',1,0);
  // $pdf->Cell(65,5,$invoice['veh_id'],1,1);// end of line
  // $pdf->Cell(65,5,'Vehicle Colour',1,0);
  // $pdf->Cell(65,5,$invoice['veh_col'],1,1);// end of line
  //   $pdf->Cell(65,5,'Payment Method',1,0);
  // $pdf->Cell(65,5,$invoice['pay_meth'],1,1);// end of line
  
  // //make variable
  // $overdue = 0; //total tax
  // $rental_f = 0; //total amount
  
  
  //add thousand seperator using number_format function
  //$pdf->Cell(20,5,number_format($invoice['overdue']),1,0);
  //$pdf->Cell(38,5,number_format($invoice['rental_f']),1,1,'R');// end of line
  //accumulate tax and amount
  // $overdue += $invoice['overdue'];
  // $rental_f += $invoice['rental_f'];

  
  // summary
  // $pdf->Cell(130,5,'',0,0);
  // $pdf->Cell(20,5,'Subtotal',0,0);
  // $pdf->Cell(8,5,'RS',1,0);
  // $pdf->Cell(30,5,number_format($rental_f),1,1,'R');// end of line
  
  // $pdf->Cell(130,5,'',0,0);
  // $pdf->Cell(20,5,'Overdue',0,0);
  // $pdf->Cell(8,5,'RS',1,0);
  // $pdf->Cell(30,5,number_format($overdue),1,1,'R');// end of line
  
  // //$pdf->Cell(130,5,'',0,0);
  // //$pdf->Cell(20,5,'Tax Rate',0,0);
  // //$pdf->Cell(8,5,'RS',1,0);
  // //$pdf->Cell(30,5,'10%',1,1,'R');// end of line
  
  
  // $pdf->Cell(130,5,'',0,0);
  // $pdf->Cell(20,5,'Total Due',0,0);
  // $pdf->Cell(8,5,'RS',1,0);
  // $pdf->Cell(30,5,number_format($rental_f + $overdue),1,1,'R');// end of line
  
    $pdf->Output();
  ob_end_flush(); 
?>

