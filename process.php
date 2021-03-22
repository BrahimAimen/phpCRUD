<?php

session_start();

$mysqli= new mysqli('localhost', 'root', '', 'CRUD') or die(mysqli_error($mysqli));

$update=false;
$name='';
$location='';

if(isset($_POST['save'])){
  $name = $_POST['name'];
  $location = $_POST['location'];
  $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')") or die(musqli_error($mysqli));
  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";

  header("location: applications.php");
}
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM data where id= $id") or die($mysqli->error());
  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";
  header("location: applications.php");
}




?>