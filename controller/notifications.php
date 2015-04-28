<?php
/*author: Ferran Rovira 	mail:ferran294@gmail.com
Controller of the requests page */

include $_SERVER['DOCUMENT_ROOT'].'/myPromus/includes/session_checker.inc.php'; //Check if the session has expired,in that case redirect to the main page
include $_SERVER['DOCUMENT_ROOT'].'/myPromus/model/requests_model.php';

$titlePage="Notifications";
$userId=$_SESSION['userId'];

$friendRequests=getFriendRequests($userId);
$eventRequests=getEventRequests($userId);




include $_SERVER['DOCUMENT_ROOT'].'/myPromus/view/notification.php';
?>