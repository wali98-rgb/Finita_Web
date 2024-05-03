<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../assets/plugin/css/app.css">
    <link rel="stylesheet" href="../../assets/plugin/css/index.css">
    <link rel="stylesheet" href="../../assets/plugin/css/register.css">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../assets/img/logo/favicon.jpeg">

    <title>Finita Tour & Travel</title>
</head>

<body>
    <!-- Registration Session Start -->
    <div class="register">
        <div class="title">
            <h1>Finita Tour & Travels</h1>
        </div>

        <div class="content">
            <form action="register-act.php" method="post">
                <div class="inp-col-1">
                    <div class="form-inp">
                        <input type="text" name="first_name" id="first_name" placeholder="Nama Depan" required>
                    </div>
                </div>

                <div class="inp-col-2">
                    <div class="form-inp">
                        <input type="text" name="last_name" id="last_name" placeholder="Nama Belakang" required>
                    </div>
                </div>

                <div class="inp-col-3">
                    <div class="form-inp">
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                </div>

                <div class="inp-col-4">
                    <div class="form-inp">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="inp-col-5">
                    <div class="form-inp">
                        <input type="number" name="phone_num" id="phone_num" placeholder="Nomor Telepon" required>
                    </div>
                </div>

                <div class="form-btn">
                    <input type="submit" name="regis" id="regis" value="Register">
                </div>
            </form>
        </div>
    </div>
    <!-- Registration Session End -->

    <!-- My JavaScript -->
    <script src="assets/plugin/js/script.js"></script>
</body>

</html>