<?php
include 'server.php';
session_start();

$id = $_GET['id'];

$delete_message = mysqli_query($conn, "DELETE FROM messages WHERE id = '$id'");

if ($delete_message) {
    header('Location: ../pages/admin_messages.php');
}
?>