<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

    	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Payment Info</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form class="form-horizontal form-label-left" novalidate="">
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Id</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="payid" name="payid" type="text" class="form-control" readonly="readonly" placeholder="Payment Id will appear hear!">
                    </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Customer <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cusname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="cusname" placeholder="Customer name(s) e.g Jon" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Payment Amount <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="lname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lname" placeholder="last name(s) e.g Doe" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddate">Paid Date <span class="required">*</span>
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
                <div class="item form-group">
                  <label for="paytype" class="control-label col-md-3 col-sm-3 col-xs-12">Payment Type <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="paytype" name="paytype" class="select2_single form-control" tabindex="-1" required="required">
                      <option value="">Select an option</option>
                      <option value="cs">Cash</option>
                      <option value="ck">Check</option>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="reset" class="btn btn-primary">Cancel</button>
                    <button id="sendcustomer" type="submit" class="btn btn-success">Save</button>
                  </div>
                </div>
                <div class="ln_solid"></div>
            </form>

            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No</th>
                  <th>Customer</th>
                  <th>Payment</th>
                  <th>Paid Date</th>
                  <th>Type of Payment</th>
                  <th>Balance</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>001</td>
                  <td>Akeel</td>
                  <td>Rs.600</td>
                  <td>25/11/2019</td>
                  <td>cash</td>
                  <td>Rs.120</td>
                </tr>
                <tr>
                  <td>002</td>
                  <td>mujib</td>
                  <td>Rs.500</td>
                  <td>25/11/2019</td>
                  <td>cash</td>
                  <td>Rs.450</td>
                </tr>
                <tr>
                  <td>003</td>
                  <td>naleer</td>
                  <td>Rs.500</td>
                  <td>25/11/2019</td>
                  <td>cash</td>
                  <td>Rs.50</td>
                </tr>
                <tr>
                  <td>004</td>
                  <td>yahya</td>
                  <td>Rs.300</td>
                  <td>25/11/2019</td>
                  <td>cash</td>
                  <td>Rs.450</td>
                </tr>
                <tr>
                  <td>005</td>
                  <td>ahnaf</td>
                  <td>Rs.600</td>
                  <td>25/11/2019</td>
                  <td>cash</td>
                  <td>Rs.100</td>
                </tr>
                <tr>
                  <td>001</td>
                  <td>Akeel</td>
                  <td>Rs.300</td>
                  <td>25/11/2019</td>
                  <td>cash</td>
                  <td>Rs.150</td>
                </tr>
                

                <?php
                //require_once("../models/Connection.php");
                //$db = new Connection();
                //$con = $db->db_con();
                //$query="SELECT * from employee";
                // $result = mysqli_query($con,$query);

                // $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

                // foreach($rows as $row) { 
                 
                ?>  
                    <!-- <tr>
                      <td><?php echo $row['tid']; ?></td>
                      <td><?php echo $row['tFname']; ?></td>
                      <td><?php echo $row['tLname']; ?></td>
                      <td><?php echo $row['tNIC']; ?></td>
                      <td><?php echo $row['tPno']; ?></td>
                      <td><?php echo $row['tEmail']; ?></td>
                    </tr> -->
                <?php  
                  // }
                ?>
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
        $('#title').text('Payment');
        $('#breadcrumb').text('Recieve Payment');
    });
</script>