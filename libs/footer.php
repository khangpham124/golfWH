<!-- <p id="pageTop"><img src="<?php echo APP_URL; ?>common/img/footer/totop.svg" class="" alt=""></p> -->
<footer id="footer">
    <div class="inner flexBox flexBox--wrap flexBox--between">
      <div class="logoFoot"><img src="<?php echo APP_URL ?>common/img/header/logo.svg" class="">
        <h3 class="h3_foot h3_foot--small">Follow Us</h3>
        <ul class="iconSocial">
          <li><a href="https://www.facebook.com/GOLFwarehousevn-%C4%90%E1%BB%93-G%C3%B4n-ch%C3%ADnh-h%C3%A3ng-gi%C3%A1-s%E1%BB%89-1705207316241181/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <div class="flexBox flexBox--wrap flexBox--between rightFoot">
        <div class="colFoot">
        
        </div>
        <div class="colFoot">
          <!-- <h3 class="h3_foot">Info</h3>
          <ul class="lstInfo">
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">About</a></li>
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">Contact</a></li>
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">Shipping Info</a></li>
            <li><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><a href="">Faqs</a></li>
          </ul> -->
          <p class="copyright">© 2018 <span>Golf-Warehouse.vn</span>All Rights Reserved</p>   
        </div>
      </div>
    </div>
</footer>

<!-- Subiz --> <script> (function(s, u, b, i, z){ u[i]=u[i]||function(){ u[i].t=+new Date(); (u[i].q=u[i].q||[]).push(arguments); }; z=s.createElement('script'); var zz=s.getElementsByTagName('script')[0]; z.async=1; z.src=b; z.id='subiz-script'; zz.parentNode.insertBefore(z,zz); })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz'); subiz('setAccount', 'acqdcxxlfkhvhdrpvhwr'); </script> <!-- End Subiz -->

<script src="<?php echo APP_URL; ?>common/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/common.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/cookies.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/addcart.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/biggerlink.js"></script>
<script type="text/javascript">
    $(function(){
        $('.matchHeight').matchHeight();
        $('.biggerlink').biggerlink();
        
    });
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
<?php include(APP_PATH."libs/boxProd.php"); ?>