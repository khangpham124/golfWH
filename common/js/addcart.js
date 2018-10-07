/* check and insert number of item */
var start = readCookie('incart');
if (start) {
    $('.numbCart').html(start);
} else {
    $('.numbCart').html(0);
}


/* add Item to cart */
$(".addToCard").click(function() {
    if (($(".colorChose").length > 0) && (!$("input[name=colorChose]").is(':checked'))) {
        alert('Please chose COLOR');
        $('.colorPart').addClass('notice');
    } else {
        $('.colorPart').removeClass('notice');
        if (($(".sizeChose").length > 0) && (!$("input[name=sizeChose]").is(':checked'))) {
            alert('Please chose SIZE');
            $('.sizePart').addClass('notice');
        } else {
            $('.sizePart').removeClass('notice');
            var isThis = $(this);
            var id_pro = isThis.attr('data-id');
            var sku = isThis.attr('data-sku');
            var name_pro = isThis.attr('data-title');
            var price_pro = parseInt(isThis.attr('data-price'));
            var quantity = parseInt($("#quantity").val());
            var tcost = quantity * price_pro;
            var getCL = $("input[name=colorChose]:checked").val();
            var size = $("input[name=sizeChose]:checked").val();
            var color = getCL.replace('#', '');
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
                url: '/ajax/create_json.php?proid=' + id_pro + '&qual=' + quantity + '&price=' + price_pro + '&cost=' + tcost + '&name_pro=' + name_pro + '&size=' + size + '&color=' + color + '&sku=' + sku,
                type: 'GET',
                success: function(data) {
                    var start = readCookie('incart');
                    $('.numbCart').html(start);
                }
            })
        }
    }

});
/* Update cart */
$('.updateBtn').live('click', function() {
    var itemDel = $(this).attr('data-id');
    var itemCost = $(this).parent().parent().parent().next().next().find('.qtyNumb').val();
    $.ajax({
        data: {},
        url: '/ajax/modify_json.php?proid=' + itemDel + '&qual=' + itemCost,
        type: 'GET',
        success: function(data) {
            alert('update already');
        }
    })
});

/* remove Item from cart */
$('.removeItem').live('click', function() {
    var itemDel = $(this).attr('data-id');
    var itemCost = $(this).prev().find('.qtyNumb').text();
    $(this).parent().parent().remove();
    $.ajax({
        data: {},
        url: '/ajax/edit_json.php?proid=' + itemDel + '&qual=' + itemCost,
        type: 'GET',
        success: function(data) {
            var start = readCookie('incart');
            $('.numbCart').html(start);
        }
    })
});