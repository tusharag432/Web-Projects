<?php

session_start();
$server = "localhost";
$database = "form";
$username = "root";
$password = "";

$conn = new mysqli($server,$username,$password,$database);

$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$id = @$_POST['id'];
if(empty($id))
$query = "INSERT INTO testing(name, address, contact,age) VALUES('$name','$address','$contact','$age')";
else
$query="UPDATE testing SET name='$name', address = '$address', contact = '$contact', age = '$age' WHERE id = $id";
$conn->query($query);
 
?>