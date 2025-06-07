<?php
include "config.php";
session_start();

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $content = $_POST['post'];
    $username = $_SESSION["username"];

    if ($title != '') {
        if ($_FILES['image']['size'] > 0) {
            $targetdir = "image/";
            $basename = basename($_FILES['image']['name']);
            $extension = pathinfo($basename, PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            $image = $targetdir . $filename;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
                $stmt = $link->prepare("INSERT INTO contents(title, subtitle, content, image, username) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param('sssss', $title, $desc, $content, $image, $username);
                $stmt->execute();
                $stmt->close();
                header("Location:posts.php");
            }
        }
    }
?>
