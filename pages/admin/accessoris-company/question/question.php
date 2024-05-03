<div class="cont-main">
    <div class="cont-title">
        <h1>Pertanyaan yang selalu ditanyakan</h1>
    </div>

    <div class="cards">
        <!-- Menampilkan Data Pertanyaan dari Database -->
        <?php
        include "../../../../connections/connect.php";

        $data = mysqli_query($con, "SELECT * FROM questions");
        $dataAll = mysqli_fetch_assoc($data);

        if ($dataAll > 0) {
            foreach ($data as $dat) {
        ?>
                <div class="card">
                    <div class="card-header">
                        <h1>Pertanyaan : <?php echo $dat['question']; ?></h1>
                        <div class="card-btn">
                            <a class="dlt-btn" href="../accessoris-company/question/delete.php?id=<?php echo $dat['id_question']; ?>"><i class="bi bi-trash"></i> Hapus</a>
                            <a class="update-btn" href="../accessoris-company/question/update.php?id=<?php echo $dat['id_question']; ?>"><i class="bi bi-pencil"></i> Ubah</a>
                        </div>
                    </div>

                    <div class="card-reason">
                        <table width="100%">
                            <tr>
                                <th align="left" style="vertical-align: top;" width="10%">Jawaban :</th>
                                <td width="90%"><?php echo $dat['answer_question']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php
            }
        } else if ($dataAll == 0) {
            ?>
            <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Pertanyaan Belum Ditambahkan.</h1>
        <?php
        }
        ?>
    </div>

    <form action="../accessoris-company/question/question-act.php" method="post">
        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="question">Pertanyaan :</label></p>
                <input type="text" name="question" id="question" placeholder="Pertanyaan" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="answer_question">Jawaban Pertanyaan :</label></p>
                <textarea name="answer_question" id="answer_question" cols="30" rows="10" placeholder="Alasan" required></textarea>
            </div>
        </div>

        <div class="inp-sub">
            <div class="note">
                <p>Form : Pembuatan FAQ Finita Tour & Travel</p>
            </div>

            <div class="inp-submit">
                <input type="submit" name="simpan" id="simpan" value="Simpan">
                <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
            </div>
        </div>
    </form>
</div>