<?php
include "../../../../connections/connect.php";

$id = $_POST['id_question'];
$question = $_POST['question'];
$answer_question = $_POST['answer_question'];

if (isset($_POST['ubah'])) {
    mysqli_query($con, "UPDATE questions SET
                    question = '$question',
                    answer_question = '$answer_question'
                    WHERE id_question = '$id'
                ");
}

header('location:../../company/company.php');
