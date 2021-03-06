<?php
/*author: Ferran Rovira 	mail:ferran294@gmail.com
Controller where will be displayed a sticky form and will update the data of the user */

include_once $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/session_checker.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/getUserHelper.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/myPromus/model/settings-model.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/myPromus/classes/user.class.php';

$userId=$_SESSION['userId'];


if(isset($_POST['submit'])){

	if(isset($_POST['newPassword'])){
		$newPassword=$_POST['newPassword'];

		if($newPassword!="Password"){
		setPassword($userId,$newPassword);		//To change because in the view is set by default to Password
		}
	}

	if(isset($_POST['newEmail'])){
		$newEmail=$_POST['newEmail'];
		setEmail($userId,$newEmail);
	}

	if(isset($_POST['newCountry'])){
		$newCountry=$_POST['newCountry'];
		setCountry($userId,$newCountry);
	}

	if(isset($_POST['newCity'])){
		$newCity=$_POST['newCity'];
		setCity($userId,$newCity);
	}

	if($_FILES['userfile']['size']!=0){
		
		include $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/imageUploader.inc.php';
	}

	header("Location: ../controller/profile.php");

}else{
	$titlePage="Update profile";
	$user=getUser($userId);
	include $_SERVER['DOCUMENT_ROOT'].'/myPromus/view/includes/update-profile.php';

}

?>