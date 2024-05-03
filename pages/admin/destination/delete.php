<?php
include '../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM destinations WHERE id_destination = '$id'");

$FF = mysqli_fetch_array($query);
$deleteFF = "file_img/$FF[img_destination]";
unlink($deleteFF);

mysqli_query($con, "DELETE FROM destinations WHERE id_destination = '$id'") or die(mysqli_error($con));
header('location:destination.php');
