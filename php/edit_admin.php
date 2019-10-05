<?php
include 'server.php';
session_start();

$id = $_GET['id'];

$fname = strtoupper($_POST['fname']);
$mname = strtoupper($_POST['mname']);
$lname = strtoupper($_POST['lname']);
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$uname = $_POST['uname'];

$update_admin = mysqli_query($conn, "UPDATE admin_users set fname = '$fname', mname = '$mname', lname = '$lname', email = '$email', contact_number = '$contact_number', uname = '$uname' WHERE id = '$id'");

if ($update_admin) {
    echo "
    <script>
        alert('{$fname} {$mname[0]}. {$lname} Updated!')
        window.location.href = '../pages/admin_list.php';
    </script>
    ";
}
?>