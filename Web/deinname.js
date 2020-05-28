//put my text
var TxtRotate = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 300 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function() {
    that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('txt-rotate');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-rotate');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtRotate(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid white}"
  document.body.appendChild(css);
};


$(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});

$('a[href^="#"]').on('click',function(e) {
 e.preventDefault();
 var target = this.hash;
 var $target = $(target);
 $('html, body').stop().animate({
  'scrollTop': $target.offset().top
 }, 900, 'swing', function () {
  window.location.hash = target;
 });
});

focusTitle = $('head title').text(); // Originalen Title speichern
$(window).on('blur focus', function(e) {
 var prevType = $(this).data('prevType'); 
 if (prevType != e.type) {
   switch (e.type) {
     case 'blur':
     var i=0;
     tab = setInterval(function() {
       switch(i++%2) {
         case 0: document.title = 'ist Cool'; // Erste Anzeige im Tab
         break;
         case 1: document.title = 'komm wieder'; // Zweite Anzeige im Tab
       }
     }, 1000); // Zeit zwischen dem Wechsel der Anzeigen
     break;
     case 'focus': 
       clearInterval(tab);
       document.title = Yamen Hamid; // Originalen Title einsetzen
     break;
   }
 }
 $(this).data('prevType', e.type);
});

Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Your work has been saved",
  showConfirmButton: false,
  timer: 1500
});