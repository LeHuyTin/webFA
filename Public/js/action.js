document.addEventListener("DOMContentLoaded", function () {
  const something = document.querySelector(".something");
  const items = document.querySelectorAll(".something-item");
  let lastScrollTop = 0;

  function checkVisibility() {
    const rect = something.getBoundingClientRect();
    const windowHeight =
      window.innerHeight || document.documentElement.clientHeight;
    const windowWidth =
      window.innerWidth || document.documentElement.clientWidth;
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Kiểm tra xem phần tử có xuất hiện trên màn hình không
    if (
      rect.top <= windowHeight &&
      rect.bottom >= 0 &&
      rect.left <= windowWidth &&
      rect.right >= 0
    ) {
      if (scrollTop > lastScrollTop) {
        // Lướt xuống
        something.classList.add("visible-down");
        something.classList.remove("hidden-down", "visible-up", "hidden-up");

        // Thêm class visible cho từng mục với độ trễ
        items.forEach((item, index) => {
          setTimeout(() => {
            item.classList.add("visible-down");
            item.classList.remove("hidden-down");
          }, index * 200); // Độ trễ 200ms giữa các mục
        });
      } else {
        // Lướt lên
        something.classList.add("visible-up");
        something.classList.remove("hidden-up", "visible-down", "hidden-down");

        // Thêm class visible cho từng mục với độ trễ
        items.forEach((item, index) => {
          setTimeout(() => {
            item.classList.add("visible-up");
            item.classList.remove("hidden-up");
          }, index * 200); // Độ trễ 200ms giữa các mục
        });
      }
    } else {
      if (scrollTop > lastScrollTop) {
        // Lướt xuống
        something.classList.add("hidden-down");
        something.classList.remove("visible-down");

        // Xóa class visible cho từng mục
        items.forEach((item) => {
          item.classList.add("hidden-down");
          item.classList.remove("visible-down");
        });
      } else {
        // Lướt lên
        something.classList.add("hidden-up");
        something.classList.remove("visible-up");

        // Xóa class visible cho từng mục
        items.forEach((item) => {
          item.classList.add("hidden-up");
          item.classList.remove("visible-up");
        });
      }
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
  }

  // Kiểm tra khi cuộn trang
  window.addEventListener("scroll", checkVisibility);
  // Kiểm tra khi tải trang
  checkVisibility();
});

document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".iconcol, .icon-info, .icon-desc");

  function checkVisibility() {
    items.forEach((item, index) => {
      const rect = item.getBoundingClientRect();
      const windowHeight =
        window.innerHeight || document.documentElement.clientHeight;

      // Kiểm tra xem phần tử có xuất hiện trên màn hình không
      if (rect.top <= windowHeight && rect.bottom >= 0) {
        setTimeout(() => {
          item.classList.add("visible");
        }, index * 20); // Độ trễ 200ms giữa các mục
      } else {
        item.classList.remove("visible");
      }
    });
  }

  // Kiểm tra khi cuộn trang
  window.addEventListener("scroll", checkVisibility);
  // Kiểm tra khi tải trang
  checkVisibility();
});
