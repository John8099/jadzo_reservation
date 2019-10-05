<?php
include 'server.php';
session_start();
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pass = $_POST['password'];

$check_uname = mysqli_query($conn, "SELECT * FROM admin_users WHERE uname = '$uname'");

if (mysqli_num_rows($check_uname) > 0) {
    $admin = mysqli_fetch_object($check_uname);
    $password = $admin->password;
    if (password_verify($pass, $password) == 1) {
        $_SESSION['id'] = $admin->id;
        echo "
        <script>
            alert('Access granted!');  
            window.location.href = '../pages/admin_messages.php';
        </script>
        ";
    } else {

        echo "
        <script>
            alert('Access denied! Password not match');  
            window.location.href = '../admin/';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Access denied! Username not exist');  
        window.location.href = '../admin/';
    </script>
    ";
}
