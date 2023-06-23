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
    <header>
      <h1>ADMINISTRACIJA</h1>
      <hr>
    </header>

    
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