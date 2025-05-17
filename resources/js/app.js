import './bootstrap';

import Alpine from 'alpinejs';

import 'flowbite';

window.Alpine = Alpine;

Alpine.start();



import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();
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




$(document).ready(function() {
  $('.add-to-cart-form').on('submit', function(e) {
      e.preventDefault();

      let form = $(this);
      let productId = form.data('id');
      let token = $('meta[name="csrf-token"]').attr('content');
      let button = form.find('button[type="submit"]');

      // Disable button immediately on click
      button.prop('disabled', true)
          .text('Added to Cart')
          .addClass('bg-gray-400 cursor-not-allowed')
          .removeClass('bg-primary hover:bg-primary/80');

      $.ajax({
          url: '/cart/add/' + productId,
          type: 'POST',
          data: {
              _token: token
          },
          success: function(response) {
              if (response.status === 'success') {
                  // Update cart count if provided
                  if (response.cartCount !== undefined) {
                      $('#cart-count').text(response.cartCount);
                  }

                  toastr.success(response.message);

                  // Confirm button disabled state & text
                  button.text('Added to Cart');
              } else {
                  // If for some reason status is not success, re-enable button
                  button.prop('disabled', false)
                      .text('Add to Cart')
                      .removeClass('bg-gray-400 cursor-not-allowed')
                      .addClass('bg-primary hover:bg-primary/80');

                  toastr.error(response.message || 'Could not add product.');
              }
          },
          error: function() {
              toastr.error('Something went wrong. Please try again.');

              // Re-enable button on error
              button.prop('disabled', false)
                  .text('Add to Cart')
                  .removeClass('bg-gray-400 cursor-not-allowed')
                  .addClass('bg-primary hover:bg-primary/80');
          }
      });
  });
});




function showContent(id, clickedLabel) {
  // Hide all content panels
  let contents = document.querySelectorAll(".content");
  contents.forEach(content => {
      content.classList.add("hidden");
      content.classList.remove("bg-white", "border-t-4");
  });

  // Show the selected one
  const target = document.getElementById(id);
  target?.classList.remove("hidden");
  target?.classList.add("bg-white", "border-t-4");

  // Reset all tab buttons
  document.querySelectorAll(".tab").forEach(label => {
      label.classList.remove("bg-white", "border-t-4");
  });

  // Activate the clicked tab
  clickedLabel.classList.add("bg-white", "border-t-4");
}
window.showContent = showContent;
