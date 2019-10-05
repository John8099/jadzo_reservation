<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jadzo</title>
    <link rel="shortcut icon" href="img/jadzo_logo.jpg">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap4.min.css">
    <link href="dep/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/ajax3.min.js"></script>
    <script src="js/bootstrap4.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>

</head>

<body>
    <?php require_once('components/header.php'); ?>
    <script>
        $(function() {
            $("#slider1").responsiveSlides({
                speed: 500,
                timeout: 8000,
            });
        })
    </script>
    <div class="con" style="max-width:100%;padding:0;margin:0">
        <ul class="rslides" id="slider1">
            <li class="img1">
                <label for="img1">
                    Keeping your <br>
                    Journey Safe
                </label>
                <a href="#offer"><button type="button" class="btn btn-primary btnimg1">What we offer</button></a>
            </li>
            <li class="img2">
                <label for="img2">
                    We can make your <br>
                    Car cleaner
                </label>
                <a href="#offer"> <button type="button" class="btn btn-primary btnimg2">What we offer</button></a>
            </li>
            <li class="img3">
                <label for="img3">
                    Making your <br>
                    Car Better
                </label>
                <a href="#offer"><button type="button" class="btn btn-primary btnimg3">What we offer</button></a>
            </li>
        </ul>

        <div class="space" id="offer"></div>

        <div class="title">
            <label> What We Offer? </label>
        </div>
        <div class="container offer" style="margin-top:50px;">
            <div class="row">
                <div class="col-sm-6">
                    <img src="img/car-repaint.jpg" >
                    <label for="offer">
                        Automotive Repaint
                    </label><br>
                    <a href="service.php"><button type="button" class="btn btn-primary">Reserve now</button></a>
                </div>
                <div class="col-sm-6">
                    <img src="img/car_oil_change.jpg">
                    <label for="offer">
                        Automotive Change Oil
                    </label> <br>
                    <a href="service.php"><button type="button" class="btn btn-primary">Reserve now</button></a>
                </div>
                <div class="col-sm-6">
                    <img src="img/car_wash.jpg">
                    <label for="offer">
                        Automotive Wash
                    </label><br>
                    <a href="service.php"><button type="button" class="btn btn-primary">Reserve now</button></a>
                </div>
                <div class="col-sm-6">
                    <img src="img/car_repair.jpg">
                    <label for="offer">
                        Automotive Repair
                    </label><br>
                    <a href="service.php"><button type="button" class="btn btn-primary">Reserve now</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once('components/footer.php'); ?>
</html>