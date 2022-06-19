<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Select report type</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form method="post" name="employee_report_form" action="report/generatepdf.php" target="_blank">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Report Type<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  id="type" name="report_type" required="required">
                    <option >Select Report Type</option>
                    <option value="1">Employee Report</option>
                    <option value="2">Employee Attendance</option>
                    <option value="3">Employee Salary</option>
                  </select>
                </div>
            	  <button type="submit" name="create_report" class="btn btn-primary" >Generate Report</button>
              </div>
            </form>
            <br /><br /><br />
            <form method="post" name="customer_report_form" action="report/customerpdf.php" target="_blank">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Report Type<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  id="type" name="report_type" required>
                    <option >Select Report Type</option>
                    <option value="1">Customer Report</option>
                    <option value="2">Customer Measurements</option>
                    <option value="3">Customer Bill</option>
                  </select>
                </div>
            	  <input type="submit" name="create_report" class="btn btn-success" value="Generate Report">
              </div>
            </form>
            <br /><br /><br />
            <form method="post" name="customer_report_form" action="report/orderpdf.php" target="_blank">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Order Report Type<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  id="type" name="report_type" required>
                    <option >Select Report Type</option>
                    <option value="1">Full Order Report</option>
                    <option value="2">Pending Orders</option>
                    <option value="3">Finished Orders</option>
                  </select>
                </div>
            	  <input type="submit" name="create_report" class="btn btn-primary" value="Generate Report">
              </div>
            </form>
            <br /><br /><br />
            <form method="post" name="customer_report_form" action="report/paymentpdf.php" target="_blank">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Report Type<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  id="type" name="report_type" required>
                    <option >Select Report Type</option>
                    <option value="1">Payment Made</option>
                    <option value="2">Payment Received</option>
                  </select>
                </div>
            	  <input type="submit" name="create_report" class="btn btn-success" value="Generate Report">
              </div>
            </form>
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
        $('#title').text('Report');
        $('#breadcrumb').text('Reports');

    });
</script>