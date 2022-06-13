<?php include_once("../incl/header.php"); ?>

<!-- page content -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Return Order Info</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <form id="roform" class="form-horizontal form-label-left" novalidate="">
          <p>Enter returned order details</p>
          <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cusid">Customer <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="cusid" name="cusid" class="select2_single form-control" tabindex="-1" required="required">
                <option value="">Select an option</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ordid">Order Id <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ordid" class="form-control col-md-7 col-xs-12" name="ordid" placeholder="*001*" required="required" type="text">
            </div>
          </div>
		  <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rodate">Order Returned Date <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="rodate" class="form-control col-md-7 col-xs-12" name="rodate" required="required" type="date">
            </div>
          </div>
		  <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reason">Reason <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="reason" class="form-control col-md-7 col-xs-12" name="reason" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="remarks" required="required" name="remarks" class="form-control col-md-7 col-xs-12"></textarea>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
              <button id="submit" class="btn btn-success" onclick="addRO();">Save</button>
              <button id="update" style="display: none;" class="btn btn-success" onclick="updateRO();">Update</button>
            </div>
          </div>
          <div class="ln_solid"></div>
        </form>

        <table id="rotable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 30px">ID No</th>
              <th style="width: 200px">Customer Name</th>
              <th style="width: 150px">Order ID No</th>
              <th style="width: 150px">Returned Date</th>
              <th style="width: 200px">Reason</th>
              <th style="width: 200px">Remarks</th>
              <th style="width: 150px">Options</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
</div>
</div>

<!-- Start view modal -->
<div id="viewmodal" class="modal fade bs-example-modal-sm" tabindex="-1" role="viewmodal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">User Info</h4>
      </div>
      <div class="modal-body">
        <table id="ordInfo" class="table">
          <tbody>
            
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End View Modal -->

<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#title').text('Order Management');
    $('#breadcrumb').text('Return Order');
	  loadCustomerData();
    loadROData();
  });
	var CusName= [];

  //Load Customer data function  
  function loadCustomerData() {
    try {
      $.ajax({
        url: '../server.php?c=CustomerController&m=getAllCustomer',
        type: "POST",
        dataType: "json",
        success: function(data) {
          for (i = 0; i < data.length; i++) {

            var id = data[i].cusid;
            var fname = data[i].cusFname;
            var lname = data[i].cusLname;
            var nic = data[i].cusNIC;
            var tel = data[i].cusPno;
            var email = data[i].cusEmail;
            var add = data[i].cusAddress;

            var fullname = fname+' '+lname;
            CusName[id] = fullname;

            var cusnames = '<option value="' + id + '">' + fullname + '</option>';

		      	$("#cusid").append(cusnames);
          }
        }
      });
    } catch (err) {
      console.log(err);
    }
  }

  function viewMeasurementDetails(id) {
    // alert(id);
    $.ajax({
      type: "POST",
      url: '../server.php?c=MeasurementController&m=getMeasurement',
      data: {
        'id': id
      },
      success: function(data) {
        // alert(data);
        $("#ordInfo tbody").empty();
        var d = data[0];
        var id = d.measId;
        var cusid = d.cusid;
        var cusname = d.cusName;
        var item = d.item;
        var measurement = d.measurement;
        var details = d.moreDetails;

       
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
            </tr>';

        $("#ordInfo tbody").append(row);

      },
      dataType: 'json'
    });
  }
  
  //Load RO data function  
  function loadROData() {
    $.ajax({
      url: '../server.php?c=ROController&m=getAllRO',
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#rotable').DataTable();
        $("#rotable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].id;
          var cusid = data[i].cusid;
          var ordid = data[i].ordid;
          var rodate = data[i].rodate;
          var reason = data[i].reason;
          var remarks = data[i].remarks;

          var func_view = 'viewMeasurementDetails(' + ordid + ')';
          var func_edit = 'getRO(' + id + ')';
          var func_delete = 'deleteRO(' + id + ')';

		  var cusname = CusName[cusid];
          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ' + cusname + '</td>\
              <td> Order No: ' + ordid + '  </td>\
              <td> ' + rodate + '  </td>\
              <td> ' + reason + '  </td>\
              <td> ' + remarks + '  </td>\
              <td>\
                <a href="#" class="btn btn-primary btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewmodal" onclick="' + func_view + '"><i class="fa fa-pencil"></i> View Order </a>\
              </td>';

          $("#rotable tbody").append(row);
        }
        $('#rotable').DataTable()
      }
    });
  }

  function addRO() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var cusid = $("#cusid").find('option:selected').val();
      var ordid = $("#ordid").val();
      var rodate = $("#rodate").val();
      var reason = $("#reason").val();
      var remarks = $("#remarks").val();

      var roData = {
        cusid: cusid,
        ordid: ordid,
        rodate: rodate,
        reason: reason,
        remarks: remarks
      };

      $.ajax({
        url: "../server.php?c=ROController&m=addRO",
        data: roData,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(data+ " Susscessfully added to the system");

          new PNotify({
            title: 'New Return Order',
            text: data + " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });

          loadROData();
          clearData();
          setTimeout(function() {
            location.reload()
          }, 1500);

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add Return Order");
        }
      });
    } else {
      $("#cusid").focus();
    }

  }

  function getRO(id) {
    $.ajax({
      type: "POST",
      url: '../server.php?c=ROController&m=getRO',
      data: {
        'id': id
      },
      success: function(data) {
        $('#roform')[0].reset();
        $("#submit").css("display", "none");
        $("#update").css("display", "");

        // alert(data);
        var d = data[0];
        var id = d.id;
        var cusid = d.cusid;
        var ordid = d.ordid;
        var rodate = d.rodate;
        var reason = d.reason;
        var remarks = d.remarks;


        $("#id").val(id);
        $("#cusid").val(cusid);
        $("#ordid").val(ordid);
        $("#rodate").val(rodate);
        $("#reason").val(reason);
        $("#remarks").val(remarks);
      },
      dataType: 'json'
    });
  }

  //Add RO data Function   
  function updateRO() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var id = $("#id").val();
      var cusid = $("#cusid").find('option:selected').val();
      var ordid = $("#ordid").val();
      var rodate = $("#rodate").val();
      var reason = $("#reason").val();
      var remarks = $("#remarks").val();

      var roData = {
		id:id,
        cusid: cusid,
        ordid: ordid,
        rodate: rodate,
        reason: reason,
        remarks: remarks
      };

      $.ajax({
        url: "../server.php?c=ROController&m=editRO",
        data: roData,
        type: "POST",
        dataType: "json",
        success: function(data) {
          new PNotify({
            title: 'Edit Return Order',
            text: data + " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadROData();
          clearData();
          $("#submit").css("display", "");
          $("#update").css("display", "none");
          setTimeout(function() {
            location.reload()
          }, 1500);
        }
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update Return Order");
        // }
      });
    } else {
      $("#cusid").focus();
    }

  }

  function deleteRO(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=ROController&m=deleteRO",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
		  loadCustomerData();
          loadROData();
          new PNotify({
            title: 'Deleted!',
            text: 'Return Order removed.',
            type: 'error',
            styling: 'bootstrap3'
          });
          setTimeout(function() {
            location.reload()
          }, 1500);

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
        }
      });
    }
  }


  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="email"]').val('');
    $('input[type="tel"]').val('');
    $('Select').val('');
    $("#submit").css("display", "");
    $("#update").css("display", "none");
    $('#employeeform')[0].reset();
    setTimeout(function() {
      location.reload()
    }, 2400);
  }

  function Reload() {
    location.reload();
  }
</script>