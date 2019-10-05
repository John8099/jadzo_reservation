<?php
$get_url = preg_split("/(\/)+/", $_SERVER['PHP_SELF']);
$last_index = count($get_url) - 1;
$current_url = $get_url[$last_index];


$urls = array(
    "index.php" => "Home",
    "service.php" => "Services",
    "contact_us.php" => "Contact Us",
);
?>

<nav class="navbar navbar-expand-md navbar-light" style="position:fixed;z-index:10;width:100%;border-radius:0;" id="nav">
    <a href="index.php" class="nav-brand"><img src="img/jadzo_logo.jpg" class="title-logo"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <?php
            foreach ($urls as $url => $desc) {
                if ($url == $current_url) {
                    echo '<a href="' . $url . '" class="nav-item nav-link buhi">' . $desc . '</a>';
                } else {
                    echo '<a href="' . $url . '" class="nav-item nav-link">' . $desc . '</a>';
                }
            }
            ?>
        </div>
    </div>
</nav>
