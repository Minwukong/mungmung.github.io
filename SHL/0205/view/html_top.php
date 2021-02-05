<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>멍냥펀치</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main_head.css">
    <link rel="stylesheet" href="./css/main_slide.css">
    <link rel="stylesheet" href="./css/main_post.css?ver=1">
    <script src="js/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div id="Wrap" class="wrap_punch">
        <header id="Head">
            <div class="service_header top">
                <div class="wrap_inner">
                    <div class="f_l">
                        <button id="btnServiceMenu" type="button" class="f_l text_hide btn_menu img_ico">메뉴</button>
                    </div>
                    <div class="f_c">
                        <img src="designSource/logo2/logo_transparent_cut.png" style="height: 80px; width: 80px;">
                    </div>
                    <div class="f_r">
<?php
                        if(isset($_SESSION['id'])){
?>
                            <!-- <a href="login.html" class="f_r btn_request btn_default" onclick="logout()">로그아웃</a> -->
                            <button class="f_r btn_request btn_default" onclick="logout()">로그아웃</button>
<?php
                        }else{
?>
                            <a href="login.html" class="f_r btn_request btn_default">로그인</a>
<?php                   
                        }
?>
                        
                    </div>
                </div>
            </div>
            <div class="wrapSideMenu"></div>
        </header>