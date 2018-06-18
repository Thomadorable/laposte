$(function(){
    var applicationTabs;
    
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
            slidesPerView: 3,
            spaceBetween: 28,
            slidesPerGroup: 2,
            freeMode: true,
            freeModeSticky: true
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
    
            $.get('app/ajax/' + ajaxPage + '.php', function(data){
                setTimeout(function(){
                    $('.swiper-tabs-active').html(data);
                    $('.swiper-tabs-active').fadeIn(200);
                    initActions();
                    checkTopBar();
                }, 200);
            });
        });

        $('.profile-form').submit(function(event){
            event.preventDefault();
            var datas = $(this).serialize();

            $('.swiper-tabs-active').html('<div class="loader"></div>');

            $.post('app/ajax/updateUser.php', datas, function(data){
                if (data === '202') {
                    setTimeout(function(){
                        $('.swiper-tabs-active').fadeOut(200);
                        $.get('app/views/profile.php', function(data){
                            setTimeout(function(){
                                $('.swiper-tabs-active').html(data);
                                $('.swiper-tabs-active').fadeIn(200);
                                initActions();
                                checkTopBar();
                            }, 200);
                        });
                    }, 500);
                }
            });
        });

        $('.close-actu').click(function(event){
            event.preventDefault();
            $(this).closest('.actu').slideUp();
        });
    }

    var currentPos = 0;

    function checkTopBar() {
        if (screen.width <= 640) {
            var scrollTop = window.pageYOffset || document.body.scrollTop || $('.swiper-tabs-active').scrollTop();

            if (scrollTop < currentPos) {
                $('.topbar2').addClass('sticky');
            } else if (scrollTop > 50) {
                $('.topbar2').removeClass('sticky');
            } 

            currentPos = scrollTop;
        }
    }

    $('.js-open-chat').click(function(){
        $(this).toggleClass('active');

        if($(this).hasClass('active')) {
            $('.chat-messages').stop().animate( { scrollTop: 0 }, 0 );
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
        console.log('plop')
        applicationTabs = new Swiper('.swiper-container-tabs', {
            slidesPerView: 1,
            speed: 500,
            on: {
                slideChange: function() {
                    $('.item-menu').removeClass('active').eq(this.activeIndex).addClass('active');
                    setTimeout(function(){
                        // checkTopBar();
                        $('.topbar2').addClass('sticky');
                    }, 200);
                },
                init: function() {
                    var current = $('.swiper-container-tabs').data('current');
                    
                    if (current === false) {
                        current = 2;
                    }
                    this.slideTo(current, 0);	
                    initActions();
                    $('.swiper-container-tabs').css('opacity', 1);
                    $('#loader').fadeOut();
                }
            },
            slideActiveClass: 'swiper-tabs-active'
        });

        $(document).on('click', '.js-get-page', function(event){
            event.preventDefault();
    
            var tab = $(this).data('tab');
    
            $('.item-menu').removeClass('active');
            $('.item-menu:nth-of-type(' + tab + ')').addClass('active');
    
            if (applicationTabs.activeIndex !== (tab - 1)) {

                if (tab === 3) {
                    $('.box-icon').addClass('boxed').attr('src', 'images/mailbox1.gif');
                } else if($('.box-icon').hasClass('boxed')) {
                    $('.box-icon').removeClass('boxed').attr('src', 'images/mailbox2.gif');
                }

                $('.page-content').fadeOut(200);
    
                closeChat();
    
                setTimeout(function(){
                    applicationTabs.slideTo(tab - 1, 0);
                    $('.page-content').fadeIn(200);
                }, 200);
            }
        });
    } else {
        initActions();
        console.log('coucou')
    }
});

