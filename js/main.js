$(function(){
    function closeChat() {
        $('.new-chat').fadeOut();
        $('.js-open-chat').removeClass('active');
        $('.chat-message').removeClass('visible');
        $('body, .modal-chat').css('overflow', 'auto');
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
            $('.new-chat').fadeOut();
            var message = $('.chat-text').val();
            $('.chat-text').val('');

            if (message.length > 0) {
                $('.chat-messages').append('<div class="flex flex-row chat-wrapper me"><div class="chavatar-wrapper"><img class="chavatar" src="images/avatars/simon.jpg" alt="Profil de Thomas"></div><div class="chat-message visible"><strong class="typo2">Simon</strong><p class="typo2">' + message + '</p></div></div>');
                
                $('.chat-messages').stop().animate( { scrollTop: $('.chat-messages')[0].scrollHeight }, 500 );
            }
        });

        $('.js-ajax-page').click(function(event){
            event.preventDefault();
    
            var tab = $(this).data('tab');
            var page = $(this).data('page');
            appAjax(page, tab);
        });

        $('.profile-form').submit(function(event){
            event.preventDefault();
            var datas = $(this).serialize();

            $('.content-page').html('');

            $('.loader').addClass('visible');


            $.post('app/views/updateUser.php', datas, function(data){
                if (data === '202') {
                    setTimeout(function(){
                        appAjax('profile', 5);
                    }, 500);
                }
            });
        });

        $('.close-actu').click(function(event){
            event.preventDefault();
            $(this).closest('.actu').slideUp();
        });

        $('.js-video').click(function(){
            $('.video').fadeIn();
            $('.video')[0].play();
        });
    }

    var currentPos = 0;

    function checkTopBar() {
        var width = $(window).width();
        if (width <= 640) {
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
        $('body, .modal-chat').css('overflow', 'hidden');

        if($(this).hasClass('active')) {
            $('.chat-messages').stop().animate( { scrollTop: $('.chat-messages').height() }, 0 );

            $('.chat-message').addClass('visible');
            $('.team-form').addClass('visible');

        } else {
            $('.chat-message').removeClass('visible');
        }
    });

    $('.chat-close').click(function(){
        closeChat();
    });

    function changeTab() {
        $('.progress').each(function(time){
            setTimeout(() => {
                $(this).addClass('anim' + $(this).data('level'));
            }, (time * 100))
        });
    }

    $(document).scroll(function(){
        checkTopBar();
    });

    // PARAMETERS : PAGE + ID PAGE (active onglet)
    function appAjax(page, tab) {
        if (typeof tab !== 'undefined') {
            var wantedTab = $('.item-menu:nth-of-type(' + tab + ')');
            $('.item-menu').removeClass('active');
            wantedTab.addClass('active');

            if (tab === 3) {
                $('.box-icon').addClass('boxed').attr('src', 'images/mailbox1.gif');
            } else if($('.box-icon').hasClass('boxed')) {
                $('.box-icon').removeClass('boxed').attr('src', 'images/mailbox2.gif');
            }  
        } 

        $('.application').css('opacity', 0);
        closeChat();

        $('#loader').addClass('visible');

        if (tab === 1) {
            $('.content-page').addClass('no-padding-bottom');
        } else {
            $('.content-page').removeClass('no-padding-bottom');
        }
        
        $.get('app/views/' + page + '.php', function(data){
            $('#loader').removeClass('visible');

            if (page === 'team') {
                $('.js-open-chat').show();
            } else {
                $('.js-open-chat').hide();
            }

            setTimeout(function(){
                $('.content-page').html(data);
                $('html, body').stop().animate( { scrollTop: 0 }, 0 );
                $('.application').css('opacity', 1);
                initActions();
                checkTopBar();

                changeTab(); // anim
            }, 200);
        });
    }

    checkTopBar();
    
    var width = $(window).width();
    if (width <= 640) {
        initActions();
        $('.application').css('opacity', 1);
        $('#loader').removeClass('visible');
        changeTab();

        $(document).on('click', '.js-get-page', function(event){
            event.preventDefault();
    
            var tab = $(this).data('tab');
            var page = $(this).data('page');
            appAjax(page, tab);    
        });
    } else {
        initActions();
    }
});

