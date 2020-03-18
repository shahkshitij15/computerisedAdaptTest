<!DOCTYPE html>
<head>
<script src="admin.js"></script>
</head>


<?php
   require_once("class.user.php");
   $user = new user();
   $id = $_GET['id'];
   $type = $user->get_user_category($id);
   if($user->del_teacher($id)){
      echo"<h6>Deleted Teacher</h6>";
	   header('location: admin1.php');
   }
   if($user->del_student($id)){
      echo "<h6>Deleted Student</h6>";
      header('location: admin1.php');
   }
	if($user->del_query($id)){
		echo "<h6>Query executed</h6>";
		header('location:admin1.php');
	}
      header('location: admin1.php');
?>

