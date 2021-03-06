<?php
    session_start();
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>멍냥펀치</title>
    <script src="https://code.jquery.com/jquery-1.11.3.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main_header.css">
    <link rel="stylesheet" href="/css/map.css">
    <link rel="stylesheet" href="/css/info.css">
    <link rel="stylesheet" href="./css/main_footer.css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' /> -->
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/info.js"></script>
</head>
<body>
    <header>
        <h1><a href="index.php"><img src="/designSource/images/logo_transparent_white.png"> 멍냥펀치</a></h1>
        <h2 class="hide">대메뉴</h2>
        <nav class="lnb">
            <ul>
            <li><a href="index.php"><span>메인홈</span></a></li>
            <li><a href="php_post.php"><span>게시판</span></a></li>
            <li><a href="map.php"><span>병원지도</span></a></li>
            <li><a href="info.php"><span>정보</span></a></li>
            </ul>
        </nav>
        <h2 class="hide">관련서비스</h2>
        <nav class="spot">
            <ul>
              <?php
              if(isset($_SESSION['id'])){
?>
      <button class="logout" onclick="logout()">로그아웃</button>
<?php
              }else{
?>
      <li><a href="login.html">로그인</a></li>
      <li><a href="register.html">회원가입</a></li>
<?php
              }
?>
            </ul>
        </nav>
    </header>
    <figure class="snip1114" id="img_a">
        <img src="./designSource/images/puppy.jpg" alt="sq-sample2">
        <figcaption>
          <div class="circle"></div>
          <div class="icon"><span><i class="ion-ios-paw-outline"></i></span></div>
          <h2>    <span> 강아지  </span></h2>
        </figcaption>
        <a href="/Info_puppy.html"></a>
      </figure>
      <figure class="snip1114 " id="img_b"><img src="./designSource/images/cat.jpg" alt="sq-sample21" />
        <figcaption>
          <div class="circle"></div>
          <div class="icon"><span><i class="ion-ios-star-outline"></i></span></div>
          <h2>    <span> 고양이</span></h2>
        </figcaption>
        <a href="/info_cat.html"></a>
    </figure>
    
    <p id="imformation">
        강아지, 고양이, 기타 애완동물들의 사료 정보를 확인할 수 있습니다
        해당 동물을 클릭해주세요!
    </p>
    
      <figure class="snip1114" id="img_c"><img src="./designSource/images/etc.jpg" alt="sq-sample29" />
        <figcaption>
          <div class="circle"></div>
          <div class="icon"><span><i class="ion-ios-camera-outline"></i></span></div>
          <h2><span> ETC</span></h2>
        </figcaption>
        <a href="/Info_etc.html"></a>
      </figure>

    <script src="/js/info.js"></script>
    <script src="./js/logout.js"></script>
</body>
</html>
