<?php
include('../connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 

mysql_query("UPDATE student SET accepted='1' WHERE id='$id'");

header("location: acceptstudent.php");

}
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: acceptstudent.php");
 }
 
?>