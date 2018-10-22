<footer id="footer" class="flexBox flexBox--center flexBox--between">
    <h2>vnese-freelance.co</h2>
    <div class="flexBox flexBox--center flexBox--between">
        <!-- <ul class="langBar flexBox flexBox--center flexBox--between">
            <li><a href="">Eng</a></li>
            <li><a href="">Viet</a></li>
        </ul> -->
        <ul class="lstSocial flexBox flexBox--center flexBox--between">
            <li><a href="https://www.facebook.com/Vnese-Freelance-Group-1396451070454454/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</footer>

<script src="<?php echo APP_URL; ?>common/js/jquery-1.8.3.min.js"></script>
<!--[if lt IE 9]><script src="<?php echo APP_URL; ?>common/js/html5shiv-printshiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo APP_URL; ?>common/js/selectivizr.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/common.js"></script>
<script>
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
    $('.hamburger').click(function() {
        $('.menuSp').css('right',0);
        setTimeout(function() {
        $('.wrapLoad').fadeOut(200);
            TweenMax.to(".menu1", 0.4, {ease: Back.easeOut.config(1), y:0, opacity:1,delay:0.4 });
            TweenMax.to(".menu2", 0.4, {ease: Back.easeOut.config(1), y:0, opacity:1,delay:0.6 });
            TweenMax.to(".menu3", 0.4, {ease: Back.easeOut.config(1), y:0, opacity:1,delay:0.8 });
            TweenMax.to(".menu4", 0.4, {ease: Back.easeOut.config(1), y:0, opacity:1,delay:1 });
        }, 200);
    });
</script>
