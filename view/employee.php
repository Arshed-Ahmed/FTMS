<?php include_once("../incl/header.php");?>

<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Employee Info</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="employeeform" class="form-horizontal form-label-left" novalidate="">
                <p>Manage Employees</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtfname">First Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtfname" class="form-control col-md-7 col-xs-12" name="txtfname" placeholder="first name(s) e.g Jon" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlname">Last Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtlname" class="form-control col-md-7 col-xs-12" name="txtlname" placeholder="last name(s) e.g Doe" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtnic">NIC <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtnic" class="form-control col-md-7 col-xs-12" name="txtnic" placeholder="123456789V" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttel">Telephone <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="tel" id="txttel" name="txttel" required="required"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="txtemail" name="txtemail" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemailcon">Confirm Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="txtemailcon" name="confirm_email" data-validate-linked="txtemail" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>                            
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtaddress">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="txtaddress" required="required" name="txtaddress" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtsdate">Started Date <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                          <div class="input-group date" id="myDatepicker2">
                              <input id="txtsdate" name="txtsdate" type="text" class="form-control" required="required">
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empcat">Employee Category <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="empcat" class="select2_single form-control" tabindex="-1" required="required">
                      <option value="">Select an option</option>
                      <option value="Admin">Admin</option>
                      <option value="Tailor">Tailor</option>
                      <option value="Manager">Manager</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empstat">Employee Status <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="empstat" class="select2_single form-control" tabindex="-1" required="required">
                      <option >Select an option</option>
                      <option value="Permanent">Permanent</option>
                      <option value="Temporary">Temporary</option>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
                    <button id="submit"  class="btn btn-success" onclick="addEmployee();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateEmployee();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>

            <table id="employeetable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="width: 9px">ID No</th>
                  <th>Employee Name</th>
                  <th>NIC</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Status</th>
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
  $(document).ready(function (){
    $('#title').text('Employee');
    $('#breadcrumb').text('Employee');
    loadEmployeeData();

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
        var table = $('#employeetable').DataTable();
        $("#employeetable tbody").empty();
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
          var status = data[i].tstatus;

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
              <td> '+address+'  </td>\
              <td> '+status+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#employeetable tbody").append(row);
        }
        $('#employeetable').DataTable()
      }
    });  
  }

  function addEmployee(){
    var check = $('form')[0].checkValidity();
    if(check == true){
      var fname =$("#txtfname").val();
      var lname =$("#txtlname").val();
      var nic =$("#txtnic").val();
      var Pno =$("#txttel").val();
      var email =$("#txtemail").val();
      var address =$("#txtaddress").val();
      var startdate =$("#txtsdate").val();
      var category =$("#empcat").find('option:selected').val();
      var status =$("#empstat").find('option:selected').val();

      var empData={fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address,startdate:startdate,category:category,status:status};

      $.ajax({  
        url: "../server.php?c=EmployeeController&m=addEmployee",  
        data: empData,
        type: "POST",
        dataType: "json",  
        success: function (data) {
          // alert(data+ " Susscessfully added to the system");
          
          new PNotify({
            title: 'New Employee',
            text: data+ " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          
          loadEmployeeData();
          clearData();

        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add Employee");
        }
      });    
    }else{
      $("#txtfname").focus();
    } 
    
  }

  function viewEmployee(id){
    $.ajax({
      type: "POST",
      url: '../server.php?c=EmployeeController&m=getEmployee',
      data: {'id':id},
      success:
      function (data){
        // alert(data);
        // var table = $('#tableView').DataTable();
        // $("#viewEmpInfo").empty();
        var td='';

        for (i = 0; i < data.length; i++) {
          var d=data[0];
          var id = d.tid;
          var fname = d.tFname;
          var lname = d.tLname;
          var nic = d.tNIC;
          var Pno = d.tPno;
          var email = d.tEmail;
          var address = d.tAddress;

          td+=
            '<tbody>\
            <tr>\
              <th style="width:25%">Employee :</th>\
              <td> '+fname+' '+lname+' </td>\
              <td> '+nic+'  </td>\
              <td> '+Pno+'  </td>\
              <td> '+email+'  </td>\
              <td> '+address+'  </td>\
            </tr>\
            </tbody>';

          $("#EmployeeInfoView").html(td);
        }
      },
    dataType: 'json'
    });
  }

  function getEmployee(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Employee");
    $.ajax({
      type: "POST",
      url: '../server.php?c=EmployeeController&m=getEmployee',
      data: {'id':id},
      success:

      function(data){
        $('#employeeform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d.tid;
        var fname = d.tFname;
        var lname = d.tLname;
        var nic = d.tNIC;
        var Pno = d.tPno;
        var email = d.tEmail;
        var address = d.tAddress;
        var startdate = d.tStartdate;
        var category = d.tcatId;
        var status = d.tstatus;

        $("#id").val(id);
        $("#txtfname").val(fname);
        $("#txtlname").val(lname);
        $("#txtnic").val(nic);
        $("#txttel").val(Pno);
        $("#txtemail").val(email);
        $("#txtaddress").val(address);
        $("#txtsdate").val(startdate);
        $("#empcat").val(category);
        $("#empstat").val(category);
      },
      dataType: 'json'
    });
  } 

  //Add Employee data Function   
  function updateEmployee(){ 
    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#id").val();
      var fname =$("#txtfname").val();
      var lname =$("#txtlname").val();
      var nic =$("#txtnic").val();
      var Pno =$("#txttel").val();
      var email =$("#txtemail").val();
      var address =$("#txtaddress").val();
      var startdate =$("#txtsdate").val();
      var category =$("#empcat").find('option:selected').val();
      var status =$("#empstat").find('option:selected').val();

      var empData=
      {id:id,fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address,startdate:startdate,category:category,status:status};

      $.ajax({  
        url: "../server.php?c=EmployeeController&m=editEmployee",  
        data: empData,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New Employee");
          new PNotify({
            title: 'Edit Employee',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadEmployeeData();
          clearData();
          $("#submit").css("display","");
          $("#update").css("display","none");
        }  
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update Employee");
        // }
      });  
    }else{
      $("#txtfname").focus();
    } 
    
  } 

  function deleteEmployee(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=EmployeeController&m=deleteEmployee",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadEmployeeData();
          new PNotify({
            title: 'Deleted!',
            text: 'Employee removed.',
            type: 'error',
            styling: 'bootstrap3'
          });
        
        },  
        error: function (errormessage) {  
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
    $("#submit").css("display","");
    $("#update").css("display","none");
    $('#employeeform')[0].reset();
    setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
    location.reload();
  }

</script>