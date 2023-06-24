<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="script.js"></script>
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
                <span id="porukaUsername" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="ime">Name:</label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" />
                </div>
                <span id="porukaIme" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="prezime">Surname:</label>
                <div class="form-field">
                    <input type="text" name="prezime" id="prezime" />
                </div>
                <span id="porukaPrezime" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="password">Password:</label>
                <div class="form-field">
                    <input type="password" name="password" id="password" />
                </div>
                <span id="porukaPassword" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="password2">Vertify password:</label>
                <div class="form-field">
                    <input type="password" name="password2" id="password2" />
                </div>
                <span id="porukaPassword2" class="bojaPoruke"></span>
            </div>
            <div class="form-item buttons">
                <input name="submit" id="registracijaForma" type="submit" value="Registracija">
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

        document.getElementById("registracijaForma").onclick = function (event) {
            let salji = true;

            let poljeUsername = document.getElementById("username");
            let username = poljeUsername.value;

            if (username.length == 0) {
                salji = false;
                poljeUsername.style.border = "1px dashed red";
                document.getElementById("porukaUsername").innerHTML = "You must enter username!";
            } else {
                poljeUsername.style.border = "1px dashed green";
                document.getElementById("porukaUsername").innerHTML = "";
            }

            let poljeIme = document.getElementById("ime");
            let ime = poljeIme.value;

            if (ime.length == 0) {
                poljeIme.style.border = "1px dashed red";
                document.getElementById("porukaIme").innerHTML = "You must enter name!";
            } else {
                poljeIme.style.border = "1px dashed green";
                document.getElementById("porukaIme").innerHTML = "";
            }

            let poljePrezime = document.getElementById("prezime");
            let prezime = poljePrezime.value;

            if (prezime.length == 0) {
                poljePrezime.style.border = "1px dashed red";
                document.getElementById("porukaPrezime").innerHTML = "You must enter surname!";
            } else {
                poljePrezime.style.border = "1px dashed green";
                document.getElementById("porukaPrezime").innerHTML = "";
            }

            let poljePassword = document.getElementById("password");
            let password = poljePassword.value;

            let poljePassword2 = document.getElementById("password2");
            let password2 = poljePassword2.value;

            if (password.length == 0 || password2.length == 0 || password != password2) {
                salji = false;
                poljePassword.style.border = "1px dashed red";
                poljePassword2.style.border = "1px dashed red";
                document.getElementById("porukaPassword").innerHTML = "Passwords must be the same!";
                document.getElementById("porukaPassword2").innerHTML = "Passwords must be the same!";
            } else {
                poljePassword.style.border = "1px dashed green";
                poljePassword2.style.border = "1px dashed green";
                document.getElementById("porukaPassword").innerHTML = "";
                document.getElementById("porukaPassword2").innerHTML = "";
            }

            if (salji != true) {
                event.preventDefault();
            }
        }
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

    $query = "SELECT * FROM korisnik WHERE kime = '$username'";
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) > 0) {
        echo 'Korisnik ime već postoji!';
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
        mysqli_close($dbc);
        echo '<meta http-equiv="refresh" content="0; URL=index.php">';
    }
}
?>