$(function(){
    $(".buy").click(function(){
       $(".buy-form").css('display' , 'block');
       var val = $(this).attr('id');
       $(".productId").attr('value', val);



    });

});
