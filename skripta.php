<?php
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
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["slika"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["slika"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
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
    <link rel="stylesheet" type="text/css" href="styleClanak.css" />
    <title>PLain_News</title>
</head>

<body>
    <div class="main">
        <nav>
            <input type="checkbox" id="check" />
            <label for="check" class="checkbtn">Menu</label>
            <label class="dropLogo">Plain_News</label>
            <ul>
                <li><label class="logo">Plain_News</label></li>
                <li><a class="active" href="#">HOME</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="#">VIDEO</a></li>
                <li><a href="#">ABOUT</a></li>
            </ul>
        </nav>

        <div class="container">
            <header>
                <h1>
                    <?php echo $naslov; ?>
                </h1>
                <hr />
            </header>
            <section>
                <article>
                    <div class="slike">
                        <?php echo "<img src='images/$slikaName' alt='slika vijesti' />" ?>

                    </div>
                    <div class="tekst">
                        <p>
                            <?php echo $sadrzaj; ?>
                        </p>
                </article>
            </section>

            <header>
                <h1>NEWS</h1>
                <hr>
            </header>
            <section class="info">
                <article>
                    <div class="slike">
                        <img src="images/beach.jpeg" alt="news1" />
                    </div>
                    <div class="tekst">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laboriosam ducimus soluta accusamus nam deleniti id sunt ratione
                            nemo nihil? Accusamus repellat pariatur veniam voluptatibus
                            obcaecati debitis adipisci eum, cupiditate aliquid?
                        </p>
                    </div>
                </article>
                <article>
                    <div class="slike">
                        <img src="images/beach.jpeg" alt="news1" />
                    </div>
                    <div class="tekst">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laboriosam ducimus soluta accusamus nam deleniti id sunt ratione
                            nemo nihil? Accusamus repellat pariatur veniam voluptatibus
                            obcaecati debitis adipisci eum, cupiditate aliquid?
                        </p>
                    </div>
                </article>
                <article>
                    <div class="slike">
                        <img src="images/beach.jpeg" alt="news1" />
                    </div>
                    <div class="tekst">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laboriosam ducimus soluta accusamus nam deleniti id sunt ratione
                            nemo nihil? Accusamus repellat pariatur veniam voluptatibus
                            obcaecati debitis adipisci eum, cupiditate aliquid?
                        </p>
                    </div>
                </article>
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