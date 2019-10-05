<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/jadzo_logo.jpg">
    <title>Jadzo - Login</title>
    <link href="dep/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dep/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

    <h1><img src="../img/jadzo_logo.jpg" style="width:400px"></h1>
    <div class="w3ls-login box box--big">
        <form action="../php/login.php" method="POST">
            <div class="agile-field-txt">
                <label>
                    <i class="fa fa-user" aria-hidden="true"></i> Username </label>
                <input type="text" name="uname" placeholder="Enter your name " required="" />
            </div>
            <div class="agile-field-txt">
                <label>
                    <i class="fa fa-lock" aria-hidden="true"></i> password </label>
                <input type="password" name="password" placeholder="Enter your password " required="" id="myInput" />
                <div class="agile_label">
                    <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
                    <label class="check" for="check3">Show password</label>
                </div>
            </div>

            <script>
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>

            <div class="w3ls-bot">

                <div class="form-end">
                    <button type="submit">LOGIN</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>

</body>

</html>