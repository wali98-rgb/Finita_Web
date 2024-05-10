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
        <img src="../../admin/documentation/file_img/<?php echo $row['img_documentation']; ?>" alt="<?php echo $row['title_documentation']; ?>">
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
