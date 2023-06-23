<?php
include 'connect.php';
define('UPLPATH', 'images/');
$kategorija = $_GET['id'];
$query = "SELECT * FROM clanci WHERE kategorija='$kategorija' AND arhiva = 0";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
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
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">Menu</label>
        <label class="dropLogo">Plain_News</label>
        <ul>
            <li><label class="logo">Plain_Newssssssssssss</label></li>
            <li class=""><a class="" href="index.php">HOME</a></li>
            <li class="<?php if ($kategorija == "sport") echo ' active'; ?>"><a class="<?php if ($kategorija == "sport") echo ' active'; ?>" href="kategorija.php?id=sport">SPORT</a></li>
            <li class="<?php if ($kategorija == "culture") echo ' active'; ?>"><a class="<?php if ($kategorija == "culture") echo ' active'; ?>" href="kategorija.php?id=culture">CULTURE</a></li>
            <li class="<?php if ($kategorija == "science") echo ' active'; ?>"><a class="<?php if ($kategorija == "science") echo ' active'; ?>" href="kategorija.php?id=science">SCIENCE</a></li>
            <li ><a href="administrator.php">ADMIN</a></li>
        </ul>
    </nav>

    <div class="container">
        <header>
            <h1>
                <?php echo strtoupper($row['kategorija']); ?>
            </h1>
            <hr>
        </header>

        <section>
            <?php

            while ($row) {
                echo '<article>';
                echo '<div class="slike">';
                echo '<img class="cover" src="' . UPLPATH . $row['slika'] . '" alt="news1" />';
                echo '</div>';
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id=' . $row['id'] . '">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '<div class="tekst">';
                echo '<p>' . $row['sazetak'] . '</p>';
                echo '</div>';
                echo '</article>';
                $row = mysqli_fetch_array($result);
            }
            ?>
        </section>
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