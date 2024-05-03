<!-- Script Ajax Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#list").click(function() {
            // Menggunakan AJAX untuk memuat konten baru dari server
            $.ajax({
                url: "../accessoris-company/reason/data.php", // URL ke skrip PHP yang akan memproses permintaan
                type: "GET", // Metode permintaan
                success: function(response) {
                    // Menampilkan konten baru di dalam kontainer
                    $("#content_container").html(response);
                }
            });
        });
    });
</script>
<!-- Script Ajax End -->

<div class="cont-main">
    <div class="cont-title">
        <h1>Mengapa Memilih Kami</h1>
    </div>

    <form action="../accessoris-company/reason/reason-act.php" method="post">
        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="title_reason1">Poin Alasan Pertama :</label></p>
                <input type="text" name="title_reason1" id="title_reason1" placeholder="Poin Alasan Pertama" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="reason1">Deskripsi Alasan Pertama :</label></p>
                <textarea name="reason1" id="reason1" cols="30" rows="10" placeholder="Alasan Pertama" required></textarea>
            </div>
        </div>

        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="title_reason2">Poin Alasan Kedua :</label></p>
                <input type="text" name="title_reason2" id="title_reason2" placeholder="Poin Alasan Kedua" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="reason2">Deskripsi Alasan Kedua :</label></p>
                <textarea name="reason2" id="reason2" cols="30" rows="10" placeholder="Alasan Kedua" required></textarea>
            </div>
        </div>

        <div class="inp-col-1">
            <div class="form-inp">
                <p><label for="title_reason3">Poin Alasan Ketiga :</label></p>
                <input type="text" name="title_reason3" id="title_reason3" placeholder="Poin Alasan Ketiga" required>
            </div>
        </div>

        <div class="inp-col-2">
            <div class="form-inp">
                <p><label for="reason3">Deskripsi Alasan Ketiga :</label></p>
                <textarea name="reason3" id="reason3" cols="30" rows="10" placeholder="Alasan Ketiga" required></textarea>
            </div>
        </div>

        <div class="inp-sub">
            <div class="note">
                <button id="list">Daftar Alasan</button>
                <p>Form : Keunggulan Finita Tour & Travel</p>
            </div>

            <div class="inp-submit">
                <input type="submit" name="simpan" id="simpan" value="Simpan">
                <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
            </div>
        </div>
    </form>
</div>