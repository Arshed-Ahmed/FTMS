<?php include_once("../incl/header.php");?>
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
						<table id="itempayrate" class="table table-striped table-bordered">
							<thead>
							    <tr>
									<th width="33%">Item</th>
									<th width="33%">Pay rate</th>
									<th>Option</th>
							    </tr>
							</thead>
							<tbody>
							    <tr>
									<td>t-Shirt</td>
									<td>Rs. 900</td>
									<td>
										<a href="#" class="btn btn-info btn-xs" onclick="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil"></i> Edit </a>
	                					<a href="#" class="btn btn-danger btn-xs" onclick=""><i class="fa fa-trash-o"></i> Delete </a>
									</td>
							    </tr>
							</tbody>
						</table>
						<a href="#" class="btn btn-success btn-xs" onclick="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add more </a>
					</div>

					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div id="formpanel" class="x_panel">
					                <!-- new customer -->
					                <div class="x_content">
										<div class="modal-header">
						            		<div class="x_title">
						                    	<h2>Enter Payrate Details</h2>
						                    	<div class="clearfix"></div>
						                	</div>
										</div>
										<div class="modal-body">
											<form id="customerform" class="form-horizontal form-label-left" novalidate="">
												<input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
												<div class="item form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtitem">Item <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input id="txtitem" class="form-control col-md-7 col-xs-12"  name="txtitem" placeholder="Shirt" required="required" type="text">
													</div>
												</div>
												<div class="item form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtrate">Rate <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input id="txtrate" class="form-control col-md-7 col-xs-12" name="txtrate" placeholder="00" required="required" type="text">
													</div>
												</div>
												<div class="ln_solid"></div>
												<div class="form-group">
													<div class="col-md-6 col-md-offset-3">
														<button id="btnrest" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
														<button id="submit" class="btn btn-success" onclick="addrate();">Save </button>
														<button id="update" style="display: none;" class="btn btn-success" onclick="selectrate();">Select</button>
													</div>
												</div>
												<div class="ln_solid"></div>
											</form>		
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearData();">Close</button>
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
  $(document).ready(function (){
        $('#title').text('Configuration');
        $('#breadcrumb').text('Pay rate');

    });

  //Load Payrate data function  
function loadPayrateData() {  
    // alert("ok");
    $.ajax({  
      url: '../server.php?c=PayrateController&m=getAllPayrate',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#payratetable').DataTable();
        $("#payratetable tbody").empty();
        table.destroy();
        for (i = 0; i < data.length; i++) {

          var id = data[i].tid;
          var fname = data[i].tFname;
          var lname = data[i].tLname;
          var nic = data[i].tNIC;
          var Pno = data[i].tPno;
          var email = data[i].tEmail;
          var address = data[i].tAddress;
          var startdate = data[i].tStartdate;
          var category = data[i].tcatId;
          var status = data[i].tstatus;

          var func_view = 'viewPayrate(' + id + ')';
          var func_edit = 'getPayrate(' + id + ')';
          var func_delete = 'deletePayrate(' + id + ')';

          row = 
          ' <tr>\
              <td> '+id+'  </td>\
              <td> '+fname+' '+lname+'</td>\
              <td> '+nic+'  </td>\
              <td> '+Pno+'  </td>\
              <td> '+email+'  </td>\
              <td> '+address+'  </td>\
              <td> '+status+'  </td>\
              <td>\
                <a href="#" class="btn btn-info btn-xs" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
                <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
              </td>';

          $("#payratetable tbody").append(row);
        }
        $('#payratetable').DataTable()
      }
    });  
}

function addPayrate(){
    var check = $('form')[0].checkValidity();
    if(check == true){
      var fname =$("#txtfname").val();
      var lname =$("#txtlname").val();
      var nic =$("#txtnic").val();
      var Pno =$("#txttel").val();
      var email =$("#txtemail").val();
      var address =$("#txtaddress").val();
      var startdate =$("#txtsdate").val();
      var category =$("#empcat").find('option:selected').val();
      var status =$("#empstat").find('option:selected').val();

      var empData={fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address,startdate:startdate,category:category,status:status};

      $.ajax({  
        url: "../server.php?c=PayrateController&m=addPayrate",  
        data: empData,
        type: "POST",
        dataType: "json",  
        success: function (data) {
          // alert(data+ " Susscessfully added to the system");
          
          new PNotify({
            title: 'New Payrate',
            text: data+ " Susscessfully added to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          
          loadPayrateData();
          clearData();

        },  
        error: function (errormessage) {  
          alert(errormessage.responseText);
          alert("Unable to add Payrate");
        }
      });    
    }else{
      $("#txtfname").focus();
    } 
    
}

function getPayrate(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Payrate");
    $.ajax({
      type: "POST",
      url: '../server.php?c=PayrateController&m=getPayrate',
      data: {'id':id},
      success:

      function(data){
        $('#payrateform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0]; 
        var id = d.tid;
        var fname = d.tFname;
        var lname = d.tLname;
        var nic = d.tNIC;
        var Pno = d.tPno;
        var email = d.tEmail;
        var address = d.tAddress;
        var startdate = d.tStartdate;
        var category = d.tcatId;
        var status = d.tstatus;

        $("#id").val(id);
        $("#txtfname").val(fname);
        $("#txtlname").val(lname);
        $("#txtnic").val(nic);
        $("#txttel").val(Pno);
        $("#txtemail").val(email);
        $("#txtaddress").val(address);
        $("#txtsdate").val(startdate);
        $("#empcat").val(category);
        $("#empstat").val(category);
      },
      dataType: 'json'
    });
} 

  //Add Payrate data Function   
function updatePayrate(){ 
    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#id").val();
      var fname =$("#txtfname").val();
      var lname =$("#txtlname").val();
      var nic =$("#txtnic").val();
      var Pno =$("#txttel").val();
      var email =$("#txtemail").val();
      var address =$("#txtaddress").val();
      var startdate =$("#txtsdate").val();
      var category =$("#empcat").find('option:selected').val();
      var status =$("#empstat").find('option:selected').val();

      var empData=
      {id:id,fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address,startdate:startdate,category:category,status:status};

      $.ajax({  
        url: "../server.php?c=PayrateController&m=editPayrate",  
        data: empData,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New Payrate");
          new PNotify({
            title: 'Edit Payrate',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadPayrateData();
          clearData();
          $("#submit").css("display","");
          $("#update").css("display","none");
        }  
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to Update Payrate");
        // }
      });  
    }else{
      $("#txtfname").focus();
    } 
} 

function deletePayrate(id) {  
    var ans = confirm("Are you sure you want to delete this Record?");

    if (ans) {  
      $.ajax({  
        url: "../server.php?c=PayrateController&m=deletePayrate",
        data: {'id':id},
        type: "POST",  
          // dataType: "json",  
          success: function (data) { 
          // alert('Deleted');
          loadPayrateData();
          new PNotify({
            title: 'Deleted!',
            text: 'Payrate removed.',
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
    $('input[type="email"]').val('');
    $('input[type="tel"]').val('');
    $('Select').val('');
    $("#submit").css("display","");
    $("#update").css("display","none");
    $('#payrateform')[0].reset();
    // setTimeout(function() {location.reload()},2400);
}

function Reload() {
    location.reload();
}
</script>