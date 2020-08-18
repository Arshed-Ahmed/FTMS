<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Supplier Info</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="supplierform" class="form-horizontal form-label-left" novalidate="">
                <p>Manage Suppliers</p>
                <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                <div class="item form-group">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">Supplier Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtname" class="form-control col-md-7 col-xs-12" name="txtname" placeholder="Supplier name(s) e.g ESP Tailors" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtmname">Manager <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtmname" class="form-control col-md-7 col-xs-12" name="txtmname" placeholder="Manager name(s) e.g Joe" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtregno">Registration No <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="txtregno" class="form-control col-md-7 col-xs-12"name="txtregno" placeholder="123456789V" required="required" type="text">
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtaddress">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="txtaddress" required="required" name="txtaddress" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="reset" id="btnreset" type="" class="btn btn-primary" onclick="Reload();">Cancel</button>
                    <button id="submit" type="" class="btn btn-success" onclick="addSupplier();" >Save</button>
                    <button id="update" style="display: none;" class="btn btn-success" onclick="updateSupplier();">Update</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
              </form>

            <table id="suppliertable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Supplier Name</th>
                  <th>Manager Name</th>
                  <th>Address</th>
                  <th>Telephone</th>
                  <th>Email</th>
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
    $('#title').text('Supplier');
    $('#breadcrumb').text('Supplier');
    loadSupplierData();
  });
  //Load Supplier data function  
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

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+name+'</td>\
              <td> '+mname+'  </td>\
              <td> '+address+'  </td>\
              <td> '+Pno+'  </td>\
              <td> '+email+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#suppliertable tbody").append(row);
        }
      }
    });  
  }

  function addSupplier(){

    var check = $('form')[0].checkValidity();
    if(check == true){
      var name =$("#txtname").val();
      var mname =$("#txtmname").val();
      var regno =$("#txtregno").val();
      var Pno =$("#txttel").val();
      var email =$("#txtemail").val();
      var address =$("#txtaddress").val();

      var empData={name:name,mname:mname,regno:regno,Pno:Pno,email:email,address:address};

      $.ajax({  
        url: "../server.php?c=SupplierController&m=addSupplier",  
        data: empData,
        type: "POST",
        dataType: "json",  
        success: function (data) {
          
          new PNotify({
            title: 'New Supplier',
            text: data+ " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          
          loadSupplierData();
          clearData();

        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add Supplier");
        }
      });
    }else{
      $("#txtname").focus();
    }  
  }

  function viewSupplier(id){
    $.ajax({
      type: "POST",
      url: '../server.php?c=SupplierController&m=getSupplier',
      data: {'id':id},
      success:
      function (data){
        // alert(data);
        // var table = $('#tableView').DataTable();
        // $("#viewEmpInfo").empty();
        var td='';

        for (i = 0; i < data.length; i++) {
          var d=data[0];
          var id = d.supid;
          var name = d.supName;
          var mname = d.tsupMname;
          var regno = d.supRegno;
          var Pno = d.supPno;
          var email = d.supEmail;
          var address = d.supAddress;

          td+=
            '<tbody>\
            <tr>\
              <th style="width:25%">Supplier :</th>\
              <td> '+name+' </td>\
              <td> '+mname+'  </td>\
              <td> '+Pno+'  </td>\
              <td> '+email+'  </td>\
              <td> '+address+'  </td>\
            </tr>\
            </tbody>';

          $("#SupplierInfoView").html(td);
        }
      },
    dataType: 'json'
    });
  }

  function getSupplier(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Supplier");
    $.ajax({
      type: "POST",
      url: '../server.php?c=SupplierController&m=getSupplier',
      data: {'id':id},
      success:

      function(data){
        $('#supplierform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d.supid;
        var name = d.supName;
        var mname = d.supMname;
        var regno = d.supRegno;
        var Pno = d.supPno;
        var email = d.supEmail;
        var address = d.supAddress;

        $("#id").val(id);
        $("#txtname").val(name);
        $("#txtmname").val(mname);
        $("#txtregno").val(regno);
        $("#txttel").val(Pno);
        $("#txtemail").val(email);
        $("#txtaddress").val(address);
      },
      dataType: 'json'
    });
  } 

  //Add Supplier data Function   
  function updateSupplier(){ 

    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#id").val();
      var name =$("#txtname").val();
      var mname =$("#txtmname").val();
      var regno =$("#txtregno").val();
      var Pno =$("#txttel").val();
      var email =$("#txtemail").val();
      var address =$("#txtaddress").val();

      var empData=
      {id:id,name:name,mname:mname,regno:regno,Pno:Pno,email:email,address:address};

      $.ajax({  
        url: "../server.php?c=SupplierController&m=editSupplier",  
        data: empData,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          $("#home-tab").tab("show");
          $("#profile-tab").html("New Supplier");
          new PNotify({
            title: 'Edit Supplier',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadSupplierData();
          clearData();
          $("#submit").css("display","");
          $("#update").css("display","none");
        }  
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update Supplier");
        // }
      }); 
    }else{
      $("#txtname").focus();
    } 
     
  } 

  function deleteSupplier(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=SupplierController&m=deleteSupplier",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadSupplierData();
          new PNotify({
            title: 'Deleted!',
            text: 'Supplier removed.',
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
    $("#submit").css("display","");
    $("#update").css("display","none");
    $('#supplierform')[0].reset();
    setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
    location.reload();
  }

</script>