<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jadzo</title>

    <link rel="shortcut icon" href="img/jadzo_logo.jpg">

    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap4.min.css">

    <script src="js/ajax3.min.js"></script>
    <script src="js/bootstrap4.min.js"></script>


    <script src="dep/vendors/moment/min/moment.min.js"></script>
    <!-- jQuery library -->
    <script src="dep/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap library -->
    <link href="dep/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="dep/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <link href="dep/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="dep/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

</head>

<body>
    <?php  ?>

    <div class="container" style="max-width:100% !important;width:100% !important;padding:0;margin:0">
        <div class="img-service" style="height:200px;background-position:bottom;">

            <label for="service">
                <h1 style="line-height:250px;"> Reserve</h1>
            </label>
        </div>
    </div>
    <div class="reserve">
        <?php
        include 'php/server.php';

        $item = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM services WHERE id = '$_GET[id]'"));
        $price = ltrim($item->price, "₱");
        ?>
        <form action="php/reserve.php?id=<?php echo $_GET['id'] ?>" method="POST" style="border:1px solid #d7dce1;padding:20px;">

            <div class="form-group">
                <center>
                    <img src="data:image/png;base64,<?php echo base64_encode($item->logo) ?>" class="col-sm-4" style="float:none;">
                </center>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Service:</label>
                <input type="text" style="background-color:transparent;border:none;" name="title" class="form-control" value="<?php echo $item->title ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Model:</label>
                <select name="model" id="model" class="form-control" required>
                    <option value="">----</option>
                    <option value="nissan">Nissan</option>
                    <option value="honda">Honda</option>
                    <option value="ford">Ford</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Price:</label>
                <input type="text" style="background-color:transparent;border:none;" id="inputPrice" name="price" class="form-control" readonly required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Date and Time or Reservation: <br>
                    <span id="reserve-availability-status"></span>
                </label>
                <div class="input-group date" id="myDatepicker4">
                    <input type="text" name="reserve_date" class="form-control" placeholder="Click to select date and time" id="date_reservation" onBlur="checkAvailability()" required readonly>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Fullname:</label>
                <input type="text" name="full_name" class="form-control" placeholder="Enter Fullname" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Contact number:</label>
                <input type="number" name="contact_number" class="form-control" placeholder="Enter Contact number" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Address:</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
            </div>

            <script>
                let price = <?php echo $price ?>

                let model = document.getElementById('model');
                let inputPrice = document.getElementById('inputPrice');

                model.onclick = () => {
                    // console.log()
                    let modelVal = model.value

                    if (modelVal == 'nissan') { 
                        inputPrice.value = `₱${price}`
                    }
                    else if (modelVal == 'honda') {
                        inputPrice.value = `₱${price + 300}`
                    }
                    else if (modelVal == 'ford') {
                        inputPrice.value = `₱${price + 500}`
                    }
                }


                $('#myDatepicker4').datetimepicker({
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                function checkAvailability() {
                    jQuery.ajax({
                        url: "php/check_reservation.php",
                        data: 'date_reservation=' + $("#date_reservation").val(),
                        type: "POST",
                        success: function(data) {
                            $("#reserve-availability-status").html(data);
                            $("#reserve-availability-status").show();
                        },
                    });
                }
            </script>
            <div style="text-align:center;margin:30px 0px 10px 0px;">
                <button type="submit" id="sub" class="btn btn-primary" style="margin-right:30px;">Submit</button>
                <button onclick="return window.location.href = 'service.php'" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
</body>
<?php require_once('components/footer.php'); ?>

</html>