<?php include_once("../incl/header.php"); ?>
<!-- page content -->

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Order Info</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <table id="ordertable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 9px">ID No</th>
              <th>Customer Name</th>
              <th>Delivery Date</th>
              <th>Total Price</th>
              <th>Order Description</th>
              <th>Measurement Details</th>
              <th>Order Progress</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>

        <form id="genInv" method="post" name="invoice_pdf" action="report/ordercard.php" target="_blank" class="invisible">
          <input id="ordid_inv" name="ordid_inv" type="text" class="invisible form-control col-md-7 col-xs-12">
        </form>

        <!-- Measurement large modal -->
        <div class="modal fade bs-measurement" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1">Measurement preview</h4>
              </div>
              <div class="modal-body">
                <table id="measurementtable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Headers</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
        <!-- /modals -->

        <!-- Order large modal -->
        <div class="modal fade bs-order" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1">Edit Order details</h4>
              </div>
              <div class="modal-body">
                <form id="orderform" class="form-horizontal form-label-left" novalidate>
                  <h5>Enter order details</h5>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcusname">Customer Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="txtcusname" class="form-control col-md-7 col-xs-12" name="txtcusname" required="required" type="text">
                    </div>
                  </div>
                  <input type="text" id="txtcusid" name="txtcusid" class="invisible 
                            form-control col-md-7 col-xs-12">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="price" required="required" type="text">
                    </div>
                  </div>
                  <input type="text" id="txtordid" name="txtordid" class="invisible 
                            form-control col-md-7 col-xs-12">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">Discount </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="discount" class="form-control col-md-7 col-xs-12" name="discount" type="text">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fdate">Fit-on Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <div class="input-group date" id="myDatepicker2">
                          <input id="fdate" name="fdate" type="text" class="form-control">
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddate">Delivery Date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <div class="input-group date" id="myDatepicker1">
                          <input id="ddate" name="ddate" type="text" class="form-control" required="required">
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">Description or Note
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="note" name="note" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                  </div>
                  <input type="text" id="txtstyleid" name="txtstyleid" class="invisible 
                            form-control col-md-7 col-xs-12">
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button type="reset" class="btn btn-primary" onclick="$('#orderform')[0].reset();">Reset</button>
                      <button id="btnsendorder" type="button" class="btn btn-success" onclick="updateOrder();">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
        <!-- /modals -->

        <!-- Change Progress Small modal -->
        <div class="modal fade bs-status" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <form id="progressform" name="progressform" class="form-horizontal form-label-left" novalidate>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel2">Change Progress preview</h4>
                </div>
                <div class="modal-body">
                  <div class="item form-group">
                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="txtordid1">Order Id </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="txtordid1" class="form-control col-md-7 col-xs-12" name="txtordid1" required="required" type="text">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="txtcusname1">Customer Name </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="txtcusname1" class="form-control col-md-7 col-xs-12" name="txtcusname1" required="required" type="text">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="progress">Status <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="progress" class="select2_single form-control" tabindex="-1" required="required">
                        <option value="0">In progress</option>
                        <option value="1">Finished</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="chaneprogress" name="chaneprogress" type="button" class="btn btn-success" onclick="updateProgress();">Update</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </form>

            </div>
          </div>
        </div>
        <!-- /modals -->

      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#title').text('Order Management');
    $('#breadcrumb').text('Order Status');
    loadOrderData();
  });

  function loadOrderData() {
    // alert("ok");
    $.ajax({
      url: '../server.php?c=OrderController&m=getAllOrder',
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#ordertable').DataTable();
        $("#ordertable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {
          var id = data[i].ordid;
          var cusname = data[i].cusName;
          var styleid = data[i].styleId;
          var fitondate = data[i].fitonDate;
          var deliverydate = data[i].deliveryDate;
          var price = data[i].ordPrice;
          var discount = data[i].ordDiscount;
          var totalprice = price - discount;
          var description = data[i].ordDescription;
          var measid = data[i].measId;
          var progress = data[i].ordProgress;

          if (progress == 0) {
            var status = "In Progress";
          } else {
            var status = "Finished";
          }

          var func_view = 'viewMeasurement(' + measid + ','+ styleid +')';
          var func_edit = 'getOrder(' + id + ')';
          var func_delete = 'deleteOrder(' + id + ')';
          var func_inv = 'generateInvoice(' + id + ')';

          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ' + cusname + '</td>\
              <td> ' + deliverydate + '  </td>\
              <td> Rs. ' + totalprice + '  </td>\
              <td> ' + description + '  </td>\
              <td> \
                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-measurement" onclick="' + func_view + '"><i class="fa fa-file-o"></i> Show </a>\
              </td>\
              <td style="color:blue; text-decoration: underline;"> ' + status + ' <br>\
                <a href="#" class="btn btn-info btn-xs" onclick="' + func_edit + '" data-toggle="modal" data-target=".bs-status" ><i class="fa fa-pencil"></i>Update Progress </a>\
              </td>\
              <td>\
                <a href="#" class="btn btn-success btn-xs" onclick="' + func_inv + '"><i class="fa fa-id-card-o" aria-hidden="true"></i> Get Card </a>\
                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-order" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#ordertable tbody").append(row);
        }
        $('#ordertable').DataTable()
      }
    });
  }

  function generateInvoice(ordid) { 
      $('#genInv')[0].reset();

      $("#ordid_inv").val(ordid);
      
      $('#genInv').submit();
      
      new PNotify({
        title: 'New Invoice',
        text: "Invoice "+data + "\'s payment is susscessfully added.",
        type: 'success',
        styling: 'bootstrap3'
      });
  }


  function updateOrder() {
    var check = $('#orderform')[0].checkValidity();
    if (check == true) {
      var id = $("#txtordid").val();
      var cusid = $("#txtcusid").val();
      var cusname = $("#txtcusname").val();
      var styleid = $("txtstyleid").val();
      var fitondate = $("#fdate").val();
      var deliverydate = $("#ddate").val();
      var price = $("#price").val();
      var discount = $("#discount").val();
      var description = $("#note").val();

      var Data = {
        cusid: cusid,
        cusname: cusname,
        styleid: styleid,
        fitondate: fitondate,
        deliverydate: deliverydate,
        price: price,
        discount: discount,
        description: description,
        id: id
      };

      $.ajax({
        url: "../server.php?c=OrderController&m=editOrder",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(data+ " Susscessfully added to the system");
          //adding measurement id
          new PNotify({
            title: 'Update Order',
            text: data + "Order is Susscessfully Updated",
            type: 'success',
            styling: 'bootstrap3'
          });

          $('#orderform')[0].reset()

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add Order");
        }
      });
    } else {
      $("#price").focus();
    }

  }

  // function addOrder(){
  //   var check = $('form')[0].checkValidity();
  //   if(check == true){
  //     var fname =$("#txtfname").val();
  //     var lname =$("#txtlname").val();
  //     var nic =$("#txtnic").val();
  //     var Pno =$("#txttel").val();
  //     var email =$("#txtemail").val();
  //     var address =$("#txtaddress").val();
  //     var category =$("#empcat").find('option:selected').val();
  //     var startdate =$("#txtsdate").val();
  //     var status =$("#empstat").find('option:selected').val();

  //     var empData={fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address,category:category,startdate:startdate,status:status};

  //     $.ajax({  
  //       url: "../server.php?c=OrderController&m=addOrder",  
  //       data: empData,
  //       type: "POST",
  //       dataType: "json",  
  //       success: function (data) {
  //         // alert(data+ " Susscessfully added to the system");

  //         new PNotify({
  //           title: 'New Order',
  //           text: data+ " Susscessfully added to the system",
  //           type: 'success',
  //           styling: 'bootstrap3'
  //         });

  //         loadOrderData();
  //         clearData();

  //       },  
  //       error: function (errormessage) {  
  //         alert(errormessage.responseText);
  //         alert("Unable to add Order");
  //       }
  //     });    
  //   }else{
  //     $("#txtfname").focus();
  //   } 

  // }


  function viewMeasurement(id, styleid) {
    var STYLE = [];
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=OrderController&m=getStyle',
      data: {
        'id': styleid
      },
      success: function(data) {
        var d = data[0];
        var stylid = d.stlid;
        var imgName = d.stlname;
        var uploaddate = d.uploaded;
        var description = d.stldesc;

        STYLE[stylid] = {
          'imgName': imgName,
          'description' : description
        }
        console.log(STYLE)
      },
      dataType: 'json',
    });
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=MeasurementController&m=getMeasurement',
      data: {
        'id': id
      },
      success: function(data) {
        // alert(data);
        var table = $('#measurementtable').DataTable();
        $("#measurementtable tbody").empty();
        var d = data[0];
        var id = d.measId;
        var cusid = d.cusid;
        var cusname = d.cusName;
        var item = d.item;
        var measurement = d.measurement;
        var details = d.moreDetails;

        var func_edit = 'getMeasurement(' + id + ')';
        var func_delete = 'deleteMeasurement(' + id + ')';

        row =
          '<tr>\
              <th>ID No</th>\
              <td>' + id + '</td>\
            </tr>\
            <tr>\
              <th>Customer Name</th>\
              <td>' + cusname + '</td>\
            </tr>\
            <tr>\
              <th>Item</th>\
              <td>' + item + '</td>\
            </tr>\
            <tr>\
              <th>Measurements</th>\
              <td>' + measurement + '</td>\
            </tr>\
            <tr>\
              <th>Details</th>\
              <td>' + details + '</td>\
            </tr>\
            <tr>\
              <th>Style</th>\
              <td>\
                <img src="style/'+ STYLE[styleid].imgName +'" alt="'+ STYLE[styleid].description +'" style="width: 250px;" />\
              </td>\
            </tr>\
            ';

        $("#measurementtable tbody").append(row);

      },
      dataType: 'json'
    });
  }

  function getOrder(id) {
    $('#progressform')[0].reset();
    $.ajax({
      type: "POST",
      url: '../server.php?c=OrderController&m=getOrder',
      data: {
        'id': id
      },
      success: function(data) {

        // alert(data);
        var d = data[0];
        var id = d.ordid;
        var cusid = d.cusid;
        var cusname = d.cusName;
        var styleid = d.styleId;
        var fitondate = d.fitonDate;
        var deliverydate = d.deliveryDate;
        var price = d.ordPrice;
        var discount = d.ordDiscount;
        var description = d.ordDescription;
        var progress = d.ordProgress;


        $("#txtordid").val(id);
        $("#txtordid1").val(id);
        $("#txtcusid").val(cusid);
        $("#txtcusname").val(cusname);
        $("#txtcusname1").val(cusname);
        $("#txtstyleid").val(styleid);
        $("#fdate").val(fitondate);
        $("#ddate").val(deliverydate);
        $("#price").val(price);
        $("#discount").val(discount);
        $("#note").val(description);
        $("#progress").val(progress);
      },
      dataType: 'json'
    });
  }

  //Add Order data Function   
  function updateProgress() {
    var check = $('#progressform')[0].checkValidity();
    if (check == true) {
      var ordid = $("#txtordid1").val();
      var progress = $("#progress").find('option:selected').val();

      var Data = {
        ordid: ordid,
        progress: progress
      };

      $.ajax({
        url: "../server.php?c=OrderController&m=editProgress",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(data+ " Susscessfully added to the system");
          //adding measurement id
          new PNotify({
            title: 'Progress',
            text: data + "Progress Susscessfully updated",
            type: 'success',
            styling: 'bootstrap3'
          });
          $('#progressform')[0].reset();
          setTimeout(function() {
            location.reload()
          }, 1500);

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add Order");
        }
      });
    } else {
      $("#progress").focus();
    }

  }

  function deleteOrder(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=OrderController&m=deleteOrder",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          loadOrderData();
          new PNotify({
            title: 'Deleted!',
            text: 'Order removed.',
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

  function deleteMeasurement(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=MeasurementController&m=deleteMeasurement",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          // loadMeasurementData();
          new PNotify({
            title: 'Deleted!',
            text: 'Measurement removed.',
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