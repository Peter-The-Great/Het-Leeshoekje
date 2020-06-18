<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["title"], $_POST["text"], $_POST["subtext"], $_POST['image'])){
    $sql = "UPDATE articles SET title=?, subtext=?, text=?, image=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $_POST['title'], $_POST['subtext'], $_POST['text'], $_POST['image'], $_GET['id']);
        $stmt->execute();
        //$stmt->close();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/changepost.php?error=mysql');
    } 
} else {
    header('Location: ../admin/changepost.php?error=fields');
}
?>