<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/plugin/app.css">
    <link rel="stylesheet" href="../assets/plugin/documentation.css">
    <link rel="stylesheet" href="../assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/footer.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

    <!-- My Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <li><a href="../company/company.php"><i class="bi bi-receipt-cutoff"></i> PROPERTI PERUSAHAAN</a></li>
                <li><a href="../user/user.php"><i class="bi bi-person-circle"></i> KELOLA ADMIN</a></li>
                <li><a class="active" href="documentation.php"><i class="bi bi-images"></i> DOKUMENTASI KEGIATAN</a></li>
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
                    <h1>Dokumentasi Kegiatan</h1>
                    <h1>Dokumentasi Kegiatan / <i class="bi bi-images"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <a style="background-color: var(--third);" href="documentation.php"><i class="bi bi-arrow-left-circle"></i> Kembali ke Galeri Dokumentasi</a>
                    </div>

                    <div class="body-form">
                        <form action="create-act.php" method="post" enctype="multipart/form-data">
                            <div class="inp-col-1">
                                <div class="form-inp">
                                    <p><label for="img_documentation">Masukkan Foto Dokumentasi :</label></p>
                                    <input class="inp-file" type="file" name="img_documentation" id="img_documentation" placeholder="Masukkan Foto Dokumentasi" multiple required>
                                </div>
                            </div>

                            <div class="inp-col-1" style="display: none;" id="inputImg2">
                                <div class="form-inp">
                                    <p><label for="img_documentation2">Masukkan Foto Dokumentasi 2 :</label></p>
                                    <input class="inp-file" type="file" name="img_documentation2" id="img_documentation2" placeholder="Masukkan Foto Dokumentasi 2">
                                </div>
                            </div>

                            <div class="inp-col-1" style="display: none;" id="inputImg3">
                                <div class="form-inp">
                                    <p><label for="img_documentation3">Masukkan Foto Dokumentasi 3 :</label></p>
                                    <input class="inp-file" type="file" name="img_documentation3" id="img_documentation3" placeholder="Masukkan Foto Dokumentasi 3">
                                </div>
                            </div>

                            <div class="inp-col-1" style="display: none;" id="inputImg4">
                                <div class="form-inp">
                                    <p><label for="img_documentation4">Masukkan Foto Dokumentasi 4 :</label></p>
                                    <input class="inp-file" type="file" name="img_documentation4" id="img_documentation4" placeholder="Masukkan Foto Dokumentasi 4">
                                </div>
                            </div>

                            <div class="inp-col-1" style="display: none;" id="inputImg5">
                                <div class="form-inp">
                                    <p><label for="img_documentation5">Masukkan Foto Dokumentasi 5 :</label></p>
                                    <input class="inp-file" type="file" name="img_documentation5" id="img_documentation5" placeholder="Masukkan Foto Dokumentasi 5">
                                </div>
                            </div>

                            <div class="inp-col-1" style="display: none;" id="inputImg6">
                                <div class="form-inp">
                                    <p><label for="img_documentation6">Masukkan Foto Dokumentasi 6 :</label></p>
                                    <input class="inp-file" type="file" name="img_documentation6" id="img_documentation6" placeholder="Masukkan Foto Dokumentasi 6">
                                </div>
                            </div>

                            <div class="inp-col-2">
                                <div class="form-inp">
                                    <p><label for="title_documentation">Nama Kegiatan :</label></p>
                                    <input type="text" name="title_documentation" id="title_documentation" placeholder="Masukkan Nama dari Kegiatan" required>
                                </div>
                            </div>

                            <div class="inp-col-3">
                                <div class="form-inp">
                                    <p><label for="desc_documentation">Deskripsi Dokumentasi :</label></p>
                                    <textarea name="desc_documentation" id="desc_documentation" cols="30" rows="10" placeholder="Masukkan Deskripsi Dokumentasi Kegiatan" required></textarea>
                                </div>
                            </div>

                            <div class="inp-sub">
                                <div class="note">
                                    <p>Form : Penginputan Dokumentasi Kegiatan</p>
                                </div>

                                <div class="inp-submit">
                                    <input type="submit" name="simpan" id="simpan" value="Simpan">
                                    <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
                                </div>
                            </div>
                        </form>
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
    <!-- Pages Session End -->

    <!-- My JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input1 = document.querySelector('input[name="img_documentation"]');
            var input2 = document.querySelector('input[name="img_documentation2"]');
            var input3 = document.querySelector('input[name="img_documentation3"]');
            var input4 = document.querySelector('input[name="img_documentation4"]');
            var input5 = document.querySelector('input[name="img_documentation5"]');
            var input6 = document.querySelector('input[name="img_documentation6"]');

            input1.addEventListener('input', function() {
                if (input1.value.trim() !== '') {
                    inputImg2.style.display = 'block';
                } else {
                    inputImg2.style.display = 'none';
                }
            });

            input2.addEventListener('input', function() {
                if (input2.value.trim() !== '') {
                    inputImg3.style.display = 'block';
                } else {
                    inputImg3.style.display = 'none';
                }
            });

            input3.addEventListener('input', function() {
                if (input3.value.trim() !== '') {
                    inputImg4.style.display = 'block';
                } else {
                    inputImg4.style.display = 'none';
                }
            });

            input4.addEventListener('input', function() {
                if (input4.value.trim() !== '') {
                    inputImg5.style.display = 'block';
                } else {
                    inputImg5.style.display = 'none';
                }
            });

            input5.addEventListener('input', function() {
                if (input5.value.trim() !== '') {
                    inputImg6.style.display = 'block';
                } else {
                    inputImg6.style.display = 'none';
                }
            });
        });
    </script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>