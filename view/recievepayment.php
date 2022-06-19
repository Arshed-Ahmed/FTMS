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
        <form id="rpform" class="form-horizontal form-label-left" novalidate="">
          <p>Manage recieving payments</p>
          <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ordid">Order Id<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ordid" class="form-control col-md-7 col-xs-12" name="ordid" placeholder="Order Id" required="required" type="text" list="ordList">
              <datalist id="ordList">
                <option value="something" >
              </datalist>
            </div>
          </div> -->

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ordid">Order Id<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="ordid" class="select2_single form-control" tabindex="-1" required="required" onchange="setPrice();">
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
              <input type="text" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12" onchange="Balance();" />
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtsalary">Balance <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="balance" name="balance" required="required" class="form-control col-md-7 col-xs-12" disabled>
            </div>
          </div>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="remarks" name="remarks" class="form-control col-md-7 col-xs-12"></textarea>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
              <button id="submit" class="btn btn-success" onclick="addRP();">Save</button>
              <button id="update" style="display: none;" class="btn btn-success" onclick="updateRP();">Update</button>
            </div>
          </div>
          <div class="ln_solid"></div>
        </form>

        <form id="genInv" method="post" name="invoice_pdf" action="report/invoice.php" target="_blank" class="invisible">
          <input id="payid_inv" name="payid_inv" type="text" class="invisible form-control col-md-7 col-xs-12">
          <input id="invid_inv" name="invid_inv" type="text" class="invisible form-control col-md-7 col-xs-12">
        </form>

        <table id="rptable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 9px">ID No</th>
              <th>Order</th>
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
    loadOrderData();
    loadRPData();
  });
  let order = [];
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

  function loadOrderData() {
		$.ajax({
      async: false,
			url: '../server.php?c=OrderController&m=getAllOrder',
			type: "POST",
			dataType: "json",
			success: function(data) { 
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
						var status = "Pending";
					} else {
						var status = "Finished";
					}

          order[id] = 'Order ID' + id + ' - ' + cusname;

					var orderSelect = '<option value="' + id + '">Order ID' + id + ' - ' + cusname + '</option>';
					$("#ordid").append(orderSelect);
					$("#amount").val();
				}
			}
		});
	}

  function setPrice(){
    var id = $('#ordid').find('option:selected').val();
    $.ajax({
      async: false,
			url: '../server.php?c=OrderController&m=getOrder',
			type: "POST",
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

        var totalprice = (parseInt(price))-(parseInt(discount));
        $('#amount').val(totalprice);

      },
			dataType: "json",
    });
  }

  //Load RP data function  
  function loadRPData() {
    // alert("ok");
    $.ajax({
      async: false,
      url: '../server.php?c=RPController&m=getAllRP',
      type: "POST",
      dataType: "json",
      success: function(data) {
        // alert(JSON.stringify(data));
        var table = $('#rptable').DataTable();
        $("#rptable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].payid;
          var ordid = data[i].ordid;
          var paydate = data[i].paydate;
          var payamount = data[i].payamount ;
          var paidamount = data[i].paidamount ;
          var paybalance = data[i].paybalance;
          var paytype = data[i].paytype;
          var remarks = data[i].remarks;
          var invoiceid = data[i].invid
          var invid;
          if ( invoiceid == 0) {
            invid = "Invoice not generated yet";
          } else {
            invid = data[i].invid;
          }

          var ordername = order[ordid];
          
          var func_invGen = 'invGen('+ id +','+ ordid +','+ invoiceid +')';
          var func_edit = 'getRP(' + id + ')';
          var func_delete = 'deleteRP(' + id + ')';

          row =
            ' <tr>\
              <td> ' + id + '  </td>\
              <td> ' + ordername + '</td>\
              <td> ' + paydate + '  </td>\
              <td> ' + payamount + '  </td>\
              <td> ' + paytype + '  </td>\
              <td> ' + paidamount + '  </td>\
              <td> ' + paybalance + '  </td>\
              <td> ' + invid + '  </td>\
              <td> ' + remarks + '  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="' + func_invGen + '"><i class="fa fa-paste"></i> Invoice </a>\
                <a href="#" class="btn btn-primary btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#rptable tbody").append(row);
        }
        $('#rptable').DataTable()
      }
    });
  }

  function addRP() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var ordid = $("#ordid").find('option:selected').val();
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
      var remarks = $("#remarks").val();

      var Data = {
        ordid: ordid,
        paydate: paydate,
        amount: amount,
        type: type,
        pamount: pamount,
        balance: balance,
        remarks: remarks
      };

      $.ajax({
        url: "../server.php?c=RPController&m=addRP",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) { 
          new PNotify({
            title: 'New Payment',
            text: "Order "+data + "\'s payment is susscessfully added.",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadRPData();
          clearData();

        },
        error: function(errormessage) {
          alert(errormessage.responseText);
          alert("Unable to add RP");
        }
      });
    } else {
      $("#txtfname").focus();
    }

  }

  function invGen(payid, ordid, invid) {
    if(invid != 0){
      generateInvoice(payid, invid);
      return;
    }
    var Data = {
      payid: payid,
      ordid: ordid
    };
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=RPController&m=addInvoice',
      data: Data,
      success: function(data) {
        let payid, id;
        for (i = 0; i < data.length; i++) {
          var d = data[0];
          id = d.invid;
          var ordid = d.ordid;
          payid = d.payid;
          var invdate = d.invdate;
        } 
        updateInvoice(payid, id);
      },
      dataType: 'json',
    });

  }

  function updateInvoice(payid, invid) {
    var Data = {
      payid: payid,
      invid: invid
    };
    $.ajax({
      async: false,
      type: "POST",
      url: '../server.php?c=RPController&m=updateInvoice',
      data:Data,
      dataType: 'json',
      success: function(data) {
        let paymid, id;
        for (i = 0; i < data.length; i++) {
          var d = data[0];
          id = d.invid;
          var ordid = d.ordid;
          paymid = d.payid;
          var invdate = d.invdate;
        } 
          new PNotify({
            title: 'New Invoice',
            text: "Invoice "+ data + "\'s payment is susscessfully added.",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadRPData();
          generateInvoice(paymid, id);
      },
      error: function(errormessage) {
        alert(errormessage.responseText);
        alert("Unable to add RP");
      },
    });
  }

  function generateInvoice(payid, invid) { 
    $('#genInv')[0].reset();

    $("#payid_inv").val(payid);
    $("#invid_inv").val(invid);
    
    $('#genInv').submit();
    new PNotify({
      title: 'New Invoice',
      text: "Invoice "+invid + "\'s payment is susscessfully added.",
      type: 'success',
      styling: 'bootstrap3'
    });
    setTimeout(function() {
      location.reload()
    }, 1500);
  }

  function getRP(id) {
    $.ajax({
      type: "POST",
      url: '../server.php?c=RPController&m=getRP',
      data: {
        'id': id
      },
      success: function(data) {
        $('#rpform')[0].reset();
        $("#submit").css("display", "none");
        $("#update").css("display", "");

        // alert(data);
        var d = data[0];
        var id = d.payid; 
        var ordid = d.ordid; 
        var paydate = d.paydate;
        var amount = d.payamount;
        var type = d.paytype;
        var pamount = d.paidamount;
        var balance = d.paybalance;
        var remarks = d.remarks;

        $("#id").val(id);
        $("#ordid").val(ordid);
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
        $("#remarks").val(remarks); 

        payType();
      },
      dataType: 'json'
    });
  }

  //Add RP data Function   
  function updateRP() {
    var check = $('form')[0].checkValidity();
    if (check == true) {
      var id = $("#id").val();
      var ordid = $("#ordid").find('option:selected').val();
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
      var remarks = $("#remarks").val();

      var Data = {
        id: id,
        ordid: ordid,
        paydate: paydate,
        amount: amount,
        type: type,
        pamount: pamount,
        balance: balance,
        remarks: remarks
      }; 

      $.ajax({
        url: "../server.php?c=RPController&m=editRP",
        data: Data,
        type: "POST",
        dataType: "json",
        success: function(data) {

          new PNotify({
            title: 'Edit Payment',
            text: "Order "+data + "\'s susscessfully Updated",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadRPData();
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

  function deleteRP(id) {
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=RPController&m=deleteRP",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          loadRPData();
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
    $('#rpform')[0].reset();
    setTimeout(function() {
      location.reload()
    }, 2400);
  }

  function Reload() {
    location.reload();
  }
</script>