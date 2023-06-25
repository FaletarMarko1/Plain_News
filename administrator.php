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
            <li class=""><a class="" href="index.php">HOME</a></li>
            <li><a href="kategorija.php?id=sport">SPORT</a></li>
            <li><a href="kategorija.php?id=culture">CULTURE</a></li>
            <li><a href="kategorija.php?id=science">SCIENCE</a></li>
            <li class="active"><a class="active" href="administrator.php">ADMIN</a></li>
        </ul>
    </nav>

    <div class="container">
        <header class="adminHeader">
            <h1>ADMINISTRACIJA</h1>
            <button class="button-6" name="logoutBtn"><a href="logout.php">Logout</a></button>

        </header>
        <hr>

        <?php
        session_start();
        include 'connect.php';
        define('UPLPATH', 'images/');
        if ($_SESSION['razina'] == '1') {
            $adminos = 'Superadmin';
            $query = "SELECT * FROM clanci";
            $result = mysqli_query($dbc, $query);
            echo '<div class="adminContent">';
            echo '<div class="polaSirine">';
            echo '<div class="adminContent2">
        <div><h2>Vijesti:</h2></div>
        <div><button class="prikazSvega button-6" name="prikazSvegaBtn"><a href="adminPrikaz.php">Prikazi sve</a></button></div>
        <div><button class="prikazSvega button-6" name="prikazSvegaBtn"><a href="unos.php">Nova vijest</a></button></div></div>
        ';
            while ($row = mysqli_fetch_array($result)) {
                $sportCategory = '';
                $cultureCategory = '';
                $scienceCategory = '';
                if ($row['kategorija'] == 'sport') {
                    $sportCategory = 'selected="selected"';
                } else if ($row['kategorija'] == 'culture') {
                    $cultureCategory = 'selected="selected"';
                } else if ($row['kategorija'] == 'science') {
                    $scienceCategory = 'selected="selected"';
                }
                echo '
            <ul class="vijestiIspis">
                <li class="vijestIspis">
                <h5>Naslov vijesti:&nbsp</h5>
                </li>
                <li class="vijestIspis naslovMali">
                <p>' . substr($row['naslov'], 0, 10) . '</p>
                </li>
                <li class="vijestIspis">
                <h5>Arhiva:&nbsp</h5>
                </li>
                <li class="vijestIspis">
                <p>' . $row['arhiva'] . '</p>
                </li>
                <li class="vijestIspis">
                <button class=""><a href="urediJednu.php?id=' . $row['id'] . '">Uredi</a></button>
                <li/>
            </ul>
            <hr>
            ';
            }
            echo '</div>';
            echo '<div class="polaSirine">
        <h2>Podatci o korisniku:</h2>
        <table class="podatciKorisnik">
        <tr>
            <td><h3>Korisnik:</h3></td>
            <td><h3>' . $_SESSION['username'] . '</h3></td>
        </tr>
        <tr>
            <td><p>Ime:</p></td>
            <td><p>' . $_SESSION['ime'] . '</p></td>
        </tr>
        <tr>
            <td><p>Prezime:</p></td>
            <td><p>' . $_SESSION['prezime'] . '</p></td>
        </tr>
        <tr>
            <td><p>Razina:</p></td>
            <td><p>' . $_SESSION['razina'] . '</p></td>
        </tr>
        <tr>
            <td><p>Ovlasti:</p></td>
            <td><p>' . $adminos . '</p></td>
        </tr>
        </table>

        <h2>Registrirani korisnici:</h2>
        <table class="podatciRegistrirani">';

            $query2 = "SELECT * FROM korisnik";
            $result2 = mysqli_query($dbc, $query2);
            while ($row2 = mysqli_fetch_array($result2)) {
                echo '
            <tr>
            <td><p>Korisnik:</p></td>
            <td><p>' . $row2['kime'] . '</p></td>
            </tr>';
            }
            echo '</table><div/>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            $adminos = 'Obicni user';
            echo '<div class="obicniKorisnik">
        <h2>Podatci o korisniku:</h2>
        <table class="podatciKorisnik">
        <tr>
            <td><h3>Korisnik:</h3></td>
            <td><h3>' . $_SESSION['username'] . '</h3></td>
        </tr>
        <tr>
            <td><p>Ime:</p></td>
            <td><p>' . $_SESSION['ime'] . '</p></td>
        </tr>
        <tr>
            <td><p>Prezime:</p></td>
            <td><p>' . $_SESSION['prezime'] . '</p></td>
        </tr>
        <tr>
            <td><p>Razina:</p></td>
            <td><p>' . $_SESSION['razina'] . '</p></td>
        </tr>
        <tr>
            <td><p>Ovlasti:</p></td>
            <td><p>' . $adminos . '</p></td>
        </tr>
        </table>
        <p>Nemate pristup admin konzoli jer niste admin, ADMIN: markof PASS: marko</p>';
        echo '</div>';
        }


        if (isset($_POST['izbrisi'])) {
            $id = $_POST['id'];
            $query = "DELETE FROM korisnik WHERE id=$id";
            $result = mysqli_query($dbc, $query);
            echo '<meta http-equiv="refresh" content="1"/>';
        }

        if (isset($_POST['submit'])) {
            $slika = $_FILES['slika']['name'];
            $naslov = $_POST['title'];
            $about = $_POST['about'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $id = $_POST['id'];
            if (isset($_POST['archive'])) {
                $archive = 1;
            } else {
                $archive = 0;
            }
            if ($slika == '') {
                $query = "SELECT slika FROM clanci WHERE id='$id'";
                $result = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($result);
                $slika = $row['slika'];
            }

            $query = "UPDATE clanci SET naslov='$naslov', sazetak='$about', tekst='$content', slika='$slika', kategorija='$category', arhiva='$archive' WHERE id='$id'";
            $result = mysqli_query($dbc, $query);

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["slika"]["name"]);
            $slikaName = ($_FILES["slika"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["slika"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["slika"]["size"] > 5000000) {
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                } else {
                }
            }

            echo '<meta http-equiv="refresh" content="1"/>';
        }
        ?>
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