<?php include_once("../incl/header.php"); ?>
<!-- page content -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Payrate Info</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <p>Pay rates for every item sewed or stiched</p>
          <table id="payratetable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Item</th>
                <th>Pay rate</th>
                <th>Price rate</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          <a href="#" class="btn btn-success btn-xs" onclick="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add more </a>
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div id="formpanel" class="x_panel" style="border-radius: 10px;">
                <!-- new customer -->
                <div class="x_content">
                  <div class="modal-header">
                    <div class="x_title">
                      <h2>Enter Payrate Details</h2>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="modal-body">
                    <form id="payrateform" class="form-horizontal form-label-left" novalidate="">
                      <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtitem">Item <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txtitem" class="form-control col-md-7 col-xs-12" name="txtitem" placeholder="Eg: Shirt" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtrate">Pay Rate <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txtrate" class="form-control col-md-7 col-xs-12" name="txtrate" placeholder="00.00" required="required" type="number">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtprice">Price Rate <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txtprice" class="form-control col-md-7 col-xs-12" name="txtprice" placeholder="00.00" required="required" type="number">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="btnrest" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
                          <button id="submit" class="btn btn-success" onclick="addPayrate();">Save </button>
                          <button id="update" style="display: none;" class="btn btn-success" onclick="updatePayrate();">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Reload();">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    $('#title').text('Configuration');
    $('#breadcrumb').text('Pay rate');
    loadPayrateData();
  });

  //Load Payrate data function  
  function loadPayrateData() {
    // alert("ok");
    $.ajax({
      url: '../server.php?c=PayrateController&m=getAllPayrate',
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#payratetable').DataTable();
        $("#payratetable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].payrId;
          var item = data[i].payrItem;
          var rate = data[i].payRate;
          var price = data[i].priceRate;

          var func_edit = 'getPayrate(' + id + ')';
          var func_delete = 'deletePayrate(' + id + ')';

          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ' + item + '</td>\
              <td> ' + rate + '</td>\
              <td> ' + price + '</td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#payratetable tbody").append(row);
        }
        $('#payratetable').DataTable()
      }
    });
  }

  function addPayrate() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var item = $("#txtitem").val();
      var rate = $("#txtrate").val();
      var price = $("#txtprice").val();

      var empData = {
        item: item,
        rate: rate,
        price: price,
      };

      $.ajax({
        url: "../server.php?c=PayrateController&m=addPayrate",
        data: empData,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert(data+ " Susscessfully added to the system");

          new PNotify({
            title: 'New Payrate',
            text: "Pay Rate Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });

          loadPayrateData();
          clearData();

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add Payrate");
        }
      });
    } else {
      $("#txtitem").focus();
    }

  }

  function getPayrate(id) {
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Payrate");
    $.ajax({
      type: "POST",
      url: '../server.php?c=PayrateController&m=getPayrate',
      data: {
        'id': id
      },
      success:

        function(data) {
          $('#payrateform')[0].reset();
          $("#submit").css("display", "none");
          $("#update").css("display", "");

          // alert(data);
          var d = data[0];
          var id = d.payrId;
          var item = d.payrItem;
          var rate = d.payRate;
          var price = d.priceRate;

          $("#id").val(id);
          $("#txtitem").val(item);
          $("#txtrate").val(rate);
          $("#txtprice").val(price);
        },
      dataType: 'json'
    });
  }

  //Add Payrate data Function   
  function updatePayrate() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var id = $("#id").val();
      var item = $("#txtitem").val();
      var rate = $("#txtrate").val();
      var price = $("#txtprice").val();

      var empData = {
        id: id,
        item: item,
        rate: rate,
        price: price,
      };

      $.ajax({
        url: "../server.php?c=PayrateController&m=editPayrate",
        data: empData,
        type: "POST",
        dataType: "json",
        success: function(data) {
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New Payrate");
          new PNotify({
            title: 'Edit Payrate',
            text: "Payrate Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadPayrateData();
          clearData();
          $("#submit").css("display", "");
          $("#update").css("display", "none");
        }
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update Payrate");
        // }
      });
    } else {
      $("#txtitem").focus();
    }
  }

  function deletePayrate(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=PayrateController&m=deletePayrate",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          loadPayrateData();
          new PNotify({
            title: 'Deleted!',
            text: 'Payrate removed.',
            type: 'error',
            styling: 'bootstrap3'
          });

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
        }
      });
    }
  }


  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="number"]').val('');
    $("#submit").css("display", "");
    $("#update").css("display", "none");
    $('#payrateform')[0].reset();
    // setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
    location.reload();
  }
</script>