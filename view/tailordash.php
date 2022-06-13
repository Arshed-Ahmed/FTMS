<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="jumbotron">
          <h1>Hello, Tailor!</h1>
          <p>This is a simple Dashboard to see all the Notifications, and Price lists to make your day much easier.</p>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daily Notifications <small>All Employees</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <ul class="list-unstyled timeline">
              <li>
                <div class="block">
                  <div class="tags">
                    <a href="" class="tag">
                      <span>Entertainment</span>
                    </a>
                  </div>
                  <div class="block_content">
                    <h2 class="title">
                                    <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                </h2>
                    <div class="byline">
                      <span>13 hours ago</span> by <a>Jane Smith</a>
                    </div>
                    <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                    </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12" >
        <div class="x_panel">
          <div class="x_title">
            <h2>Calender<small>Events</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" id='calendar'></div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Price List</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Basic price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Trousers</td>
                  <td>Rs.900</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Shirts</td>
                  <td>Rs.500</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>t-Shirts</td>
                  <td>Rs.400</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Saree</td>
                  <td>Rs.1200</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Blouse</td>
                  <td>Rs.700</td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Frocks</td>
                  <td>Rs.950</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Item stiched <small>Works you have done</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Number</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Trousers</td>
                  <td>15</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Shirts and t-Shirt</td>
                  <td>20</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Saree and Blouse</td>
                  <td>5</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Frocks</td>
                  <td>6</td>
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
        $('#title').text('Dashboard');
        $('#breadcrumb').text('Statistics');
    });
</script>