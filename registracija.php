<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Plain_News</title>
</head>

<body>
    <img id="logo22" src="images/PNEWS.png" alt="logo"
        style="position: fixed; z-index: 100; width: 180px; height: 100px; margin-left: 15%; margin-top: -50px;" />
    <nav role="navigation">
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">Menu</label>
        <label class="dropLogo">Plain_News</label>
        <ul>
            <li><label class="logo">Plain_Newssssssssssss</label></li>
            <li><a href="index.php">HOME</a></li>
            <li><a href="kategorija.php?id=sport">SPORT</a></li>
            <li><a href="kategorija.php?id=culture">CULTURE</a></li>
            <li><a href="kategorija.php?id=science">SCIENCE</a></li>
            <li class="active"><a class="active" href="login.php">LOGIN</a></li>
        </ul>
    </nav>

    <div class="container">
        <header>
            <h1>REGISTRACIJA</h1>
            <hr>
        </header>
        <form action="" method="POST">
            <div class="form-item">
                <label for="username">Username:</label>
                <div class="form-field">
                    <input type="text" name="username" id="username" />
                </div>
            </div>
            <div class="form-item">
                <label for="ime">Name:</label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" />
                </div>
            </div>
            <div class="form-item">
                <label for="prezime">Surname:</label>
                <div class="form-field">
                    <input type="text" name="prezime" id="prezime" />
                </div>
            </div>
            <div class="form-item">
                <label for="password">Password:</label>
                <div class="form-field">
                    <input type="password" name="password" id="password" />
                </div>
            </div>
            <div class="form-item">
                <label for="password2">Vertify password:</label>
                <div class="form-field">
                    <input type="password" name="password2" id="password2" />
                </div>
            </div>
            <div class="form-item buttons">
                <input name="Registracija" id="registracijaForma" type="submit" value="Registracija">
            </div>
        </form>
    </div>

    <div class="footer">
        <ul>
            <li><a href="#">Copyright 2023 Marko Faletar</a></li>
            <li><a href="#">Github [faletar.marko@gmail.com]</a></li>
        </ul>
    </div>

    <script>
        const checkbox = document.getElementById("check");
        checkbox.addEventListener("change", function () {
            if (this.checked) {
                //blokira scroll kada je otvoren dropdown menu
                document.querySelector("body").style.overflowX = "hidden";
                document.querySelector("body").style.overflowY = "hidden";
            } else {
                //odblokira scroll kada je zatvoren dropdown menu
                document.querySelector("body").style.overflowX = "visible";
                document.querySelector("body").style.overflowY = "visible";
            }
        });
    </script>
</body>

</html>

<?php

include 'connect.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['ime']) && isset($_POST['prezime'])) {
    $razina = 0;
    $username = $_POST['username'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password !== $password2) {
        exit();
    } else {
        $query = "SELECT * FROM korisnik WHERE kime = '$username'";
        $result = mysqli_query($dbc, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<p>Korisnik ime već postoji!</p>';
            exit();
        } else {
            $hashed_password = password_hash($password, CRYPT_BLOWFISH);

            $sql = "INSERT INTO korisnik (ime, prezime, kime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
}
?>