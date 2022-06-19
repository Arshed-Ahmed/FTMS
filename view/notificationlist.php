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
        <div class="x_panel">
          <div class="x_title">
            <h2>Notifications</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <table id="notitable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                  <th>ID No</th>
                  <th>Receiver Name</th>
                  <th>Type</th>
                  <th>Email</th>
                  <th>Title</th>
                  <th>Message</th>
                  <th>Category</th>
                  <th>Option</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
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
							<h4 id="h4title" class="message" style=" text-align: center;"></h4>
							<span class="image" style="display: flex;margin: auto;justify-content: center;">
                <img src="../production/images/your-picture.png" alt="Profile Image" />
              </span>
							<br/>
              <span>
								Notification date: <span id="time" class="time"></span>
							</span>
              <br/>
							Message: <span id="msg" class="message"> </span>
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
    </div>
  </div>
</div>
<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>


<script type="text/javascript">
  $(document).ready(function() {
    $('#txttitle').text('Notification');
    $('#breadcrumb').text('New Notification');
    loadNotiData();
  });


  //Load Notification data function  
  function loadNotiData() {
    // alert("ok");
    $.ajax({
      async: false,
      url: '../server.php?c=NotiController&m=getAllNoti',
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#notitable').DataTable();
        $("#notitable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {
          var id = data[i].notId;
          var title = data[i].notTitle;
          var recieverid = data[i].notReciever;
          var email = data[i].notEmail;
          var type = data[i].notType;
          var msg = data[i].notMessage;
          var date = data[i].notDate;
          var category = data[i].notCategory;
          var stat = data[i].notStatus;
          let status;
          let rname;
          if(stat == 0){
            status = 'Not read'
          }
          if(stat == 1){
            status = 'Read'
          }
          if(type == 'customer'){
            continue;
          }
          if(type == 'employee'){
            let empout = getEmployee(recieverid);
            rname = empout.fullname;
          }

          var func_view = 'viewNoti(' + id + ')';

          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ID '+ recieverid +' - ' + rname + '</td>\
              <td> ' + type + '  </td>\
              <td> ' + email + '  </td>\
              <td> ' + title + '  </td>\
              <td> ' + msg + '  </td>\
              <td> ' + category + '  </td>\
              <td>\
                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-noti" onclick="' + func_view + '"><i class="fa fa-file-o"></i> View </a>\
              </td>';

          $("#notitable tbody").append(row);
        }
        $('#notitable').DataTable()
      }
    });
  }

  function viewNoti(id) {
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=NotiController&m=getNoti',
      data: {
        'id': id
      },
      success: function(data) {
          
          // alert(data);
          var d = data[0];
          var id = d.notId;
          var title = d.notTitle;
          var recieverid = d.notReciever;
          var email = d.notEmail;
          var type = d.notType;
          var msg = d.notMessage;
          var date = d.notDate;
          var category = d.notCategory;
          var stat = d.notStatus;
          let status;
          if(stat == 0){
            status = 'Not read'
          }
          if(stat == 1){
            status = 'Read'
          }
          if(type == 'employee'){
            let empout = getEmployee(recieverid);
            rname = empout.fullname;
          }

		  $('#h4title').empty();
		  $('#msg').empty();
		  $('#nametag').text(rname);
		  $('#time').text(date);
		  $('#h4title').append(title);
		  $('#msg').append(msg);


        },
      dataType: 'json'
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

  function getEmployee(id) {
    let empout = null;
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=EmployeeController&m=getEmployee',
      data: {
        'id': id
      },
      success: function(data) {

        // alert(data);
        var d = data[0];
        var id = d.tid;
        var fname = d.tFname;
        var lname = d.tLname;
        var nic = d.tNIC;
        var Pno = d.tPno;
        var email = d.tEmail;
        var address = d.tAddress;
        var startdate = d.tStartdate;
        var salary = d.tSalary;
        var category = d.tcatId;
        var status = d.tstatus;

        var fullname = fname+" "+lname;
        empout = {'fullname':fullname, 'email':email}
      },
      dataType: 'json'
    });
    return empout;
  }

  function getCustomer(id) {
		var cusout = null
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=CustomerController&m=getCustomer',
      data: {
        'id': id
      },
      success: function(data) {
        var d = data[0];
        var id = d.cusid;
        var fname = d.cusFname;
        var lname = d.cusLname;
        var nic = d.cusNIC;
        var tel = d.cusPno;
        var email = d.cusEmail;
        var add = d.cusAddress;

        var fullname = fname+" "+lname;
        cusout = {'fullname':fullname, 'email':email}

        },
      dataType: 'json'
    });
    return cusout;
  }


  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="email"]').val('');
    $('Select').val('');
    setTimeout(function() {
      location.reload()
    }, 2400);
  }

  function Reload() {
    location.reload();
  }
</script>