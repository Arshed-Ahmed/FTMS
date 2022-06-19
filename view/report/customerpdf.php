<?php
ini_set('memory_limit', '1024M');
require '../db_conn.php';
require_once('TCPDF-main/tcpdf.php');

// if(isset($_POST['create_report'])) {
  $type = $_POST['report_type'];

    $sql = "SELECT * from `customer` WHERE `Display` = '0'";
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
$pdf->SetTitle('Customer Report');
$pdf->SetSubject('FTMS');
$pdf->SetKeywords('TCPDF, PDF, FTMS, Customer, Report');

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

$pdf->Ln(35);
$pdf->SetFont('dejavusans', '', 12, '', true);
$pdf -> Cell(189, 5 , 'Customer Information', 0, 0, 'C');
$pdf->Ln(15);
$pdf->SetFont('dejavusans', '', 11, '', true);
$pdf -> SetFillColor(224,225,225);
$pdf -> Cell(10, 10 , 'Id', 1, 0, 'C', 1);
$pdf -> Cell(35, 10 , 'Full Name', 1, 0, 'C', 1);
$pdf -> Cell(30, 10 , 'NIC', 1, 0, 'C', 1);
$pdf -> Cell(23, 10 , 'Phone', 1, 0, 'C', 1);
$pdf -> Cell(58, 10 , 'Email', 1, 0, 'C', 1);
$pdf -> Cell(35, 10 , 'Address', 1, 0, 'C', 1);

$i = 1;
$max = 15; 

while( $row = mysqli_fetch_array($res) ){

    $id = $row['cusid'];
    $fname = $row['cusFname'];
    $lname = $row['cusLname'];
    $name = $fname." ".$lname;
    $nic = $row['cusNIC'];
    $Pno = $row['cusPno'];
    $email = $row['cusEmail'];
    $address = $row['cusAddress'];


    $pdf->Ln(10);
    $pdf -> Cell(10, 10 , $id, 1, 0, 'C', 0);
    $pdf -> Cell(35, 10 , $name, 1, 0, 'L', 0);
    $pdf -> Cell(30, 10 , $nic, 1, 0, 'L', 0);
    $pdf -> Cell(23, 10 , $Pno, 1, 0, 'L', 0);
    $pdf -> MultiCell(58, 10 , $email, 1, 'L',0, 0);
    $pdf -> Cell(35, 10 , $address, 1, 0, 'L', 0);

    // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
    // $pdf -> MultiCell(35, 10 , $address, 1, 'L',0, 0);
}

// Close and output PDF document
$pdf->Output('Customers_001', 'I');


