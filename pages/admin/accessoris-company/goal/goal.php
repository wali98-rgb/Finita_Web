<div class="cont-main">
    <div class="cont-title">
        <h1>Visi & Misi</h1>
    </div>

    <div class="cards">
        <!-- Menampilkan Visi dan Misi dari Database -->
        <?php
        include "../../../../connections/connect.php";

        $data = mysqli_query($con, "SELECT * FROM goals ORDER BY id_goal DESC LIMIT 1");
        $dataAll = mysqli_fetch_assoc($data);

        if ($dataAll > 0) {
            foreach ($data as $dat) {
        ?>
                <div class="card-btn">
                    <a class="update-btn" href="../accessoris-company/goal/update.php?id=<?php echo $dat['id_goal']; ?>"><i class="bi bi-pencil"></i> Ubah</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <table width="100%">
                            <tr>
                                <th align="left" style="vertical-align: top;" width="5%">Visi :</th>
                                <td width="92%"><?php echo $dat['visi']; ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-reason">
                        <table width="100%">
                            <tr>
                                <th align="left" style="vertical-align: top;" width="5%">Misi :</th>
                                <td width="92%"><?php echo $dat['misi']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php
            }
        } else if ($dataAll == 0) {
            ?>
            <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Visi & Misi Belum Ditetapkan.</h1>
        <?php
        }
        ?>
    </div>

    <form action="../accessoris-company/goal/goal-act.php" method="post">
        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="visi">Visi :</label></p>
                <input type="text" name="visi" id="visi" placeholder="Visi Perusahaan" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="misi">Misi :</label></p>
                <textarea name="misi" id="misi" cols="30" rows="10" placeholder="Misi Perusahaan" required></textarea>
            </div>
        </div>

        <div class="inp-sub">
            <div class="note">
                <p>Form : Visi & Misi Finita Tour & Travel</p>
            </div>

            <div class="inp-submit">
                <input type="submit" name="simpan" id="simpan" value="Simpan">
                <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
            </div>
        </div>
    </form>
</div>