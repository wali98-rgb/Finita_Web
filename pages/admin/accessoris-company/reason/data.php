<!-- Memanggil Data Pertanyaan dari Database -->
<?php
include "../../../../connections/connect.php";

$data = mysqli_query($con, "SELECT * FROM reasons");
$dataAll = mysqli_fetch_assoc($data);

if ($dataAll > 0) {
    foreach ($data as $dat) {
?>
        <div class="content">
            <div class="title">
                <h1>Daftar Alasan</h1>
            </div>

            <div class="cards">
                <div class="card-btn">
                    <a href="../accessoris-company/reason/delete.php?id=<?php echo $dat['id_reason']; ?>"><i class="bi bi-trash"></i> Hapus</a>
                    <a class="update-btn" href="../accessoris-company/reason/update.php?id=<?php echo $dat['id_reason']; ?>"><i class="bi bi-pencil"></i> Ubah</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h1>Poin Alasan Pertama : <?php echo $dat['title_reason1']; ?></h1>
                    </div>

                    <div class="card-reason">
                        <table width="100%">
                            <tr>
                                <th align="left" width="8%">Alasan :</th>
                                <td width="92%"><?php echo $dat['reason1']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h1>Poin Alasan Kedua : <?php echo $dat['title_reason2']; ?></h1>
                    </div>

                    <div class="card-reason">
                        <table width="100%">
                            <tr>
                                <th align="left" width="8%">Alasan :</th>
                                <td width="92%"><?php echo $dat['reason2']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h1>Poin Alasan Ketiga : <?php echo $dat['title_reason3']; ?></h1>
                    </div>

                    <div class="card-reason">
                        <table width="100%">
                            <tr>
                                <th align="left" width="8%">Alasan :</th>
                                <td width="92%"><?php echo $dat['reason3']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else if ($dataAll == 0) {
    ?>
    <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Alasan Belum Ditambahkan.</h1>
<?php
}
?>