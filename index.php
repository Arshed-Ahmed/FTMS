<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login</h1>
              <div>
                <input id="name" name="name" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input id="btnlog" type="button" class="btn btn-default submit" value="Log in">
                <a class="reset_pass" href="#signup">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to the system/ Disabled system?
                  <a href="#signup" class="to_register"> Contact Admin </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="view/images/logo.jpg">
                  <p>Copyright © 2020 Fashion Tailors. All rights reserved. Template by <a href="#">Colorlib</a>.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Contact Admint</h1>
              
              <div>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input id="msg" name="msg" type="text" class="form-control" placeholder="Message" required="" />
              </div>

              <div>
                <a class="btn btn-default submit" href="index.php">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="view/images/logo.jpg">
                  <p>Copyright © 2020 Fashion Tailors. All rights reserved. Template by <a href="#">Colorlib</a>.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- PNotify -->
    <script src="vendors/pnotify/dist/pnotify.js"></script>
    <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- login script -->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#btnlog").click(function(){
                    var name=$('#name').val();
                    var pwd=$('#password').val();


                    $.post("controllers/controller_login.php",{pwd:pwd,name:name},function(data,status){
                                if(data==1){
                                  new PNotify({
                                    title: 'Error',
                                    text: " Invalid Username or Password",
                                    type: 'error',
                                    styling: 'bootstrap3'
                                  });
                                }else if (data==2){
                                  new PNotify({
                                    title: 'Sorry',
                                    text: " Your account has been disable, please contact administrator",
                                    type: 'warning',
                                    styling: 'bootstrap3'
                                  });
                                }else if(data==3){
                                  window.location.href="controllers/route.php";
                                  new PNotify({
                                    title: 'Login',
                                    text: " Successfully logging in",
                                    type: 'info',
                                    styling: 'bootstrap3'
                                  });
                                }
                    });

                });
            });
        </script>
  </body>
</html>
