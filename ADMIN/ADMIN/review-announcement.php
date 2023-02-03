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
    <title>PESO ADMIN | SYSTEM </title>
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


     <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <?php

                $reg_users_total=mysqli_query($con, "SELECT *,COUNT(id) as TOTAL FROM `users` WHERE user_status != 'Admin'")or die('Error In Session');
                $reg_total=mysqli_fetch_array($reg_users_total);

                ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $reg_total['TOTAL']; ?></span></h2>
                            <p>Total Users</p>
                        </div>
                    </div>
                </div>
                <?php

                $reg_users=mysqli_query($con, "SELECT *,COUNT(id) as TOTAL FROM `users` WHERE user_status = 'Applicant'")or die('Error In Session');
                $reg_row=mysqli_fetch_array($reg_users);

                ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $reg_row['TOTAL']; ?></span></h2>
                            <p>Total Registered Applicants</p>
                        </div>
                    </div>
                </div>
                  <?php

                $val_users=mysqli_query($con, "SELECT *,COUNT(id) as TOTAL FROM `users` WHERE user_status = 'Employer'")or die('Error In Session');
                $ver_row=mysqli_fetch_array($val_users);

                ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $ver_row['TOTAL']; ?></span></h2>
                            <p>Total Registered Employers</p>
                        </div>
                    </div>
                </div>
                
             
                
            </div>
        </div>
    </div>
    <!-- End Status area-->
    
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
                      
                        <div id="Tables" class="tab-pane  notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">HOME</a></a>
                                </li>
                            </ul>
                        </div>
                        <div id="Forms" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="announcement.php">Create Announcement</a>
                                </li>
                                <li><a href="review-announcement.php">Review Announcement</a>
                                </li>
                             
                            </ul>
                        </div>
                        
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->


    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>ANNOUNCEMENT REVIEW</h2>
                            
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            include_once('../dbcon.php');
                            $sql = "SELECT * FROM `employer_announcement`";

                            //use for MySQLi-OOP
                            $query = $con->query($sql);
                            while($row = $query->fetch_assoc()){
                            ?>
                                    <tr>
                                        <td><?php echo $row['announcement_title']; ?></td>
                                        <td><?php echo $row['announcement_description']; ?></td>
                                        <td><img src="../../pages/employer/ANNOUNCEMENT/<?php echo $row['photo']; ?>"></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['announcement_date_posted']; ?></td>
                                        <td>
                                        <?php
                                        
                                        echo "
                                       
                                        <a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> REVIEW</a>";
                                        
                                      
                                       
                                        

                                        ?>
                                        </td>
                                        <?php include('review.php'); ?>
                                    </tr>
                           <?php } ?>         
                                </tbody>
                               
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