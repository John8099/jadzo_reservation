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
    <title>Admin Report</title>
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

    <!-- Datatables -->
    <link href="../dep/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../dep/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../dep/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <style>
        @media only screen and (max-width:700px) {
            .dt-buttons {
                display: none;
            }

            .dataTables_filter {
                float: left;
            }
        }
    </style>
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

            <!-- page content -->
            <div class="right_col" role="main" style="transition:.5s;">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_panel" style="overflow:hidden">
                            <span class="section">Report </span>
                            <div class="x_content">

                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="headings">
                                            <!-- <th class="column-title">Reciept</th> -->
                                            <th class="column-title">Refference Number</th>
                                            <th class="column-title">Customer name</th>
                                            <th class="column-title">Contact #</th>
                                            <th class="column-title">Address</th>
                                            <th class="column-title">Car Model</th>
                                            <th class="column-title">Title</th>
                                            <th class="column-title">Price</th>
                                            <th class="column-title">Date Reserve</th>
                                            <th class="column-title">Amount Paid</th>
                                            <th class="column-title">Date Paid</th>
                                            <th class="column-title">Paid to</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM report");
                                        while ($row = mysqli_fetch_object($sql)) :
                                            $report_id = $row->id;
                                            ?>

                                            <tr>

                                                <!-- <td>
                                                    <a data-toggle="modal" data-target="#myModal<?php echo $report_id ?>">
                                                        <img src="data:image/png;base64,<?php echo base64_encode($row->reciept) ?>" style="width:50px;">
                                                    </a>
                                                </td> -->
                                                <td> <?php echo $row->ref_num ?> </td>
                                                <td><?php echo $row->full_name ?></td>
                                                <td><?php echo $row->contact_number ?></td>
                                                <td><?php echo $row->address ?></td>
                                                <td><?php echo $row->car_model ?></td>
                                                <td><?php echo $row->reservation_title ?></td>
                                                <td><?php echo $row->price ?></td>
                                                <td><?php echo $row->date_of_reservation ?></td>
                                                <td><?php echo $row->amount_paid ?></td>
                                                <td><?php echo $row->date_paid ?></td>
                                                <td><?php echo $row->paid_to ?></td>
                                            </tr>
                                            <!-- The Modal -->
                                            <div class="modal fade" id="myModal<?php echo $report_id ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <center>
                                                                <img src="data:image/png;base64,<?php echo base64_encode($row->reciept) ?>" style="width:80%;">
                                                            </center>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
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
    <!-- jQuery custom content scroller -->
    <script src="../dep/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../dep/build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="../dep/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dep/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../dep/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../dep/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../dep/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../dep/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../dep/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../dep/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../dep/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>


</body>

</html>