<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Purchase Info</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="poform" class="form-horizontal form-label-left" novalidate="">
                <p>Manage Purchase Order</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poitem">Purchased Item <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="poitem" class="select2_single form-control" tabindex="-1" required="required">
                      <option>Select the Ordered Item</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Purchase Date <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="podate" class="form-control col-md-7 col-xs-12" name="date" placeholder="00/00/0000" required="required" type="date">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtquan">Quantity (in m) <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="txtquan" name="txtquan" placeholder="Quantity e.g 3m" required="required"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>  
                <div class="item form-group">
                  <label for="supplier" class="control-label col-md-3">Supplier <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="supplier" class="select2_single form-control" tabindex="-1" required="required">
                      <option>Select the Ordered Supplier</option>
                    </select>
                  </div>
                </div>
                <input type="text" id="pre_quan" name="pre_quan" class="invisible form-control col-md-7 col-xs-12">
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
                    <button id="submit" class="btn btn-success" onclick="addRPO();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateRPO();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>

            <table id="potable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="width: 9px">ID No</th>
                  <th>Item</th>
                  <th style="width: 150px">Purchased Quantity (in m)</th>
                  <th style="width: 100px">Date</th>
                  <th style="width: 150px">Supplier</th>
                  <th style="width: 100px">Options</th>
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
    $('#title').text('Purchase Management');
    $('#breadcrumb').text('Purchase Order');
    loadMaterialData();
    loadSupplierData();
    loadRPOData();
  });
  
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
          var colour = data[i].Color;
          var quan = data[i].Quantity;
          var desc = data[i].Description;

          var func_view = 'viewMaterial(' + id + ')';
          var func_edit = 'getMaterial(' + id + ')';
          var func_delete = 'deleteMaterial(' + id + ')';
          var func_purchase = 'Purchase(' + id + ')';

          option =
						'<option value="' + id + '" >\
							' + name + ' - '+ type+' - '+ colour+' (' + desc + ') \
						</option>';

					$("#poitem").append(option);


        }
      }
    });  
  }

  function loadSupplierData() {  
    $.ajax({  
      url: '../server.php?c=SupplierController&m=getAllSupplier',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#suppliertable').DataTable();
        $("#suppliertable tbody").empty();
        for (i = 0; i < data.length; i++) {

          var id = data[i].supid;
          var name = data[i].supName;
          var mname = data[i].supMname;
          var regno = data[i].supRegno;
          var Pno = data[i].supPno;
          var email = data[i].supEmail;
          var address = data[i].supAddress;

          var func_view = 'viewSupplier(' + id + ')';
          var func_edit = 'getSupplier(' + id + ')';
          var func_delete = 'deleteSupplier(' + id + ')';

          option =
						'<option value="' + id + '" >\
							' + name + ' - '+ mname +' (' + address + ') \
						</option>';

					$("#supplier").append(option);
        }
      }
    });  
  }

  function loadRPOData() {
		var supplier = [];
    $.ajax({  
      url: '../server.php?c=SupplierController&m=getAllSupplier',
      type: "POST",  
      async: false,
      dataType: "json",  
      success: function (data) { 
        for (i = 0; i < data.length; i++) {

          var id = data[i].supid;
          var name = data[i].supName;
          var mname = data[i].supMname;
          var regno = data[i].supRegno;
          var Pno = data[i].supPno;
          var email = data[i].supEmail;
          var address = data[i].supAddress;

          supplier[id] =  name + ' - '+ mname +' (' + address + ')';
        }
      }
    });
    
		var itemArr = [];
    $.ajax({  
      url: '../server.php?c=MaterialController&m=getAllMaterial',
      async: false,
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        for (i = 0; i < data.length; i++) {
          var id = data[i].rid;
          var name = data[i].Name;
          var type = data[i].Type;
          var colour = data[i].Color;
          var desc = data[i].Description;

          itemArr[id] = name + ' - '+ type+' - '+ colour +' (' + desc + ')';
        }
      }
    });

    $.ajax({
      url: '../server.php?c=RPOController&m=getAllRPO',
      async: false,
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#potable').DataTable();
        $("#potable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].poid;
          var itid = data[i].itid;
          var quan = data[i].poQuantity;
          var podate = data[i].poDate;
          var supid = data[i].supid;

          var func_view = 'viewRPO(' + id + ')';
          var func_edit = 'getRPO(' + id + ')';
          var func_delete = 'deleteRPO(' + id + ')';
          
          var item = itemArr[itid];
          var supname = supplier[supid];

          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ' + item + '</td>\
              <td> ' + quan + '</td>\
              <td> ' + podate + '  </td>\
              <td> ' + supname + '  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#potable tbody").append(row);
        }
        $('#potable').DataTable()
      }
    });
  }

  function addRPO() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var item = $("#poitem").val();
      var podate = $("#podate").val();
      var supplier = $("#supplier").val();
      var quan = $("#txtquan").val();

      var data = {
        poitem: item,
        quan: quan,
        podate: podate,
        supplier: supplier
      };
    updateMaterial(item, quan);
      $.ajax({
        url: "../server.php?c=RPOController&m=addRPO",
        data: data,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(data+ " Susscessfully added to the system");

          new PNotify({
            title: 'New Purchase Order',
            text: "Item No:"+[data] + "RPO Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });

          
          clearData();


        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add Purchase Orders");
        }
      });
    } else {
      $("#poitem").focus();
    }

  }

  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="number"]').val('');
    $('input[type="date"]').val('');
    $('select').val('');
    $("#submit").css("display", "");
    $("#update").css("display", "none");
    $('#poform')[0].reset();
  }

  function updateMaterial(id, quantity){
    var itemQuan;
    $.ajax({  
      type: "POST",
      async: false,
      url: '../server.php?c=MaterialController&m=getMaterial',
      data: {'id':id},
      dataType: "json",  
      success: function (data) {  
        var d=data[0]; 
        var id = d.rid;
        var name = d.Name;
        var type = d.Type;
        var col = d.Color;
        var quan = d.Quantity;
        var desc = d.Description;

        itemQuan = quan;
      }
    });
    var totalQuantity = parseInt(itemQuan) - parseInt(quantity);
    if(totalQuantity < 0){
        new PNotify({
          title: 'Material Quantity',
          text: "Return quantity is High than the current quantity",
          type: 'Warning',
          styling: 'bootstrap3'
        });
        return;
    }
    var data = {
      id: id,
      quan: totalQuantity
    };
    $.ajax({  
      url: "../server.php?c=MaterialController&m=editMaterialQuantity",  
      async: false,
      data: data,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        new PNotify({
          title: 'Material Quantity',
          text: "Quantity is Susscessfully Updated to the System",
          type: 'success',
          styling: 'bootstrap3'
        });
        clearData();
        $("#submit").css("display","");
        $("#update").css("display","none");
        
        setTimeout(function(){
          window.location.reload();
        }, 2500);
      }  
      // error: function (errormessage) {  
      //   alert(errormessage.responseText);
      //   alert("Unable to Update User");
      // }
    });
  } 

  
  function getRPO(id) {
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update RPO");
    $.ajax({
      type: "POST",
      url: '../server.php?c=RPOController&m=getRPO',
      data: {
        'id': id
      },
      success: function(data) {
        $('#poform')[0].reset();
        $("#submit").css("display", "none");
        $("#update").css("display", "");

        // alert(data);
        var d = data[0];
        var id = d.poid;
        var poitem = d.itid;
        var quan = d.poQuantity;
        var podate = d.poDate;
        var supplier = d.supid;

        $("#id").val(id);
        $("#poitem").val(poitem);
        $("#txtquan").val(quan);
        $("#pre_quan").val(quan);
        $("#podate").val(podate);
        $("#supplier").val(supplier);
      },
      dataType: 'json'
    });
  }

  //Add RPO data Function   
  function updateRPO() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var id = $("#id").val();
      var item = $("#poitem").val();
      var podate = $("#podate").val();
      var supplier = $("#supplier").val();
      var quan = $("#txtquan").val();
      var pre_quan = $("#pre_quan").val();
      
      var update_quan = parseInt(quan) - parseInt(pre_quan);
      console.log(update_quan, quan, pre_quan);
      var poData = {
        id: id,
        poitem: item,
        quan: quan,
        podate: podate,
        supplier: supplier,
      };

      $.ajax({
        url: "../server.php?c=RPOController&m=editRPO",
        data: poData,
        type: "POST",
        dataType: "json",
        success: function(data) {
          new PNotify({
            title: 'Edit Purchase Order',
            text: data + " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          clearData();
          $("#submit").css("display", "");
          $("#update").css("display", "none");
          updateMaterial(item, update_quan);
        }
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update RPO");
        // }
      });
    } else {
      $("#txtfname").focus();
    }

  }

  function deleteRPO(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=RPOController&m=deleteRPO",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          loadRPOData();
          new PNotify({
            title: 'Deleted!',
            text: 'Purchase Order removed.',
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

  function Reload() {
    location.reload();
  }
</script>

  

