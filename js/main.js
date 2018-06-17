$(function(){
    var applicationTabs;

    $(document).on('click', '.js-get-page', function(event){
        event.preventDefault();

        var tab = $(this).data('tab');
        var ajaxPage = $(this).data('page');

        $('.item-menu').removeClass('active');
        $('.item-menu:nth-of-type(' + tab + ')').addClass('active');

        if (applicationTabs.activeIndex !== (tab - 1)) {
            $('.page-content').fadeOut(200);

            closeChat();

            setTimeout(function(){
                applicationTabs.slideTo(tab - 1, 0);
                $('.page-content').fadeIn(200);
            }, 200);
        }
    });
    
    function closeChat() {
        $('.js-open-chat').removeClass('active');
        $('.chat-message').removeClass('visible');
    }

    function initActions() {
        new Swiper('.swiper-container-team', {
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            slidesPerView: 'auto',
            freeMode: true
        });

        $('.team-form').submit(function(event){
            event.preventDefault();
            var message = $('.chat-text').val();
            var pseudo = $('.chat-pseudo').val();
            $('.chat-messages').append('<div class="chat-message visible me"><p>' + message +  '</p><strong>- ' + pseudo + '</strong></div>');
            $('.chat-messages').stop().animate( { scrollTop: $('.chat-messages')[0].scrollHeight }, 500 ); // Go
			return false;
        });

        $('.js-ajax-page').click(function(event){
            event.preventDefault();
    
            var ajaxPage = $(this).data('page');
            $('.swiper-tabs-active').fadeOut(200);
    
            $.get('assets/' + ajaxPage + '.php', function(data){
                setTimeout(function(){
                    $('.swiper-tabs-active').html(data);
                    $('.swiper-tabs-active').fadeIn(200);
                    initActions();
                    checkTopBar();
                }, 200);
            });
        });
    }

    var currentPos = 0;

    function checkTopBar() {
        if (screen.width <= 640) {
            var scrollTop = window.pageYOffset || document.body.scrollTop || $('.swiper-tabs-active').scrollTop();

            if (scrollTop < currentPos) {
                $('.topbar').addClass('sticky');
            } else if (scrollTop > 10) {
                $('.topbar').removeClass('sticky');
            }

            currentPos = scrollTop;
        }
    }

    $('.js-open-chat').click(function(){
        $(this).toggleClass('active');

        if($(this).hasClass('active')) {
            let time = 0;
            $('.chat-message').each(function(){
                time += 250;
                setTimeout(() => {
                    $(this).addClass('visible');
                }, time);
            });

            setTimeout(() => {
                $('.team-form').addClass('visible');
            },($('.chat-message').length + 1) * 250);
        } else {
            $('.chat-message').removeClass('visible');
        }
    });

    $('.chat-close').click(function(){
        closeChat();
    });

    $('.swiper-slide').scroll(function(){
        checkTopBar();
    });

    checkTopBar();
    
    if (screen.width <= 640) {
        applicationTabs = new Swiper('.swiper-container-tabs', {
            slidesPerView: 1,
            speed: 500,
            on: {
                slideChange: function() {
                    $('.item-menu').removeClass('active').eq(this.activeIndex).addClass('active');
                    setTimeout(function(){
                        checkTopBar();
                    }, 200);
                },
                init: function() {
                    var current = $('.swiper-container-tabs').data('current');
                    
                    if (current === false) {
                        current = 2;
                        console.log('2 !');
                    }
                    this.slideTo(current, 0);	
                    initActions();
                }
            },
            slideActiveClass: 'swiper-tabs-active'
        });
    }
});

