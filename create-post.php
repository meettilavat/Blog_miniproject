<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <style type="text/css">
        .cke_textarea_inline {
            border: 1px solid black;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="create-post.css">
    <link rel="stylesheet" type="text/css" href="head.css">
</head>
<body>
<?php include 'head.php';?>
<div class="form">
    <div class="form-panel">
        <div class="form-content">
            <form action="upload.php" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input class="form-control" type="text" id="desc" name="desc"  required />
                </div>
                <div class="form-group">
                    <label for="pic">Image</label>
                    <input type="file" id="image" name="image" required />
                </div>
                <div class="form-group">
                    <label for="post">Post</label>
                    <textarea class="post" id="post" name="post"></textarea>
                </div>
                <div class="form-group">
                    <input class="button" type="submit" name="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace("post", {
        height: 300,
        width: '100%',
        filebrowserUploadUrl: "ajaxfile.php?type=file",
        filebrowserImageUploadUrl: "ajaxfile.php?type=image",
    });
    $("form").submit( function(e) {

        var messageLength = CKEDITOR.instances['post'].getData().replace(/<[^>]*>/gi, '').length;

        if( !messageLength ) {

            alert( 'Please enter a message' );

            e.preventDefault();

        }

    });
</script>
</body>
</html>
