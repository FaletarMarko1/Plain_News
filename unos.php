<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>PLain_News</title>
</head>

<body>
    <img id="logo22" src="images/PNEWS.png" alt="logo" style="
        position: fixed;
        z-index: 100;
        width: 180px;
        height: 100px;
        margin-left: 15%;
        margin-top: -50px;
      " />
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
            <h1>NOVA VIJEST</h1>
            <hr />
        </header>

        <form action = "skripta.php" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="title">Naslov vijesti</label>
                <div class="form-field">
                    <input type="text" name="title" class="form-field-textual" />
                </div>
            </div>
            <div class="form-item">
                <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
                <div class="form-field">
                    <textarea name="about" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                </div>
            </div>
            <div class="form-item">
                <label for="content">Sadržaj vijesti</label>
                <div class="form-field">
                    <textarea name="content" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                </div>
            </div>
            <div class="form-item">
                <label for="slika">Slika: </label>
                <div class="form-field">
                    <input type="file" name="slika" accept="image/jpg,image/png,image/jpeg" required/>
                </div>
            </div>
            <div class="form-item">
                <label for="category">Kategorija vijesti:</label>
                <div class="form-field">
                    <select name="category" id="category" class="form-field-textual">
                        <option value="sport">SPORT</option>
                        <option value="kultura">CULTURE</option>
                        <option value="kultura">SCIENCE</option>
                    </select>
                </div>
            </div>
            <div class="form-item checkbox">
                <label for="archive">Prikaži na stranici:</label>
                <input type="checkbox" name="archive" />
            </div>
            <div class="form-item buttons">
                <input name="delete" type="reset" value="Poništi" />
                <input name="submit" type="submit" value="Submit" />
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
    </script>
</body>

</html>