<?php
include 'server.php';
date_default_timezone_set('Asia/Manila');
$date = date('M d, Y h:i:sA');

$full_name = strtoupper($_POST['full_name']);
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$message = $_POST['message'];

$insert_message = mysqli_query($conn,"INSERT INTO messages VALUES(NULL, '$full_name','$email','$contact_number','$message','$date')");

if ($insert_message) {
    echo "
    <script>
        alert('Good ".date('A')."! ".$full_name.", Your message has been sent, Please wait for out reply via text message.');
        window.location.href = '../contact_us.php';
    </script>
    ";
}
else {
    echo "
    <script>
        alert('Good ".date('A')."! ".$full_name.", Your message has been sent, Please wait for out reply via text message.');
        window.location.href = '../contact_us.php';
    </script>
    ";
}
