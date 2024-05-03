<?php
include "../../../../connections/connect.php";

if (isset($_POST['simpan'])) {
    mysqli_query($con, "INSERT INTO reasons SET
        title_reason1 = '$_POST[title_reason1]',
        reason1 = '$_POST[reason1]',
        title_reason2 = '$_POST[title_reason2]',
        reason2 = '$_POST[reason2]',
        title_reason3 = '$_POST[title_reason3]',
        reason3 = '$_POST[reason3]'
    ");
}

header('location:../../company/company.php?ha=da');
