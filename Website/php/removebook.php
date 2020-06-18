<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

//Hier moet een get die de id uit de url gaat halen

$id = $_GET["id"];

if(isset($id)){
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("location: ../admin/dashboard.php");