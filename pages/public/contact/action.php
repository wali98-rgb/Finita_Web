<?php
include "../../../connections/connect.php";

if (isset($_POST['kirim'])) {
    mysqli_query($con, "INSERT INTO messages SET
        name_sender = '$_POST[name_sender]',
        phone_sender = '$_POST[phone_sender]',
        email_sender = '$_POST[email_sender]',
        messages = '$_POST[messages]',
        status_message = '0'
    ");
}

header('location:contact.php?ha=da');
