<?php 
require_once('inner_config.php');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);

$update_link = '';
if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['img_test'] = htmlspecialchars($row['img_test']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}
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
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <p><div class="title_text">제목</div><input class="title_box" type="text" name="title" placeholder="제목" autocomplete="off" value="<?=$article['title']?>"></p>
            <p><div class="desc_text">내용</div><textarea class="description_box" name="description" placeholder="내용"><?=$article['description']?></textarea></p>
            <p><input type="file" name="uploadfile" class="uploadfile" value="" /><?=$article['img_test']?></p>
            <p><img class="show_img" src="<?=$article['img_test']?>"/></p>
            <p><input class="submit_btn" type="submit"></p>
        </form>
        </div>
    </div>
</div>
<script src="../js/logout.js"></script>
</body>
</html>