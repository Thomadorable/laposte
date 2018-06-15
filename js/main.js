$(function(){
    $('.js-get-page').click(function(event){
        event.preventDefault();

        var tab = $(this).data('tab');
        var ajaxPage = $(this).data('page');

        $('.item-menu').removeClass('active');
        $('.item-menu:nth-of-type(' + tab + ')').addClass('active');
        $('.page-content').html('');

        $.get('assets/' + ajaxPage + '.php', function(data){
            $('.page-content').html(data);

            initTeamSwiper();
        });
    });

    function initTeamSwiper() {
        new Swiper('.swiper-container-team', {
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            slidesPerView: 'auto',
            freeMode: true
        });
    }

    initTeamSwiper();
});

