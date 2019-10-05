<?php
include 'server.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y h:i:s A');

$peso = "₱";
$id = $_GET['id'];
$amount_paid = $_POST['amount_paid'];
$full_name = strtoupper($_POST['full_name']);
$reserve_title = strtoupper($_POST['reserve_title']);
$price = ltrim($_POST['price'], "₱");
$contact_number = strtoupper($_POST['contact_number']);
$address = strtoupper($_POST['address']);
$car_model = strtoupper($_POST['car_model']);
$date_reserve = strtoupper($_POST['date_reserve']);
$ref_num = $_POST['ref_num'];

// $get_img = $_FILES['reciept']['tmp_name'];
// $receipt = addslashes(file_get_contents($get_img));

$new_amount = ($price - $amount_paid) <= 0 ? "0" : ($price - $amount_paid);
$new_amount_condition = ($price - $amount_paid) > 0 ? 1 : 0;

$payment_method;
$method;
$admin_name;
$print = false;

if ($new_amount_condition == 1) {
    $update_reserve = mysqli_query($conn, "UPDATE reserve set price = '$peso$new_amount' WHERE id = '$id'");

    if ($update_reserve) {
        $admin = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM admin_users WHERE id = '$_SESSION[id]'"));
        $admin_name = "{$admin->fname} {$admin->mname[0]}. {$admin->lname}";

        $insert_report = mysqli_query($conn, "INSERT INTO report VALUES (
            NULL,
            '$full_name',
            '$contact_number',
            '$address',
            '$car_model',
            '$reserve_title',
            '$peso$price',
            '$date_reserve',
            '$peso$amount_paid',
            '$date',
            '$admin_name',
            '$ref_num'
        )");

        if ($insert_report) {
            $print = true;
            $payment_method = "Initial Payment";
        }
    }
} else if ($new_amount_condition == 0) {
    $delete_reserve = mysqli_query($conn, "DELETE FROM reserve WHERE id = '$id'");

    if ($delete_reserve) {
        $admin = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM admin_users WHERE id = '$_SESSION[id]'"));
        $admin_name = "{$admin->fname} {$admin->mname[0]}. {$admin->lname}";

        $insert_report = mysqli_query($conn, "INSERT INTO report VALUES (
            NULL,
            '$full_name',
            '$contact_number',
            '$address',
            '$car_model',
            '$reserve_title',
            '$peso$price',
            '$date_reserve',
            '$peso$amount_paid',
            '$date',
            '$admin_name',
            'ref_num'
        )");

        if ($insert_report) {
            $print = true;
            $payment_method = "Paid";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container1,
        .container2 {
            display: none;
        }

        @media print {


            html,
            body {
                margin: 0;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }

            .container1 {
                /* background-image: url('../images/eslogo_opa.jpg');
                background-repeat: no-repeat;
                background-size: cover; */
                width: 320px;
                height: 350px;
                border: 1px solid black;
                padding: 10px;
                display: block;
                position: relative;
                z-index: 1;
                overflow: hidden;
                float: left;
            }

            img {
                width: 90%;
                position: absolute;
                z-index: -1;
            }

            .container1 .header1 {
                text-align: center;
            }

            .container1 .footer1 {
                text-align: center;
                font-size: 10px;
            }

            .container1 .body1 {
                font-size: 12px;
            }

            .container2 {
                /* background-image: url('../images/eslogo_opa.jpg');
                background-repeat: no-repeat;
                background-size: cover; */
                width: 320px;
                height: 350px;
                border: 1px solid black;
                padding: 10px;
                display: block;
                position: relative;
                z-index: 1;
                overflow: hidden;
                float: right;
            }

            .container2 .header2 {
                text-align: center;
            }

            .container2 .footer2 {
                text-align: center;
                font-size: 10px;
            }

            .container2 .body2 {
                font-size: 12px;
            }
        }
    </style>
    <script>
        let print = <?php echo $print ?>

        if (print == true) {
            window.print()

            window.onafterprint = () => {
                window.location.href = '../pages/admin_reserves.php'
            }
        }
    </script>
</head>

<body>

    <div class="container1">
        <!-- <img src="../images/eslogo_opa.jpg"> -->
        <div class="header1">
            <p>
                <label style="text-decoration:underline;font-weight:bolder;color:blue"> Jadzo Custom </label><br>
                <!-- <label style="font-size:12px"> Brgy. Tacbuyan, Estancia,Iloilo <br>
                    Tel. No. (033) 123-4565</label> -->
            </p>
            <p style="color:green;font-weight:600;">
                OFFICIAL RECIEPT
            </p>
        </div>
        <div class="body1">
            <p>
                Reference ID: <?php echo $ref_num ?>
            </p>
            <p>
                Customer name: <?php echo $full_name ?>
            </p>
            <p>
                Amount Paid: <?php echo "$peso$amount_paid" ?>
            </p>
            <p>
                Payment type: <?php echo $payment_method ?>
            </p>
            <p style="margin:0px 0px 30px 0px">
                Date paid: <?php echo $date ?>
            </p>
            <p style="text-align:right;margin:0px 0px 30px 0px;">
                Printed By: <?php echo $admin_name ?><br>
                <!-- <label style="margin-right:55px">(<?php //echo $admin->position 
                                                        ?>)</label> -->
            </p>
        </div>

        <div class="footer1">
            This Copy is not valid for claiming input taxes.
        </div>
    </div>

    <div class="container2">
        <!-- <img src="../images/eslogo_opa.jpg"> -->
        <div class="header2">
            <p>
                <label style="text-decoration:underline;font-weight:bolder;color:blue"> Jadzo Custom </label><br>
                <!-- <label style="font-size:12px"> Brgy. Tacbuyan, Estancia,Iloilo <br>
                    Tel. No. (033) 123-4565</label> -->
            </p>
            <p style="color:green;font-weight:600;">
                OFFICIAL RECIEPT
            </p>
        </div>
        <div class="body2">
            <p>
                Reference ID: <?php echo $ref_num ?>
            </p>
            <p>
                Customer name: <?php echo $full_name ?>
            </p>
            <p>
                Amount Paid: <?php echo "$peso$amount_paid" ?>
            </p>
            <p>
                Payment type: <?php echo $payment_method ?>
            </p>
            <p style="margin:0px 0px 30px 0px">
                Date paid: <?php echo $date ?>
            </p>
            <p style="text-align:right;margin:0px 0px 30px 0px;">
                Printed By: <?php echo $admin_name ?><br>
                <!-- <label style="margin-right:55px">(<?php //echo $admin->position 
                                                        ?>)</label> -->
            </p>
        </div>

        <div class="footer2">
            This Copy is for the owner.
        </div>
    </div>

</body>

</html>