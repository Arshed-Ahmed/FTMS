<?php 
session_start();
//type (1= Admin, 2= Tailor, 3= Manager) ||&&($_SESSION['type']=="1" || $_SESSION['type']=="general_manager")
if(isset($_SESSION['user'])){

}
else
{
      header("location:../index.php");
}
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Title Page-->
            <title id="title"></title>

            <!-- Bootstrap -->
            <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- iCheck -->
            <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
            <!-- Datatables -->
            <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
            <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
            <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
            <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
            <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
            <!-- Select2 -->
            <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
            <!-- bootstrap-datetimepicker -->
            <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
            <!-- Dropzone.js -->
            <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
            <!-- FullCalendar -->
            <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
            <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
            <!-- PNotify -->
            <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
            <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
            <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

            <!-- Custom Theme Style -->
            <link href="../build/css/custom.min.css" rel="stylesheet">
            <style type="text/css">
                  span.required{
                        color: red;
                  }

            </style>
        </head>
        <body class="nav-md">
            <div class="container body">
            <?php require_once('sidebar.php');?>
            <?php require_once('pagetop.php');?>
            