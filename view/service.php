<?php include_once("../incl/header.php");?>

<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Services</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="serviceform" class="form-horizontal form-label-left" novalidate="">
                <p>Manage services</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtsname">Service Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtsname" class="form-control col-md-7 col-xs-12" name="txtsname" placeholder="Service name" required="required" type="text">
                  </div>
                </div>
                <!-- <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlname">Last Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtlname" class="form-control col-md-7 col-xs-12" name="txtlname" placeholder="last name(s) e.g Doe" required="required" type="text">
                  </div>
                </div> -->                         
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtdescription">Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="txtdescription" required="required" name="txtdescription" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="btnreset" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
                    <button id="submit"  class="btn btn-success" onclick="addService();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateService();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
              </form>

            <table id="servicetable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Service Name</th>
                  <th>Description</th>
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
    $('#title').text('Service');
    $('#breadcrumb').text('Service');
    loadServiceData();

  });
  //Load Service data function  
  function loadServiceData() {  
    // alert("ok");
    $.ajax({  
      url: '../server.php?c=ServiceController&m=getAllService',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#servicetable').DataTable();
        $("#servicetable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].serId;
          var sname = data[i].service;
          var description = data[i].serDescription;

          var func_view = 'viewService(' + id + ')';
          var func_edit = 'getService(' + id + ')';
          var func_delete = 'deleteService(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+sname+'</td>\
              <td> '+description+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#servicetable tbody").append(row);
        }
        $('#servicetable').DataTable()
      }
    });  
  }

  function addService(){
    var sname =$("#txtsname").val();
    var description =$("#txtdescription").val();

    var empData={sname:sname,description:description};

    $.ajax({  
      url: "../server.php?c=ServiceController&m=addService",  
      data: empData,
      type: "POST",
      dataType: "json",  
      success: function (data) {
        // alert(data+ " Susscessfully added to the system");
        
        new PNotify({
          title: 'New Service',
          text: data+ " Susscessfully added to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        
        loadServiceData();
        clearData();

      },  
      error: function (errormessage) {  
        alert(errormessage.responseText);
        alert("Unable to add Service");
      }
    });  
  }

  function viewService(id){
    $.ajax({
      type: "POST",
      url: '../server.php?c=ServiceController&m=getService',
      data: {'id':id},
      success:
      function (data){
        // alert(data);
        // var table = $('#tableView').DataTable();
        // $("#viewEmpInfo").empty();
        var td='';

        for (i = 0; i < data.length; i++) {
          var d=data[0];
          var id = d.serId;
          var sname = d.service;
          var description = d.serDescription;

          td+=
            '<tbody>\
            <tr>\
              <th style="width:25%">Service :</th>\
              <td> '+id+' </td>\
              <td> '+sname+'  </td>\
              <td> '+description+'  </td>\
            </tr>\
            </tbody>';

          $("#ServiceInfoView").html(td);
        }
      },
    dataType: 'json'
    });
  }

  function getService(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Service");
    $.ajax({
      type: "POST",
      url: '../server.php?c=ServiceController&m=getService',
      data: {'id':id},
      success:

      function(data){
        $('#serviceform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0];
        var id = d.serId;
        var sname = d.service;
        var description = d.serDescription;

        $("#id").val(id);
        $("#txtsname").val(sname);
        $("#txtdescription").val(description);
      },
      dataType: 'json'
    });
  } 

  //Add Service data Function   
  function updateService(){ 
    var id =$("#id").val();
    var sname =$("#txtsname").val();
    var description =$("#txtdescription").val();

    var empData=
    {id:id,sname:sname,description:description};

    $.ajax({  
      url: "../server.php?c=ServiceController&m=editService",  
      data: empData,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        // alert("Newly Updated Id is : "+ data);
        // $("#home-tab").tab("show");
        // $("#profile-tab").html("New Service");
        new PNotify({
          title: 'Edit Service',
          text: data+ " Susscessfully Updated to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        loadServiceData();
        clearData();
        $("#submit").css("display","");
        $("#update").css("display","none");
      }  
      // error: function (errormessage) {  
      //   alert(errormessage.responseText);
      //   alert("Unable to Update Service");
      // }
    });  
  } 

  function deleteService(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=ServiceController&m=deleteService",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadServiceData();
          new PNotify({
            title: 'Deleted!',
            text: 'Service removed.',
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
    $("#submit").css("display","");
    $("#update").css("display","none");
  }

</script>