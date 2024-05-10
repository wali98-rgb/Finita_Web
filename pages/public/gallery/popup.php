<?php
// Koneksi ke database
include "../../../connections/connect.php";

// Periksa koneksi
if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}

// Ambil ID dari permintaan POST
$id = $_POST['id'];

// Kueri data dari database berdasarkan ID
$sql = "SELECT * FROM documentations WHERE id_documentations = $id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
?>
        <img src="../../admin/documentation/file_img/img/<?php echo $row['img_documentation']; ?>" alt="<?php echo $row['title_documentation']; ?>">

        <div class="img-other">
            <?php
            if ($row['img_documentation2'] != "") {
            ?>
                <img src="../../admin/documentation/file_img/img2/<?php echo $row['img_documentation2']; ?>" alt="<?php echo $row['title_documentation']; ?>">
            <?php
            }
            if ($row['img_documentation3'] != "") {
            ?>
                <img src="../../admin/documentation/file_img/img3/<?php echo $row['img_documentation3']; ?>" alt="<?php echo $row['title_documentation']; ?>">
            <?php
            }
            if ($row['img_documentation4'] != "") {
            ?>
                <img src="../../admin/documentation/file_img/img4/<?php echo $row['img_documentation4']; ?>" alt="<?php echo $row['title_documentation']; ?>">
            <?php
            }
            if ($row['img_documentation5'] != "") {
            ?>
                <img src="../../admin/documentation/file_img/img5/<?php echo $row['img_documentation5']; ?>" alt="<?php echo $row['title_documentation']; ?>">
            <?php
            }
            if ($row['img_documentation6'] != "") {
            ?>
                <img src="../../admin/documentation/file_img/img6/<?php echo $row['img_documentation6']; ?>" alt="<?php echo $row['title_documentation']; ?>">
            <?php
            }
            ?>
        </div>

        <span><?php echo $row['date_documentation']; ?></span>
        <h3><?php echo $row['title_documentation']; ?></h3>
        <p><?php echo $row['desc_documentation']; ?></p>
<?php
    }
} else {
    echo "0 hasil";
}

// Tutup koneksi
$con->close();
