<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Report Tables <small> press report button</small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<button type="button" class="btn btn-primary" onclick="loadEmployeeData();">Employee report</button>



          	<table id="dataTable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Employee Name</th>
                  <th>NIC</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Address</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>

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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
              </tr>
            </thead>


            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>Tailor</td>
                <td>Kandy</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$32000</td>
              </tr>
              <tr>
                <td>Garrett Winters</td>
                <td>Tailor</td>
                <td>Katugastota</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$17000</td>
              </tr>
              <tr>
                <td>Ashton Cox</td>
                <td>Cutter
                <td>pilimathalawa</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$50,000</td>
              </tr>
              <tr>
                <td>Cedric Kelly</td>
                <td>Designer</td>
                <td>Kandy</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$43,000</td>
              </tr>
              <tr>
                <td>Airi Satou</td>
                <td>Tailor</td>
                <td>Kandy</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$16000</td>
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