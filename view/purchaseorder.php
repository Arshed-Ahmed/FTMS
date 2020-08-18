<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Purchase Info</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form class="form-horizontal form-label-left" novalidate="">
                <p>Manage user accounts</p>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">User Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="usr_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="fname" placeholder="User name(s) e.g Jon" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label for="password" class="control-label col-md-3">Password</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="item form-group">
                  <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="usr_type" class="select2_single form-control" tabindex="-1">
                      <option>Select the user type</option>
                      <option value="1">Admin</option>
                      <option value="2">Tailor</option>
                      <option value="3">Manager</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">User Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="usr_status" class="select2_single form-control" tabindex="-1">
                      <option value="">Select the Status of user</option>
                      <option value="3">Active</option>
                      <option value="2">Disable</option>
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

            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User Name</th>
                  <th>User Type</th>
                  <th>Status</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>ID No</th>              
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Cedric Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>Edinburgh</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Brielle Williamson</td>
                  <td>Integration Specialist</td>
                  <td>New York</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Herrod Chandler</td>
                  <td>Sales Assistant</td>
                  <td>San Francisco</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Rhona Davidson</td>
                  <td>Integration Specialist</td>
                  <td>Tokyo</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Sonya Frost</td>
                  <td>Software Engineer</td>
                  <td>Edinburgh</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Jena Gaines</td>
                  <td>Office Manager</td>
                  <td>London</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Quinn Flynn</td>
                  <td>Support Lead</td>
                  <td>Edinburgh</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Charde Marshall</td>
                  <td>Regional Director</td>
                  <td>San Francisco</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Haley Kennedy</td>
                  <td>Senior Marketing Designer</td>
                  <td>London</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Tatyana Fitzpatrick</td>
                  <td>Regional Director</td>
                  <td>London</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Michael Silva</td>
                  <td>Marketing Designer</td>
                  <td>London</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Paul Byrd</td>
                  <td>Chief Financial Officer (CFO)</td>
                  <td>New York</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Gloria Little</td>
                  <td>Systems Administrator</td>
                  <td>New York</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Bradley Greer</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                </tr>
                <tr>
                  <th>ID No</th>              
                  <td>Dai Rios</td>
                  <td>Personnel Lead</td>
                  <td>Edinburgh</td>
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
        $('#title').text('Purchase Management');
        $('#breadcrumb').text('Purchase Order');
        purchase();
    });
  function purchase(){
    var qs = location.search.substring(1);
    var a = qs.split("|");
    var idp = a.[0];
    var test = a.[1];
    if (test == "data") {
      alert("ida");
    }
  }
</script>

  

