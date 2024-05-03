<?php
if (isset($_GET['cari'])) {
    $destination = $_GET['id'];
    $calendar = $_GET['calendar'];

    header('location:view.php?id=' . $destination . '&calendar=' . $calendar);
}
