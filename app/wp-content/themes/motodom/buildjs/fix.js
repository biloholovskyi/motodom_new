$(document).ready(function () {
  $('.nav-trigger').on('click', function() {
    $('.modal-form--nav').fadeIn('fast').css('display', 'flex');
  });

  $('.modal-KD .showForm').on('click', function () {
    $('.modal-form--nav').fadeOut('fast');
  });
});