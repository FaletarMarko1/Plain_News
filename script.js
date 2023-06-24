window.onload = function () {
  let buton = document.getElementById("check");
  function isHidden(buton) {
    return buton.offsetParent === null;
  }

  hidden = isHidden(buton);

  window.addEventListener("scroll", scrollEffect);
  slika = document.getElementById("logo22");

  function scrollEffect() {
    if (window.scrollY > 20) {
      slika.style.opacity = "0";
      slika.style.transition = ".5s ease";
    } else {
      slika.style.opacity = "1";
    }
  }
};



document.getElementById("formSlanje").onclick = function (event) {
  let salji = true;

  let poljeTitle = document.getElementById("titleId");
  let title = poljeTitle.value;

  if (title.length < 5 || title.length > 30) {
    salji = false;
    poljeTitle.style.border = "1px dashed red";
    document.getElementById("porukaTitle").innerHTML =
      "Title must have between 5 and 30 characters!";
  } else {
    poljeTitle.style.border = "1px dashed green";
    document.getElementById("porukaTitle").innerHTML = "";
  }

  let poljeAbout = document.getElementById("aboutId");
  let about = poljeAbout.value;

  if (about.length < 10 || about.length > 100) {
    salji = false;
    poljeAbout.style.border = "1px dashed red";
    document.getElementById("porukaAbout").innerHTML =
      "About must have between 10 and 100 characters!";
  } else {
    poljeAbout.style.border = "1px dashed green";
    document.getElementById("porukaAbout").innerHTML = "";
  }

  let poljeContent = document.getElementById("contentId");
  let content = poljeContent.value;

  if (content.length == 0) {
    salji = false;
    poljeContent.style.border = "1px dashed red";
    document.getElementById("porukaContent").innerHTML =
      "You must write something!";
  } else {
    poljeContent.style.border = "1px dashed green";
    document.getElementById("porukaContent").innerHTML = "";
  }

  let poljeSlika = document.getElementById("slikaId");
  let slika = poljeSlika.value;

  if (slika.length == 0) {
    salji = false;
    poljeSlika.style.border = "1px dashed red";
    document.getElementById("porukaSlika").innerHTML =
      "You must choose a picture!";
  } else {
    poljeSlika.style.border = "1px dashed green";
    document.getElementById("porukaSlika").innerHTML = "";
  }

  let poljeCategory = document.getElementById("categoryId");

  if (!document.getElementById("categoryId").selectedIndex) {
    salji = false;
    poljeCategory.style.border = "1px dashed red";
    document.getElementById("porukaCategory").innerHTML =
      "You must choose a category!";
  } else {
    poljeCategory.style.border = "1px dashed green";
    document.getElementById("porukaCategory").innerHTML = "";
  }

  if (salji != true) {
    event.preventDefault();
  }
};

document.getElementById("registracijaForma").onclick = function (event) {
  alert("usao u funkciju");
  let salji = true;

  let poljeUsername = document.getElementById("username");
  let username = poljeUsername.value;

  if(username.length == 0) {
    salji = false;
    poljeUsername.style.border = "1px dashed red";
    document.getElementById("porukaUsername").innerHTML = "You must enter username!";
  }else{
    poljeUsername.style.border = "1px dashed green";
    document.getElementById("porukaUsername").innerHTML = "";
  }

  let poljeIme = document.getElementById("ime");
  let ime = poljeIme.value;

  if(ime.length == 0) {
    poljeIme.style.border = "1px dashed red";
    document.getElementById("porukaIme").innerHTML = "You must enter name!";
  }else{
    poljeIme.style.border = "1px dashed green";
    document.getElementById("porukaIme").innerHTML = "";
  }

  let poljePrezime = document.getElementById("prezime");
  let prezime = poljePrezime.value;

  if(prezime.length == 0) {
    poljePrezime.style.border = "1px dashed red";
    document.getElementById("porukaPrezime").innerHTML = "You must enter surname!";
  }else{
    poljePrezime.style.border = "1px dashed green";
    document.getElementById("porukaPrezime").innerHTML = "";
  }

  let poljePassword = document.getElementById("password");
  let password = poljePassword.value;

  let poljePassword2 = document.getElementById("password2");
  let password2 = poljePassword2.value;

  if(password.length == 0 || password2.length == 0 || password != password2) {
    salji = false;
    poljePassword.style.border = "1px dashed red";
    poljePassword2.style.border = "1px dashed red";
    document.getElementById("porukaPassword").innerHTML = "Passwords must be the same!";
    document.getElementById("porukaPassword2").innerHTML = "Passwords must be the same!";
  }else{
    poljePassword.style.border = "1px dashed green";
    poljePassword2.style.border = "1px dashed green";
    document.getElementById("porukaPassword").innerHTML = "";
    document.getElementById("porukaPassword2").innerHTML = "";
  }

  if(salji != true) {
    event.preventDefault();
  }
}