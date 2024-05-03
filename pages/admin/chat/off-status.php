<?php
include "../../../connections/connect.php";

$id = $_POST['id_messages'];

if (isset($_POST['baca'])) {
    mysqli_query($con, "UPDATE messages SET
                    status_message = '1'
                    WHERE id_messages = '$id'
                ");
}

header('location:view.php?id=' . $id);
