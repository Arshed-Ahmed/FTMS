<?php require_once('../models/Connection.php'); ?>
<?php 
require_once('../tcpdf/tcpdf.php');
     
// get data from users table 

mysqli_select_db($database_process, $process);
  private $db_handle;
  private $table = 'employee';

  function __construct() {
    $this->db_handle = new Connection();
  }
$result = mysqli_query("SELECT * FROM employee WHERE applicantid = '4'"); 

while($row = mysqli_fetch_array($result)) 
  { 
    $tid = $row['tid']; 
    $name = $row['tFname']; 
    $address = $row['tAddress']; 
    $email = $row['tEmail']; 
    $tel = $row['tPno']; 
  } 
   
// create new PDF document 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  

$pdf->SetPrintHeader(false); $pdf->SetPrintFooter(false); 

// set default monospaced font 
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

//set margins 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); 

//set auto page breaks 
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

//set image scale factor 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

//set some language-dependent strings 
$pdf->setLanguageArray($l);  

// --------------------------------------------------------- 

// set font 
$pdf->SetFont('dejavusans', '', 10); 

// add a page 
$pdf->AddPage(); 
// create some HTML content 
$txt = <<<EOD
Below are the details I require

Company type: $type
Company Name: $company
Company email: $email

EOD;


// output the HTML content 
// $pdf->writeHTML($htmlcontent, true, 0, true, 0); 
$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

// $pdf->writeHTML($inlinecss, true, 0, true, 0); 

// reset pointer to the last page 
// $pdf->lastPage(); 

//Close and output PDF document 
$pdf->Output('example_006.pdf', 'I'); 

//============================================================+ 
// END OF FILE                                                  
//============================================================+ 
?>



<?php 
// require_once('../tcpdf/config/lang/eng.php');
// require_once('../tcpdf/tcpdf.php');
 
// if(isset($_GET['applicantid'])){
//   $appidpassed = $_GET['applicantid'];
// }else{
//   $appidpassed = 4; // set this to your default value if no URL value is present
// }
 
 
// // get data from users table 
 
// mysql_select_db($database_process, $process);
// $result = mysql_query("SELECT * 
//                     FROM applicant 
//                     WHERE applicantid = '$appidpassed'
//                     LIMIT 1
//                     "); 
 
// rest of your code 