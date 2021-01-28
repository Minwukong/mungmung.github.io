$(function(){
    let container = $('.slideshow'),
        slideGroup = container.find('.slideshow_slides'),
        slides = slideGroup.find('a'),
        nav = container.find('.slideshow_nav'),
        indicator = container.find('.indicator'),
        slideCount = slides.length,
        indicatorHtml = '',
        currentIndex = 0,
        duration = 500,
        easing = 'easeInOutExpo',
        interval = 3500,
        timer;

        //슬라이드를 가로로 배열
        //slides마다 할 일, left 0%, 100% 200% 300%
        console.log(slides);
        slides.each(function(i){
            let newLeft = i * 100 + '%';
            $(this).css({left: newLeft});
            //<a href=' '>1</a>
            indicatorHtml += '<a href = "">'+(i+1)+'</a>';
        });//slides.each
        indicator.html(indicatorHtml);
        
        //슬라이드 이동 함수
        function goToSlide(index){
            slideGroup.animate({left:-100*index + '%'},duration);
            currentIndex = index;
            updateNav();
        };

        function updateNav(){
            let navPrev = nav.find('.prev');
            let navNext = nav.find('.next');
            if(currentIndex == 0){
                navPrev.addClass('disabled');
            }else{
                navPrev.removeClass('disabled');
            }
            if(currentIndex == slideCount - 1){
                navNext.addClass('disabled');
            }else{
                navNext.removeClass('disabled');
            }

            
            //eq(숫자)
            indicator.find('a').eq(currentIndex).addClass('active').siblings().removeClass('active');
        };

        //인디케이터로 이동하기
        indicator.find('a').click(function(e){
            e.preventDefault();
            let idx = $(this).index();
            goToSlide(idx);

        });

        //좌우 버튼으로 이동하기
        nav.find('a').click(function(e){
            e.preventDefault();
            if($(this).hasClass('prev')){
                goToSlide(currentIndex - 1);
            }else{
                goToSlide(currentIndex + 1);
            }
        });
        updateNav();

        //자동 슬라이드 함수
        function startTimer(){
            timer = setInterval(function(){
                let nextIndex = (currentIndex+1) % slideCount;
                goToSlide(nextIndex);
            },interval);
        }
        startTimer();

        function stopTimer(){
            clearInterval(timer);
        }

        container.mouseenter(function(){
            stopTimer();
        })
        .mouseleave(function(){
            startTimer();
        })
});