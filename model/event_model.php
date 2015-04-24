<?php
/*author: Ferran Rovira 	mail:ferran294@gmail.com
Model functions to create,modify or delete event*/

require $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/db_connection.inc.php';	//Database connections
require $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/id_parser.inc.php';
require $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/getUserHelper.inc.php';

//Create an event and insert it in the database
function createEvent($userAdmin,$name,$date,$place,$description,$friends,$imageURL){

	global $link;
	$userAdmin=getUserId($userAdmin);
	$dateToday=date("Y-m-d");

	if(!isset($imageURL)){
	$imageURL=$_SERVER['DOCUMENT_ROOT'].'/myPromus/view/assets/eventImages/default.jpg';
	}


	$sql="INSERT INTO event (user_id,name,date,place,description,image_url)
	 VALUES ('$userAdmin',$name,'$date','$place','$description','$imageURL')";	

	if(!mysqli_query($link,$sql)){

		return false;
	
	}else{
		$eventId = mysqli_insert_id($link);  //get the id of the event inserted in the DB

		$sql="INSERT INTO event_friend (event_id,friend_id) VALUES ('$eventId','$userAdmin')";	//insert in the event_friend table the admin of the event as an assistant
		

		if(!mysqli_query($link,$sql)){

			return false;
		
		}else{
			//Insert the friends that are invited into the event request table
			if(isset($friends)){
				foreach ($friends as $friend) {
					$friendId=getUserId($friend);
					$sql="INSERT INTO event_request (user_id,friend_id,event_id,date) VALUES ('$userAdmin','$friendId','$eventId','$dateToday')";
					mysqli_query($link,$sql) or die(mysqli_error($link));
				}
			}
			return $eventId;
		
		}

		
	}
}

//Delete event 		(the username argument is to see if the user have permission to delete it)
function deleteEvent($idEvent,$username){
	global $link;

	$sql="SELECT user_id FROM event WHERE user_id='$username' AND id='$idEvent'";
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)==0){
		return false; //The user is not the admin and can't delete the event or the event doesn't exists
	}else{
		$sql="DELETE FROM event WHERE id='$idEvent'";
		if(mysqli_query($link,$sql)){
			return true;
		}else{
			return false;  //Error deleting the event
		}
	}
}

function checkAdmin($userId,$eventId){
	global $link;

	$sql="SELECT * FROM event WHERE id='$eventId' AND user_id='$userId'";
	$result=mysqli_query($link,$sql) or die(mysqli_error($link));
	$isAdmin=mysqli_num_rows($result);

	if($isAdmin==1){
		return true;
	}else{
		return false;
	}

}

//Function that returns an array of Users that are going to go to an event
function getParticipants($eventId){
	global $link;

	$sql="SELECT friend_id FROM event_friend WHERE event_id='$eventId'";
	$result=mysqli_query($link,$sql) or die (mysqli_error($link));

	while($userInfo=mysqli_fetch_assoc($result)){
		$user=getUser($userInfo['friend_id']);
		$friends[]=$user;
	}

	if(isset($friends)){
		return $friends;
	}else{
		return null;
	}


}




?>