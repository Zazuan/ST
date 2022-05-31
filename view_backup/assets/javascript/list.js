$(function () {
    // $('.category').hide();
    // $('.posts').hide();
    // $('.pages').hide();
    // $('#list > li').click(function (event) {
    //     $(this).children("ul").slideToggle();
    //     event.stopPropagation();
    // });
    //
    // $('.li_ul').click(function (event) {
    //     $(this).children("ul").slideToggle();
    //     event.stopPropagation();
    // });


    $('.li').on('click', function() {
        $('li').removeClass('active');
        $(this).addClass('active');
    });

    $('.li-main').on('click', function(){
        $('.category').hide();
        $('.posts').hide();
        $('.pages').hide();
        $('.settings').show();
    });

    // $('.li-pages').on('click', function(){
    //     $('.category').hide();
    //     $('.posts').hide();
    //     $('.pages').show();
    //     $('.settings').hide();
    // });
    //
    // $('.li-category').on('click', function(){
    //     $('.pages').hide();
    //     $('.posts').hide();
    //     $('.category').show();
    //     $('.settings').hide();
    // });
    // $('.li-posts').on('click', function(){
    //     $('.pages').hide();
    //     $('.category').hide();
    //     $('.posts').show();
    //     $('.settings').hide();
    // });
});