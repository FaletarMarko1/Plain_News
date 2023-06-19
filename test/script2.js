window.onload = function () {
  let slika = document.getElementById("logo22");
  window.addEventListener("scroll", scrollEffect);
  let sirina = window.innerWidth;

  function scrollEffect() {
    if (window.scrollY > 0 && sirina < 768) {
      slika.style.opacity = "0";
      slika.style.transition = ".5s ease";
    } else{
      slika.style.opacity = "1";
    }
  }
};
