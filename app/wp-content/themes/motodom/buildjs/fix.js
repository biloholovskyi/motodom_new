$(document).ready(function () {
  $('.nav-trigger').on('click', function () {
    $('.modal-form--nav').fadeIn('fast').css('display', 'flex');
  });

  $('.modal-KD .showForm').on('click', function () {
    $('.modal-form--nav').fadeOut('fast');
  });
 
 
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

$('#owl-two').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
});




});

// preloader

let images = document.images,
  images_total_count = images.length,
  images_loaded_count = 0,
  preloader = document.getElementById('page-preloader'),
  progress = document.getElementsByClassName('loader-bar');

for (var i = 0; i < images_total_count; i++) {

  image_clone = new Image();
  image_clone.onload = image_loaded;
  image_clone.onerror = image_loaded;
  image_clone.src = images[i].src;
}

function image_loaded() {
  images_loaded_count++;
  $(progress).css('width', (((100 / images_total_count) * images_loaded_count) << 0) + '%');

  if (images_loaded_count >= images_total_count) {
    setTimeout(() => {
      $(".loader-hidden").fadeOut('fast');
    }, 500)
    setTimeout(function () {
      if (!preloader.classList.contains('done')) {
        preloader.classList.add('done');
      }
    }, 1000);
  }
}

$('.newForm').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    url: '/wp-content/themes/motodom/send.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function (data) {
      $('.alert-modal').fadeIn('slow').css('display', 'flex');
      $('input[type="text"], textarea').val('');
      $('.input-wrapper--input').removeClass('input-wrapper--input');
      setTimeout(function () {
        $('.alert-modal').fadeOut('slow');
      }, 2000)
    }
  });
  return false;
});


