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
                <h1>Services</h1>
            </label>
        </div>
    </div>

    <div class="container service" style="margin-top:50px;max-width:80%;">
        <div class="row">
            <?php while ($row = mysqli_fetch_object($services)) :
                $service_id = $row->id;
                ?>
                <div class="col-sm-4">
                    <img src="data:image/png;base64,<?php echo base64_encode($row->logo) ?>">
                    <hr>
                    <label for="service">
                        <?php echo $row->title ?>
                    </label><br>
                    <label for="price"><?php //echo $row->price ?></label><br>
                    <a href="reserve_form.php?id=<?php echo $service_id ?>">
                        <button type="button" class="btn btn-primary">Reserve</button>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>



</body>
<?php require_once('components/footer.php'); ?>

</html>