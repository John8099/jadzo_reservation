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
    <title>Edit Services</title>
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
                            <?php
                            $service = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM services WHERE id = '$_GET[id]'"));
                            ?>
                            <form action="../php/service_edit.php?id=<?php echo $_GET['id']; ?>" method="POST" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

                                <span class="section">Edit Service</span>


                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12"></label>
                                    <center>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img src="data:image/png;base64,<?php echo base64_encode($service->logo) ?>" id="img" style="height: 170px;width: 170px;border-radius:30px;" />
                                            <input type="file" name="logo" id="profile-img" accept="image/*" capture="camera">
                                        </div>
                                    </center>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="title" value="<?php echo $service->title ?>" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="price" value="<?php echo ltrim($service->price, "₱") ?>" required="required" type="number">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                        </div>
                        </form>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>