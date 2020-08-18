<?php include_once("../incl/header.php");?>

<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Price Info</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="priceform" class="form-horizontal form-label-left" novalidate="">
                <p>Add Hire items</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtitem">Item <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtitem" class="form-control col-md-7 col-xs-12" name="txtitem" placeholder="Blazer 01" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtpvalue">Price Value <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtpvalue" class="form-control col-md-7 col-xs-12" name="txtpvalue" placeholder="00.00" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txthvalue">Hire Value <small>(per day)</small><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txthvalue" class="form-control col-md-7 col-xs-12" name="txthvalue" placeholder="00.00" required="required" type="text">
                  </div>
                </div>                           
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="desc" name="txtdescription" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="btnreset" type="Reset" class="btn btn-primary" onclick="clearData();">Reset</button>
                    <button id="submit"  class="btn btn-success" onclick="addPrice();">Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updatePrice();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
              </form>
            <table id="pricetable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Item</th>
                  <th>Price Value</th>
                  <th style="width: 170px">Hire value <small>(per day)</small></th>
                  <th>Description</th>
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
        $('#title').text('Item Management');
        $('#breadcrumb').text('Hire Item');
        loadPriceData();

  });
  //Load Price data function
  function loadPriceData() {
    $.ajax({  
      url: '../server.php?c=PriceController&m=getAllHitem',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#pricetable').DataTable();
        $("#pricetable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].itid;
          var item = data[i].itname;
          var pvalue = data[i].itvalue;
          var hvalue = data[i].hvalue;
          var desc = data[i].itdescription;

          var func_view = 'viewPrice(' + id + ')';
          var func_edit = 'getPrice(' + id + ')';
          var func_delete = 'deletePrice(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+item+'</td>\
              <td> Rs.'+pvalue+' </td>\
              <td> Rs.'+hvalue+'  </td>\
              <td> '+desc+'  </td>\
              <td>\
                <div class="radio">\
                  <label>\
                    <input type="radio" value="hire" id="hire" name="status'+id+'"> Hired\
                  </label>\
                </div>\
                <div class="radio">\
                  <label>\
                    <input type="radio" checked="" value="nothire" id="nothire" name="status'+id+'"> Not Hired\
                  </label>\
                </div>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#pricetable tbody").append(row);
        }
        $('#pricetable').DataTable();
      }
    });  
  }

  function addPrice(){
    var item =$("#txtitem").val();
    var pvalue =$("#txtpvalue").val();
    var hvalue =$("#txthvalue").val();
    var desc =$("#desc").val();
    var type ="hire";

    var Data={item:item,pvalue:pvalue,hvalue:hvalue,desc:desc,type:type};

    $.ajax({  
      url: "../server.php?c=PriceController&m=addPrice",  
      data: Data,
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


  // function viewPrice(id){
  //   $.ajax({
  //     type: "POST",
  //     url: '../server.php?c=PriceController&m=getPrice',
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
  //             <th style="width:25%">Price :</th>\
  //             <td> '+name+'</td>\
  //             <td> '+type+'  </td>\
  //             <td> '+status+'  </td>\
  //           </tr>\
  //           </tbody>';

  //         $("#PriceInfoView").html(td);
  //       }
  //     },
  //   dataType: 'json'
  //   });
  // }

  function getPrice(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Price");
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
        var id = d.itid;
        var item = d.itname;
        var pvalue = d.itvalue;
        var hvalue = d.hvalue;
        var desc = d.itdescription;

        $("#id").val(id);
        $("#txtitem").val(item);
        $("#txtpvalue").val(pvalue);
        $("#txthvalue").val(hvalue);
        $("#desc").val(desc);
      },
      dataType: 'json'
    });
  } 

  //Add Price data Function   
  function updatePrice(){ 
    var id =$("#id").val();
    var item =$("#txtitem").val();
    var pvalue =$("#txtpvalue").val();
    var hvalue =$("#txthvalue").val();
    var desc =$("#desc").val();
    var type ="hire";

    var Data={item:item,pvalue:pvalue,hvalue:hvalue,desc:desc,type:type,id:id};

    $.ajax({  
      url: "../server.php?c=PriceController&m=editPrice",  
      data: Data,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        // alert("Newly Updated Id is : "+ data);
        // $("#home-tab").tab("show");
        // $("#profile-tab").html("New Price");
        new PNotify({
          title: 'Edit Price',
          text: data+ " Susscessfully Updated to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        loadPriceData();
        clearData();
        $("#submit").css("display","");
        $("#update").css("display","none");
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
    // $("#submit").css("display","");
    // $("#update").css("display","none");
    $('#priceform')[0].reset();
  }
</script>