<?php
include '../php/server.php';
session_start();

if (!$_SESSION['id']) {
    header('Location: ../admin/');
}
$admin = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM admin_users WHERE id = '$_SESSION[id]'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Admin</title>
    <link rel="shortcut icon" href="../img/jadzo_logo.jpg">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Muli" />
    <!-- Bootstrap -->
    <link href="../dep/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../dep/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../dep/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../dep/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="../dep//build/css/custom.min.css" rel="stylesheet">

<body class="nav-md" style="background:none;">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed" style="transition:.5s">

                <div class="navbar nav_title" style="height:80px">
                    <a href="admin_messages.php" class="site_title" style="padding:0;height:80px">
                        <img src="../img/jadzo_logo.jpg" style="width:100%;"></a>
                </div>

                <div class="clearfix"></div>

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <?php
                            require_once('links.php');
                            $counter = 0;
                            foreach ($links as $desc => $link) {
                                echo "
                                <li><a href='" . $link . "'><i class='" . $icons[$counter] . "'></i> " . $desc . " </a></li>
                                ";
                                $counter++;
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
            </div>

            <!-- top navigation -->
            <div class="top_nav ." style="transition:.5s">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>

                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../img/avatar.png" alt="">
                                    <?php echo "{$admin->fname} {$admin->mname[0]}. {$admin->lname}" ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="../php/logout.php" onclick="return confirm('Are you sure you want to Logout?')"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main" style="transition:.5s;">
                <div class="x_panel" style="display:block;margin:auto;margin-top:100px;margin-bottom:100px;">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <form action="../php/add_admin.php" method="POST" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

                                <span class="section">New Admin</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="fname" placeholder="Enter Last name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Middle name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="mname" placeholder="Enter Middle name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="lname" placeholder="Enter Last name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="email" placeholder="Enter Email" required="required" type="email">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="11" name="contact_number" placeholder="Enter Contact number" required="required" type="tel">
                                    </div>
                                </div>
                                <div class="item form-group">

                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span id="user-availability-status"></span> Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="uname" id="uname" placeholder="Enter Username" required="required" type="text" onBlur="checkAvailability()">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Confirm Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password2" type="password" name="psw" class="form-control col-md-7 col-xs-12" required="required" placeholder="Confirm Password" data-validate-linked="password">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="../dep/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../dep/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../dep/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../dep/vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../dep/vendors/validator/validator.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../dep/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../dep/build/js/custom.min.js"></script>
    <script type="text/javascript">
        function checkAvailability() {
            jQuery.ajax({
                url: "../php/check_username.php",
                data: 'username=' + $("#uname").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    $("#user-availability-status").show();
                },
            });
        }
    </script>
</body>

</html>