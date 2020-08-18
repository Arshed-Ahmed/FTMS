<?php include_once("../incl/header.php");?>

<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Item Category</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="itemcatform" class="form-horizontal form-label-left" novalidate="">
                <p>Add a Item Category</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcatname">Item Category <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtcatname" class="form-control col-md-7 col-xs-12" name="txtcatname" placeholder="Shirt" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="desc" name="desc" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
                    <button id="submit"  class="btn btn-success" onclick="addItemCat();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateItemCat();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
              </form>
            <table id="itemcattable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Item Category Name</th>
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
        $('#title').text('Configuration');
        $('#breadcrumb').text('Item Category');
        loadItemCatData();

  });
  //Load ItemCat data function  
  function loadItemCatData() {  
    // alert("ok");
    $.ajax({  
      url: '../server.php?c=ItemCatController&m=getAllItemCat',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#itemcattable').DataTable();
        $("#itemcattable tbody").empty();
        for (i = 0; i < data.length; i++) {

          var id = data[i].catId;
          var name = data[i].catName;
          var desc = data[i].catDesc;

          var func_view = 'viewItemCat(' + id + ')';
          var func_edit = 'getItemCat(' + id + ')';
          var func_delete = 'deleteItemCat(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+name+' </td>\
              <td> '+desc+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#itemcattable tbody").append(row);
        }
      }
    });  
  }

  function addItemCat(){

    var check = $('form')[0].checkValidity();
    if(check == true){
      var name = $("#txtcatname").val();
      var desc =$("#desc").val();

      var Data={name:name,desc:desc};

      $.ajax({  
        url: "../server.php?c=ItemCatController&m=addItemCat",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {
          // alert(data+ " Susscessfully added to the system");
          
          new PNotify({
            title: 'New ItemCat',
            text: data+ " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          
          loadItemCatData();
          clearData();

        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add Item Category");
        }
      });   
    }else{
      $("#txtcatname").focus();
    }  
  }

  // function viewItemCat(id){
  //   // alert("hdcvb f");
  //   $.ajax({
  //     type: "POST",
  //     url: '../server.php?c=ItemCatController&m=getItemCat',
  //     data: {'id':id},
  //     success:
  //     function (data){
  //       // alert(data);
  //       // var table = $('#tableView').DataTable();
  //       // $("#viewEmpInfo").empty();
  //       var td='';

  //       for (i = 0; i < data.length; i++) {
  //         var d=data[0];
          
  //         var id = d.itid;
  //         var iname = d.itname;
  //         var icat = d.catId;
  //         var value = d.itvalue;

  //         td+=
  //           '<tbody>\
  //           <tr>\
  //             <th style="width:25%">ItemCat :</th>\
  //             <td> '+name+' </td>\
  //             <td> '+icat+'  </td>\
  //             <td> '+value+'  </td>\
  //           </tr>\
  //           </tbody>';

  //         $("#ItemCatInfoView").html(td);
  //       }
  //     },
  //   dataType: 'json'
  //   });
  // }

  function getItemCat(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update ItemCat");
    $.ajax({
      type: "POST",
      url: '../server.php?c=ItemCatController&m=getItemCat',
      data: {'id':id},
      success:

      function(data){
        $('#itemcatform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0];
        var id = d.catId;
        var name = d.catName;
        var desc = d.catDesc;

        $("#id").val(catId);
        $("#txtcatname").val(catName);
        $("#desc").val(catDesc);
      },
      dataType: 'json'
    });
  } 

  //Add ItemCat data Function   
  function updateItemCat(){ 

    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#id").val();
      var name = $("#txtcatname").val();
      var desc =$("#desc").val();

      var Data={id:id,name:name,desc:desc};

      $.ajax({  
        url: "../server.php?c=ItemCatController&m=editItemCat",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New ItemCat");
          new PNotify({
            title: 'Edit Item Category',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadItemCatData();
          clearData();
          $("#submit").css("display","");
          $("#update").css("display","none");
        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add Item Category");
        }
      });   
    }else{
      $("#txtcatname").focus();
    }  
  } 

  function deleteItemCat(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=ItemCatController&m=deleteItemCat",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadItemCatData();
          new PNotify({
            title: 'Deleted!',
            text: 'Item Category removed.',
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
    // $('input[type="text"]').val('');
    // $('input[type="password"]').val('');
    // $('Select').val('');
    $("#submit").css("display","");
    $("#update").css("display","none");
    $('#customerform')[0].reset();
    setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
    location.reload();
    $("#txtcatname").focus();
  }

</script>