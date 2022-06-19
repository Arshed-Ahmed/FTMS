<?php
ini_set('memory_limit', '1024M');
require '../db_conn.php';
require_once('TCPDF-main/tcpdf.php');


$ordid = $_POST['ordid_inv'];

$sql = "SELECT * from `ordertbl` WHERE `ordid`=".$ordid." AND `Display` = '0'";
$res = mysqli_query($conn, $sql);


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
        $this->Cell(268, 5, 'Fashion Tailors', 0, 1, 'C');
        $this->SetFont('helvetica', 0, 13);
        $this->Cell(268, 3, 'Experts Dress Makers for Ladies & Gents', 0, 1, 'C');
        $this->Ln(3);
        $this->SetFont('helvetica', 0, 10);
        $this->Cell(268, 3, 'Malwatta Plaza,', 0, 1, 'C');
        $this->Cell(268, 3, 'Malwatta Road,', 0, 1, 'C');
        $this->Cell(268, 3, 'Colombo - 11.', 0, 1, 'C');
        $this->Cell(268, 3, 'Phone: 011 2333054 , Mobile: 072 4111893', 0, 1, 'C');
        $this->Cell(268, 3, 'Email: puvendren.kumar@gmail.com', 0, 1, 'C');
        
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
$pdf = new PDF('l', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Arshed Huzair');
$pdf->SetTitle('Order Card');
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


while( $row2 = mysqli_fetch_array($res) ){

    $id = $row2['ordid'];
    $cusid = $row2['cusid'];
    $cusName = $row2['cusName'];
    $amount = $row2['ordPrice'];
    $discount = $row2['ordDiscount'];
    $balance = (intval($amount))-(intval($discount));
    $ordDate = $row2['ordDate'];
    $deliveryDate = $row2['deliveryDate'];
    $desc = $row2['ordDescription'];
    $measid = $row2['measId'];

    $pdf->Ln(30);
    $pdf->SetFont('dejavusans', 'B', 12, '', true);
    $pdf -> Cell(268, 5 , 'Order Card', 0, 0, 'C');
    $pdf->SetFont('dejavusans', 'B', 11, '', true);
    $pdf->Ln(7);
    $pdf -> Cell(134, 5 , 'Order Date: #'.$ordDate, 0, 0, 'L');
    $pdf -> Cell(134, 5 , 'Order Id: #'.$id, 0, 0, 'R');
    $pdf->Ln(5);
    $pdf->SetFont('dejavusans', '', 10, '', true);
    $pdf->SetTextColor(255, 0, 0);
    $pdf -> Cell(268, 7 , 'Bring this bill to collect your orders', 0, 0, 'R', 0);
    $pdf->Ln(15);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('dejavusans', '', 11, '', true);
    $pdf -> SetFillColor(224,225,225);
    $pdf -> Cell(25, 7 , '#Id', 1, 0, 'C', 1);
    $pdf -> Cell(68, 7 , 'Item', 1, 0, 'C', 1);
    $pdf -> Cell(100, 7 , 'Description', 1, 0, 'C', 1);
    $pdf -> Cell(25, 7 , 'Rate', 1, 0, 'C', 1);
    $pdf -> Cell(25, 7 , 'Rs.', 1, 0, 'C', 1);
    $pdf -> Cell(25, 7 , 'Cts.', 1, 0, 'C', 1);

    $i = 1;
    $max = 20;

    $sql3 = "SELECT * from `measurement` WHERE `measId`=".$measid." AND `Display` = '0'";
    $res3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($res3);

    $orditem = $row3['item'];
    $moredetails = $row3['moreDetails'];

    $sql4 = "SELECT * from `customer` WHERE `cusid`=".$cusid." AND `Display` = '0'";
    $res4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_array($res4);

    $email = $row4['cusEmail'];
    $address = $row4['cusAddress'];
    $phone = $row4['cusPno'];

    $pdf->Ln(7);
    $pdf -> Cell(25, 7 , '', 1, 0, 'C', 0);
    $pdf -> Cell(68, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(100, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'R', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'L', 0);

    $pdf->Ln(7);
    $pdf -> Cell(25, 7 , '#'.$id, 1, 0, 'C', 0);
    $pdf -> Cell(68, 7 , $orditem, 1, 0, 'L', 0);
    $pdf -> Cell(100, 7 , $desc.', '.$moredetails, 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , "Rs.".$amount, 1, 0, 'R', 0);
    $pdf -> Cell(25, 7 , "Rs.".$amount, 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '00', 1, 0, 'L', 0);

    $pdf->Ln(7);
    $pdf -> Cell(25, 7 , '', 1, 0, 'C', 0);
    $pdf -> Cell(68, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(100, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'R', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'L', 0);

    $pdf->Ln(7);
    $pdf -> Cell(25, 7 , '', 1, 0, 'C', 0);
    $pdf -> Cell(68, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(100, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'R', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'L', 0);
    $pdf -> Cell(25, 7 , '', 1, 0, 'L', 0);

    $pdf->Ln(5);
    $pdf->Ln(5);
    $pdf -> Cell(50, 7 , 'Customer Name', 0, 0, 'L', 0);
    $pdf -> Cell(5, 7 , ':', 0, 0, 'L', 0);
    $pdf -> Cell(213, 7 , ucwords($cusName), 0, 0, 'L', 0);
    $pdf->Ln(7);
    $pdf -> Cell(50, 7 , 'Phone No', 0, 0, 'L', 0);
    $pdf -> Cell(5, 7 , ':', 0, 0, 'L', 0);
    $pdf -> Cell(213, 7 ,$phone, 0, 0, 'L', 0);
    $pdf->Ln(7);
    $pdf -> Cell(50, 7 , 'Email', 0, 0, 'L', 0);
    $pdf -> Cell(5, 7 , ':', 0, 0, 'L', 0);
    $pdf -> Cell(213, 7 ,$email, 0, 0, 'L', 0);
    $pdf->Ln(7);
    $pdf -> Cell(50, 7 , 'Address', 0, 0, 'L', 0);
    $pdf -> Cell(5, 7 , ':', 0, 0, 'L', 0);
    $pdf -> Cell(213, 7 ,$address, 0, 0, 'L', 0);

    $pdf->Ln(5);
    $pdf->Ln(5);
    $pdf -> Cell(193, 7 , 'Total', 1, 0, 'R', 0);
    $pdf -> Cell(75, 7 , 'Rs.'.$amount, 1, 0, 'C', 1);
    $pdf->Ln(7);
    $pdf -> Cell(193, 7 , 'Advance/ Discount', 1, 0, 'R', 0);
    $pdf -> Cell(75, 7 , 'Rs.'.$discount, 1, 0, 'C', 1);
    $pdf->Ln(7);
    $pdf -> Cell(193, 7 , 'Balance', 1, 0, 'R', 0);
    $pdf -> Cell(75, 7 , 'Rs.'.$balance, 1, 0, 'C', 1);

    $pdf->Ln(5);
    $pdf->Ln(5);
    $pdf -> Cell(40, 7 , 'Delivery Date', 0, 0, 'L', 0);
    $pdf -> Cell(4, 7 , ':', 0, 0, 'C', 0);
    $pdf -> Cell(90, 7 , $deliveryDate, 0, 0, 'L', 0);
    $pdf->SetFont('dejavusans', '', 10, '', true);
    $pdf->SetTextColor(255, 0, 0);
    $pdf -> Cell(134, 7 , 'This bill is only value within 60 days', 0, 0, 'R', 0);




}
// Clean any content of the output buffer
ob_end_clean();
// Close and output PDF document
$pdf->Output('Invoice_001', 'I');

return true;


