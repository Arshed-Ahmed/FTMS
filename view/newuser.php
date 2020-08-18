<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Info</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="userform" class="form-horizontal form-label-left" data-parsley-validate novalidate>
                <p>Create user accounts</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">User Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="txtname
                    " placeholder="User name(s) e.g Jon" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label for="txtpswd" class="control-label col-md-3">Password <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtpswd" type="password" name="txtpswd" data-validate-length="6" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="item form-group">
                  <label for="txtpswdcon" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtpswdcon" type="password" name="txtpswdcon" data-validate-linked="txtpswd" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="item form-group">
                  <label for="usrtype" class="control-label col-md-3 col-sm-3 col-xs-12">User Type <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="usrtype" name="usrtype" class="form-control" required tabindex="-1" >
                      <option selected disabled value>Select the user type</option>
                      <option value="Admin">Admin</option>
                      <option value="Tailor">Tailor</option>
                      <option value="Manager">Manager</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label for="usrstatus" class="control-label col-md-3 col-sm-3 col-xs-12">User Status <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="usrstatus" name="usrstatus" class="form-control" tabindex="-1" required>
                      <option selected disabled value>Select the Status of user</option>
                      <option value="Active">Active</option>
                      <option value="Disable">Disable</option>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="reset" class="btn btn-primary" onclick="Reload();">Cancel</button>
                    <button id="submit" type="submit" class="btn btn-success" onclick="addUser();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateUser();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>

            <table id="usertable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User Name</th>
                  <th>User Type</th>
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
        $('#title').text('User Management');
        $('#breadcrumb').text('New User');
        loadUserData();
    });

  //Load User data function  
  function loadUserData() {
    $.ajax({  
      url: '../server.php?c=UserController&m=getAllUser',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#usertable').DataTable();
        $("#usertable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].id;
          var name = data[i].usr_id;
          var type = data[i].usr_type;
          var status = data[i].usr_status;

          var func_view = 'viewUser(' + id + ')';
          var func_edit = 'getUser(' + id + ')';
          var func_delete = 'deleteUser(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+name+'</td>\
              <td> '+type+'  </td>\
              <td> '+status+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#usertable tbody").append(row);
        }
        $('#usertable').DataTable();
      }
    });  
  }

  function addUser(){

    var check = $('form')[0].checkValidity();
    if(check == true){
      var name =$("#txtname").val();
      var password =$("#txtpswd").val();
      var type =$("#usrtype").find('option:selected').val();
      var status =$("#usrstatus").find('option:selected').val();

      var Data={name:name,password:password,type:type,status:status};

      $.ajax({  
        url: "../server.php?c=UserController&m=addUser",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {
          // alert(data+ " Susscessfully added to the system");
          
          new PNotify({
            title: 'New User',
            text: data+ " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          
          loadUserData();
          clearData();

        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add User");
        }
      });   
    }else{
      $("#txtname").focus();
    } 
     
  }


  function viewUser(id){
    $.ajax({
      type: "POST",
      url: '../server.php?c=UserController&m=getUser',
      data: {'id':id},
      success:
      function (data){
        // alert(data);
        // var table = $('#tableView').DataTable();
        // $("#viewEmpInfo").empty();
        var td='';

        for (i = 0; i < data.length; i++) {
          var d=data[0];
          var id = d.id;
          var name = d.usr_id;
          var type = d.usr_type;
          var status = d.usr_status;

          td+=
            '<tbody>\
            <tr>\
              <th style="width:25%">User :</th>\
              <td> '+name+'</td>\
              <td> '+type+'  </td>\
              <td> '+status+'  </td>\
            </tr>\
            </tbody>';

          $("#UserInfoView").html(td);
        }
      },
    dataType: 'json'
    });
  }

  function getUser(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update User");
    $.ajax({
      type: "POST",
      url: '../server.php?c=UserController&m=getUser',
      data: {'id':id},
      success:

      function(data){
        $('#userform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d.id;
        var name = d.usr_id;
        var password = d.usr_pass;
        var type = d.usr_type;
        var status = d.usr_status;

        $("#id").val(id);
        $("#txtname").val(name);
        $("#txtpswd").val(password);
        $("#usrtype").val(type);
        $("#usrstatus").val(status);
      },
      dataType: 'json'
    });
  } 

  //Add User data Function   
  function updateUser(){ 
    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#id").val();
      var name =$("#txtname").val();
      var password =$("#txtpswd").val();
      var type =$("#usrtype").find('option:selected').val();
      var status =$("#usrstatus").find('option:selected').val(); 

      var Data={name:name,password:password,type:type,status:status,id:id};

      $.ajax({  
        url: "../server.php?c=UserController&m=editUser",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New User");
          new PNotify({
            title: 'Edit User',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadUserData();
          clearData();
          $("#submit").css("display","");
          $("#update").css("display","none");
        }  
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update User");
        // }
      });    
    }else{
      $("#txtname").focus();
    } 
    
  } 

  function deleteUser(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=UserController&m=deleteUser",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadUserData();
          new PNotify({
            title: 'Deleted!',
            text: 'User removed.',
            type: 'error',
            styling: 'bootstrap3'
          });
          clearData();
        
        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);  
        }  
      });
    }  
  }


  function clearData() {
    // $('input[type="text"]').val('');
    // $('input[type="password"]').val('');
    // $('Select').val('');
    $("#submit").css("display","");
    $("#update").css("display","none");
    $('#userform')[0].reset();
    setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
    location.reload();
  }
</script>