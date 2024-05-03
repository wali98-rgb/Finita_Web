<?php
include "../../../../connections/connect.php";

$id = $_POST['id_reason'];
$title_reason1 = $_POST['title_reason1'];
$reason1 = $_POST['reason1'];
$title_reason2 = $_POST['title_reason2'];
$reason2 = $_POST['reason2'];
$title_reason3 = $_POST['title_reason3'];
$reason3 = $_POST['reason3'];

if (isset($_POST['ubah'])) {
    mysqli_query($con, "UPDATE reasons SET
                    title_reason1 = '$title_reason1',
                    reason1 = '$reason1',
                    title_reason2 = '$title_reason2',
                    reason2 = '$reason2',
                    title_reason3 = '$title_reason3',
                    reason3 = '$reason3'
                    WHERE id_reason = '$id'
                ");
}

header('location:../../company/company.php');
