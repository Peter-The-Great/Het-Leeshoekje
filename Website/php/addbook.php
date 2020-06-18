<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["title"], $_POST["text"], $_POST["subtext"], $_POST['image'])){
    if ($stmt = $conn->prepare("INSERT INTO articles (id, title, subtext, text, image) values (NULL, ?, ?, ?, ?);")) {
        $stmt->bind_param("ssss", $_POST['title'], $_POST['subtext'], $_POST['text'], $_POST['image']);
        $stmt->execute();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/createpost.php?error=mysql');
    } 
} 
else {
    header('Location: ../admin/createpost.php?error=fields');
}