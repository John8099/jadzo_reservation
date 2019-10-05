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
        <div class="img-contact-us">

            <label for="contact-us">
                <h1>Contact Us</h1>
            </label>
        </div>
    </div>
    <div class="contact_us" style="max-width:50%;margin-top:50px;">
        <form action="php/message.php" method="POST" style="border:1px solid #d7dce1;padding:20px;">

            <div class="form-group">
                <label for="exampleFormControlInput1">Fullname:</label>
                <input type="text" name="full_name" class="form-control" placeholder="Enter Fullname" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email address" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Contact number:</label>
                <input type="number" name="contact_number" class="form-control" placeholder="Enter Contact number" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message:</label>
                <textarea class="form-control" name="message" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<?php require_once('components/footer.php'); ?>
</html>