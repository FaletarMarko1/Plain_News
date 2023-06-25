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
    </header>
    <hr>
    <?php
    session_start();

    if (isset($_SESSION['username']) && $_SESSION['razina'] == 1) {
      include 'connect.php';

      define('UPLPATH', 'images/');
      $query = "SELECT * FROM clanci WHERE id=" . $_GET['id'];
      $result = mysqli_query($dbc, $query);
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
        echo '<form class="izmjene" action="" method="POST" enctype="multipart/form-data">
        <div class="form-item">
            <label for="titleId">Naslov vjesti:</label>
            <div class="form-field">
                <input type="text" name="title" id="titleId" class="form-field-textual" value="' . $row['naslov'] . '">
            </div>
        </div>
        <div class="form-item">
            <label for="aboutId">Kratki sadržaj vijesti (do 50 znakova):</label>
            <div class="form-field">
                <textarea name="about" id="aboutId" cols="30" rows="10" class="form-field-textual">' . $row['sazetak'] . '</textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="contentId">Sadržaj vijesti:</label>
            <div class="form-field">
                <textarea name="content" id="contentId" cols="30" rows="10" class="form-field-textual">' . $row['tekst'] . '</textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="slikaId">Slika: </label>
            <div class="form-field">
                <input type="file" id="slikaId" value="' . $row['slika'] . '" name="slika"/> <br>
                <img src="' . UPLPATH . $row['slika'] . '" style="width:300px; height:150px;">
            </div>
        </div>
        <div class="form-item">
            <label for="categoryId">Kategorija vijesti:</label>
            <div class="form-field">
                <select name="category" id="categoryId" class="form-field-textual" value="' . $row['kategorija'] . '">
                    <option ' . $sportCategory . ' value="sport">SPORT</option>
                    <option ' . $cultureCategory . ' value="culture">CULTURE</option>
                    <option ' . $scienceCategory . ' value="science">SCIENCE</option>
                </select>
            </div>
        </div>
        <div class="form-item checkbox">
            <label for="archiveId">Stavi u arhivu:</label>';
        if ($row['arhiva'] == 0) {
          echo '<input type="checkbox" name="archive" id="archiveId"/>';
        } else {
          echo '<input type="checkbox" name="archive" id="archiveId" checked/>';
        }
        echo '</div>
        <div class="form-item buttons">
            <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '">
            <button type="reset" name="delete" value="Poništi">Poništi promjene</button>
            <button type="submit" name="submit" value="Submit">Submit</button>
            <button type="submit" name="izbrisi" value="Delete">Delete</button>
        </div>
        </form>
        <hr>';
      }

      if (isset($_POST['izbrisi'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM clanci WHERE id=$id";
        $result = mysqli_query($dbc, $query);
        echo '<meta http-equiv="refresh" content="0; URL=adminPrikaz.php">';
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
        if ($_FILES["slika"]["name"]) {
            if (isset($_POST["submit"])) {
              $check = getimagesize($_FILES["slika"]["tmp_name"]);
              if ($check !== false) {
                $uploadOk = 1;
              } else {
                $uploadOk = 0;
              }
            }else{}
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
          } else {}
        }

        echo '<meta http-equiv="refresh" content="1"/>';
      }

    } else {
      echo '<p>Da bi uređivali vijesti morate biti prijavljeni kao admin!</p>';
    }
    ?>
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