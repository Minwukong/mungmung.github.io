
$(function(){
    let $slider = $('.slideshow_slides'),
        $firstSlide = $slider.find('li').first() // 첫번째 슬라이드
    .stop(true).animate({'opacity':1},200); // 첫번째 슬라이드만 보이게 하기

    function PrevSlide(){ // 이전버튼 함수
        let $lastSlide = $slider.find('li').last() //마지막 슬라이드
        .prependTo($slider); //마지막 슬라이드를 맨 앞으로 보내기  
        $secondSlide = $slider.find('li').eq(1)
     //두 번째 슬라이드 구하기
        .stop(true).animate({'opacity':0},400); //밀려난 두 번째 슬라이드는 fadeOut 시키고
        $firstSlide = $slider.find('li').first() //맨 처음 슬라이드 다시 구하기
        .stop(true).animate({'opacity':1},400);
      //새로 들어온 첫 번째 슬라이드는 fadeIn 시키기
    }
    function NextSlide(){ // 다음 버튼 함수
        $firstSlide = $slider.find('li').first() // 첫 번째 슬라이드
        .appendTo($slider); // 맨 마지막으로 보내기
        let $lastSlide = $slider.find('li').last() // 맨 마지막으로 보낸 슬라이드
        .stop(true).animate({'opacity':0},400); // fadeOut시키기
        $firstSlide = $slider.find('li').first()
      // 맨 처음 슬라이드
        .stop(true).animate({'opacity':1},400);
      // fadeIn 시키기
    }

    //-----------버튼 클릭----------
    $('.next').on('click', function(e){ //다음버튼 클릭
      e.preventDefault();
      NextSlide();
    });
    $('.prev').on('click', function(e){ //이전 버튼 클릭하면
      e.preventDefault();  
      PrevSlide();
    });

    //---------자동 슬라이드--------
    // let timer;
    // let container = $('.slideshow');
    // function startTimer(){
    //   timer = setInterval(NextSlide, 5000);
    // }
    // startTimer();

    // function stopTimer(){
    //   clearInterval(timer);
    // }
    
    // container.mouseenter(function(){
    //   clearInterval(timer);
    // })
    
    // .mouseleave(function(){
    //   startTimer();
    // })

    setInterval(NextSlide, 5000);
});