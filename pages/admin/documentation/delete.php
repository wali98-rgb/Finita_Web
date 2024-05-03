<?php
include '../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM documentations WHERE id_documentations = '$id'");

$FF = mysqli_fetch_array($query);
$deleteFF = "file_img/$FF[img_documentation]";
unlink($deleteFF);

mysqli_query($con, "DELETE FROM documentations WHERE id_documentations = '$id'") or die(mysqli_error($con));
header('location:documentation.php');
