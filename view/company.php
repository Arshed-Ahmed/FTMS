<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
     	<div class="col-md-12">
     	  <div class="x_panel">
     	    <div class="x_title">
     	      <h2>ESP Tex and Tailors</h2>
     	      <ul class="nav navbar-right panel_toolbox">
     	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
     	        </li>.
     	      </ul>
     	      <div class="clearfix"></div>
     	    </div>
              <div class="x_content">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                         <img src="images/logo.jpg">
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                         <img src="images/Cover.png">
                    </div>

                    </div>
                    <div class="clearfix"></div>
              </div>
     	    <div class="x_content">
     	      <div class="col-md-12 col-sm-12 col-xs-12">

     	        <ul class="stats-overview">
     	          <li>
     	            <span class="name"> Estimated budget </span>
     	            <span class="value text-success"> Rs.2,000,000 </span>
     	          </li>
     	          <li>
     	            <span class="name"> Total Employees </span>
     	            <span class="value text-success"> 4 </span>
     	          </li>
     	          <li class="hidden-phone">
     	            <span class="name"> Estimated Orders </span>
     	            <span class="value text-success"> 15 per day </span>
     	          </li>
     	        </ul>
     	        <br />

     	        <div>
                    <form id="companyform" class="form-horizontal form-label-left" novalidate>
                        <p>Company Details</p>
                        <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">Company Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txtname" class="form-control col-md-7 col-xs-12" name="txtname" placeholder="Company name(s) e.g Fashion Tailors" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="address" required="required" name="address" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcity">City <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txtcity" class="form-control col-md-7 col-xs-12" name="txtcity" placeholder="City(s) e.g NewYork" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="regno">Register No <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="regno" class="form-control col-md-7 col-xs-12" name="regno" placeholder="Register No(s) e.g Rmf4YTD" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Logo <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="file" class="form-control col-md-7 col-xs-12" name="file" required="required">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtweb">Web Page </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="txtweb" class="form-control col-md-7 col-xs-12" name="txtweb" placeholder="Web page(s) e.g www.ft.com" type="text">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="reset" class="btn btn-primary" onclick="Reload();">Cancel</button>
                            <button id="submit" type="submit" class="btn btn-success" onclick="addCompany();">Save</button>
                            <button id="update" style="display: none;" class="btn btn-success" onclick="updateCompany();">Update</button>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                    </form>

                    <table id="companytable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID No</th>
                          <th>Company Name</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>Reg No</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Web Page</th>
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
</div>
<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function (){
        $('#title').text('Configuration');
        $('#breadcrumb').text('Company');
    });


function addCompany(){

    var check = $('form')[0].checkValidity();
    if(check == true){
        //image file
        var form_data = new FormData();
        var files = $('#file')[0].files[0];
        form_data.append("file",files);

        $.ajax({  
            url: "../server.php?c=CompanyController&m=addCompany",  
            data: form_data,
            type: "POST",
            contentType: false,
            processData: false,
            dataType: "json",  
            success: function (data) {
              // alert(data+ " Susscessfully added to the system");
              if(data == 0){
                new PNotify({
                    title: 'New Company',
                    text: data+ " file not uploaded",
                    type: 'warning',
                    styling: 'bootstrap3'
                });
              }
              
              //loadCustomerData();
              clearData();
            },  
            error: function (errormessage) {  
              alert(errormessage.responseText);
              alert("Unable to add Customer");
            }
        });


        var name =$("#txtname").val();
        var add =$("#address").val();
        var city =$("#txtcity").val();
        var regno =$("#regno").val();
        var tel =$("#txttel").val();
        var email =$("#txtemail").val();
        var web =$("#txtweb").val();

        var Data={name:name,add:add,city:city,regno:regno,tel:tel,email:email,web:web};

        $.ajax({  
            url: "../server.php?c=CompanyController&m=addCompany",  
            data: Data,
            type: "POST",
            dataType: "json",  
            success: function (data) {
              // alert(data+ " Susscessfully added to the system");
              new PNotify({
                title: 'New Company',
                text: data+ " Susscessfully added to the system",
                type: 'success',
                styling: 'bootstrap3'
              });
              
              //loadCustomerData();
              clearData();


            },  
            error: function (errormessage) {  
              alert(errormessage.responseText);
              alert("Unable to add Customer");
            }
        });
    }else{
      $("#txtname").focus();
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
}

</script>