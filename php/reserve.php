<?php 
include 'server.php';
session_start();
date_default_timezone_set('Asia/Manila');
$service_id = $_GET['id'];
$ref_num = date('Hismdy');

$full_name = strtoupper($_POST['full_name']);
$address = strtoupper($_POST['address']);
$contact_number = strtoupper($_POST['contact_number']);
$model = strtoupper($_POST['model']);
$title = $_POST['title'];
$price = $_POST['price'];

$reserve_date = $_POST['reserve_date'];
$split_date = preg_split("/(\s+)+/",$reserve_date);
$check = $split_date[0];

$get_reserve = mysqli_query($conn, "SELECT * FROM reserve WHERE checking = '$check'");

if (mysqli_num_rows($get_reserve) > 20) {
    echo "
        <script>
            alert('Slot Full, Please select another date')
            window.location.href = '../reserve_form.php?id=".$service_id."'
        </script>
    ";
}
else {
$insert_reserve = mysqli_query($conn, "INSERT INTO reserve VALUES(NULL, '$full_name', '$contact_number', '$address', '$model', '$title', '$price', '$reserve_date', '$ref_num', '')");

if ($insert_reserve) {
    echo "
    <script>
        alert('Reserve Successful Please Screen shot this Refference Number: ".$ref_num.". This is available only until ".$reserve_date."')
        window.location.href = '../service.php'
    </script>
    ";
}
}
