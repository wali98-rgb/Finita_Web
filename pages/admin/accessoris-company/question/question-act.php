<?php
include "../../../../connections/connect.php";

if (isset($_POST['simpan'])) {
    mysqli_query($con, "INSERT INTO questions SET
            question = '$_POST[question]',
            answer_question = '$_POST[answer_question]'
        ");

    header('location:../../company/company.php?msg=success');
}
