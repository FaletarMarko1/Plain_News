<?php
session_start();
?>
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
            <h1>LOGIN</h1>
            <hr>
        </header>
        <form action="" method="POST">
            <div class="form-item">
                <label for="username">Username:</label>
                <div class="form-field">
                    <input type="text" name="username" id="username"/>
                </div>
            </div>
            <div class="form-item">
                <label for="password">Password:</label>
                <div class="form-field">
                    <input type="password" name="password" id="password"/>
                </div>
            </div>
            <div class="form-item buttons">
                <input name="Login" id="loginForma" type="submit" value="Login" />
                <input name="Registracija" id="registracijaForma" type="button" onclick="location.href='registracija.php'" value="Registracija">
            </div>
        </form>
    </div>

    <div class="footer">
        <ul>
            <li><a href="#">Copyright 2023 Marko Faletar</a></li>
            <li><a href="https://github.com/FaletarMarko1">Github [faletar.marko@gmail.com]</a></li>
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
$_SESSION['username22'] = 'sa';
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT kime, lozinka, razina, ime, prezime FROM korisnik WHERE kime = ?;";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $kime, $lozinka, $razina, $ime, $prezime);
    mysqli_stmt_fetch($stmt);

    if($kime == ''){
        echo 'Korisnik ne postoji!';
    }else{
        if(password_verify($password, $lozinka)){
            $_SESSION['username'] = $username;
            $_SESSION['razina'] = $razina;
            $_SESSION['ime'] = $ime;
            $_SESSION['prezime'] = $prezime;
            header("Location: index.php");
        }else{
            echo 'Pogrešna lozinka!';
        }
    }
}
mysqli_close($dbc);
?>