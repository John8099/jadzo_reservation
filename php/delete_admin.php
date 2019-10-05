<?php
include 'server.php';
session_start();

$id = $_GET['id'];

$delete_services = mysqli_query($conn, "DELETE FROM admin_users WHERE id = '$id'");

if ($delete_services) {
    header('Location: ../pages/admin_list.php');
}
?>