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
    <title>Admin Reserves</title>
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
    <link href="../dep/build/css/custom.min.css" rel="stylesheet">
</head>

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

            <div class="right_col" role="main" style="transition:.5s">
                <div class="row">
                    <?php
                    $get_msg = mysqli_query($conn, "SELECT * FROM messages ORDER BY id DESC");
                    while ($row = mysqli_fetch_object($get_msg)) :
                        $message_id = $row->id;
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12" style="float:left">
                            <div class="x_panel tile">
                                <div class="x_title">
                                    <h2>
                                        <?php echo $row->full_name ?>
                                        <br>
                                        <small style="margin:0;">
                                            <?php echo $row->contact_number ?>
                                        </small>
                                        <br>
                                        <small style="margin:0;color:#337ab7">
                                            <?php echo $row->email ?>
                                        </small>
                                    </h2>

                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link" onclick="return confirm('Are you sure you want to Remove <?php echo $row->full_name ?> message?')" href="../php/delete_message.php?id=<?php echo $message_id ?>"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h4>Message:</h4>
                                    <div class="widget_summary" style="height:80px;overflow-y:scroll">
                                        <div class="w_center w_55" style="width:100%;">
                                        <?php echo $row->message ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <hr style="margin:15px 0px 15px 0px">
                                    <div class="widget_summary">
                                        <div class="w_center w_55" style="width:100%;text-align:right">
                                        <?php echo $row->createAt ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
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
    <!-- jQuery custom content scroller -->
    <script src="../dep/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../dep/build/js/custom.min.js"></script>

</body>

</html>