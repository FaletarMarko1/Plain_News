window.onload = function () {
  let buton = document.getElementById("check");
  function isHidden(buton) {
    return buton.offsetParent === null;
  }

  hidden = isHidden(buton);

  window.addEventListener("scroll", scrollEffect);
  slika = document.getElementById("logo22");

  function scrollEffect() {
    if (window.scrollY > 20 ) {
      slika.style.opacity = "0";
      slika.style.transition = ".5s ease";
    } else {
      slika.style.opacity = "1";
    }
  }
};
