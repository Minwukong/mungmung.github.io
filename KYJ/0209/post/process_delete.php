<?php
require_once('inner_config.php');

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "
  DELETE
    FROM topic
    WHERE id = {$filtered['id']}
";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>멍냥펀치</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/main_header.css">
    <link rel="stylesheet" href="../css/main_slide.css">
    <link rel="stylesheet" href="../css/main_post.css?ver=1">
    <link rel="stylesheet" href="../css/main_comments.css">
    <script src="js/jquery-3.5.1.min.js"></script>
</head>
<body>
        <header>
        <h1><a href="/index.php"><img src="../designSource/images/logo_transparent_white.png"> 멍냥펀치</a></h1>
        <h2 class="hide">대메뉴</h2>
        <nav class="lnb">
            <ul>
            <li><a href="/index.php"><span>메인홈</span></a></li>
            <li><a href="/php_post.php"><span>게시판</span></a></li>
            <li><a href="#a"><span>병원지도</span></a></li>
            <li><a href="#a"><span>정보</span></a></li>
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
            <li><a href="/login.html">로그인</a></li>
            <li><a href="/register.html">회원가입</a></li>
<?php
                    }
?>
            </ul>
        </nav>
    </header>
</div>
<div id="Wrap" class="wrap_posts">
    <h1><a class="main_title" href="/index.php">게시판</a></h1>
    <div class="show_box">
        <div class="cru_box">
        <?php
        if($result === false){
            echo '삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
            error_log(mysqli_error($conn));
        } else {
            echo '삭제에 성공했습니다.<br><br> <a href="/php_post.php">돌아가기</a>';
        }
        ?>
        </div>
    </div>
</div>
<script src="../js/logout.js"></script>
</body>
</html>