<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/plugin/app.css">
    <link rel="stylesheet" href="../assets/plugin/company.css">
    <link rel="stylesheet" href="../assets/plugin/reason.css">
    <link rel="stylesheet" href="../assets/plugin/sponsor.css">
    <link rel="stylesheet" href="../assets/plugin/question.css">
    <link rel="stylesheet" href="../assets/plugin/goal.css">
    <link rel="stylesheet" href="../assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/footer.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    include "../../../connections/connect.php";

    session_start();
    if ($_SESSION['status'] != "login") {
        header('location:../../../auth/login/login.php?pesan=not_login');
    }
    ?>

    <!-- Pages Session Start -->
    <div class="page">
        <!-- Sidebar Start -->
        <aside class="sidebars">
            <div class="name">
                <h1><?php echo strtoupper($_SESSION['first_name'] . " " . $_SESSION['last_name']); ?></h1>
            </div>

            <div class="side-btn">
                <li><a href="../home.php"><i class="bi bi-house"></i> HOME</a></li>
                <li><a href="../destination/destination.php"><i class="bi bi-building"></i> DESTINASI</a></li>
                <li><a href="../article/article.php"><i class="bi bi-archive"></i> ARTIKEL</a></li>
                <li><a class="active" href="company.php"><i class="bi bi-receipt-cutoff"></i> PROPERTI PERUSAHAAN</a></li>
                <li><a href="../user/user.php"><i class="bi bi-person-circle"></i> KELOLA ADMIN</a></li>
                <li><a href="../documentation/documentation.php"><i class="bi bi-images"></i> DOKUMENTASI KEGIATAN</a></li>
                <li><a href="../chat/chat.php"><i class="bi bi-chat-text"></i> PESAN</a></li>
            </div>
        </aside>
        <!-- Sidebar End -->

        <!-- Main Start -->
        <div class="main">
            <!-- Navbar Start -->
            <nav class="navbars">
                <div class="name-nav">
                    <h1>FINITA TOUR & TRAVEL</h1>
                </div>

                <div class="extra-nav">
                    <?php
                    $msgAll = mysqli_query($con, "SELECT COUNT(*) as notif FROM messages");
                    $msgData = mysqli_num_rows($msgAll);

                    $msgIn = mysqli_query($con, "SELECT * FROM messages WHERE status_message=1");
                    $msgInput = mysqli_fetch_assoc($msgIn);

                    if ($msgInput > 0) {
                        if ($msgData == 1) {
                    ?>
                            <a href="../chat/chat.php" class="notif"><i style="color: var(--color-font);" class="bi bi-bell-fill"></i></a>
                        <?php
                        } else if ($msgData == 0) {
                        ?>
                            <a href="../chat/chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                        <?php
                        }
                    } else if ($msgInput == 0) {
                        ?>
                        <a href="../chat/chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                    <?php
                    }
                    ?>
                    <a href="../../../auth/logout.php" class="account"><i style="color: var(--color-font2);" class="bi bi-door-open"></i></a>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Content Start -->
            <section class="content">
                <div class="header-content">
                    <h1>Properti Perusahaan</h1>
                    <h1>Properti Perusahaan / <i class="bi bi-receipt-cutoff"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <div class="cont-nav">
                            <!-- Tombol untuk memuat konten baru -->
                            <button id="reason">Alasan</button>
                            <button id="sponsor">Sponsor</button>
                            <button id="question">Pertanyaan</button>
                            <button id="goal">Visi & Misi</button>
                        </div>
                    </div>

                    <!-- Kontainer untuk konten yang akan dimuat -->
                    <div class="body-container" id="content_container">
                        <!-- Konten akan dimuat di sini -->
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
                    </div>
                </div>
            </section>
            <!-- Content End -->

            <!-- Footer Start -->
            <footer class="footer">
                <h1>&copy; Copyright | Finita Tour & Travel 2024</h1>
            </footer>
            <!-- Footer End -->
        </div>
        <!-- Main End -->
    </div>
    <!-- Pages Session Start -->

    <script>
        $(document).ready(function() {
            $("#reason").click(function() {
                // Menggunakan AJAX untuk memuat konten baru dari server
                $.ajax({
                    url: "../accessoris-company/reason/reason.php", // URL ke skrip PHP yang akan memproses permintaan
                    type: "GET", // Metode permintaan
                    success: function(response) {
                        // Menampilkan konten baru di dalam kontainer
                        $("#content_container").html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#sponsor").click(function() {
                // Menggunakan AJAX untuk memuat konten baru dari server
                $.ajax({
                    url: "../accessoris-company/sponsor/sponsor.php", // URL ke skrip PHP yang akan memproses permintaan
                    type: "GET", // Metode permintaan
                    success: function(response) {
                        // Menampilkan konten baru di dalam kontainer
                        $("#content_container").html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#question").click(function() {
                // Menggunakan AJAX untuk memuat konten baru dari server
                $.ajax({
                    url: "../accessoris-company/question/question.php", // URL ke skrip PHP yang akan memproses permintaan
                    type: "GET", // Metode permintaan
                    success: function(response) {
                        // Menampilkan konten baru di dalam kontainer
                        $("#content_container").html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#goal").click(function() {
                // Menggunakan AJAX untuk memuat konten baru dari server
                $.ajax({
                    url: "../accessoris-company/goal/goal.php", // URL ke skrip PHP yang akan memproses permintaan
                    type: "GET", // Metode permintaan
                    success: function(response) {
                        // Menampilkan konten baru di dalam kontainer
                        $("#content_container").html(response);
                    }
                });
            });
        });

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
</body>

</html>