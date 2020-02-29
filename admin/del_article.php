<?php
require '../includes/core.php';
$conn=$GLOBALS["connect"];
$id=$_GET['id'];


if (loggedin())
{
	$query="DELETE FROM articles WHERE id='$id'";
	$query_run=mysqli_query($conn,$query);  
	header('Location:manage_articles_view.php');                     
}   
else echo 'FORBIDDEN!';
?>