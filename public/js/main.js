function toggleSearch(index) {
  const content = document.getElementById(`content-${index}`);

  if (content.style.maxHeight && content.style.maxHeight !== "0px") {
    content.style.maxHeight = "0";
  } else {
    content.style.maxHeight = content.scrollHeight + "px";
  }

}

document
  .getElementById("search")
  ?.addEventListener("click", () => toggleSearch("search"));

var swiper2 = new Swiper(".hero-swiper", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
});

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 50,
    },
  },
});

var swiper = new Swiper(".mySwiper2", {
  slidesPerView: 1,
  spaceBetween: 30,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },

  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
  },
});

var swiper = new Swiper(".mySwiper3", {
  slidesPerView: 1,
  spaceBetween: 30,

  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
});

// const collapseButton = document.getElementById("collapse-button");
//       const topHeader = document.getElementById("top-header");
//       const contactInfoHeader = document.getElementById("contact-info-header");

//       collapseButton.addEventListener("click", () => {
//         topHeader.classList.toggle("hidden"); // Toggle visibility
//         const icon = collapseButton.querySelector("i");

//         if (topHeader.classList.contains("hidden")) {
//           icon.classList.remove("fa-chevron-up");
//           icon.classList.add("fa-chevron-down");
//           contactInfoHeader.style.paddingRight = "16px";
//         } else {
//           icon.classList.remove("fa-chevron-down");
//           icon.classList.add("fa-chevron-up");
//         }
//       });

//       // Handle submenu toggle
//       document.querySelectorAll("nav .relative").forEach((menuItem) => {
//         const icon = menuItem.querySelector("i");
//         const submenu = menuItem.querySelector("ul");

//         icon.addEventListener("click", (e) => {
//           e.preventDefault();
//           submenu.classList.toggle("hidden"); // Toggle visibility
//         });
//       });

const menuButton = document.getElementById("menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");
const link = document.querySelectorAll(".link");

menuButton.addEventListener("click", () => {
  mobileMenu.classList.add("translate-x-0");
  mobileMenu.classList.remove("-translate-x-full");
  mobileMenuOverlay.classList.remove("hidden");
});

mobileMenuOverlay.addEventListener("click", () => {
  mobileMenu.classList.add("-translate-x-full");
  mobileMenu.classList.remove("translate-x-0");
  mobileMenuOverlay.classList.add("hidden");
});

link.forEach((link) => {
  link.addEventListener("click", () => {
    mobileMenu.classList.add("-translate-x-full");
    mobileMenu.classList.remove("translate-x-0");
    mobileMenuOverlay.classList.add("hidden");
  });
});

const contactInfoHeader = document.getElementById("contact-info-header");
// hide the contact info header when scroll down
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    contactInfoHeader.style.display = "none";
  } else {
    contactInfoHeader.style.display = "block";
  }
});



function showContent(id , clickedLabel) {

  let contents = document.querySelectorAll(".content");
  contents?.forEach(content => content.classList.add("hidden"));


  document.getElementById(id)?.classList.remove("hidden");

  document.querySelectorAll(".tab")?.forEach(label => label.classList.remove("bg-white"));

  clickedLabel.classList.add("bg-white");

  document.querySelectorAll(".tab")?.forEach(label => label.classList.remove("border-t-4"));

  clickedLabel.classList.add("border-t-4");
}








