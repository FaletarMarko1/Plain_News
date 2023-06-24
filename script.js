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
