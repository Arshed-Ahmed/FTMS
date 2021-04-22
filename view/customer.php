<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Customer Info</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="customerform" class="form-horizontal form-label-left" novalidate="">
              <p>Manage customer details</p>
              <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtfname">First Name <span class="required" style="color: red;">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="txtfname" class="form-control col-md-7 col-xs-12"  name="txtfname" placeholder="first name(s) e.g Jon" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlname">Last Name <!-- <span class="required">*</span> -->
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="txtlname" class="form-control col-md-7 col-xs-12" name="txtlname" placeholder="last name(s) e.g Doe" type="text">
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
                  <input type="email" id="txtemailcon" name="confirm_email" data-validate-linked="txtemail" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>                            
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <!-- <span class="required">*</span> -->
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="address" name="address" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
                  <button id="submit"  class="btn btn-success" onclick="addCustomer();">Save</button>
                  <button id="update" style="display: none;" class="btn btn-success" onclick="updateCustomer();">Update</button>
                </div>
              </div>
              <div class="ln_solid"></div>
            </form>

            <table id="customertable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Customer Name</th>
                  <th>NIC</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Address</th>
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
        $('#title').text('Customer');
        $('#breadcrumb').text('Customer');
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
              <td> '+tel+'  </td>\
              <td> '+email+'  </td>\
              <td> '+add+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
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


  // function viewCustomer(id){
  //   $.ajax({
  //     type: "POST",
  //     url: '../server.php?c=CustomerController&m=getCustomer',
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
  //             <th style="width:25%">Customer :</th>\
  //             <td> '+name+'</td>\
  //             <td> '+type+'  </td>\
  //             <td> '+status+'  </td>\
  //           </tr>\
  //           </tbody>';

  //         $("#CustomerInfoView").html(td);
  //       }
  //     },
  //   dataType: 'json'
  //   });
  // }

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
  } 

  //Add Customer data Function   
  function updateCustomer(){ 

    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#id").val();
      var fname =$("#txtfname").val();
      var lname =$("#txtlname").val();
      var nic =$("#txtnic").val();
      var tel =$("#txttel").val();
      var email =$("#txtemail").val();
      var add =$("#address").val(); 

      var Data={fname:fname,lname:lname,nic:nic,tel:tel,email:email,add:add,id:id};

      $.ajax({  
        url: "../server.php?c=CustomerController&m=editCustomer",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New Customer");
          new PNotify({
            title: 'Edit Customer',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadCustomerData();
          clearData();
          $("#submit").css("display","");
          $("#update").css("display","none");
        }  
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   //alert("Unable to add Customer");
        //   new PNotify({
        //     title: 'Edit Customer',
        //     text: data+ " Unable to Update Customer",
        //     type: 'warning',
        //     styling: 'bootstrap3'
        //   });
        // }
      }); 
    }else{
      $("#txtfname").focus();
    }
     
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