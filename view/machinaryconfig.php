<?php include_once("../incl/header.php");?>
<?php require_once("../models/Connection.php");?>

<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Styles</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="plistform" class="form-horizontal form-label-left" novalidate="">
                <p>Add a Machinary</p>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtprice">Machine Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtprice" class="form-control col-md-7 col-xs-12" name="txtprice" placeholder="eg: Jucki" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtprice">Machine Code <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtprice" class="form-control col-md-7 col-xs-12" name="txtprice" placeholder="Z00A6b" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtprice">Type of Machine <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtprice" class="form-control col-md-7 col-xs-12" name="txtprice" placeholder="Sawwing Machine" required="required" type="text">
                  </div>
                </div>
              </form>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="btnreset" class="btn btn-primary" onclick="clearData()">Reset</button>
                  <button id="sendprice"  class="btn btn-success" onclick="addPrice()">Save</button>
                </div>
              </div>

            <table id="pricetable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Machine Name</th>
                  <th>Code</th>
                  <th>Type</th>
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
        $('#breadcrumb').text('Machinary');
        loadPriceData();

  });
  //Load Price data function  
  function loadPriceData() {  
    // alert("ok");
    $.ajax({  
      url: '../server.php?c=PriceController&m=getAllPrice',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#pricetable').DataTable();
        $("#pricetable tbody").empty();
        for (i = 0; i < data.length; i++) {

          var id = data[i].plistId;
          var item = data[i].itid;
          var price = data[i].plistPrice;
          var mprice = data[i].plistminPrice;
          var description = data[i].plistDescription;

          var func_view = 'viewPrice(' + id + ')';
          var func_edit = 'getPrice(' + id + ')';
          var func_delete = 'deletePrice(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+item+' </td>\
              <td> '+price+'  </td>\
              <td> '+mprice+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#pricetable tbody").append(row);
        }
      }
    });  
  }

  function addPrice(){

    var item = $("#item").find('option:selected').val();
    var price =$("#txtprice").val();
    var mprice =$("#txtmprice").val();
    var description =$("#txtdescription").val();

    var empData={item:item,price:price,mprice:mprice,description:description};

    $.ajax({  
      url: "../server.php?c=PriceController&m=addPrice",  
      data: empData,
      type: "POST",
      dataType: "json",  
      success: function (data) {
        // alert(data+ " Susscessfully added to the system");
        
        new PNotify({
          title: 'New Price',
          text: data+ " Susscessfully added to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        
        loadPriceData();
        clearData();

      },  
      error: function (errormessage) {  
        alert(errormessage.responseText);
        alert("Unable to add Price");
      }
    });  
  }

  function viewPrice(id){
    // alert("hdcvb f");
    $.ajax({
      type: "POST",
      url: '../server.php?c=PriceController&m=getPrice',
      data: {'id':id},
      success:
      function (data){
        // alert(data);
        // var table = $('#tableView').DataTable();
        // $("#viewEmpInfo").empty();
        var td='';

        for (i = 0; i < data.length; i++) {
          var d=data[0];
          
          var id = d.plistId;
          var item = d.itid;
          var price = d.plistPrice;
          var mprice = d.plistminPrice;
          var description = d.plistDescription;

          td+=
            '<tbody>\
            <tr>\
              <th style="width:25%">Price :</th>\
              <td> '+item+' </td>\
              <td> '+price+'  </td>\
              <td> '+mprice+'  </td>\
              <td> '+description+'  </td>\
            </tr>\
            </tbody>';

          $("#PriceInfoView").html(td);
        }
      },
    dataType: 'json'
    });
  }

  function getPrice(id){
    $("#profile-tab").tab("show");
    $("#profile-tab").html("Update Price");
    $.ajax({
      type: "POST",
      url: '../server.php?c=PriceController&m=getPrice',
      data: {'id':id},
      success:

      function(data){
        $('#priceform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d.plistId;
        var item = d.itid;
        var price = d.plistPrice;
        var mprice = d.plistminPrice;
        var description = d.plistDescription;

        $("#item").val(item);
        $("#txtprice").val(price);
        $("#txtmprice").val(mprice);
        $("#txtdescription").val(description);
      },
      dataType: 'json'
    });
  } 

  //Add Price data Function   
  function updatePrice(){ 
    var id =$("#id").val();
    var item = $("#item").find('option:selected').val();
    var price =$("#txtprice").val();
    var mprice =$("#txtmprice").val();
    var description =$("#txtdescription").val();

    var empData=
    {id:id,item:item,price:price,mprice:mprice,description:description};

    $.ajax({  
      url: "../server.php?c=PriceController&m=editPrice",  
      data: empData,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        alert("Newly Updated Id is : "+ data);
        // $("#home-tab").tab("show");
        // $("#profile-tab").html("New Price");

        loadPriceData();
        clearData();
      }  
      // error: function (errormessage) {  
      //   alert(errormessage.responseText);
      //   alert("Unable to Update Price");
      // }
    });  
  } 

  function deletePrice(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=PriceController&m=deletePrice",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadPriceData();
          new PNotify({
            title: 'Deleted!',
            text: 'Price removed.',
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
    $('$txtdescription').val('');
    $('$item').val('');
  }

</script>