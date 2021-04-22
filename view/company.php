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
                     <img src="images/logo.png">
                     <form>
                        <div class="item form-group">
                          <button id="submit" type="submit" class="btn btn-success" onclick="addLogo();">Change Logo</button>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="file" class="form-control col-md-7 col-xs-12" name="file" required="required">
                          </div>
                        </div>
                     </form>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                     <img src="images/Cover.png">
                </div>

                </div>
                <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
     	    <div class="x_content">
     	      <div class="col-md-12 col-sm-12 col-xs-12">

     	        <ul class="stats-overview">
     	          <li>
     	            <span class="name"> Estimated budget </span>
     	            <span class="value text-success"> Rs.<span id="budget"> </span> </span>
     	          </li>
     	          <li>
     	            <span class="name"> Total Employees </span>
     	            <span id="emp" class="value text-success"> </span>
     	          </li>
     	          <li class="hidden-phone">
     	            <span class="name"> Estimated Orders </span>
     	            <span class="value text-success"> <span id="orders"> </span> per day </span>
     	          </li>
     	        </ul>
     	        <br />
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Company Details <small>basic details</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <!-- <li data-toggle="tooltip" data-placement="bottom" title="Add"><a href="#" role="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></a>
                    </li> -->
                    <li><a><i class="fa fa-chevron-up"></i></a>
                      </li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Edit">
                      <a href="#" role="button" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="getCompany('1');"><i class="fa fa-wrench"></i></a>
                    </li>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" onclick="clearData();" ><span data-toggle="tooltip" data-placement="bottom" title="Close" aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Company details</h4>
                          </div>
                          <div class="modal-body">
                            <form id="companyform" class="form-horizontal form-label-left" novalidate>
                              <input type="text" id="txtid" name="txtid" class="invisible form-control col-md-7 col-xs-12">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtregno">Register No <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="txtregno" class="form-control col-md-7 col-xs-12" name="txtregno" placeholder="Register No(s) e.g Rmf4YTD" required="required" type="text">
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
                              <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtbudget">Estimated Budget </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="txtbudget" class="form-control col-md-7 col-xs-12" name="txtbudget" placeholder="e.g 2,000,000 (without Rs.)" type="text">
                                  </div>
                              </div>
                              <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemp">No of Employees </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="txtemp" class="form-control col-md-7 col-xs-12" name="txtemp" placeholder="0-10,000" type="text">
                                  </div>
                              </div>
                              <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtorders">Estimated Orders per day </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="txtorders" class="form-control col-md-7 col-xs-12" name="txtorders" placeholder="0-10,000" type="text">
                                  </div>
                              </div>
                            
                              <!-- <div class="ln_solid"></div> -->
                              <div class="modal-footer">
                                <div class="col-md-6 col-md-offset-3">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearData();">Close</button>
                                  <button id="btnreset" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
                                  <!-- <button id="submit"  class="btn btn-success" onclick="addCompany();">Save</button> -->
                                  <button id="update" style="display: none;" class="btn btn-success" onclick="updateCompany();">Update</
                                </div>
                              </div><br>
                              <div class="ln_solid"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="companytable" class="table">
                      <tr>
                        <th>#Id</th>
                        <td>:</td>
                        <td id="Id"></td>
                      </tr>
                      <tr>
                        <th width="20%">Company Name</th>
                        <td width="2%">:</td>
                        <td id="name"></td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td>:</td>
                        <td id="add"></td>
                      </tr>
                      <tr>
                        <th>City</th>
                        <td>:</td>
                        <td id="city"></td>
                      </tr>
                      <tr>
                        <th>Reg No</th>
                        <td>:</td>
                        <td id="regno"></td>
                      </tr>
                      <tr>
                        <th>Telephone</th>
                        <td>:</td>
                        <td id="tel"></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td id="email"></td>
                      </tr>
                      <tr>
                        <th>Web Page</th>
                        <td>:</td>
                        <td id="web"></td>
                      </tr>
                      <tr>
                        <th></th>
                        <td></td>
                        <td><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="getCompany('1');"><i class="fa fa-pencil"></i> Edit </a></td>
                      </tr>
                  </table>

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
        $('#breadcrumb').text('Company');
        loadCompanyData();
    });


