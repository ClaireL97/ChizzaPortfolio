$(document).ready(function() {
  $(document).on('click', '.picture', function(e) {
    $("#myModal").show();
    var num = $(this).attr('data-number');
    currentSlide(num);
  });

  $(document).on('click', '.demo', function(e) {
    var num = $(this).attr('data-number');
    currentSlide(num);
  });

  $('.close').click(function(e) {
    $('#myModal').hide();
  });

  $(document).keyup(function(e) {
    if (e.which == 27) $("#myModal").hide();
  });

  var slideIndex = 1;
  showSlides(slideIndex);

  $(".prev").click(function(e) {
    plusSlides(-1);
  });

  $(".next").click(function(e) {
    plusSlides(1);
  });

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = $(".mySlides");
    var dots = $(".demo");
    var captionText = $("#caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
});