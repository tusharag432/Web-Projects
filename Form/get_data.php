<?php

session_start();
$server = "localhost";
$dbname = "form";
$username = "root";
$password = "";

$conn = new mysqli($server,$username,$password,$dbname);

$id = $_POST['id'];
$query = "SELECT * FROM testing WHERE id = '$id'";

$result = $conn->query($query)->fetch_assoc();

echo json_encode(array('success'=>true,'name'=>$result['name'],'address'=>$result['address'],'contact'=>$result['contact'],'age'=>$result['age'],'id'=>$result['id']));  


?>