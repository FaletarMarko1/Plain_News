<?php
include 'connect.php';
define('UPLPATH', 'images/');
$query = "SELECT * FROM clanci WHERE id=" . $_GET['id'];"";
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
        <li><a href="#">SPORT</a></li>
        <li><a href="#">CULTURE</a></li>
        <li><a href="#">SCIENCE</a></li>
        <li><a href="#">ADMIN</a></li>
      </ul>
    </nav>

    <div class="container">
      <header>
        <h1>NEWS: <?php echo "<span>".$row['naslov']."</span>"; ?></h1>
        <hr />
      </header>
      <section>
        <article>
          <div class="slike">
          <?php echo '<img class="cover slikaClanak" src="' . UPLPATH . $row['slika'] . '" alt="news1" />';?>
          </div>
          <div class="tekst">
            <p>
              <?php
                echo $row['sazetak'];
              ?>
            </p>
          </div>
          <div class="tekst">
            <p>
              <?php
                echo $row['tekst'];
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