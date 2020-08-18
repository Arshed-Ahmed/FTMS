<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

    	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User groups</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="usergform" class="form-horizontal form-label-left" novalidate="">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Group Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="Usre Group Name(s) e.g Joe" required="required" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="type" class="select2_single form-control" tabindex="-1">
                      <option>Select the user type</option>
                      <option value="1">Admin</option>
                      <option value="2">Tailor</option>
                      <option value="3">Manager</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="description" required="required" name="description" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="reset" class="btn btn-primary" onclick="clearData();">Cancel</button>
                    <button id="submit" type="" class="btn btn-success" onclick="addUserG();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateUserG();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>

            <table id="usergtable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>User Group Name</th>
                  <th>Type</th>
                  <th>Description</th>
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
      $('#breadcrumb').text('User Groups');
      loadUserGData();
  });

   //Load User group data function  
  function loadUserGData() {
    $.ajax({  
      url: '../server.php?c=UserGController&m=getAllUserG',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#usergtable').DataTable();
        $("#usergtable tbody").empty();
        for (i = 0; i < data.length; i++) {

          var id = data[i].ugid;
          var name = data[i].ugName;
          var type = data[i].ugType;
          var discription = data[i].ugDescription;

          var func_view = 'viewUser(' + id + ')';
          var func_edit = 'getUser(' + id + ')';
          var func_delete = 'deleteUser(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+User Group+'</td>\
              <td> '+type+'  </td>\
              <td> '+description+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#usergtable tbody").append(row);
        }
      }
    });  
  }

  function addUserG(){
    var name =$("#name").val();
    var type =$("#type").find('option:selected').val();
    var description =$("#description").val();

    var Data={name:name,type:type,description:description};

    $.ajax({  
      url: "../server.php?c=UserGController&m=addUserG",  
      data: Data,
      type: "POST",
      dataType: "json",  
      success: function (data) {
        // alert(data+ " Susscessfully added to the system");
        
        new PNotify({
          title: 'New User Group',
          text: data+ " Susscessfully added to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        
        loadUserGData();
        clearData();

      },  
      error: function (errormessage) {  
        alert(errormessage.responseText);
        alert("Unable to add User");
      }
    });  
  }

  function viewUserG(id){
    $.ajax({
      type: "POST",
      url: '../server.php?c=UserGController&m=getUserG',
      data: {'id':id},
      success:
      function (data){
        // alert(data);
        // var table = $('#tableView').DataTable();
        // $("#viewEmpInfo").empty();
        var td='';

        for (i = 0; i < data.length; i++) {
          var d=data[0];
          var id = d[i].ugid;
          var name = d[i].ugName;
          var type = d[i].ugType;
          var discription = d[i].ugDescription;

          td+=
            '<tbody>\
            <tr>\
              <th style="width:25%">User :</th>\
              <td> '+name+'</td>\
              <td> '+type+'  </td>\
              <td> '+description+'  </td>\
            </tr>\
            </tbody>';

          $("#UserGInfoView").html(td);
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
      url: '../server.php?c=UserGController&m=getUserG',
      data: {'id':id},
      success:

      function(data){
        $('#userform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d[i].ugid;
        var name = d[i].ugName;
        var type = d[i].ugType;
        var discription = d[i].ugDescription;

        $("#id").val(id);
        $("#name").val(name);
        $("#type").val(type);
        $("#description").val(description);
      },
      dataType: 'json'
    });
  } 

  //Add User data Function   
  function updateUserG(){ 
    var id =$("#id").val();
    var name =$("#txtname").val();
    var type =$("#usrtype").find('option:selected').val();
    var description =$("#description").val(); 

    var Data={name:name,type:type,description:description};

    $.ajax({  
      url: "../server.php?c=UserGController&m=editUserG",  
      data: Data,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        // alert("Newly Updated Id is : "+ data);
        // $("#home-tab").tab("show");
        // $("#profile-tab").html("New User");
        new PNotify({
          title: 'Edit User Group',
          text: data+ " Susscessfully Updated to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        loadUserGData();
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

  function deleteUserG(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=UserGController&m=deleteUserG",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadUserData();
          new PNotify({
            title: 'Deleted!',
            text: 'User Group removed.',
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
    $('textarea').val('');
    $('Select').val('');
    $("#submit").css("display","");
    $("#update").css("display","none");
  }
</script>