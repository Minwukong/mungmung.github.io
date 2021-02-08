<?php
    session_start();
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>멍냥펀치</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main_header.css">
    <link rel="stylesheet" href="/css/map.css">
    <link rel="stylesheet" href="./css/main_footer.css">
    <script src="js/jquery-3.5.1.min.js"></script>
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

    <div class="map_wrap">
		<button onclick="animalHospital()" class="map_button">동물병원</button>
		<button onclick="park()" class="map_button">공 원</button>
		<div id="map" style="width:50%;height:150%;position:relative;overflow:hidden;"></div>
	
		<div id="menu_wrap" class="bg_white">
			<div class="option">
				<div>
					<form onsubmit="searchPlaces(); return false;">
						<input type="text" value="부천 동물병원" id="keyword" size="34" placeholder="지역, 위치를 입력하시오"> 
						<!-- <div class="searchButton_wrapper"> -->
							<button id="search_button"  type="submit"><img id="search_img" src="./designSource/images/magnifying-glass.png" alt=""></button>
						<!-- </div> -->
					</form>
				</div>
			</div>
			<hr>
			<ul id="placesList"></ul>
			<div id="pagination"></div>
		</div>
	</div>
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=4d24ec45f428a239d3b99336225822d3&libraries=services"></script>
	<script src="./js/map.js"></script>
    <script src="./js/logout.js"></script>
</body>
</html>
