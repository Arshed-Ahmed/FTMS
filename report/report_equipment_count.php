<?php
session_start();
include "Connection.php";
// include "common.php";
// if(isset($_GET["type"])){
//     $type=$_GET["type"];
//     switch($type){
//         case "pdf":
//             gen_pdf();
//             break;
//     }
// }
  $utype=$_SESSION["user"]["utype"];
  gen_pdf();

// data fetching from the db
function fetch_data()
{
    $con = db_con();
    $result = '';
    $sql = "SELECT 
              eqn.`name`,
              COUNT(*) AS count
            FROM
              equipment eq
            INNER JOIN cmms.`equipment_names` eqn ON eqn.`id`=eq.`name` 
               GROUP BY (eq.`name`)";

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $result .= '<tr>  
                          <td style="font-family: Arial">'.$row["name"].'</td>  
                          <td style="font-family: Arial">'.$row["count"].'</td>
                     </tr>  
                          ';
    }
    return $result;
}

function gen_pdf(){
    $conn = db_con();
    $emp = get_details_from_user_id($conn,$_SESSION['user']);
    $name = $emp['first_name'] . " " . $emp['last_name']. " (" . $emp['user_barcode'] . ")";

    require_once('tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
//    $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");
    $obj_pdf->SetHeaderData('watt.png', '20', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
//    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '50', PDF_MARGIN_RIGHT);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '
<div>
    <img src="logo.png" height="100">
</div>
          <table>
            <tr style="width: 10px;">
               <td>Report Date : '.my_date().' '.my_time().'</td> 
               <td style="text-align: right">Requested By : '.$utype. '</td> 
            </tr>
          </table>
        <h2>EQUIPMENT COUNT REPORT</h2>
       
      <table border="1" cellspacing="0" cellpadding="3" style="margin-top: 20px;">
           <tr style="background-color: #616161; color: white;text-align: center; font-weight: bold">
                <th width="80%">Equipment Name</th>
                <th width="20%">Equipment Count</th>
           </tr>
      ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('file.pdf', 'I');
}

?>
