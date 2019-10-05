<?php
include 'server.php';
session_start();

$id = $_GET['id'];

$delete_services = mysqli_query($conn, "DELETE FROM services WHERE id = '$id'");

if ($delete_services) {
    header('Location: ../pages/admin_services.php');
}
?>