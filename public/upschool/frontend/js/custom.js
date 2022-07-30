/* navbar toggle */

$(document).ready(function () {
    // jQuery code

    $('[data-trigger]').on('click', function (e) {
      e.preventDefault()
      e.stopPropagation()
      var offcanvas_id = $(this).attr('data-trigger')
      $(offcanvas_id).toggleClass('show')
      $('body').toggleClass('offcanvas-active')
      $('.screen-overlay').toggleClass('show')
    })

    // Close menu when pressing ESC
    $(document).on('keydown', function (event) {
      if (event.keyCode === 27) {
        $('.mobile-offcanvas').removeClass('show')
        $('body').removeClass('overlay-active')
      }
    })

    $('.btn-close, .screen-overlay').click(function (e) {
      $('.screen-overlay').removeClass('show')
      $('.mobile-offcanvas').removeClass('show')
      $('body').removeClass('offcanvas-active')
    })
  }) 




/* counter animate */
$(".count").each(function () {
  $(this)
    .prop("Counter", 0)
    .animate(
      {
        Counter: $(this).text(),
      },
      {
        duration: 1500,
        easing: "swing",
        step: function (now) {
          $(this).text(Math.ceil(now));
        },
      }
    );
});



/* bottom to up */
var mybutton = document.getElementById("myBtn");
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}




/* Swiper */
var swiper = new Swiper(".mySwiper", {
  cssMode: true,
  loop: true,
  slideToClickedSlide: true,
  autoplay: {
    delay: 5000,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  mousewheel: true,
  keyboard: true,
});

