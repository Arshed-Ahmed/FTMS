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
              <h2>Finished Order<small>Customer List</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>
                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" >
              <?php
                  include("db_conn.php");
                  $sql = "SELECT * FROM `ordertbl` WHERE Display = '0' AND ordProgress = '1' ORDER BY `updateDate` DESC LIMIT 3";
                  $res = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($res) > 0) {
                    while ($order= mysqli_fetch_assoc($res)) {
                      $id=$order['ordid'];
                      $cusid=$order['cusid'];
                      $cusname=$order['cusName'];
                      $orddate=$order['ordDate'];
                      $updatedate=$order['updateDate'];
                      $deliverydate=$order['deliveryDate'];
                      $desc=$order['ordDescription'];
              ?>
              <ul class="list-unstyled timeline">
                <li>
                  <div class="block">
                    <div class="tags" style="width: 90px;">
                      <a href="newnotification.php" class="tag">
                        <span><?= $updatedate ?></span>
                      </a>
                    </div>
                    <div class="block_content">
                      <h2 class="title">
                          <a>Order Complete for Cutomer <?= $cusname ?> </a>
                      </h2>
                      <div class="byline">
                        <span>with ID <?= $cusid ?></span> Ordered on <a><?= $orddate ?></a>
                      </div>
                      <p class="excerpt">
                        The delivery date is:<?= $deliverydate ?> <br />
                        <?= $desc ?><br />
                        <strong>
                          <a href="newnotification.php">Inform&nbsp;Customer</a>
                        </strong>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
              <?php
                  }
                }
              ?>
            </div>
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
            <div class="x_content">
                <canvas  id="pieChart" ></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Monthly Order<small>..</small></h2>
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
              <canvas id="lineChart"></canvas>
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
  var AllOrders = 0;
  var Pending = 0;
  var Finished = 0;
  $.ajax({
    async:false,
    url: '../server.php?c=OrderController&m=getAllOrder',
    type: "POST",
    dataType: "json",
    success: function(data) {
      var table = $('#ordertable').DataTable();
      $("#ordertable tbody").empty();
      table.destroy();
      for (i = 0; i < data.length; i++) {
        var id = data[i].ordid;
        var cusname = data[i].cusName;
        var styleid = data[i].styleId;
        var fitondate = data[i].fitonDate;
        var deliverydate = data[i].deliveryDate;
        var price = data[i].ordPrice;
        var discount = data[i].ordDiscount;
        var totalprice = price - discount;
        var description = data[i].ordDescription;
        var measid = data[i].measId;
        var progress = data[i].ordProgress;

        if (progress == 0) {
          Pending++;
        } else {
          Finished++;
        }

        AllOrders++
      }
    }
  });
  var xValues = ["All Orders", "Pending", "Finished"];
  var yValues = [AllOrders, Pending, Finished];
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

<script>
  var AllOrders = [0,0,0,0,0,0,0,0,0,0,0,0];
  var Pending = [0,0,0,0,0,0,0,0,0,0,0,0];
  var Finished = [0,0,0,0,0,0,0,0,0,0,0,0];
  $.ajax({
    async:false,
    url: '../server.php?c=OrderController&m=getAllOrder',
    type: "POST",
    dataType: "json",
    success: function(data) {
      var table = $('#ordertable').DataTable();
      $("#ordertable tbody").empty();
      table.destroy();
      for (i = 0; i < data.length; i++) {
        var id = data[i].ordid;
        var cusname = data[i].cusName;
        var styleid = data[i].styleId;
        var ordDate = data[i].ordDate;
        var fitondate = data[i].fitonDate;
        var deliverydate = data[i].deliveryDate;
        var price = data[i].ordPrice;
        var discount = data[i].ordDiscount;
        var totalprice = price - discount;
        var description = data[i].ordDescription;
        var measid = data[i].measId;
        var progress = data[i].ordProgress;

        var dt = new Date(ordDate);
        switch (dt.getMonth()) {
          case 0:
            if (progress == 0) {
              Pending[0]++;
            } else {
              Finished[0]++;
            };
            AllOrders[0]++
            break;
          case 1:
            if (progress == 0) {
              Pending[1]++;
            } else {
              Finished[1]++;
            };
            AllOrders[1]++
            break;
            break;
          case 2:
            if (progress == 0) {
              Pending[2]++;
            } else {
              Finished[2]++;
            };
            AllOrders[2]++
            break;
            break;
          case 3:
            if (progress == 0) {
              Pending[3]++;
            } else {
              Finished[3]++;
            };
            AllOrders[3]++
            break;
            break;
          case 4:
            if (progress == 0) {
              Pending[4]++;
            } else {
              Finished[4]++;
            };
            AllOrders[4]++
            break;
            break;
          case 5:
            if (progress == 0) {
              Pending[5]++;
            } else {
              Finished[5]++;
            };
            AllOrders[5]++
            break;
            break;
          case  6:
            if (progress == 0) {
              Pending[6]++;
            } else {
              Finished[6]++;
            };
            AllOrders[6]++
            break;
            break;
          case 7:
            if (progress == 0) {
              Pending[7]++;
            } else {
              Finished[7]++;
            };
            AllOrders[7]++
            break;
            break;
          case 8:
            if (progress == 0) {
              Pending[8]++;
            } else {
              Finished[8]++;
            };
            AllOrders[8]++
            break;
            break;
          case 9:
            if (progress == 0) {
              Pending[9]++;
            } else {
              Finished[9]++;
            };
            AllOrders[9]++
            break;
            break;
          case 10:
            if (progress == 0) {
              Pending[10]++;
            } else {
              Finished[10]++;
            };
            AllOrders[10]++
            break;
            break;
          case 11:
            if (progress == 0) {
              Pending[11]++;
            } else {
              Finished[11]++;
            };
            AllOrders[11]++
            break;
        }
      }
    }
  });
  console.log(AllOrders, Pending, Finished);
var xValues = ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

new Chart("lineChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [...Finished],
      borderColor: "red",
      fill: false,
      label: 'Finished Orders',
    }, { 
      data: [...AllOrders],
      borderColor: "green",
      fill: false,
      label: 'All Orders',
    }, { 
      data: [...Pending],
      borderColor: "blue",
      fill: false,
      label: 'Pending Orders',
    }]
  },
  options: {
    legend: {display: true}
  }
});
</script>
