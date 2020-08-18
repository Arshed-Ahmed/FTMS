<?php include_once("../incl/header.php");?>
<!-- page content -->
    <div class="clearfix"></div>
    <div class="row">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="tailormade.php" id="home-tab" role="tab" >Tailormade</a>
          </li>
          <li role="presentation" class=""><a href="hire.php" role="tab" id="profile-tab" >Hire</a>
          </li>
          <li role="presentation" class=""><a href="readymade.php" role="tab" id="profile-tab2" >Readymade</a>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <div class="x_panel">

              <!-- Smart Wizard -->
              <div id="wizard" class="form_wizard wizard_horizontal">
                <ul class="wizard_steps">
                  <li>
                    <a href="#step-1">
                      <span class="step_no">1</span>
                      <span class="step_descr">
                          Step 1<br />
                          <small>Customer Details</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-2">
                      <span class="step_no">2</span>
                      <span class="step_descr">
                          Step 2<br />
                          <small>Select Style</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-3">
                      <span class="step_no">3</span>
                      <span class="step_descr">
                          Step 3<br />
                          <small>Measurement Details</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#step-4">
                      <span class="step_no">4</span>
                      <span class="step_descr">
                          Step 4<br />
                          <small>Order Details</small>
                      </span>
                    </a>
                  </li>
                </ul>
                <div id="step-1">
                  <div class="x_title">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <h2>Add or Select the customer</h2>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">  <span><i class="fa fa-plus"></i></span>   New Customer</button>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- old customer -->
                    <table id="customertable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID No</th>
                        <th>Customer Name</th>
                        <th>NIC</th>
                        <th>Email</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    </table>

                    <!-- modals -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div id="formpanel" class="x_panel">
                              <!-- new customer -->
                              <div class="x_content">
                                <div class="modal-header">
                                  <div class="x_title">
                                    <h2>Enter Customer details</h2>
                                    <div class="clearfix"></div>
                                  </div>  
                                </div>
                                <div class="modal-body">
                                  <form id="customerform" class="form-horizontal form-label-left" novalidate="">
                                    <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtfname">First Name <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="txtfname" class="form-control col-md-7 col-xs-12"  name="txtfname" placeholder="first name(s) e.g Jon" required="required" type="text">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlname">Last Name <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="txtlname" class="form-control col-md-7 col-xs-12" name="txtlname" placeholder="last name(s) e.g Doe" required="required" type="text">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtnic">NIC <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="txtnic" class="form-control col-md-7 col-xs-12" name="txtnic" placeholder="123456789V" required="required" type="text">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttel">Telephone <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="tel" id="txttel" name="txttel" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail">Email <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="txtemail" name="txtemail" required="required" class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemailcon">Confirm Email <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="txtemailcon" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>                            
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtaddress">Address <!-- <span class="required">*</span> -->
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="address"  name="address" class="form-control col-md-7 col-xs-12"></textarea>
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-md-offset-3">
                                        <button id="btnrest" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
                                        <button id="submit" class="btn btn-success" onclick="addCustomer();">Save and Select</button>
                                        <button id="update" style="display: none;" class="btn btn-success" onclick="selectEmployee();">Select</button>
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                  </form>   
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="step-2">
                </div>
                <div id="step-3">
                </div>
                <div id="step-4">
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
    $(document).ready(function (){
    $('#title').text('New Order');
    $('#breadcrumb').text('Create Tailormade Order');
    loadCustomerData();
  });

  //Load Customer data function  
  function loadCustomerData() {
    $.ajax({  
      url: '../server.php?c=CustomerController&m=getAllCustomer',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#customertable').DataTable();
        $("#customertable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].cusid;
          var fname = data[i].cusFname;
          var lname = data[i].cusLname;
          var nic = data[i].cusNIC;
          var tel = data[i].cusPno;
          var email = data[i].cusEmail;
          var add = data[i].cusAddress;

          var func_view = 'viewCustomer(' + id + ')';
          var func_edit = 'getCustomer(' + id + ')';
          var func_delete = 'deleteCustomer(' + id + ')';

          row = 
          ' <tr>\
          <td> '+id+'  </td>\
          <td> '+fname+' '+lname+' </td>\
          <td> '+nic+'  </td>\
          <td> '+email+'  </td>\
          <td>\
          <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Choose </a>\
          <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
          </td>';

          $("#customertable tbody").append(row);
        }
        $('#customertable').DataTable();
      }
    });
  }

  function addCustomer(){

    var check = $('form')[0].checkValidity();
    if(check == true){
      var fname =$("#txtfname").val();
      var lname =$("#txtlname").val();
      var nic =$("#txtnic").val();
      var tel =$("#txttel").val();
      var email =$("#txtemail").val();
      var add =$("#address").val();

      var Data={fname:fname,lname:lname,nic:nic,tel:tel,email:email,add:add};

      $.ajax({  
        url: "../server.php?c=CustomerController&m=addCustomer",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {
          // alert(data+ " Susscessfully added to the system");
          new PNotify({
            title: 'New Customer',
            text: data+ " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          
          loadCustomerData();
          clearData();


        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add Customer");
        }
      });
    }else{
      $("#txtfname").focus();
    }
  }

  function getCustomer(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Customer");
    $.ajax({
      type: "POST",
      url: '../server.php?c=CustomerController&m=getCustomer',
      data: {'id':id},
      success:

      function(data){
        $('#customerform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0];
        var id = d.cusid;
        var fname = d.cusFname;
        var lname = d.cusLname;
        var nic = d.cusNIC;
        var tel = d.cusPno;
        var email = d.cusEmail;
        var add = d.cusAddress;

        $("#id").val(id);
        $("#txtfname").val(fname);
        $("#txtlname").val(lname);
        $("#txtnic").val(nic);
        $("#txttel").val(tel);
        $("#txtemail").val(email);
        $("#address").val(add);
      },
      dataType: 'json'
    });
    document.getElementById("formpanel").focus();
    $("#txtfname").focus();
  } 

  function deleteCustomer(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=CustomerController&m=deleteCustomer",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadCustomerData();
          new PNotify({
            title: 'Deleted!',
            text: 'Customer removed.',
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
    $('#customerform')[0].reset();
    setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
    location.reload();
    $("#txtfname").focus();
  }
      
  </script>