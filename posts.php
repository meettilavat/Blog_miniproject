<?php require 'config.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blogs</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="head.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'head.php';
 $result = GetALL();
 while ($data = $result->fetch_object()) {
?>
    <div id="main">
        <section>
            <div class="container">
                <div class="content">
                    <div class="content-img">
                        <img src="<?=$data->image;?>" alt="Image">
                    </div>
                    <div class="content-text">
                        <h2 class="content-title"><?=$data->title; ?></h2>
                        <h4 class="content-subtitle">By <?=$data->username; ?> on <?=date('jS M', strtotime($data->created_at));?></h4>
                        <p class="content-paragraph"><?=$data->subtitle; ?></p>
                        <a href="show.php?id=<?php echo $data->id;?>" class="btn">View More</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/4.1.0/dotdotdot.js"></script>
<script>
    $(document).ready(function() {
        $(".content-paragraph").dotdotdot({
            height: 126,
            fallbackToLetter: true,
            watch: true,
        });
    });
</script>
</body>
</html>