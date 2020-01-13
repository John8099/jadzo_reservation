<?php
include 'php/server.php';
$services = mysqli_query($conn, "SELECT * FROM services");
?>
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
    <script src="js/responsiveslides.min.js"></script>
    <link rel="stylesheet" href="dep/vendors/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <?php require_once('components/header.php'); ?>
    <div class="container" style="max-width:100%;padding:0;margin:0">
        <div class="img-service">

            <label for="services">
                <h1>Onsale</h1>
            </label>
        </div>
    </div>

    <div class="container service" style="margin-top:50px;max-width:80%;">
        <div class="row">

            <div class="col-sm-4">
                <img src="img/tri1.jpg" style="width:100%; height:250px">
                <hr>
                <label for="service">
                    Model: JAJ-2 (Full mods) <br>
                </label><br>
                <p style="text-align:left; padding-left: 50px">
                    - Sidecar unit <br>
                    - Side wheels (mags) <br>
                    - Leather seats <br>
                    - Auto finish paint (Custom Paint Works) <br>
                    - Park lights <br>
                    - Underglow <br>
                    - Dome light <br>
                    - Diffusers <br>
                    - Stainless stepboards <br>
                </p>
                <label for="price" style="float:right">P 55,000 only</label><br>
                <!-- <a href="reserve_form.php?id=">
                        <button type="button" class="btn btn-primary">Read More</button>
                    </a> -->
            </div>
            <div class="col-sm-4">
                <img src="img/tri2.jpg" style="width:100%; height:250px">
                <hr>
                <label for="service">
                    Model: NIX-1 (Based Unit)
                </label><br>
                <p style="text-align:left; padding-left: 50px">
                    - Sidecar unit <br>
                    - Side wheels (mags) <br>
                    - Leather seats <br>
                    - Auto finish paint (Plain) <br>
                </p>
                <label for="price" style="float:right">P 49,000 only</label><br>
                <!-- <a href="reserve_form.php?id=">
                        <button type="button" class="btn btn-primary">Read More</button>
                    </a> -->
            </div>
        </div>
    </div>



</body>
<?php require_once('components/footer.php'); ?>

</html>