<?php
include 'server.php';

if(!empty($_POST["date_reservation"])) {
  $query = "SELECT * FROM reserve WHERE date_of_reservation='" . $_POST["date_reservation"] . "'";

  $result  = mysqli_query($conn, $query);

  $rowcount = mysqli_num_rows($result);

  if($rowcount > 0) {
      echo "
      <span class='status-not-available' style='color:red;'> Date and Time already taken. </span>
      <script>
        document.getElementById('sub').disabled = true;
      </script>
      ";
  }
  else {
    echo "<script>
    document.getElementById('sub').disabled = false;
  </script>";
  }
}
mysqli_close($conn);
