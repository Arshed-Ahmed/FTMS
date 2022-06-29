<?php include_once("../incl/header.php");?>
<!-- page content -->

<style>
	#msg > a{
		color: black;
	}
	#msg > a:hover{
		font-weight: bold;
		text-decoration: underline;
	}
</style>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="jumbotron">
          <h1>Hello, Tailor!</h1>
          <p>This is a simple Dashboard to see all the Notifications, and Price lists to make your day much easier.</p>
        </div>
      </div>
      <?php
          $sql0 = "SELECT * FROM `employee` WHERE Display=0";
          $res0 = mysqli_query($conn, $sql0);
          if (mysqli_num_rows($res0) > 0) {
                while ($employee= mysqli_fetch_assoc($res0)) {
                  $id = $employee['tid'];
                  $fname = $employee['tFname'];
                  $lname = $employee['tLname'];
                  $name = "<span style='color:black;'>".$fname." ".$lname."</span>";
      ?>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Work List for&nbsp;<?= $name ?><small>Assigned Work</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" >
            <?php
              include("db_conn.php");
              $sql = "SELECT * FROM `notification` WHERE Display = '0' AND notType = 'employee' AND notReciever = $id  ORDER BY `notId` DESC LIMIT 3";
              $res = mysqli_query($conn, $sql);

              if (mysqli_num_rows($res) > 0) {
                while ($notice= mysqli_fetch_assoc($res)) { 
                  $notid = $notice['notId'];
                  $title = $notice['notTitle'];
                  $recieverid = $notice['notReciever'];
                  $email = $notice['notEmail'];
                  $msg = $notice['notMessage'];
                  $ntype = $notice['notType'];
                  $notdate = $notice['notDate'];
                  $cat = $notice['notCategory'];
                  $status = $notice['notStatus'];

            ?>
            <ul class="list-unstyled timeline">
              <li>
                <div class="block">
                  <div class="tags" style="width: 90px;">
                    <a href="notificationlist.php" class="tag">
                      <span><?= $notdate ?></span>
                    </a>
                  </div>
                  <div class="block_content">
                    <h2 class="title">
                        <a><?= $title ?> </a>
                    </h2>
                    <div class="byline">
                      <span style="text-transform: capitalize;"><?= $cat ?></span>&nbsp;on&nbsp;<a><?= $notdate ?></a>
                    </div>
                    <p class="excerpt" id="msg">
                      <?= $msg ?> <br />
                      <strong>
                        <a href="notificationlist.php">See&nbsp;More</a>
                      </strong>
                    </p>
                  </div>
                </div>
              </li>
            </ul>
            <?php
                }
              }else{
            ?>
              No Work Assigned yet for <?= $name ?>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Price List</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Basic Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Trousers</td>
                  <td>Rs.1400</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Shirts</td>
                  <td>Rs.950</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>t-Shirts</td>
                  <td>Rs.1100</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Saree</td>
                  <td>Rs.4500</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Blouse</td>
                  <td>Rs.700</td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Frocks</td>
                  <td>Rs.6000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hire Items <small>...</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="pricetable" class="table table-striped" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Price</th>
                  <th>Hire Price</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12" >
        <div class="x_panel">
          <div class="x_title">
            <h2>Calender<small>Events</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" id='calendar'></div>
        </div>
      </div>
    </div>

    
    <!-- Change Notification modal -->
    <div class="modal fade bs-noti" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel2">Notification for <span id="nametag"></span></h4>
          </div>
          <div class="modal-body">
            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
            <span>
              <span id="time" class="time"></span>
            </span><br/>
            <span id="msg" class="message">
              
            </span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals -->

    <!-- Measurement large modal -->
    <div class="modal fade bs-measurement" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel1">Measurement View</h4>
          </div>
          <div class="modal-body">
            <div class="row" style="margin: 1.5rem; padding:1.5rem; border: 1px solid black;">
              <div class="col-lg-4" style="display: flex; justify-content: center;">Order Id: &nbsp;<span id="ordid" style="color: black;"></span></div>
              <div class="col-lg-4" style="display: flex; justify-content: center;">Customer Name: &nbsp;<span id="cusname" style="color: black;"></span></div>
              <div class="col-lg-4" style="display: flex; justify-content: center;">Deadline: &nbsp;<span id="deadline" style="color: black;"></span></div>
            </div>
            <div class="row" style="margin: 1.5rem;">
              <table id="measurementtable" class="table table-bordered" >
                <thead>
                  <tr>
                  <th>Headers</th>
                  <th>Details</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer" id="footBtn">

          </div>
        </div>
      </div>
    </div>
    <!-- /modals -->

    <!-- Change Progress Small modal -->
    <div class="modal fade bs-status" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <form id="progressform" name="progressform" class="form-horizontal form-label-left" novalidate>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel2">Change Progress</h4>
          </div>
          <div class="modal-body">
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="txtordid1">Order Id </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="txtordid1" class="form-control col-md-7 col-xs-12" name="txtordid1" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="txtcusname1">Customer Name </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="txtcusname1" class="form-control col-md-7 col-xs-12" name="txtcusname1" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="progress">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="progress" class="select2_single form-control" tabindex="-1" required="required">
                <option value="0">In progress</option>
                <option value="1">Finished</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="chaneprogress" name="chaneprogress" type="button" class="btn btn-success" onclick="updateProgress();">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form>

        </div>
      </div>
    </div>
    <!-- /modals -->
  </div>
</div>
<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function (){
      $('#title').text('Dashboard');
      $('#breadcrumb').text('Tailor\'s Work Area');
      loadPriceData();
  });

  
  //Load Price data function
  function loadPriceData(){
    $.ajax({  
      url: '../server.php?c=PriceController&m=getAllHitem',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        // var table = $('#pricetable').DataTable();
        $("#pricetable tbody").empty();
        // table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].itid;
          var item = data[i].itname;
          var pvalue = data[i].itvalue;
          var hvalue = data[i].hvalue;
          var desc = data[i].itdescription;

          var func_view = 'viewPrice(' + id + ')';
          var func_edit = 'getPrice(' + id + ')';
          var func_delete = 'deletePrice(' + id + ')';

          row = 
          ' <tr>\
              <th scope="row"> '+id+'  </th>\
              <th scope="row"> '+item+'</th>\
              <th scope="row"> Rs.'+pvalue+' </th>\
              <th scope="row"> Rs.'+hvalue+'  </th>\
              <th scope="row"> '+desc+'  </th>\
            </tr>';

          $("#pricetable tbody").append(row);
        }
        // $('#pricetable').DataTable();
      }
    });  
  }

  
  function getOrder(id) {
    $.ajax({
	  async:false,
      type: "POST",
      url: '../server.php?c=OrderController&m=getOrder',
      data: {
        'id': id
      },
      success: function(data) {

        // alert(data);
        var d = data[0];
        var id = d.ordid;
        var cusid = d.cusid;
        var cusname = d.cusName;
        var styleid = d.styleId;
        var fitondate = d.fitonDate;
        var deliverydate = d.deliveryDate;
        var price = d.ordPrice;
        var discount = d.ordDiscount;
        var description = d.ordDescription;
        var measid = d.measId;
        var progress = d.ordProgress;

		$("#footBtn").empty();
        $("#txtordid1").val(id);
        $("#txtcusname1").val(cusname);
        $("#progress").val(progress);
		$("#cusname").text(cusname);
        $("#ordid").text(id);
        $("#deadline").text(deliverydate);
		buttons = 
			'<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-status">Update Progress</button>\
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';

		$("#footBtn").append(buttons);
		viewMeasurement(measid, styleid)
      },
      dataType: 'json'
    });
  }

  function viewMeasurement(id, styleid) {
    var STYLE = [];
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=OrderController&m=getStyle',
      data: {
        'id': styleid
      },
      success: function(data) {
        var d = data[0];
        var stylid = d.stlid;
        var imgName = d.stlname;
        var uploaddate = d.uploaded;
        var description = d.stldesc;

        STYLE[stylid] = {
          'imgName': imgName,
          'description' : description
        }
        console.log(STYLE)
      },
      dataType: 'json',
    });
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=MeasurementController&m=getMeasurement',
      data: {
        'id': id
      },
      success: function(data) {
        // alert(data);
        var table = $('#measurementtable').DataTable();
        $("#measurementtable tbody").empty();
        var d = data[0];
        var id = d.measId;
        var cusid = d.cusid;
        var cusname = d.cusName;
        var item = d.item;
        var measurement = d.measurement;
        var details = d.moreDetails;

        var func_edit = 'getMeasurement(' + id + ')';
        var func_delete = 'deleteMeasurement(' + id + ')';

        row =
          '<tr>\
              <th>ID No</th>\
              <td>' + id + '</td>\
            </tr>\
            <tr>\
              <th>Customer Name</th>\
              <td>' + cusname + '</td>\
            </tr>\
            <tr>\
              <th>Item</th>\
              <td>' + item + '</td>\
            </tr>\
            <tr>\
              <th>Measurements</th>\
              <td>' + measurement + '</td>\
            </tr>\
            <tr>\
              <th>Details</th>\
              <td>' + details + '</td>\
            </tr>\
            <tr>\
              <th>Style</th>\
              <td>\
                <img src="style/'+ STYLE[styleid].imgName +'" alt="'+ STYLE[styleid].description +'" style="width: 250px;" />\
              </td>\
            </tr>\
            ';

        $("#measurementtable tbody").append(row);

      },
      dataType: 'json'
    });
  }

  //Add Order data Function   
  function updateProgress() {
    var check = $('#progressform')[0].checkValidity();
    if (check == true) {
      var ordid = $("#txtordid1").val();
      var progress = $("#progress").find('option:selected').val();

      var Data = {
        ordid: ordid,
        progress: progress
      };

      $.ajax({
        url: "../server.php?c=OrderController&m=editProgress",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(data+ " Susscessfully added to the system");
          //adding measurement id
          new PNotify({
            title: 'Progress',
            text: data + "Progress Susscessfully updated",
            type: 'success',
            styling: 'bootstrap3'
          });
          $('#progressform')[0].reset();
          setTimeout(function() {
            location.reload()
          }, 1500);

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add Order");
        }
      });
    } else {
      $("#progress").focus();
    }

  }


</script>