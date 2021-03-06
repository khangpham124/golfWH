<p id="pageTop"><img src="<?php echo APP_URL; ?>common/img/footer/totop.svg" class="" alt=""></p>

<footer id="footer">
    <div class="inner flexBox flexBox--wrap flexBox--between">
      <div class="logoFoot"><img src="<?php echo APP_URL ?>common/img/header/logo.svg" class="">
        <h3 class="h3_foot h3_foot--small">Follow Us</h3>
        <ul class="iconSocial">
          <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <div class="flexBox flexBox--wrap flexBox--between rightFoot">
        <div class="colFoot">
            <h3 class="h3_foot">Store Location</h3>
            <ul class="lstLocate">
              <li>
                <p class="title">Store 1</p>
                <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">123 Abc Street ,7000, VN</a></p>
                <p class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i>123-456-7890</p>
              </li>
              <li>
                <p class="title">Store 2</p>
                <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">123 Abc Street ,7000, VN</a></p>
                <p class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i>123-456-7890</p>
              </li>
            </ul>
        </div>
        <div class="colFoot">
          <h3 class="h3_foot">Info</h3>
          <ul class="lstInfo">
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">About</a></li>
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">Contact</a></li>
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">Shipping Info</a></li>
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">Faqs</a></li>
          </ul>
          <p class="copyright">© 2018 <span>Golf-warehouse.vn</span>All Rights Reserved</p>   
        </div>
      </div>
    </div>
</footer>


<script src="<?php echo APP_URL; ?>common/js/jquery-1.8.3.min.js"></script>
<!--[if lt IE 9]><script src="<?php echo APP_URL; ?>common/js/html5shiv-printshiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo APP_URL; ?>common/js/selectivizr.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/common.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/biggerlink.js"></script>
<script src="<?php echo APP_URL; ?>common/js/jquery.droppy.js"></script>
<script type="text/javascript">
    $(function(){
        $('.matchHeight').matchHeight();
        $('.biggerlink').biggerlink();
        
    });
</script>


<script src="<?php echo APP_URL; ?>common/js/wow.js"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
</script>
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
</script>
<script type="text/javascript">
	$(window).ready(function() {
		$(".gNavi").droppy();
	});
	$(window).scroll(function() {
		$(".gNavi").droppy();
	});
</script><!-- container -->