<?php
include 'server.php';

if(!empty($_POST["username"])) {
  $query = "SELECT * FROM admin_users WHERE uname='" . $_POST["username"] . "'";

  $result  = mysqli_query($conn, $query);

  $rowcount = mysqli_num_rows($result);

  if($rowcount > 0) {
      echo "
      <span class='status-not-available' style='color:red;'> Username taken.</span>";
  }
}
mysqli_close($conn);
?>