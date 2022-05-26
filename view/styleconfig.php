<style type="text/css">
  #hideMe {
    -moz-animation: cssAnimation 0s ease-in 5s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in 5s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in 5s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in 5s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
  }

  @keyframes cssAnimation {
    to {
      width: 0;
      height: 0;
      overflow: hidden;
    }
  }

  @-webkit-keyframes cssAnimation {
    to {
      width: 0;
      height: 0;
      visibility: hidden;
    }
  }
</style>

<?php include_once("../incl/header.php"); ?>

<!-- page content -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Styles</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <form action="styleconfig_upload.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="my_image">Select Image File:<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="my_image" name="my_image" required="required">
                <?php if (isset($_GET['error'])) : ?>
                  <p id="hideMe" style="color: red;"><?php echo $_GET['error']; ?></p>
                <?php endif ?>
                <?php if (isset($_GET['success'])) : ?>
                  <p id="hideMe" style="color: green;"><?php echo $_GET['success']; ?></p>
                <?php endif ?>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image Description:</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="description" type="text" class="form-control col-md-7 col-xs-12" name="description" placeholder="Style Description">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input class="btn btn-default" type="reset" name="reset" value="Clear" onclick="Reload();">
                <input class="btn btn-primary" type="submit" id="btnsubmit" name="btnsubmit" value="Upload">
              </div>
            </div>
          </form>

        </div><br><br><br><br><br><br>
        <div class="ln_solid"></div>


        <div class="col-md-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; min-height: 40vh;">
          <?php
          include("db_conn.php");
          $sql = "SELECT * FROM style WHERE Display = '0' ORDER BY stlid DESC";
          $res = mysqli_query($conn, $sql);

          if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {
              $id = $images['stlid'];  ?>
              <div style="width: 280px; height: 300px;">
                <div class="alb" style=" width: 220px; height: 200px; padding: 5px;">
                  <img src="style/<?= $images['stlname'] ?>" width="100%" height="100%">
                </div>
                <d class="caption" style="width: 210px; display: flex; justify-content: space-between; align-items: center;">
                  <p><?php echo $images['stldesc']; ?></p>
                  <a href="#" class="btn btn-danger btn-xs" style="padding: 5px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete" onclick="deleteStyle('<?= $images['stlid'] ?>');"><i class="fa fa-trash-o fa-lg"></i></a>
              </div>

          <?php }
          } ?>
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
    $('#breadcrumb').text('Add Style');
  });

  function Reload() {
    location.reload();
  }

  function deleteStyle(id) {
    var ans = confirm("Are you sure you want to delete this Style?");

    if (ans) {
      $.ajax({
        url: "../server.php?c=StyleController&m=deleteStyle",
        data: {
          'id': id
        },
        type: "POST",
        // dataType: "json",  
        success: function(data) {
          // alert('Deleted');
          // loadStyleData();
          new PNotify({
            title: 'Deleted!',
            text: 'Style removed.',
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
    // $('input[type="text"]').val('');
    // $('input[type="password"]').val('');
    // $('Select').val('');
    // $("#submit").css("display","");
    // $("#update").css("display","none");
    $('#styleform')[0].reset();
  }
</script>