/* check and insert number of item */
var start = readCookie('incart');
if (start) {
    $('.numbCart').html(start);
} else {
    $('.numbCart').html(0);
}

/* add Item to cart */
$(".addToCart-clubs").click(function() {
    if ((!$("input[name=shaftChose]").is(':checked')) || (!$("input[name=flexChose]").is(':checked')) || (!$("input[name=loftChose]").is(':checked'))) {
        if (!$("input[name=shaftChose]").is(':checked')) {
            alert('Please chose Shaft');
            $('.shaftPart').addClass('notice');
        }
        if (!$("input[name=flexChose]").is(':checked')) {
            alert('Please chose Flex');
            $('.flexPart').addClass('notice');
        }
        if (!$("input[name=loftChose]").is(':checked')) {
            alert('Please chose Loft');
            $('.loftPart').addClass('notice');
        }
    } else {
        var isThis = $(this);
        var id_pro = isThis.attr('data-id');
        var sku = isThis.attr('data-sku');
        var name_pro = isThis.attr('data-title');
        var price_pro = parseInt(isThis.attr('data-price'));
        var quantity = parseInt($("#quantity").val());
        var tcost = quantity * price_pro;
        var shaft = $("input[name=shaftChose]:checked").val();
        var flex = $("input[name=flexChose]:checked").val();
        var loft = $("input[name=loftChose]:checked").val();
        alert(shaft);
        //TOTAL CART
        isThis.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
        setTimeout(function() {
            isThis.html('<i class="fa fa-shopping-cart"></i> Added');
            isThis.addClass('disable');
            $('.choseWrap').removeClass('notice');
            $('.radChose').prop("checked", false);
            $('.wrapRad').removeClass('chose');

        }, 500);
        $.ajax({
            data: {},
            url: '/ajax/create_json.php?proid=' + id_pro + '&qual=' + quantity + '&price=' + price_pro + '&cost=' + tcost + '&name_pro=' + name_pro + '&sku=' + sku + '&flex=' + flex + '&shaft=' + shaft + '&loft=' + loft,
            type: 'GET',
            success: function(data) {
                var start = readCookie('incart');
                $('.numbCart').html(start);
            }
        })
    }
});