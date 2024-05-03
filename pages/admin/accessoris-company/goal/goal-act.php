<?php
include "../../../../connections/connect.php";

if (isset($_POST['simpan'])) {
    mysqli_query($con, "DELETE FROM goals") or die(mysqli_error($con));

    mysqli_query($con, "INSERT INTO goals SET
            visi = '$_POST[visi]',
            misi = '$_POST[misi]'
        ");

    header('location:../../company/company.php?msg=success');
}
