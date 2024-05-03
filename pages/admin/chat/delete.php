<?php
include '../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM messages WHERE id_messages = '$id'");

mysqli_query($con, "DELETE FROM messages WHERE id_messages = '$id'") or die(mysqli_error($con));
header('location:chat.php');
