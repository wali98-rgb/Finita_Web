<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/plugin/app.css">
    <link rel="stylesheet" href="../assets/plugin/chat.css">
    <link rel="stylesheet" href="../assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/footer.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/pagination.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

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
                <li><a href="../documentation/documentation.php"><i class="bi bi-images"></i> DOKUMENTASI KEGIATAN</a></li>
                <li><a class="active" href="chat.php"><i class="bi bi-chat-text"></i> PESAN</a></li>
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
                            <a href="chat.php" class="notif"><i style="color: var(--color-font);" class="bi bi-bell-fill"></i></a>
                        <?php
                        } else if ($msgData == 0) {
                        ?>
                            <a href="chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                        <?php
                        }
                    } else if ($msgInput == 0) {
                        ?>
                        <a href="chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
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
                    <h1>Pesan Masuk</h1>
                    <h1>Pesan Masuk / <i class="bi bi-chat-text"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <h1>Daftar Pesan Masuk</h1>
                    </div>

                    <div class="body-container">
                        <!-- Mengambil Data Pesan dari Database -->
                        <?php
                        $data = mysqli_query($con, "SELECT * FROM messages ORDER BY id_messages DESC");
                        $dataAll = mysqli_fetch_assoc($data);

                        $queryTotalRows = "SELECT COUNT(*) as total_rows FROM messages";
                        $stmtTotalRows = $con->prepare($queryTotalRows);
                        $stmtTotalRows->execute();
                        $resultTotalRows = $stmtTotalRows->get_result();
                        $rowTotalRows = $resultTotalRows->fetch_assoc();

                        $totalRows = $rowTotalRows['total_rows'];

                        $dataPerPage = 10;
                        $totalPages = ceil($totalRows / $dataPerPage);

                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                        $offset = ($currentPage - 1) * $dataPerPage;

                        $queryData = "SELECT * FROM messages ORDER BY id_messages DESC LIMIT ?, ?";
                        $stmtData = $con->prepare($queryData);
                        $stmtData->bind_param("ii", $offset, $dataPerPage);
                        $stmtData->execute();
                        $resultData = $stmtData->get_result();

                        if ($dataAll > 0) {
                            foreach ($resultData as $dat) {
                                $status = $dat['status_message'];
                                if ($status == 0) {
                        ?>
                                    <!-- Card Chat Start -->
                                    <form action="off-status.php?id=<?php echo $dat['id_messages']; ?>" method="post">
                                        <input type="hidden" name="id_messages" id="id_messages" value="<?php echo $dat['id_messages']; ?>">
                                        <button type="submit" name="baca" class="msg-btn">
                                            <div class="msg in">
                                                <div class="card-chat">
                                                    <div class="icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>

                                                    <div class="info-sender">
                                                        <span><?php echo $dat['email_sender']; ?></span>
                                                        <h1><?php echo ucwords(strtolower($dat['name_sender'])); ?></h1>
                                                        <span class="num">No : <?php echo $dat['phone_sender']; ?></span>
                                                    </div>

                                                    <div class="message">
                                                        <p><?php echo substr($dat['messages'], 0, 150) . "..."; ?></p>
                                                    </div>
                                                </div>

                                                <!-- Delete Message Button Start -->
                                                <div class="msg-btn-delete">
                                                    <a class="btn-delete" style="color: var(--color-font2)" href="delete.php?id=<?php echo $dat['id_messages']; ?>"><i style="color: var(--color-font2);" class="bi bi-trash"></i></a>
                                                </div>
                                                <!-- Delete Message Button End -->
                                            </div>
                                        </button>
                                    </form>
                                    <!-- Card Chat Start -->
                                <?php
                                } else if ($status == 1) {
                                ?>
                                    <!-- Card Chat Start -->
                                    <form action="off-status.php?id=<?php echo $dat['id_messages']; ?>" method="post">
                                        <input type="hidden" name="id_messages" id="id_messages" value="<?php echo $dat['id_messages']; ?>">
                                        <button type="submit" name="baca" class="msg-btn">
                                            <div class="msg">
                                                <div class="card-chat">
                                                    <div class="icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>

                                                    <div class="info-sender">
                                                        <span><?php echo $dat['email_sender']; ?></span>
                                                        <h1><?php echo ucfirst(strtolower($dat['name_sender'])); ?></h1>
                                                        <span class="num">No : <?php echo $dat['phone_sender']; ?></span>
                                                    </div>

                                                    <div class="message">
                                                        <p><?php echo substr($dat['messages'], 0, 150) . "..."; ?></p>
                                                    </div>
                                                </div>

                                                <!-- Delete Message Button Start -->
                                                <div class="msg-btn-delete">
                                                    <a class="btn-delete" style="color: var(--color-font2)" href="delete.php?id=<?php echo $dat['id_messages']; ?>"><i style="color: var(--color-font2);" class="bi bi-trash"></i></a>
                                                </div>
                                                <!-- Delete Message Button End -->
                                            </div>
                                        </button>
                                    </form>
                                    <!-- Card Chat Start -->
                            <?php
                                }
                            }
                        } else if ($dataAll == 0) {
                            ?>
                            <!-- Card Chat Start -->
                            <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Belum Ada Pesan yang Masuk.</h1>
                            <!-- Card Chat Start -->
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination Start -->
                    <div class="pagination">
                        <div class="wrap">
                            <?php
                            $now;
                            if ($currentPage > 1) {
                                $prevPage = $currentPage - 1;
                                echo "<a href='?page=$prevPage'><i class='bi-caret-left'></i></a>";
                            } else {
                                echo "<span><i class='bi-caret-left'></i></span>";
                            }
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a style='' href='?page=$i'>$i</a>";
                            }

                            if ($currentPage < $totalPages) {
                                $nextPage = $currentPage + 1;
                                echo "<a href='?page=$nextPage'><i class='bi-caret-right'></i></a>";
                            } else {
                                echo "<span><i class='bi-caret-right'></i></span>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Pagination End -->
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
</body>

</html>