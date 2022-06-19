<?php
ini_set('memory_limit', '1024M');
require '../db_conn.php';
require_once('TCPDF-main/tcpdf.php');

// if(isset($_POST['create_report'])) {}

    $type = $_POST['report_type'];

    $sql = "SELECT * from `payment` WHERE `Display` = '0'";
    $res = mysqli_query($conn, $sql);

    $sql1 = "SELECT * from `makepayment` WHERE `Display` = '0'";
    $res1 = mysqli_query($conn, $sql1);

    class PDF extends TCPDF {
        // Load table data from file
        public function Header()
        {
            // Logo
            $image_file = K_PATH_IMAGES . 'FTlogo.png';
            $this->Image($image_file, 15, 10, 45, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Ln(5);
            // Set font
            $this->SetFont('helvetica', 'B', 18);
            // Title
            $this->Cell(189, 5, 'Fashion Tailors', 0, 1, 'C');
            $this->Ln(5);
            $this->SetFont('helvetica', 0, 10);
            $this->Cell(189, 3, 'Malwatta Plaza,', 0, 1, 'C');
            $this->Cell(189, 3, 'Malwatta Road,', 0, 1, 'C');
            $this->Cell(189, 3, 'Colombo - 11.', 0, 1, 'C');
            $this->Cell(189, 3, 'Phone: 011 2333054 , Mobile: 072 4111893', 0, 1, 'C');
            $this->Cell(189, 3, 'Email: puvendren.kumar@gmail.com', 0, 1, 'C');
            
        }

        // Load table data from file
        public function Footer()
        {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            //date
            $today = date('F j, Y/ g:i A', time());
            // Page number
            $this->Cell(25, 5, 'Generated Date/Time: '.$today ,0, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(164, 5, 'Page ' . $this->getAliasNumPage() . 'of' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        }

        
    }

// create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Arshed Huzair');
$pdf->SetTitle('Payments Report');
$pdf->SetSubject('FTMS');
$pdf->SetKeywords('TCPDF, PDF, FTMS, Payment, Report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
if($type == '1'){
    $pdf->Ln(35);
    $pdf->SetFont('dejavusans', '', 12, '', true);
    $pdf -> Cell(189, 5 , 'Payments Made for the Suppliers', 0, 0, 'C');
    $pdf->Ln(15);
    $pdf->SetFont('dejavusans', '', 11, '', true);
    $pdf -> SetFillColor(224,225,225);
    $pdf -> Cell(12, 7 , 'Id', 1, 0, 'C', 1);
    $pdf -> Cell(67, 7 , 'Purchase Order', 1, 0, 'C', 1);
    $pdf -> Cell(28, 7 , 'Paid Date', 1, 0, 'C', 1);
    $pdf -> Cell(22, 7 , 'Amount', 1, 0, 'C', 1);
    $pdf -> Cell(28, 7 , 'Pay Type', 1, 0, 'C', 1);
    $pdf -> Cell(22, 7 , 'Invoice #', 1, 0, 'C', 1);

    $i = 1;
    $max = 20;

    while( $row = mysqli_fetch_array($res1) ){

        $id = $row['payid'];
        $poid = $row['poid'];
        $paydate = $row['paydate'];
        $amount = $row['payamount'];
        $pamount = $row['paidamount'];
        $pbalance = $row['paybalance'];
        $ptype = $row['paytype'];
        $invid = $row['invid'];
        $remark = $row['remarks'];
        
        $sql2 = "SELECT * from `purchaseorder` WHERE `poid`=".$poid." AND `Display` = '0'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);

        $itemid = $row2['itid'];
        $supid = $row2['supid'];

        $sql3 = "SELECT * from `supplier` WHERE `supid`=".$supid." AND `Display` = '0'";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_array($res3);

        $supName = $row3['supName'];

        $sql4 = "SELECT * from `rawitems` WHERE `rid`=".$itemid;
        $res4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_array($res4);

        $itName = $row4['Name'];
        $itType = $row4['Type'];
        $itColor = $row4['Color'];

        $order = $supName." - ".$itName.",".$itType.",".$itColor;

        $pdf->Ln(7);
        $pdf -> Cell(12, 7 , $id, 1, 0, 'C', 0);
        $pdf -> Cell(67, 7 , $order , 1, 0, 'L', 0);
        $pdf -> Cell(28, 7 ,$paydate, 1, 0, 'C', 0);
        $pdf -> Cell(22, 7 ,  "Rs.".$amount, 1, 0, 'R', 0);
        $pdf -> Cell(28, 7 , $ptype, 1, 0, 'L', 0);
        $pdf -> Cell(22, 7 , $invid, 1, 0, 'L', 0);

    }
}else if($type == '2'){
    $pdf->Ln(35);
    $pdf->SetFont('dejavusans', '', 12, '', true);
    $pdf -> Cell(189, 5 , 'Payments Received from the Customers', 0, 0, 'C');
    $pdf->Ln(15);
    $pdf->SetFont('dejavusans', '', 11, '', true);
    $pdf -> SetFillColor(224,225,225);
    $pdf -> Cell(12, 7 , 'Id', 1, 0, 'C', 1);
    $pdf -> Cell(67, 7 , 'Order', 1, 0, 'C', 1);
    $pdf -> Cell(28, 7 , 'Paid Date', 1, 0, 'C', 1);
    $pdf -> Cell(22, 7 , 'Amount', 1, 0, 'C', 1);
    $pdf -> Cell(28, 7 , 'Pay Type', 1, 0, 'C', 1);
    $pdf -> Cell(22, 7 , 'Invoice #', 1, 0, 'C', 1);
    // payid, ordid, paydate, payamount, paidamount, paybalance, paytype, invid, remarks
    $i = 1;
    $max = 20;

    while( $row = mysqli_fetch_array($res) ){

        $id = $row['payid'];
        $ordid = $row['ordid'];
        $paydate = $row['paydate'];
        $amount = $row['payamount'];
        $pamount = $row['paidamount'];
        $pbalance = $row['paybalance'];
        $ptype = $row['paytype'];
        $invid = $row['invid'];
        $remark = $row['remarks'];

        if($invid == 0 ){
            $invid = "No Invoice";
        }

        $sql2 = "SELECT * from `ordertbl` WHERE `ordid`=".$ordid." AND `Display` = '0'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);

        $cusName = $row2['cusName'];

        $order = "Order ID ".$ordid." - ".$cusName;

        $pdf->Ln(7);
        $pdf -> Cell(12, 7 , $id, 1, 0, 'C', 0);
        $pdf -> Cell(67, 7 , $order, 1, 0, 'L', 0);
        $pdf -> Cell(28, 7 , $paydate, 1, 0, 'L', 0);
        $pdf -> Cell(22, 7 , "Rs.".$amount, 1, 0, 'R', 0);
        $pdf -> Cell(28, 7 , $ptype, 1, 0, 'L', 0);
        $pdf -> Cell(22, 7 , $invid, 1, 0, 'L', 0);
    }
}
// Clean any content of the output buffer
ob_end_clean();
// Close and output PDF document
$pdf->Output('Payments_001', 'I');


