<?php 

session_start();

$server = "localhost";
$dbname = "form";
$username = "root";
$password = "";

$conn = new mysqli($server,$username,$password,$dbname);

$id = $_POST['id'];

$query = "DELETE FROM testing WHERE id = '$id'";
$conn->query($query);

?>