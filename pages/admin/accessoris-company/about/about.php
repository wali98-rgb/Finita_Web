<div class="cont-main">
    <div class="cont-title">
        <h1>Tentang Kami</h1>
    </div>

    <div class="cards">
        <!-- Menampilkan Visi dan Misi dari Database -->
        <?php
        include "../../../../connections/connect.php";

        $data = mysqli_query($con, "SELECT * FROM companies ORDER BY id_company DESC LIMIT 1");
        $dataAll = mysqli_fetch_assoc($data);

        if ($dataAll > 0) {
            foreach ($data as $dat) {
        ?>
                <div class="card-btn">
                    <a class="update-btn" href="../accessoris-company/about/update.php?id=<?php echo $dat['id_company']; ?>"><i class="bi bi-pencil"></i> Ubah</a>
                </div>
                <div class="card-about">
                    <div class="card-img">
                        <img src="../accessoris-company/about/file_img/<?php echo $dat['img_company']; ?>" alt="Foto Perusahaan Finita Tour & Travel">
                    </div>

                    <div class="card-body">
                        <p><i class="bi bi-envelope"></i> : <?php echo $dat['email_company']; ?></p>
                        <p><i class="bi bi-buildings"></i> : <?php echo $dat['address_company']; ?></p>
                        <span><i class="bi bi-instagram"></i> : <?php echo $dat['sosmed_company']; ?></span>
                        <p class="d"><?php echo $dat['desc_company']; ?></p>
                    </div>
                </div>
            <?php
            }
        } else if ($dataAll == 0) {
            ?>
            <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Deskripsi Perusahaan Belum Ditetapkan.</h1>
        <?php
        }
        ?>
    </div>

    <form action="../accessoris-company/about/about-act.php" method="post" enctype="multipart/form-data">
        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="img_company">Foto Perusahaan :</label></p>
                <input type="file" name="img_company" id="img_company" placeholder="Foto Perusahaan" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="email_company">Email Perusahaan :</label></p>
                <input type="email" name="email_company" id="email_company" placeholder="Email Perusahaan" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="address_company">Alamat Perusahaan :</label></p>
                <input type="text" name="address_company" id="address_company" placeholder="Alamat Perusahaan" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="sosmed_company">Sosial Media Perusahaan :</label></p>
                <input type="text" name="sosmed_company" id="sosmed_company" placeholder="Sosial Media Perusahaan" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="desc_company">Deskripsi Perusahaan :</label></p>
                <textarea name="desc_company" id="desc_company" cols="30" rows="10" placeholder="Deskripsi Perusahaan" required></textarea>
            </div>
        </div>

        <div class="inp-sub">
            <div class="note">
                <p>Form : Deskripsi Perusahaan Finita Tour & Travel</p>
            </div>

            <div class="inp-submit">
                <input type="submit" name="simpan" id="simpan" value="Simpan">
                <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
            </div>
        </div>
    </form>
</div>