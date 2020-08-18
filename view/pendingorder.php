<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pending Order Info</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                	<table id="datatable" class="table table-striped table-bordered">
                	  <thead>
                	    <tr>
                	      <th>No</th>
                	      <th>User Name</th>
                	      <th>User Type</th>
                	      <th>Status</th>
                	      <th>Edit</th>
                	    </tr>
                	  </thead>

                	  <tbody>
                	    <tr>
                	      <th>ID No</th>              
                	      <td>Tiger Nixon</td>
                	      <td>System Architect</td>
                	      <td>
                            <div class="radio">
                              <label>
                                <input type="radio" checked="" value="progress" id="progress" name="status'+id+'"> In Progress
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" value="completed" id="completed" name="status'+id+'"> Completed
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" value="collected" id="collected" name="status'+id+'"> Collected
                              </label>
                            </div>
                          </td>
                	      <td>
                	      	<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                	      	<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            <a href="recievepayment.php" class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i> Collect </a>
                	      </td>
                	    </tr>
                	    <tr>
                	      <th>ID No</th>              
                	      <td>Garrett Winters</td>
                	      <td>Accountant</td>
                	      <td>
                            <div class="radio">
                              <label>
                                <input type="radio" checked="" value="progress" id="progress" name="status'+id+'"> In Progress
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" value="completed" id="completed" name="status'+id+'"> Completed
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" value="collected" id="collected" name="status'+id+'"> Collected
                              </label>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            <a href="recievepayment.php" class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i> Collect </a>
                          </td>
                	    </tr>
                	    <tr>
                	      <th>ID No</th>              
                	      <td>Ashton Cox</td>
                	      <td>Junior Technical Author</td>
                	      <td>
                            <div class="radio">
                              <label>
                                <input type="radio" checked="" value="progress" id="progress" name="status'+id+'"> In Progress
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" value="completed" id="completed" name="status'+id+'"> Completed
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" value="collected" id="collected" name="status'+id+'"> Collected
                              </label>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            <a href="recievepayment.php" class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i> Collect </a>
                          </td>
                	    </tr>

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
        $('#title').text('Order Management');
        $('#breadcrumb').text('Pending Orders');
    });
</script>