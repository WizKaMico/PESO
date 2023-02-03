<?php 
include('../dbcon.php');
include('../session.php'); 

$result=mysqli_query($con, "select * from admin where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>


 <!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PESO MANAGEMENT SYSTEM </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- Data Table JS
        ============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- Start Header Top Area -->
    <div class="header-top-area" style="background-color:#133785;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                         <a href="#"><img src="http://devcommerceph.store/PESO/assets/images/white-peso-logo.png" alt="" /></a> 
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    
    
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area" style="margin-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Hi! <?php echo strtoupper($row['name']); ?></h2>
                                        <?php date_default_timezone_set('Asia/Manila'); ?>
                                        <p><?php echo date("l jS \of F Y h:i:s A"); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                      <a href="../logout.php" class="btn" style="background-color:#133785;">LOGOUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->

    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                      
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> HOME</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> ANNOUNCEMENT</a>
                        </li>
                       
                    </ul>
                    <div class="tab-content custom-menu-content">
                      
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">HOME</a>
                               
                            </ul>
                        </div>
                        <div id="Forms" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="announcement.php">Create Announcement</a>
                                </li>
                             
                            </ul>
                        </div>
                       
                     <!--    <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="contact.html">Contact</a>
                                </li>
                                <li><a href="invoice.html">Invoice</a>
                                </li>
                                <li><a href="typography.html">Typography</a>
                                </li>
                                <li><a href="color.html">Color</a>
                                </li>
                                <li><a href="login-register.html">Login Register</a>
                                </li>
                                <li><a href="404.html">404 Page</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->

     <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
              
                
            </div>
        </div>
    </div>
    <!-- End Status area-->


    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>CREATE ANNOUNCEMENT</h2>
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> CREATE ANNOUNCEMENT</button>
                        </div>

                    <div class="modal fade" id="form_modal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="save.php" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Announcement</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" class="form-control" name="photo" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Published By</label>
                                                <input type="text" class="form-control" name="firstname" value="<?php echo strtoupper($row['name']); ?>" required="required" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="lastname" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <br style="clear:both;"/>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                        <button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>PHOTO</th>
                                        <th>PUBLISHED</th>
                                        <th>DESCRIPTION</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        require '../dbcon.php';
                                        $query = mysqli_query($con, "SELECT * FROM `announce`") or die(mysqli_error());
                                        while($fetch = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                       
                            <td><img src="<?php echo $fetch['photo']?>" height="80" width="100"/></td>
                                                <td><?php echo $fetch['firstname']?></td>
                                                <td><?php echo $fetch['lastname']?></td>                
                                                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $fetch['id']?>"><span class="glyphicon glyphicon-edit"></span> UPDATE ANNOUNCEMENT</button></td>
                            <div class="modal fade" id="edit<?php echo $fetch['id']?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" enctype="multipart/form-data" action="edit_ann.php">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Edit Announcement</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <h3>Current Photo</h3>
                                                        <img src="<?php echo $fetch['photo']?>" height="120" width="150" />
                                                        <input type="hidden" name="previous" value="<?php echo $fetch['photo']?>"/>
                                                        <h3>New Photo</h3>
                                                        <input type="file" class="form-control" name="photo" value="<?php echo $fetch['photo']?>" required="required"/>
                                                    </div>
                                                    <div class="form-group">
                                                         <label>Published By</label>
                                                        <input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
                                                        <input type="text" class="form-control" value="<?php echo $fetch['firstname']?>" name="firstname" required="required"/>
                                                    </div>
                                                    <div class="form-group">
                                                       <label>Description</label>
                                                        <input type="text" class="form-control" value="<?php echo $fetch['lastname']?>" name="lastname" required="required"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br style="clear:both;"/>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                <button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>              



                                    </tr>
                           <?php } ?>         
                                </tbody>
                                <tfoot>
                                    <tr>
                                          <th>PHOTO</th>
                                        <th>PUBLISHED</th>
                                        <th>DESCRIPTION</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
      <!-- Start Footer area-->
    <div class="footer-copyright-area" style="background-color:#133785;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2022 
. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
        ============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
        ============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
        ============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!--  wave JS
        ============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- Data Table JS
        ============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>