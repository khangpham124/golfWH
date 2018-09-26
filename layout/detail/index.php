<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="category">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->

<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="maxW">
	<div class="taR">
		<ul class="break clearfix">
			<li><a href="">Home</a></li>
			<li>Category</li>
			<li>Product</li>
		</ul>
	</div>

	<div class="clearfix">
		<aside class="leftSide">
			<h3 class="h3_shop">Shop by type</h3>
				<ul class="lstFilter">
					<li><a href="">Type 1</a></li>
					<li><a href="">Type 2</a></li>
					<li><a href="">Type 3</a></li>
					<li><a href="">Type 4</a></li>
					<li><a href="">Type 5</a></li>
				</ul>
			<h3 class="h3_shop">Shop by Brand</h3>
			<ul class="lstFilter__brand">
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo1.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo2.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo3.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo4.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo5.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo6.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo7.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo8.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo9.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo10.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo11.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo12.jpg" class="" alt=""></a></li>
				<li><a href=""><img src="<?php echo APP_URL; ?>img/top/logo13.jpg" class="" alt=""></a></li>
			</ul>
		</aside>
		<div class="rightSide">
			<h2 class="h2_cate">Gậy golf driver Mizuno JPX 900 (Japan Spec)</h2>
			<div class="flexBox flexBox--wrap flexBox--top flexBox--between">
				<div class="slidePro">
					<ul class="slider-for">
						<li><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></li>
						<li><img src="<?php echo APP_URL; ?>img/demo/prod2.jpg" class="" alt=""></li>
						<li><img src="<?php echo APP_URL; ?>img/demo/prod3.jpg" class="" alt=""></li>
						<li><img src="<?php echo APP_URL; ?>img/demo/prod4.jpg" class="" alt=""></li>
					</ul>

					<ul class="slider-nav">
						<li><img src="<?php echo APP_URL; ?>img/demo/prod1.jpg" class="" alt=""></li>
						<li><img src="<?php echo APP_URL; ?>img/demo/prod2.jpg" class="" alt=""></li>
						<li><img src="<?php echo APP_URL; ?>img/demo/prod3.jpg" class="" alt=""></li>
						<li><img src="<?php echo APP_URL; ?>img/demo/prod4.jpg" class="" alt=""></li>
					</ul>
				</div>
				<div class="infoPro">
					<p class="infoPro--price">200.000 Đồng</p>
					<p class="infoPro--sku">SKU-GOLF001</p>
					<p class="infoPro--status">Còn hàng</p>
					<p class="infoPro--label">Màu sắc</p>
					<div class="colorPart">
						<p class="wrapRad" style="background:#fc1a1a"><input type="radio" value="s"></p>
						<p class="wrapRad" style="background:#2476ff"><input type="radio" value="m"></p>
						<p class="wrapRad" style="background:#ffce24"><input type="radio" value="l"></p>
					</div>
					<p class="infoPro--label">Kích thước</p>
					<div class="sizePart">
						<p class="wrapRad"><input type="radio" value="s">S</p>
						<p class="wrapRad"><input type="radio" value="m">M</p>
						<p class="wrapRad"><input type="radio" value="l">L</p>
					</div>
					<p class="infoPro--label">Số lượng</p>
					<div class="numbers-row clearfix">
						<div class='inc button cal' rel='+' ><i class="fa fa-caret-up" aria-hidden="true"></i></div>
						<div class='dec button cal' id='dec'><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<input type="text" id="quantity" class="input_cal" readonly  value="1"> 
                    </div>
					<a href="" class="infoPro--btn">ADD TO CART</a>
				</div>
			</div>

			
			<div class="tabBox">
				<ul class="tabList">
					<li><a href="">Thông số sản phẩm</a></li>
				</ul>
				<div class="tabContent" id="tab1">
				- Chiều dài gậy golf : 44 inches (111,8 cm) - 45 inches (114,3 cm).
				<br>
				- Góc loft : 9,5° - 12,5°.
				<br>
				- Loại cán : Fujikura Speeder EVO II.   
				<br>
				- Độ cứng : S (Stiff), R (Regular).
				<br>
				- Chất liệu : steel, rubber, graphite,...
				<br>
				- Thương hiệu : Mizuno.
				<br>
				Thông tin sản phẩm.
				<br>
				- Màu sắc xanh nổi bật, phù hợp với hình dáng lớn.
				<br>
				- Mặt sau gậy có màu đen làm nổi bật thêm đường nét giúp căn chỉnh màu trắng.
				<br>
				- Trọng lượng nhẹ, cán gậy Fujikura Speeder EVO II phù hợp từng chi tiết, giúp cú swing trở nên mượt mà hơn.
				<br>
				- Độ chính xác và ổn định được đánh giá hàng đầu, lựa chọn phù hợp với những golfer muốn cú đánh của mình lên fairway thường xuyên hơn.
				<br>
				- Công suất trung bình và độ ổn định cao sau nhiều kết quả thử nghiệm.
				<br>
				- Một trong những cây gậy driver có khả năng điều chỉnh nhiều nhất trên thị trường.
				<br>
				- Các rãnh gậy được làm đều nhau và rất chính xác
				<br>
				- Số sê-ri gậy được đánh tỉ mỉ, chuẩn xác
				<br>
				- Cổ gậy có những đường rãnh nhỏ bên trong vòm để giúp dính vào đầu gậy
				<br>
				- Trọng lượng gậy tăng đều để giữ trọng lượng swing giống nhau suốt cả bộ gậy
				<br>
				- Đầu gậy Mizuno JPX 900 được chế tạo bằng thép boron để tạo ra cây gậy đem lại cảm giác tuyệt vời.
				</div>
			</div>
		</div>
	</div>

</div>	



<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script src="<?php echo APP_URL; ?>common/js/slick.js"></script>
<script>
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
	centerMode: true,
	focusOnSelect: true
	});

	$(".button").click(function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.attr("rel") == '+') {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    $('.updateBtn').removeClass('disable');
    $button.parent().find("input").val(newVal);
    var dg = $(this).parent().parent().parent().prev().find('.priceNumb').val();
    var calc = parseInt(dg) * parseInt(newVal);
    var numb_calc = parseInt(calc);
    $(this).parent().parent().parent().next().find('.qtyPro .totalNumb').val(numb_calc);
});
</script>
</body>
</html>	