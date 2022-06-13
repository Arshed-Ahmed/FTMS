<?php include_once("../incl/header.php");?>
<?php require 'db_conn.php'; ?>
<!-- page content -->
<style>
  .icon i{
    color: #959191 !important;
  }
</style>
      <div class="clearfix"></div>
      <div class="row">
          <div class="col-md-12">
            <?php 
                $query = "SELECT COUNT(`cusid`) As CusCount FROM `customer` WHERE `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="count"><?= $row['CusCount'] ?></div>
                <h3>Customers </h3>
                <p>...</p>
              </div>
            </div>        
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT COUNT(`ordid`) As ordCount FROM `ordertbl` WHERE `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
                <div class="count"><?= $row['ordCount'] ?></div>
                <h3>New Orders</h3>
                <p>Last Week</p>
              </div>
            </div> 
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT COUNT(`ordid`) As ordDone FROM `ordertbl` WHERE `ordProgress` = 1 AND `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></div>
                <div class="count"><?= $row['ordDone'] ?></div>
                <h3>Finalized Order </h3>
                <p>Last Week</p>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT COUNT(`ordid`) As ordPending FROM `ordertbl` WHERE `ordProgress` = 0 AND `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                <div class="count"><?= $row['ordPending'] ?></div>
                <h3>Pending Order</h3>
                <p>From Last Week</p>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT COUNT(`tid`) As empCount FROM `employee` WHERE `tstatus` = 'Permanent' AND `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                <div class="count"><?= $row['empCount'] ?></div>
                <h3>Permanent</h3>
                <p>Employees</p>
              </div>
            </div> 
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT COUNT(`tid`) As empTempCount FROM `employee` WHERE `tstatus` = 'Temporary' AND `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-user-times" aria-hidden="true"></i></div>
                <div class="count"><?= $row['empTempCount'] ?></div>
                <h3>Temporary</h3>
                <p>Employees</p>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT COUNT(`poid`) As POCount FROM `purchaseorder` WHERE `Display` = 0";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-truck" aria-hidden="true"></i></i></div>
                <div class="count"><?= $row['POCount'] ?></div>
                <h3>Raw Materials</h3>
                <p>Bought</p>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <?php 
                $query = "SELECT `timeDate` FROM `backup` WHERE `id` = (SELECT MAX(`id`) FROM `backup`)";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                <div class="count" style="font-size: 36px;"><?= $row['timeDate'] ?></div>
                <h3>Backup</h3>
                <p>Latest Date</p>
              </div>
            </div>
            <?php
                }
              }
            ?>
          </div>
      </div>
      <div class="row">
        <div class="col-md-7 col-sm-6 col-xs-12" >
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
        <div class="col-md-5 col-sm-6 col-xs-12" style="height: 100%">
          <div class="x_panel">
            <div class="x_title">
              <h2>Order types<small>Sales Percentage</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>
                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <!-- <div class="x_content">
              <div id="echart_donut" style="height: 350px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background-color: transparent;" _echarts_instance_="ec_1566537227881">
                <div style="position: relative; overflow: hidden; width: 358px; height: 350px; cursor: default;">
                  <canvas width="447" height="437" 
                    data-zr-dom-id="zr_0" 
                    style="position: absolute; left: 0px; top: 0px; width: 358px; height: 350px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                  >
                  </canvas>
                </div>
                <div>
                </div>
              </div>

            </div> -->
            <div class="x_content">
                <canvas  id="pieChart" ></canvas>
            </div>
          </div>
        </div>
        <!-- calendar modal -->
        <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
              </div>
              <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                  <form id="antoform" class="form-horizontal calender" role="form">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
              </div>
              <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                  <form id="antoform2" class="form-horizontal calender" role="form">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title2" name="title2">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
        <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
        <!-- /calendar modal -->
      </div>
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Monthly Sales<small>..</small></h2>
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
            <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
              <canvas id="lineChart" height="355" width="710" style="width: 568px; height: 284px;"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12" style="height: 100%">
          <div class="x_panel">
            <div class="x_title">
              <h2>Order types<small>Sales Percentage</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>
                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <!-- <div class="x_content">
              <div id="echart_donut" style="height: 350px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background-color: transparent;" _echarts_instance_="ec_1566537227881">
                <div style="position: relative; overflow: hidden; width: 358px; height: 350px; cursor: default;">
                  <canvas width="447" height="437" 
                    data-zr-dom-id="zr_0" 
                    style="position: absolute; left: 0px; top: 0px; width: 358px; height: 350px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                  >
                  </canvas>
                </div>
                <div>
                </div>
              </div>

            </div> -->
            <div class="x_content">
                <div  id="pieHoleChart" style=" height: 500px;"></div>
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
        $('#title').text('Dashboard');
        $('#breadcrumb').text('Statistics');
    });

</script>

<script>
  var xValues = ["All Orders", "Pending", "Finished"];
  var yValues = [2, 1, 1];
  var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
  ];

  new Chart("pieChart", {
    type: "doughnut",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: false,
        text: "World Wide Wine Production 2018"
      }
    }
  });

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['All Orders', 2],
      ['Pending Orders', 1],
      ['Finished Orders', 1],
    ]);

    var options = {
      title:'World Wide Wine Production',
      pieHole: 0.7,
    };

    var chart = new google.visualization.PieChart(document.getElementById('pieHoleChart'));
    chart.draw(data, options);
  }
</script>
