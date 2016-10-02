$('#show-shop-cart').on('click',function(){
    $(this).hide();
    $('#shop-cart').show();
    $('.containers').removeClass('col-md-offset-2 col-lg-offset-2');
});
$('#hide-shop-cart').on('click',function(){
    $('#shop-cart').hide();
    $('#show-shop-cart').show();
    $('.containers').addClass('col-md-offset-2 col-lg-offset-2');
});