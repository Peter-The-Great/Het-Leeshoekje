<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["text"])){
    $sql = "UPDATE bio SET text=? WHERE id=1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "s",
            $_POST["text"],
        );
    
        $stmt->execute();
        $stmt->close();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/biografie.php?error=mysql');
    } 
}else {
    header('Location: ../admin/biografie.php?error=fields');
}
?>