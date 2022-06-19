<div class="main_container">
  <div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <p class="site_title" style="padding-left:0;" ><img src="../view/images/logo35crop.png"></p>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="../production/images/your-picture.png" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>Tailor</h2>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->

      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="../controllers/route.php">Dashboard</a>
                </li>
                <!-- <li><a href="../controllers/reportroute.php">Report</a>
                </li> -->
              </ul>
            </li>
            <li><a><i class="fa fa-sliders"></i> Configuration <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <!-- <li><a href="company.php">Company + Logo</a>
                </li> -->
                <!-- <li><a href="payrate.php">Pay rates</a>
                </li> -->
                <!-- <li><a href="payroll.php">Salary/ Wage</a>
                </li> -->
                <li><a href="itemconfig.php">Item Catergory</a>
                </li>
                <li><a href="styleconfig.php">Style</a>
                </li>
                <!-- <li><a href="machinaryconfig.php">Machinary</a>
                        </li> -->
                <li><a href="calendar.php">Calendar</a>
                </li>
                <!-- <li><a href="backup.php">Backup</a>
                </li> -->
              </ul>
            </li>
            <li><a><i class="fa fa-users"></i> People <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="customer.php">Customer</a></li>
                <!-- <li><a href="supplier.php">Supplier</a></li> -->
                <!-- <li><a href="employee.php">Employee</a></li> -->
              </ul>
            </li>
            <!-- <li><a><i class="fa fa-user"></i> User Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="newuser.php">New User</a></li>
                <li><a href="edituser.php">Edit User</a></li>
              </ul>
            </li> -->
            <li><a><i class="fa fa-sitemap"></i> Item Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="rawmaterials.php">Raw Materials</a>
                </li>
                <li><a href="hireitem.php">Hire Item</a>
                </li>
                <li><a href="customeritem.php">Customer Item</a>
                </li>
              </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Order Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tailormade.php">New Order</a></li>
                <li><a href="pendingorder.php">Order Status</a></li>
                <li><a href="orderreturn.php">Return Order</a></li>
              </ul>
            </li>
            <!-- <li><a><i class="fa fa-shopping-cart"></i> Purchase Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="purchaseorder.php">Purchase Order</a>
                </li>
                <li><a href="purchaseorderreturn.php">Return</a>
                </li>
              </ul>
            </li> -->
            <li><a><i class="fa fa-bell"></i> Notification <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="notificationlist.php">Notification List</a></li>
              </ul>
            </li>
            <!-- <li><a><i class="fa fa-briefcase"></i> Work Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="createjobcard.php">Manage Job Cards</a></li>
              </ul>
            </li> -->
            <li><a><i class="fa fa-credit-card-alt"></i> Payment <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="recievepayment.php">Recieve Payment</a></li>
                <!-- <li><a href="makepayment.php">Make Payment</a></li> -->
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings" href="settings.php">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="../controllers/logout.php">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu" style=" background: url('images/download.jpg');">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle" style="color:black"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">

          <li role="presentation" data-toggle="tooltip" data-placement="bottom" title="Logout">
            <a href="../controllers/logout.php">
              <span class="badge bg-red"><i class="fa fa-sign-out"></i></span>
            </a>
          </li>

          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="../production/images/your-picture.png" alt="">Tailor
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profile</a></li>
              <li>
                <a href="javascript:;">
                  <span>Settings</span>
                </a>
              </li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="../controllers/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
          </li>

          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-red">
               <?php
                include("db_conn.php");
                $sql = "SELECT * FROM `notification` WHERE Display = '0' AND notType = 'employee' ORDER BY `notId` DESC";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                echo $count;
              ?>
              </span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              <?php
                include("db_conn.php");
                $sql = "SELECT * FROM `notification` WHERE Display = '0' AND notType = 'employee'  ORDER BY `notId` DESC LIMIT 4";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                  while ($notice= mysqli_fetch_assoc($res)) { 
                    $notid = $notice['notId'];
                    $title = $notice['notTitle'];
                    $recieverid = $notice['notReciever'];
                    $email = $notice['notEmail'];
                    $msg = $notice['notMessage'];
                    $ntype = $notice['notType'];
                    $notdate = $notice['notDate'];
                    $cat = $notice['notCategory'];
                    $status = $notice['notStatus'];

                    $sql1 = "SELECT * FROM `employee` WHERE tid='$recieverid'";
                    $res1 = mysqli_query($conn, $sql1);
                    $tailor= mysqli_fetch_assoc($res1);
                    $fname = $tailor['tFname'];
                    $lname = $tailor['tLname'];
                    $name = $fname." ".$lname;

              ?>
                  <li>
                    <a>
                      <span class="image"><img src="../production/images/your-picture.png" alt="Profile Image" /></span>
                      <span>
                        <span><?= $name ?></span>
                        <span class="time"><?= $notdate ?></span>
                      </span>
                      <span class="message">
                        <?= $msg ?>
                      </span>
                    </a>
                  </li>
              <?php
                  }
                }
              ?>
              <li>
                <div class="text-center">
                  <a href="notificationlist.php">
                    <strong>See All Notifications</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->