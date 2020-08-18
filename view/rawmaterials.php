<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Raw Material Info</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <form id="materialform" class="form-horizontal form-label-left" novalidate="">
                        <p>Manage Raw Materials</p>
                        <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">Item Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txtname" class="form-control col-md-7 col-xs-12" name="iname" placeholder="Item name" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttype">Item Type <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txttype" class="form-control col-md-7 col-xs-12" name="txttype" placeholder="Item Type e.g Fabric" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcol">Colour <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txtcol" class="form-control col-md-7 col-xs-12" name="txtcol" placeholder="Colour e.g Black" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtquan">Quantity <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtquan" name="txtquan" placeholder="Quantity e.g 3m" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>                          
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="desc" name="desc" class="form-control col-md-7 col-xs-12"></textarea>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button id="btnreset" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
                            <button id="submit"  class="btn btn-success" onclick="addMaterial();">Save</button>
                            <button id="update" style="display: none;" class="btn btn-success" onclick="updateMaterial();">Update</button>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                    </form>

                	<table id="materialtable" class="table table-striped table-bordered">
                    	<thead>
                    	    <tr>
                    	      <th>No</th>
                    	      <th>Item Name</th>
                    	      <th>Item Type</th>
                    	      <th>Colour</th>
                    	      <th>Quantity</th>
                            <th>Description</th>
                            <th>Stock Status</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Options</th>
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
        $('#title').text('Item Management');
        $('#breadcrumb').text('Raw Materials');
        loadMaterialData();
    });



  //Load Material data function  
  function loadMaterialData() {
    $.ajax({  
      url: '../server.php?c=MaterialController&m=getAllMaterial',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#materialtable').DataTable();
        $("#materialtable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].rid;
          var name = data[i].Name;
          var type = data[i].Type;
          var col = data[i].Color;
          var quan = data[i].Quantity;
          var desc = data[i].Description;

          var func_view = 'viewMaterial(' + id + ')';
          var func_edit = 'getMaterial(' + id + ')';
          var func_delete = 'deleteMaterial(' + id + ')';
          var func_purchase = 'Purchase(' + id + ')';

          row = 
          ' <tr>\
              <td id="'+id+'"> '+id+' </td>\
              <td> '+name+' </td>\
              <td> '+type+' </td>\
              <td> '+col+' </td>\
              <td> '+quan+' </td>\
              <td> '+desc+' </td>\
              <td>\
                <div class="radio">\
                  <label>\
                    <input type="radio" value="stock" id="stock" name="status'+id+'" checked=""> In Stock\
                  </label>\
                </div>\
                <div class="radio">\
                  <label>\
                    <input type="radio" value="nostock" id="nostock" name="status'+id+'"> No Stock\
                  </label>\
                </div>\
              </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
                <a href="#" class="btn btn-warning btn-xs" onclick="'+func_purchase+'"><i class="fa fa-shopping-cart"></i> Purchase </a>\
              </td>';

          $("#materialtable tbody").append(row);
        }
        $('#materialtable').DataTable();
      }
    });  
  }

  function Purchase(id){
    window.location = "purchaseorder.php?" + id +"|data";
  }

  function addMaterial(){
    var name =$("#txtname").val();
    var type =$("#txttype").val();
    var col =$("#txtcol").val();
    var quan =$("#txtquan").val();
    var desc =$("#desc").val();

    var Data={name:name,type:type,col:col,quan:quan,desc:desc};

    $.ajax({  
      url: "../server.php?c=MaterialController&m=addMaterial",  
      data: Data,
      type: "POST",
      dataType: "json",  
      success: function (data) {
        // alert(data+ " Susscessfully added to the system");
        
        new PNotify({
          title: 'New Material',
          text: data+ " Susscessfully added to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        
        loadMaterialData();
        clearData();

      },  
      error: function (errormessage) {  
        alert(errormessage.responseText);
        alert("Unable to add Material");
      }
    });  
  }


  // function viewMaterial(id){
  //   $.ajax({
  //     type: "POST",
  //     url: '../server.php?c=MaterialController&m=getMaterial',
  //     data: {'id':id},
  //     success:
  //     function (data){
  //       // alert(data);
  //       // var table = $('#tableView').DataTable();
  //       // $("#viewEmpInfo").empty();
  //       var td='';

  //       for (i = 0; i < data.length; i++) {
  //         var d=data[0];
  //         var id = d.id;
  //         var name = d.usr_id;
  //         var type = d.usr_type;
  //         var status = d.usr_status;

  //         td+=
  //           '<tbody>\
  //           <tr>\
  //             <th style="width:25%">User :</th>\
  //             <td> '+name+'</td>\
  //             <td> '+type+'  </td>\
  //             <td> '+status+'  </td>\
  //           </tr>\
  //           </tbody>';

  //         $("#UserInfoView").html(td);
  //       }
  //     },
  //   dataType: 'json'
  //   });
  // }

  function getMaterial(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update User");
    $.ajax({
      type: "POST",
      url: '../server.php?c=MaterialController&m=getMaterial',
      data: {'id':id},
      success:

      function(data){
        $('#materialform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d.rid;
        var name = d.Name;
        var type = d.Type;
        var col = d.Color;
        var quan = d.Quantity;
        var desc = d.Description;

        $("#id").val(id);
        $("#txtname").val(name);
        $("#txttype").val(type);
        $("#txtcol").val(col);
        $("#txtquan").val(quan);
        $("#desc").val(desc);
      },
      dataType: 'json'
    });
  } 

  //Add Material data Function   
  function updateMaterial(){ 
    var id =$("#id").val();
    var name =$("#txtname").val();
    var type =$("#txttype").val();
    var col =$("#txtcol").val();
    var quan =$("#txtquan").val();
    var desc =$("#desc").val();

    var Data={name:name,type:type,col:col,quan:quan,desc:desc,id:id};

    $.ajax({  
      url: "../server.php?c=MaterialController&m=editMaterial",  
      data: Data,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        // alert("Newly Updated Id is : "+ data);
        // $("#home-tab").tab("show");
        // $("#profile-tab").html("New User");
        new PNotify({
          title: 'Edit Material',
          text: data+ " Susscessfully Updated to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        loadMaterialData();
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

  function deleteMaterial(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=MaterialController&m=deleteMaterial",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadMaterialData();
          new PNotify({
            title: 'Deleted!',
            text: 'Material removed.',
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
    $('#materialform')[0].reset();
  }
</script>