//Load Company data function  
  function loadCompanyData() {
    $.ajax({  
      url: '../server.php?c=CompanyController&m=getAllCompany',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // // alert(JSON.stringify(data));
        // var table = $('#companytable').table();
        // $("#companytable td").empty();
        for (i = 0; i < data.length; i++) {

          var id = data[i].comId;
          var name = data[i].comName;
          var add = data[i].comAddress;
          var city = data[i].comCity;
          var regno = data[i].comRegNo;
          var logo = data[i].comLogo;
          var tel = data[i].comTel;
          var email = data[i].comEmail;
          var web = data[i].comWeb;
          var budget = data[i].budget;
          var emp = data[i].employees;
          var orders = data[i].orders;
        }
        document.getElementById("Id").innerHTML= id.toString();
        document.getElementById("name").innerHTML= name;
        document.getElementById("add").innerHTML= add;
        document.getElementById("city").innerHTML= city;
        document.getElementById("regno").innerHTML= regno;
        document.getElementById("tel").innerHTML= tel;
        document.getElementById("email").innerHTML= email;
        document.getElementById("web").innerHTML= web;
        document.getElementById("budget").innerHTML= budget;
        document.getElementById("emp").innerHTML= emp;
        document.getElementById("orders").innerHTML= orders;
      }
    });  
  }

  function addLogo(){
    var check = $('form')[0].checkValidity();
    if(check == true){
      //image file
      var fd = new FormData();
      var files = $('#file')[0].files;
      fd.append("file",files[0]);

      $.ajax({  
        url: "../server.php?c=CompanyController&m=addLogo",  
        data: fd,
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
          loadCompanyData();
          clearData();
        }  
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to add Company");
        // }
      });
    }else{
      $("#file").focus();
    }
  }

  // function addCompany(){

  //   var check = $('form')[0].checkValidity();
  //   if(check == true){
  //     var name =$("#txtname").val();
  //     var add =$("#address").val();
  //     var city =$("#txtcity").val();
  //     var regno =$("#txtregno").val();
  //     var tel =$("#txttel").val();
  //     var email =$("#txtemail").val();
  //     var web =$("#txtweb").val();

  //     var Data={name:name,add:add,city:city,regno:regno,tel:tel,email:email,web:web};

  //     $.ajax({  
  //       url: "../server.php?c=CompanyController&m=addCompany",  
  //       data: Data,
  //       type: "POST",
  //       dataType: "json",  
  //       success: function (data) {
  //         // alert(data+ " Susscessfully added to the system");
  //         new PNotify({
  //           title: 'New Company',
  //           text: data+ " Susscessfully added to the system",
  //           type: 'success',
  //           styling: 'bootstrap3'
  //         });  
  //         loadCompanyData();
  //         clearData();
  //       },  
  //       error: function (errormessage) {  
  //         alert(errormessage.responseText);
  //         alert("Unable to add Company");
  //       }
  //     });
  //   }else{
  //     $("#txtname").focus();
  //   }
  // }

  function getCompany(id){
    // $("#profile-tab").tab("show");
    // $("#profile-tab").html("Update Company");
    $.ajax({
      type: "POST",
      url: '../server.php?c=CompanyController&m=getCompany',
      data: {'id':id},
      success:

      function(data){
        $('#companyform')[0].reset();
        $("#submit").css("display","none");
        $("#update").css("display","");

        // alert(data);
        var d=data[0];
        var id = d.comId;
        var name = d.comName;
        var add = d.comAddress;
        var city = d.comCity;
        var regno = d.comRegNo;
        var tel = d.comTel;
        var email = d.comEmail;
        var web = d.comWeb;
        var budget = d.budget;
        var emp = d.employees;
        var orders = d.orders;

        $("#id").val(id);
        $("#txtname").val(name);
        $("#address").val(add);
        $("#txtcity").val(city);
        $("#txtregno").val(regno);
        $("#txttel").val(tel);
        $("#txtemail").val(email);
        $("#txtweb").val(web);
        $("#txtbudget").val(budget);
        $("#txtemp").val(emp);
        $("#txtorders").val(orders);
      },
      dataType: 'json'
    });
  }

  function updateCompany(){ 

    var check = $('form')[0].checkValidity();
    if(check == true){
      var id =$("#txtid").val(); 
      var name =$("#txtname").val();
      var add =$("#address").val();
      var city =$("#txtcity").val();
      var regno =$("#txtregno").val();
      var tel =$("#txttel").val();
      var email =$("#txtemail").val();
      var web =$("#txtweb").val();
      var budget =$("#txtbudget").val();
      var emp =$("#txtemp").val();
      var orders =$("#txtorder").val();

      var Data= {id:id,name:name,add:add,city:city,regno:regno,tel:tel,email:email,web:web,budget:budget,emp:emp,orders:orders};

      $.ajax({  
        url: "../server.php?c=CompanyController&m=editCompany",  
        data: Data,
        type: "POST",
        dataType: "json",  
        success: function (data) {  
          // alert("Newly Updated Id is : "+ data);
          // $("#home-tab").tab("show");
          // $("#profile-tab").html("New Company");
          new PNotify({
            title: 'Edit Company',
            text: data+ " Susscessfully Updated to the system",
            type: 'success',
            styling: 'bootstrap3'
          });
          loadCompanyData();
          clearData();
          // $("#submit").css("display","");
          // $("#update").css("display","none");
        }
        // error: function (errormessage) {  
        //   alert(errormessage.responseText);
        //   alert("Unable to add Company");
        //   new PNotify({
        //     title: 'Edit Company',
        //     text: data+ " Unable to Update Company",
        //     type: 'warning',
        //     styling: 'bootstrap3'
        //   });
        // }
      }); 
    }else{
      $("#txtname").focus();
    }  
  }  

  function clearData() {
      // $('input[type="text"]').val('');
      // $('input[type="password"]').val('');
      // $('Select').val('');
      // $("#submit").css("display","");
      // $("#update").css("display","none");
      $('#companyform')[0].reset();
      //setTimeout(function() {location.reload()},2400);
  }

  function Reload() {
      location.reload();
  }

</script>