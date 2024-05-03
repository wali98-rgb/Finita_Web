<div class="cont-main">
    <div class="cont-title">
        <h1>Brand yang menyemponsori</h1>
    </div>

    <div class="logo">
        <?php
        include "../../../../connections/connect.php";

        $data = mysqli_query($con, "SELECT * FROM sponsors");
        $dataAll = mysqli_fetch_assoc($data);

        if ($dataAll > 0) {
            foreach ($data as $dat) {
        ?>
                <div class="card-logo">
                    <div class="logo-img">
                        <img src="../accessoris-company/sponsor/file_img/<?php echo $dat['img_sponsor']; ?>" alt="<?php echo $dat['name_sponsor']; ?>">
                    </div>

                    <div class="logo-name">
                        <h3><?php echo $dat['name_sponsor']; ?></h3>
                    </div>

                    <div class="logo-btn">
                        <a href="../accessoris-company/sponsor/delete.php?id=<?php echo $dat['id_sponsor']; ?>"><i class="bi bi-trash"></i> Hapus</a>
                    </div>
                </div>
            <?php
            }
        } else if ($dataAll == 0) {
            ?>
            <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Brand Belum Ditambahkan.</h1>
        <?php
        }
        ?>
    </div>

    <form action="../accessoris-company/sponsor/sponsor-act.php" method="post" enctype="multipart/form-data">
        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="img_sponsor">Logo Brand :</label></p>
                <input type="file" name="img_sponsor" id="img_sponsor" placeholder="Logo brand" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="name_sponsor">Nama Brand</label></p>
                <input type="text" name="name_sponsor" id="name_sponsor" placeholder="Nama Brand" required>
            </div>
        </div>

        <div class="inp-sub" style="padding: .5rem 0 0;">
            <div class="note">
                <p>Form : Brand Sponsor Finita Tour & Travel</p>
            </div>

            <div class="inp-submit">
                <input type="submit" name="simpan" id="simpan" value="Simpan">
                <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
            </div>
        </div>
    </form>
</div>