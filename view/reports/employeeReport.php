<?php  

 function fetch_data()  
 {  
      require_once("../db_conn.php");
      $output = '';  
      $sql = "SELECT * FROM employee ORDER BY tid ASC";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                              <td style="font-family: Arial">'.$row["tid"].'</td>
                              <td style="font-family: Arial">'.$row["tFname"].' '.$row["tLname"].'</td>
                              <td style="font-family: Arial">'.$row["tNIC"].'</td>
                              <td style="font-family: Arial">'.$row["tAddress"].'</td>
                              <td style="font-family: Arial">'.$row["tPno"].'</td>
                              <td style="font-family: Arial">'.$row["tEmail"].'</td>
                              <td style="font-family: Arial">'.$row["tstatus"].' Employee</td>
                         </tr>  
                          ';  
      }  
      return $output;  
 }  

    // Include the main TCPDF library (search for installation path).
    require_once('tcpdf/tcpdf.php');

    // extend TCPF with custom functions
    class MYPDF extends TCPDF {

        //Page header
        public function Header() {
            // Logo
            $image_file = 'logo/logo.png';
            $this->Image($image_file, 10, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'BI', 20);
            // Title
            $this->Cell(0, 12, 'Employee Report', 0, false, 'R', 0, '', 0, false, 'M', 'M');
        }
    }

      $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Fasion Taiolors');
      $pdf->SetTitle('Employees');
      $pdf->SetSubject('TCPDF report');
      $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

      // set default header data
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
          require_once(dirname(__FILE__).'/lang/eng.php');
          $pdf->setLanguageArray($l);
      }

      // ---------------------------------------------------------

      // set font
      $pdf->SetFont('times', 'B', 12);

      // add a page
      $pdf->AddPage(); 
      $pdf->Cell(0, 6, date('d/m/Y H:i:s'), 0, false, 'R', 0, '', 0, false, 'M', 'M'); 
      $content = '';  
      $content .= '  

      <br/>
      <hr>
      <h3 align="left">Employees</h3>
      <table border="1" cellspacing="0" cellpadding="3" style="margin-top: 20px;">
           <tr style="background-color: #dcdcdc; color:black; text-align: center; font-weight: bold">
                <th width="7%">Id No</th>
                <th width="17%">Employee Name</th>
                <th width="15%">NIC</th>
                <th width="20%">Address</th>
                <th width="12%">Phone No</th>
                <th width="21%">Email</th>
                <th width="13%">Status</th>
           </tr>
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $pdf->writeHTML($content);  
      $pdf->Output('employee.pdf', 'I');  
 
 ?> 