<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../../landingpage/db.php");

if(isset($_GET)) {

	//Delete User using id and redirect
	$sql = "DELETE FROM users WHERE id_user='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: applications.php");
		exit();
	} else {
		echo "Error";
	}
}