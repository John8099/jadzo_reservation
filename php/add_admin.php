<?php
include 'server.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('m-d-Y h:i:sA');

$fname = strtoupper($_POST['fname']);
$mname = strtoupper($_POST['mname']);
$lname = strtoupper($_POST['lname']);
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$uname = $_POST['uname'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);

$add_admin = mysqli_query($conn,"INSERT INTO admin_users VALUES(NULL, '$fname', '$mname', '$lname', '$email', '$contact_number', '$uname', '$password', '$date')");

if ($add_admin) {
    echo "
    <script>
        alert('{$fname} {$mname[0]}. {$lname} Added!')
        window.location.href = '../pages/new_admin.php';
    </script>
    ";
}
?>