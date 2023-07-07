const largura = window.innerWidth

const changeImage_1 = window.document.querySelector("#carousel-1")
const changeImage_2 = window.document.querySelector("#carousel-2")
const changeImage_3 = window.document.querySelector("#carousel-3")
const changeImage_4 = window.document.querySelector("#carousel-4")
const changeImage_5 = window.document.querySelector("#carousel-5")
const changeImage_6 = window.document.querySelector("#carousel-6")
const changeImage_7 = window.document.querySelector("#carousel-7")
const changeImage_8 = window.document.querySelector("#carousel-8")
const changeImage_9 = window.document.querySelector("#carousel-9")
const changeImage_10 = window.document.querySelector("#carousel-10")
const changeImage_11 = window.document.querySelector("#carousel-11")
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

if (largura < 768){  
  changeImage_1.setAttribute('src', '../img/logo-banners/banner-principal-1000-1000.png')
  changeImage_2.setAttribute('src', '../img/logo-banners/natal-banner-1.png')
  changeImage_3.setAttribute('src', '../img/logo-banners/natal-banner-1-3.png')
  changeImage_4.setAttribute('src', '../img/logo-banners/banner-cd-1000-1000.png')
  changeImage_5.setAttribute('src', '../img/logo-banners/hort-frut-1.webp')
  changeImage_6.setAttribute('src', '../img/logo-banners/hort-frut-2.webp')
  changeImage_7.setAttribute('src', '../img/logo-banners/biscoitos-4.webp')
  changeImage_8.setAttribute('src', '../img/logo-banners/corredor-front-massas.webp')
  changeImage_9.setAttribute('src', '../img/logo-banners/graos.webp')
  changeImage_10.setAttribute('src', '../img/logo-banners/higiene0.webp')
  changeImage_11.setAttribute('src', '../img/logo-banners/adega-1.webp')
}


myModal.addEventListener('shows.bs.modal', function () {
  myInput.focus()
})


/*Mult item */

/*
    Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {
  /*
      CC 2.0 License Iatek LLC 2018 - Attribution required
  */
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $('.carousel-item').length;

  if (idx >= totalItems-(itemsPerSlide-1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i=0; i<it; i++) {
          // append slides to end
          if (e.direction=="left") {
              $('.carousel-item').eq(i).appendTo('.carousel-inner');
          }
          else {
              $('.carousel-item').eq(0).appendTo('.carousel-inner');
          }
      }
  }
});