<?php
include "config.php";
session_start();

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $content = $_POST['post'];
    $username = $_SESSION["username"];

    if($title != ''){
        if ($_FILES['image']['size'] > 0) {
            $targetdir = "image/";
            $_FILES['image']['name'];
            $basename = basename($_FILES['image']['name']);
            $temp = explode(".",$basename);
            $extension = end($temp);
            $dot = ".";
            $filename = uniqid().$dot.$extension;
            $_FILES['image']['tmp_name'];
            $image = $targetdir.$filename;
            if (move_uploaded_file($_FILES['image']['tmp_name'],$targetdir.$filename)) {
        mysqli_query($link, "INSERT INTO contents(title,subtitle,content,image,username) VALUES('".$title."','".$desc."','".$content."','".$image."','".$username."') ");
        header("Location:posts.php");
    }
            }

        }
?>