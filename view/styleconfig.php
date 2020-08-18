<?php include_once("../incl/header.php");?>
<?php require_once("../models/Connection.php");?>
<?php 
	// //if upload button is pressed
	// if (isset($_POST['upload'])) {
	// 	//path to store file
	// 	$target = "style/".basename($_FILE['image']['name']);

	// 	//connect to database
	// 	require_once("../models/Connection.php");

	// 	//getting submitted data from the form
	// 	$image = $_FILE['image']['name'];
	// 	$iname = $_POST['iname'];
	// 	$desc = $_POST['desc'];

	// 	$sql = "INSERT INTO style (stlname , stlstyle, stldesc) VALUES ('$iname', '$image', '$desc')";

	// }

?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Styles</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form id="styleform" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                <p>Add a Style</p>
                <div class="item form-group">
                  <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iname">Style Name / Code <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="iname" class="form-control col-md-7 col-xs-12" name="iname" placeholder="Neck" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Style Picture <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="image" id="image">  
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iprice">Style Price <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="iprice" class="form-control col-md-7 col-xs-12" name="iprice" placeholder="00.00" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="desc" required="required" name="desc" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="btnreset" class="btn btn-primary" onclick="clearData()">Reset</button>
                    <input type="submit" onclick="addStyle()" id="upload" name="upload" class="btn btn-success" value="Add Style">
                  </div>
                </div>
            </form>
            <div class="ln_solid"></div>
            
            <table id="styletable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Style Name</th>
                  <th>Picture</th>
                  <th>Price</th>
                  <th>Description</th>
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

<?php
    $image = $_FILE['image']['name'];
 ?>
<script type="text/javascript">
  $(document).ready(function (){
        $('#title').text('Configuration');
        $('#breadcrumb').text('Price List');
  });

	
  function addStyle(){
    var fname =$("#txtfname").val();
    var image = '<?=$image?>';
	var iname = $("#iname").val();
	var desc = $("#desc").val();

    var Data={image:image,iname:iname,desc:desc};

    $.ajax({  
      url: "../server.php?c=StyleController&m=addStyle",  
      data: Data,
      type: "POST",
      dataType: "json",  
      success: function (data) {
        // alert(data+ " Susscessfully added to the system");
        
        new PNotify({
          title: 'New Style',
          text: data+ " Susscessfully added to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        
        loadStyleData();
        clearData();

      },  
      error: function (errormessage) {  
        alert(errormessage.responseText);
        alert("Unable to add Customer");
      }
    });

    function clearData() {
	    // $('input[type="text"]').val('');
	    // $('input[type="password"]').val('');
	    // $('Select').val('');
	    $("#submit").css("display","");
	    $("#update").css("display","none");
	    $('#styleform')[0].reset();
  	}  
  }
</script>