<?php require('config.php');
$pid = $_GET["id"];
$sql = 'SELECT id,username,content,title,created_at,image FROM contents WHERE id = ?';
$stmt= $link->prepare($sql);
$stmt->bind_param("i", $pid);
$stmt->execute();
$stmt->bind_result($id,$username,$content,$title,$created_at,$image);
$stmt->fetch();

if($pid == ''){
    header('Location: ./');
    exit;
}

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
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="head.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="post.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap");

        body {
            font-family: "Poppins", sans-serif !important;
        }

    </style>
</head>
<body>
<?php include 'head.php';?>
<div class="container">
    <div class="head">
        <h1 class="he" href="#"><?php echo $title;?></h1>
        <a class="auth" href="#">By <span id="auth"><?php echo $username;?></span></a>
        <p><?php echo date('jS M Y', strtotime($created_at))." at ".date('g:i a', strtotime($created_at));?></p>
    </div>
        <img class="title" src="<?php echo $image;?>" alt="image">
    <div class="content">
        <?php echo $content;?>
    </div>
</div>

</body>
</html>