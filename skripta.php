<?php
if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['slika']) && isset($_POST['about']) && isset($_POST['content']) && isset($_POST['submit'])) {
    $naslov = $_POST['title'];
    $kategorija = $_POST['category'];
    $slika = $_POST['slika'];
    $kratkiSadrzaj = $_POST['about'];
    $sadrzaj = $_POST['content'];
    
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
                        <?php echo "<img src='images/$slika' alt='slika vijesti' />" ?>

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