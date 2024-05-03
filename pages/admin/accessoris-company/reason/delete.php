<?php
include '../../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM reasons WHERE id_reason = '$id'");

mysqli_query($con, "DELETE FROM reasons WHERE id_reason = '$id'") or die(mysqli_error($con));
header('location:../../company/company.php');
