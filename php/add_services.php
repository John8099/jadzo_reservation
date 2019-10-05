<?php 
include 'server.php';
session_start();

$title = strtoupper($_POST['title']);
$price = $_POST['price'];
$get_img = $_FILES['logo']['tmp_name'];
$img = addslashes(file_get_contents($get_img));

$insert_services = mysqli_query($conn, "INSERT INTO services VALUES(NULL, '$img', '$title', '₱$price')");

if ($insert_services) {
    echo "
    <script>
        alert('Service Added')
        window.location.href = '../pages/admin_add_services.php'
    </script>
    ";
}
?>