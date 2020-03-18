<!DOCTYPE html>
<head>
<script src="admin.js"></script>
</head>

<?php
   require_once("class.user.php");
   $user = new user();
   $id = $_GET['id'];
   $type = $user->get_user_category($id);
   if($user->del_question($id)){
      echo"<h6>Deleted Question</h6>";
	   header('location: teacher.php');
   }
      header('location: teacher.php');
?>