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
            <form id="userform" class="form-horizontal form-label-left" novalidate="">
                <p>Send notification</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">Receiver <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtname" class="form-control col-md-7 col-xs-12" name="txtname
                    " placeholder="Receiver name(s) e.g Jon" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="txtemail" name="txtemail" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nocat" class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="nocat" class="select2_single form-control" tabindex="-1" required="required">
                      <option value="">Select the category of notification</option>
                      <option value="1">Customer Notification</option>
                      <option value="2">Employee Notification</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtsubject">Subject <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtsubject" class="form-control col-md-7 col-xs-12" name="txtsubject
                    " placeholder="Subject" required="required" type="text">
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
                    <button id="submit" type="" class="btn btn-success" onclick="addUser();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateUser();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>
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

          var id = data[i].uid;
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
          var id = d.uid;
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
        var id = d.uid;
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
    var id =$("#id").val();
    var name =$("#txtname").val();
    var password =$("#txtpswd").val();
    var type =$("#usrtype").find('option:selected').val();
    var status =$("#usrstatus").find('option:selected').val(); 

    var Data={name:name,password:password,type:type,status:status};

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
        
        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);  
        }  
      });
    }  
  }


  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="password"]').val('');
    $('Select').val('');
    $("#submit").css("display","");
    $("#update").css("display","none");
  }
</script>