document.addEventListener("DOMContentLoaded", function () {
  let list = document.querySelector(".slider .list");
  let items = document.querySelectorAll(".slider .list .item");
  let dots = document.querySelectorAll(".dots li");
  let prev = document.getElementById("prev");
  let next = document.getElementById("next");
  let backtop = document.getElementById("backtop");

  let active = 0;

  // chuyển slide bằng nút prev và next
  prev.onclick = function () {
    if (active - 1 < 0) active = items.length - 1;
    else active -= 1;
    reloadSlider();
  };

  next.onclick = function () {
    if (active + 1 > items.length - 1) active = 0;
    else active += 1;
    reloadSlider();
  };

  // chuyển slide bằng dots
  function reloadSlider() {
    let checkLeft = items[active].offsetLeft;
    list.style.left = -checkLeft + "px";
    clearInterval(refreshSlider);
    refreshSlider = setInterval(() => {
      next.click();
    }, 5000);
    let lastActiveDot = document.querySelector(".dots li.active");
    lastActiveDot.classList.remove("active");
    dots[active].classList.add("active");
  }

  let refreshSlider = setInterval(() => {
    next.click();
  }, 5000);

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      active = index;
      reloadSlider();
    });
  });

  // nút backtop
  backtop.onclick = function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  window.onscroll = function () {
    if (window.scrollY > 1000) {
      backtop.style.visibility = "visible";
    } else {
      backtop.style.visibility = "hidden";
    }
  };
});
