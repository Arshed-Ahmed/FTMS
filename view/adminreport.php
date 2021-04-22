<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Select report type</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<button type="button" class="btn btn-primary">Employee report</button>
            <a type="button" class="btn btn-primary" href="../report/employeereport.php">Report</a>


            <form method="POST">
            	<input type="submit" name="createpdf" class="btn btn-success" value="Create Report">
            </form>

          </div>
        </div>
      </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
	        <h2>Report Tables <small> press report button</small></h2>
	      	<div class="clearfix"></div>
      </div>
        <div class="x_content">
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Order Type</th>
                <th>Measurements</th>
                <th>Due Date</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>001</td>
                <td>Tiger Nixon</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>002</td>
                <td>Garrett Winter</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>003</td>
                <td>Ashton Cox</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>004</td>
                <td>Airi Satou</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>005</td>
                <td>Cedric Kelly</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>006</td>
                <td>Willioms</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>007</td>
                <td>Chandler Bing</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>008</td>
                <td>Monica Geller</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>009</td>
                <td>Joey Tribiyani</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
              <tr>
                <td>010</td>
                <td>Rachel Green</td>
                <td>Tailor made</td>
                <td>12,34,24,18,5,7,28</td>
                <td>01/15/2021</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>
<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function (){
        $('#title').text('Report');
        $('#breadcrumb').text('Reports');

    });

	//Load Employee data function  
  function loadEmployeeData() {  
    // alert("ok");
    $.ajax({  
      url: '../server.php?c=EmployeeController&m=getAllEmployee',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#dataTable-buttons').DataTable();
        $("#dataTable-buttons tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].tid;
          var fname = data[i].tFname;
          var lname = data[i].tLname;
          var nic = data[i].tNIC;
          var Pno = data[i].tPno;
          var email = data[i].tEmail;
          var address = data[i].tAddress;
          var startdate = data[i].tStartdate;
          var category = data[i].tcatId;

          var func_view = 'viewEmployee(' + id + ')';
          var func_edit = 'getEmployee(' + id + ')';
          var func_delete = 'deleteEmployee(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+fname+' '+lname+'</td>\
              <td> '+nic+'  </td>\
              <td> '+Pno+'  </td>\
              <td> '+email+'  </td>\
              <td> '+address+'  </td>';

          $("#dataTable-buttons tbody").append(row);
        }
        $('#dataTable-buttons').DataTable()
      }
    });  
  }
</script>