$(function () {
    $('.more').slice(0, 4).show();
    $('#loadMore').on('click', function (e) {
        e.preventDefault();
        $('.more:hidden').slice(0, 4).slideDown();
        if ($('.more:hidden').length == 0) {
            $('#load').fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});
$("#toTop").click(function () {
  $('html,body').animate({
  scrollTop:0 }, 1000);
});
