<?php include_once("../incl/header.php"); ?>

<!-- page content -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Payment Info</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <form id="makepform" class="form-horizontal form-label-left" novalidate="">
          <p>Manage making (made) payments</p>
          <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poid">Purchase Order Id<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="poid" class="form-control col-md-7 col-xs-12" name="poid" placeholder="Purchase Order Id" required="required" type="text" list="ordList">
              <datalist id="ordList">
                <option value="something" >
              </datalist>
            </div>
          </div> -->

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poid">Purchase Order Id<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="poid" class="select2_single form-control" tabindex="-1" required="required" >
                <option value="">Select an option</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paydate">Date <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <div class="input-group date" id="myDatepicker2">
                  <input id="paydate" name="paydate" type="text" class="form-control" required="required">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <!-- payment amount/price  -->
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtsalary">Payment Amount <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12" onchange="Balance();" >
            </div>
          </div>
          
          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paytype">Payment Type <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="paytype" class="select2_single form-control" tabindex="-1" required="required" onchange="payType();">
                <option value="">Select an option</option>
                <option value="cash">Cash</option>
                <option value="credit">Credit Card</option>
                <option value="check">Check</option>
              </select>
            </div>
          </div> -->

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paytype">Payment Type <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="control-label col-md-3 col-sm-3 col-xs-9" for="paytype">Cash  </label>
              <input type="radio" id="cashcheck" name="paytype" value="cash" onchange="payType();" class="col-md-1 col-xs-1" style="margin-top: 10px;">
              <label class="control-label col-md-3 col-sm-3 col-xs-9" for="paytype">Credit Card  </label>
              <input type="radio" id="creditcheck" name="paytype" value="credit" onchange="payType();" class="col-md-1 col-xs-1" style="margin-top: 10px;">
              <label class="control-label col-md-3 col-sm-3 col-xs-9" for="paytype">Check  </label>
              <input type="radio" id="checkcheck" name="paytype" value="check" onchange="payType();" class="col-md-1 col-xs-1" style="margin-top: 10px;">
            </div>
          </div>
          <!-- Cash -->
          <div class="item form-group" id="cash" style="display: none;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paycash">Cash
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="amountcash">Amount <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="amountcash" name="amountcash" class="form-control cash col-md-7 col-xs-12" onchange="Balance();" >
                </div>
              </div>
            </div>
          </div>
          <!-- Credit Card -->
          <div class="item form-group" id="credit" style="display: none;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paycash">Credit Card <span class="required">Not Implemented</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="cardname">Card Name <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="cardname" name="cardname" placeholder="John Doe" class="form-control credit col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="cardno">Card No <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="cardno" name="cardno" class="form-control credit col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-6" for="date">Exp Date <span class="required">*</span></label>
                <div class="col-md-3 col-sm-3 col-xs-9">
                  <input type="number" max="12" min="1" id="creditdatemonth" name="creditdatemonth" placeholder="mm" class="form-control credit col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-9">
                  <input type="number" max="2030" min="2022" id="creditdateyear" name="creditdateyear" placeholder="yyyy" class="form-control credit col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-6" for="secno">Secret No <span class="required">*</span></label>
                <div class="col-md-4 col-sm-4 col-xs-7">
                  <input type="text" id="secno" name="secno" placeholder="xxx" class="form-control credit col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="amountcredit">Amount <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="amountcredit" name="amountcredit" class="form-control credit col-md-7 col-xs-12" onchange="Balance();" >
                </div>
              </div>
            </div>
          </div>
          <!-- Check -->
          <div class="item form-group" id="check" style="display: none;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paycash">Check <span class="required">Not Implemented</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="accname">Account Name <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="accname" name="accname" placeholder="John Doe" class="form-control check col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="checkno">Check No <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="checkno" name="checkno" class="form-control check col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-6" for="checkdate">Date <span class="required">*</span></label>
                <div class="col-md-3 col-sm-3 col-xs-9">
                  <input type="number" max="31" min="1" id="checkdateday" name="checkdateday" placeholder="dd" class="form-control check col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-9">
                  <input type="number" max="12" min="1" id="checkdatemonth" name="checkdatemonth" placeholder="mm" class="form-control check col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-9">
                  <input type="number" max="2030" min="2022" id="checkdateyear" name="checkdateyear" placeholder="yyyy" class="form-control check col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-6" for="nicno">NIC No <span class="required">*</span></label>
                <div class="col-md-4 col-sm-4 col-xs-7">
                  <input type="text" id="nicno" name="nicno" placeholder="xxx" class="form-control check col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group" >
                <label class="control-label  col-lg-3 col-md-3 col-sm-3 col-xs-9" for="amountcheck">Amount <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="amountcheck" name="amountcheck" class="form-control check col-md-7 col-xs-12" onchange="Balance();" >
                </div>
              </div>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invid">Invoice Id # <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="invid" name="invid" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtsalary">Balance <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="balance" name="balance" required="required" class="form-control col-md-7 col-xs-12" disabled>
            </div>
          </div>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="remarks" required="required" name="remarks" class="form-control col-md-7 col-xs-12"></textarea>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
              <button id="submit" class="btn btn-success" onclick="addMakeP();">Save</button>
              <button id="update" style="display: none;" class="btn btn-success" onclick="updateMakeP();">Update</button>
            </div>
          </div>
          <div class="ln_solid"></div>
        </form>

        <table id="makeptable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 9px">ID No</th>
              <th>Purchase Order</th>
              <th>Date</th>
              <th>Payment Amount</th>
              <th>Type</th>
              <th>Paid Amount</th>
              <th>Balance</th>
              <th>Invoice Id</th>
              <th>Remarks</th>
              <th>Options</th>
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
  $(document).ready(function() {
    $('#title').text('Payments');
    $('#breadcrumb').text('Payments');
    loadPOData();
    loadMakePData();
  });
  let porder = [];
  function payType(){
    // var type = $('#paytype').find('option:selected').val();
    var type = document.querySelector('input[name="paytype"]:checked').value;
    console.log(type);
    if (type == "cash"){
       document.getElementById("cash").style.display = "block";
       document.getElementById("credit").style.display = "none";
       document.getElementById("check").style.display = "none";
       $('input.form-control.credit').val('');
       $('input.form-control.check').val('');
       $('input#amountcredit').val(0);
       $('input#amountcheck').val(0);
       var ele = document.getElementsByClassName("cash");
       for(var i = 0; i < ele.length; i++) {
        ele[i].setAttribute("required", "required");
       }
       $(".credit").removeAttr("required");
       $(".check").removeAttr("required");
    } else if (type == "credit"){
       document.getElementById("cash").style.display = "none";
       document.getElementById("credit").style.display = "block";
       document.getElementById("check").style.display = "none";
       $('input.form-control.cash').val('');
       $('input.form-control.check').val('');
       $('input#amountcash').val(0);
       $('input#amountcheck').val(0);
       var ele = document.getElementsByClassName("credit");
       for(var i = 0; i < ele.length; i++) {
        ele[i].setAttribute("required", "required");
       }
       $(".cash").removeAttr("required");
       $(".check").removeAttr("required");
    } else if (type == "check"){
       document.getElementById("cash").style.display = "none";
       document.getElementById("credit").style.display = "none";
       document.getElementById("check").style.display = "block";
       $('input.form-control.credit').val('');
       $('input.form-control.cash').val('');
       $('input#amountcash').val(0);
       $('input#amountcredit').val(0);
       var ele = document.getElementsByClassName("check");
       for(var i = 0; i < ele.length; i++) {
        ele[i].setAttribute("required", "required");
       }
       $(".cash").removeAttr("required");
       $(".credit").removeAttr("required");
    }
  }

  function Balance(){
    var type = document.querySelector('input[name="paytype"]:checked').value;
    var pamount;
    if (type == "cash"){
      pamount = $("#amountcash").val();
    } else if (type == "credit"){
      pamount = $("#amountcredit").val();
    } else if (type == "check"){
      pamount = $("#amountcheck").val();
    }
    var amount = $('#amount').val();
    if(parseInt(pamount) == NaN ||  parseInt(amount) == NaN){ return;}
    var balance = parseInt(pamount) - parseInt(amount);
    $('#balance').val(balance);
  }
  
  function loadPOData() {
    var supplier = [];
    $.ajax({  
      async: false,
      url: '../server.php?c=SupplierController&m=getAllSupplier',
      type: "POST",  
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

		$.ajax({
      async: false,
			url: '../server.php?c=POController&m=getAllPO',
			type: "POST",
			dataType: "json",
			success: function(data) { 
				for (i = 0; i < data.length; i++) {
					var id = data[i].poid;
          var itid = data[i].itid;
          var quan = data[i].poQuantity;
          var podate = data[i].poDate;
          var supid = data[i].supid;

          var supname = supplier[supid];

          porder[id] = 'Purchase Order ID ' + id + ' from ' + supname;
          

					var porderSelect = '<option value="' + id + '">Purchase Order ID ' + id + ' from ' + supname + '</option>';
					$("#poid").append(porderSelect);
				}
			}
		});
	}

  //Load MakeP data function  
  function loadMakePData() {
    // alert("ok");
    $.ajax({
      async: false,
      url: '../server.php?c=MakePController&m=getAllMakeP',
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#makeptable').DataTable();
        $("#makeptable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].payid;
          var poid = data[i].poid;
          var paydate = data[i].paydate;
          var payamount = data[i].payamount ;
          var paidamount = data[i].paidamount ;
          var paybalance = data[i].paybalance;
          var paytype = data[i].paytype;
          var remarks = data[i].remarks;
          var invid = invid = data[i].invid;

          var ordername = porder[poid];
          
          var func_edit = 'getMakeP(' + id + ')';
          var func_delete = 'deleteMakeP(' + id + ')';

          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ' + ordername + '</td>\
              <td> ' + paydate + '  </td>\
              <td> ' + payamount + '  </td>\
              <td> ' + paidamount + '  </td>\
              <td> ' + paybalance + '  </td>\
              <td> ' + paytype + '  </td>\
              <td> ' + invid + '  </td>\
              <td> ' + remarks + '  </td>\
              <td>\
                <a href="#" class="btn btn-primary btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#makeptable tbody").append(row);
        }
        $('#makeptable').DataTable()
      }
    });
  }

  function addMakeP() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var poid = $("#poid").find('option:selected').val();
      var paydate = $("#paydate").val();
      var amount = $("#amount").val();
      var type = document.querySelector('input[name="paytype"]:checked').value;
      var pamount;
      if (type == "cash"){
        pamount = $("#amountcash").val();
      } else if (type == "credit"){
        pamount = $("#amountcredit").val();
      } else if (type == "check"){
        pamount = $("#amountcheck").val();
      }
      var invid = $("#invid").val();
      var balance = $("#balance").val();
      var remarks = $("#remarks").val();

      var Data = {
        poid: poid,
        paydate: paydate,
        amount: amount,
        type: type,
        pamount: pamount,
        invid : invid,
        balance: balance,
        remarks: remarks
      };

      $.ajax({
        url: "../server.php?c=MakePController&m=addMakeP",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) { 
          new PNotify({
            title: 'New Payment',
            text: "Purchase Order "+data + "\'s payment is susscessfully added.",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadMakePData();
          clearData();

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add payment");
        }
      });
    } else {
      $("#txtfname").focus();
    }

  }


  function getMakeP(id) {
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Payment");
    $.ajax({
      type: "POST",
      url: '../server.php?c=MakePController&m=getMakeP',
      data: {
        'id': id
      },
      success: function(data) {
        $('#makepform')[0].reset();
        $("#submit").css("display", "none");
        $("#update").css("display", "");

        // alert(data);
        var d = data[0];
        var id = d.payid; 
        var poid = d.poid; 
        var paydate = d.paydate;
        var amount = d.payamount;
        var type = d.paytype;
        var pamount = d.paidamount;
        var balance = d.paybalance;
        var invid = d.invid;
        var remarks = d.remarks;

        $("#id").val(id);
        $("#poid").val(poid);
        $("#paydate").val(paydate);
        $("#amount").val(amount);
        if(type == "cash"){
          document.getElementById("cashcheck").setAttribute("checked", "checked");
          $("#amountcash").val(pamount);
        } else if(type == "credit"){
          document.getElementById("creditcheck").setAttribute("checked", "checked");
          $("#amountcredit").val(pamount);
        } else if(type == "check"){
          document.getElementById("checkcheck").setAttribute("checked", "checked");
          $("#amountcheck").val(pamount);
        } 
        $("#balance").val(balance);
        $("#invid").val(invid);
        $("#remarks").val(remarks); 

        payType
      },
      dataType: 'json'
    });
  }

  //Add MakeP data Function   
  function updateMakeP() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var id = $("#id").val();
      var poid = $("#poid").find('option:selected').val();
      var paydate = $("#paydate").val();
      var amount = $("#amount").val();
      var type = document.querySelector('input[name="paytype"]:checked').value;
      var pamount;
      if (type == "cash"){
        pamount = $("#amountcash").val();
      } else if (type == "credit"){
        pamount = $("#amountcredit").val();
      } else if (type == "check"){
        pamount = $("#amountcheck").val();
      }
      var balance = $("#balance").val();
      var invid = $("#invid").val();
      var remarks = $("#remarks").val();

      var Data = {
        id: id,
        poid: poid,
        paydate: paydate,
        amount: amount,
        type: type,
        pamount: pamount,
        balance: balance,
        invid: invid,
        remarks: remarks
      }; 

      $.ajax({
        url: "../server.php?c=MakePController&m=editMakeP",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) {

          new PNotify({
            title: 'Edit Payment',
            text: "Purchase Order "+data + "\'s susscessfully Updated",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadMakePData();
          clearData();
          $("#submit").css("display", "");
          $("#update").css("display", "none");
        }
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update Payment");
        // }
      });
    } else {
      $("#txtfname").focus();
    }

  }

  function deleteMakeP(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=MakePController&m=deleteMakeP",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          loadMakePData();
          new PNotify({
            title: 'Deleted!',
            text: 'Payment removed.',
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


  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="email"]').val('');
    $('input[type="tel"]').val('');
    $('Select').val('');
    $("#submit").css("display", "");
    $("#update").css("display", "none");
    $('#makepform')[0].reset();
    setTimeout(function() {
      location.reload()
    }, 2400);
  }

  function Reload() {
    location.reload();
  }
</script>