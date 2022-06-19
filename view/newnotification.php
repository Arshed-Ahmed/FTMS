<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>New notification</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="notiform" class="form-horizontal form-label-left" novalidate="">
                <p>Send notification</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nrtype">Notification Receiver Type <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-9" for="nrtypeEmp">Employee  </label>
                    <input type="radio" id="nrtypeEmp" name="nrtype" value="Emp" onchange="NotiCategory();" class="col-md-1 col-xs-1" style="margin-top: 10px;">
                    <label class="control-label col-md-3 col-sm-3 col-xs-9" for="nrtypeCus">Customer  </label>
                    <input type="radio" id="nrtypeCus" name="nrtype" value="Cus" onchange="NotiCategory();" class="col-md-1 col-xs-1" style="margin-top: 10px;">
                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-9" for="paytype">Check  </label>
                    <input type="radio" id="checkcheck" name="paytype" value="check" onchange="payType();" class="col-md-1 col-xs-1" style="margin-top: 10px;"> -->
                  </div>
                </div>
                <div class="item form-group" id="cusDiv" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer Receiver<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="customer" class="select2_single form-control" tabindex="-1" onchange="getEmail();" >
                      <option value="">Select an option</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group" id="empDiv" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee">Employee Receiver<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="employee" class="select2_single form-control" tabindex="-1" onchange="getEmail();" >
                      <option value="">Select an option</option>
                    </select>
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="txttitle" class="control-label col-md-3 col-sm-3 col-xs-12">Notification Title <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="txttitle" name="txttitle" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtmsg">Message <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="txtmsg" required="required" name="txtmsg" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="reset" class="btn btn-primary" onclick="clearData();">Cancel</button>
                    <button id="submit" type="" class="btn btn-success" onclick="addNoti();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateNoti();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>
            <br />
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
    loadEmployeeData();
    loadCustomerData();
  });

  function NotiCategory(){
    // var type = $('#paytype').find('option:selected').val();
    var type = document.querySelector('input[name="nrtype"]:checked').value;
    if (type == "Emp"){
       document.getElementById("cusDiv").style.display = "none";
       document.getElementById("empDiv").style.display = "block";
       $('input.form-control#customer').val('');
       var ele = document.getElementById("employee");
       ele.setAttribute("required", "required");
       $("#customer").removeAttr("required");
       
    } else if (type == "Cus"){
       document.getElementById("cusDiv").style.display = "block";
       document.getElementById("empDiv").style.display = "none";
       $('input.form-control.employee').val('');
       var ele = document.getElementById("customer");
       ele.setAttribute("required", "required");
       $("#employee").removeAttr("required");
    }
    $('#email').val('');
  }

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
            let cusout = getCustomer(recieverid);
            rname = cusout.fullname;
          }
          if(type == 'employee'){
            let empout = getEmployee(recieverid);
            rname = empout.fullname;
          }

          var func_edit = 'getNoti(' + id + ')';
          var func_delete = 'deleteNoti(' + id + ')';

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
                <a href="#" class="btn btn-info btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#notitable tbody").append(row);
        }
        $('#notitable').DataTable()
      }
    });
  }

  //Load Employee data function  
  function loadEmployeeData() {
    $.ajax({
      async: false,
      url: '../server.php?c=EmployeeController&m=getAllEmployee',
      type: "POST",
      dataType: "json",
      success: function(data) {
        for (i = 0; i < data.length; i++) {
          var id = data[i].tid;
          var fname = data[i].tFname;
          var lname = data[i].tLname;
          var nic = data[i].tNIC;
          var Pno = data[i].tPno;
          var email = data[i].tEmail;
          var address = data[i].tAddress;
          var startdate = data[i].tStartdate;
          var salary = data[i].tSalary;
          var category = data[i].tcatId;
          var status = data[i].tstatus;

          var empname = fname + " " + lname;
					var empnames = '<option value="' + id + '">' + empname + '</option>';

					$("#employee").append(empnames);

        }
      }
    });
  }

  //Load Customer data function  
  function loadCustomerData() {
    try {
      $.ajax({
        async: false,
        url: '../server.php?c=CustomerController&m=getAllCustomer',
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(JSON.stringify(data));
          var table = $('#customertable').DataTable();
          $("#customertable tbody").empty();
          table.destroy();
          for (i = 0; i < data.length; i++) {

            var id = data[i].cusid;
            var fname = data[i].cusFname;
            var lname = data[i].cusLname;
            var nic = data[i].cusNIC;
            var tel = data[i].cusPno;
            var email = data[i].cusEmail;
            var add = data[i].cusAddress;

            var cusname = fname + " " + lname;
            var cusnames = '<option value="' + id + '">' + cusname + '</option>';

            $("#customer").append(cusnames);

          }
        }
      });
    } catch (err) {
      console.log(err);
    }
  }

  function getEmail(event){
    var typ = document.querySelector('input[name="nrtype"]:checked').value;
    let email;
    let recieverid;
    if (typ == "Cus"){
      recieverid = $("#customer").find('option:selected').val();
      let cusout = getCustomer(recieverid);
      email = cusout.email;
    }
    if (typ == "Emp"){
      recieverid = $("#employee").find('option:selected').val();
      let empout = getEmployee(recieverid);
      email = empout.email;
    }
    $('#email').val(email);
  }

  function addNoti() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var typ = document.querySelector('input[name="nrtype"]:checked').value;
      let type;
      let recieverid
      if (typ == "Emp"){
        type = "employee";
        recieverid = $("#employee").find('option:selected').val();
      }
      if (typ == "Cus"){
        type = "customer";
        recieverid = $("#customer").find('option:selected').val();
      }
      
      var title = $("#txttitle").val();
      var message = $("#txtmsg").val();
      var category = "notification created by admin";
      var email = $("#email").val();

      var empData = {
        title: title,
        message: message,
        category: category,
        type: type,
        reciever: recieverid,
        email: email,
      };

      $.ajax({
        async: false,
        type: "POST",
        url: '../server.php?c=NotiController&m=addNoti',
        data: empData,
        dataType: 'json',
        success: function(data) {
          new PNotify({
            title: 'Notification',
            text: "Notification is susscessfully created",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadNotiData();
          clearData();
        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to create Notification");
        }
		  });
    }
	}

  function getNoti(id) {
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=NotiController&m=getNoti',
      data: {
        'id': id
      },
      success: function(data) {
          $('#notiform')[0].reset();
          $("#submit").css("display", "none");
          $("#update").css("display", "");
          
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

          if(type == "customer"){
            document.getElementById("nrtypeCus").setAttribute("checked", "checked");
            $("#customer").val(recieverid);
          }
          if(type == "employee"){
            document.getElementById("nrtypeEmp").setAttribute("checked", "checked");
            $("#employee").val(recieverid);
          }

          $("#id").val(id);
          $("#txttitle").val(title);
          $("#email").val(email);
          $("#txtmsg").val(msg);
        },
      dataType: 'json'
    });
    NotiCategory();
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

  //Add Noti data Function   
  function updateNoti() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var id = $("#id").val();
      var typ = document.querySelector('input[name="nrtype"]:checked').value;
      let type;
      let recieverid
      if (typ == "Emp"){
        type = 'employee';
        recieverid = $("#employee").find('option:selected').val();
      }
      if (typ == "Cus"){
        type = 'customer';
        recieverid = $("#customer").find('option:selected').val();
      }
      
      var title = $("#txttitle").val();
      var message = $("#txtmsg").val();
      var category = "notification created by admin";
      var email = $("#email").val();

      var empData = {
        id: id,
        title: title,
        message: message,
        category: category,
        type: type,
        reciever: recieverid,
        email: email,
      };

      $.ajax({
        url: "../server.php?c=NotiController&m=editNoti",
        data: empData,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New Noti");
          new PNotify({
            title: 'Edit Notification',
            text: data + " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadNotiData();
          clearData();
          $("#submit").css("display", "");
          $("#update").css("display", "none");
        },
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to Update Notification");
        }
      });
    } else {
      $("#txttitle").focus();
    }

  }

  function deleteNoti(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=NotiController&m=deleteNoti",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          loadNotiData();
          new PNotify({
            title: 'Deleted!',
            text: 'Notification removed.',
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
    $('Select').val('');
    $('#txtmsg').val('');
    $("#submit").css("display", "");
    $("#update").css("display", "none");
    $('#notiform')[0].reset();
    setTimeout(function() {
      location.reload()
    }, 2400);
  }

  function Reload() {
    location.reload();
  }
</script>