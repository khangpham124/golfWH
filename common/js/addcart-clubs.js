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
        if (($(".shaftChose").length > 0) && (!$("input[name=shaftChose]").is(':checked'))) {
            alert('Please chose SHAFT');
            $('.shaftPart').addClass('notice');
        } else {
            $('.shaftPart').removeClass('notice');
        }
        if (($(".flexChose").length > 0) && (!$("input[name=flexChose]").is(':checked'))) {
            alert('Please chose FLEX');
            $('.flexPart').addClass('notice');
        } else {
            $('.flexPart').removeClass('notice');
        }

        if (($(".loftChose").length > 0) && (!$("input[name=loftChose]").is(':checked'))) {
            alert('Please chose LOFT');
            $('.loftPart').addClass('notice');
        } else {
            $('.loftPart').removeClass('notice');
        }
    } else {
        var isThis = $(this);
        var id_pro = isThis.attr('data-id');
        var sku = isThis.attr('data-sku');
        var name = isThis.attr('data-title');
        var name_pro = name.replace('#', '');
        var price_pro = parseInt(isThis.attr('data-price'));
        var quantity = parseInt($("#quantity").val());
        var tcost = quantity * price_pro;
        var shaft = $("input[name=shaftChose]:checked").val();
        var flex = $("input[name=flexChose]:checked").val();
        var loft = $("input[name=loftChose]:checked").val();
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
            url: '/ajax/create_json.php?proid=' + id_pro + '&qual=' + quantity + '&price=' + price_pro + '&cost=' + tcost + '&sku=' + sku + '&flex=' + flex + '&shaft=' + shaft + '&loft=' + loft,
            type: 'GET',
            success: function(data) {
                var start = readCookie('incart');
                $('.numbCart').html(start);
            }
        })
    }
})