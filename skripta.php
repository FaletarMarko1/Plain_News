<?php

include 'connect.php';

$naslov = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$slika = $_FILES['slika']['name'];
$category = $_POST['category'];
if (isset($_POST['archive'])) {
    $archive = 1;
} else {
    $archive = 0;
}

$query = "INSERT INTO clanci (naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$naslov', '$about', '$content', '$slika', '$category', '$archive')";

$result = mysqli_query($dbc, $query) or die('Error querying database.');
mysqli_close($dbc);




if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['about']) && isset($_POST['content']) && isset($_POST['submit'])) {
    $naslov = $_POST['title'];
    $kategorija = $_POST['category'];
    $kratkiSadrzaj = $_POST['about'];
    $sadrzaj = $_POST['content'];

}

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
        echo "The file " . htmlspecialchars(basename($_FILES["slika"]["name"])) . " has been uploaded.";
    } else {
    }
}
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
    <div class="main">
        <img id="logo22" src="images/PNEWS.png" alt="logo"
            style="position: fixed; z-index: 100; width: 180px; height: 100px; margin-left: 15%; margin-top: -50px;" />
        <nav>
            <input type="checkbox" id="check" />
            <label for="check" class="checkbtn">Menu</label>
            <label class="dropLogo">Plain_News</label>
            <ul>
                <li><label class="logo">Plain_Newssssssssssss</label></li>
                <li class="active"><a class="active" href="#">HOME</a></li>
                <li><a href="kategorija.php?id=sport">SPORT</a></li>
                <li><a href="kategorija.php?id=culture">CULTURE</a></li>
                <li><a href="kategorija.php?id=science">SCIENCE</a></li>
                <li><a href="administrator.php">ADMIN</a></li>
            </ul>
        </nav>

        <div class="container">
            <header>
                <h1>NEWS:
                    <?php echo "<span>" . $naslov . "</span>"; ?>
                </h1>
                <hr />
            </header>
            <section>
                <article>
                    <div class="slike">
                        <?php echo '<img class="cover slikaClanak" src="images/' . $slikaName . '" alt="news1" />'; ?>
                    </div>
                    <div class="tekst">
                        <p>
                            <?php
                            echo $kratkiSadrzaj;
                            ?>
                        </p>
                    </div>
                    <div class="tekst">
                        <p>
                            <?php
                            echo $sadrzaj;
                            ?>
                        </p>
                    </div>
                </article>
            </section>

            <header>
                <h1>NEWS</h1>
                <hr>
            </header>
            <section class="info">
                <?php
                include 'connect.php';
                define('UPLPATH', 'images/');
                $query = "SELECT * FROM clanci WHERE arhiva = 0 AND kategorija = 'sport' LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
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
                }
                ?>
            </section>
        </div>
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