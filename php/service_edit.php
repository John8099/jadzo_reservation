<?php
include 'server.php';
session_start();

$id = $_GET['id'];
$title = strtoupper($_POST['title']);
$price = $_POST['price'];

$get_logo = $_FILES['logo']['tmp_name'] == '' ? true : false;

if ($get_logo == 1) {
    $update_services = mysqli_query($conn, "UPDATE services set title = '$title', price = '₱$price' WHERE id = '$id'");

    if ($update_services) {
        echo "
        <script>
            alert('Updated Successfully!')
            window.location.href = '../pages/admin_services.php'
        </script>
    ";
        exit();
    }
} else {
    $new_logo = $_FILES['logo']['tmp_name'];
    $logo = addslashes(file_get_contents($new_logo));

    $update_services = mysqli_query($conn, "UPDATE services set logo = '$logo', title = '$title', price = '₱$price' WHERE id = '$id'");

    if ($update_services) {
        echo "
        <script>
            alert('Updated Successfully!')
            window.location.href = '../pages/admin_services.php'
        </script>
    ";
        exit();
    }
}
