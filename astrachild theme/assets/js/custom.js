$(document).on('ready', function () {
  $(".lazy").slick({
    infinite: true,
    arrows: false,
    dots: true
  });
});
$(window).scroll(function () {
  var scroll = $(window).scrollTop();

  if (scroll >= 100) {
    $("#mainNav").addClass("darkHeader");
  } else {
    $("#mainNav").removeClass("darkHeader");
  }

});
$(".toggle_menu").click(function () {
  $("#navbarResponsive").toggleClass("hidmenu");
});

$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
$(".vertical-center-4").slick({
  dots: false,
  Autoplay: false,
  infinite: false,
  arrows: false,
  vertical: true,
  centerMode: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  focusOnSelect: true,

  asNavFor: '.regular'
});
// $(".regular").slick({
//   arrows: false,
//   infinite: true,
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   asNavFor: '.vertical-center-4',
//   dots: true,
//   centerMode: false,

// });