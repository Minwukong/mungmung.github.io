<?php
require_once('inner_config.php');

$filtered = array(
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
// $folder = "../designSource/kyj/" . $filename;
$folder = '';
$show_img = '';
$msg = '';
// $author_id = '';
if(is_uploaded_file($tempname)){
    $folder = "../designSource/kyj/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "이미지가 성공적으로 업로드되었습니다.<br>";
        $show_img = "<img class=\"show_img\" src=\"$folder\">";
    } else {
        $msg = "이미지 업로드에 실패하였습니다.<br>";
        error_log(mysqli_error($conn));
    }
}

$sql = "
INSERT INTO topic
  (title, description, created, author_id, img_test)
  VALUES(
      '{$_POST['title']}',
      '{$_POST['description']}',
      NOW(),
      '$userId',
      '$folder'
  )    
";

$result = mysqli_query($conn, $sql);
if($result === false){
    $msg .= 'db 저장에 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    $msg .= 'db 저장에 성공했습니다.';
}
$msg .= '<br><br> <a href="/php_post.php">돌아가기</a><br><br>';

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
            <?=$msg?>
            <?=$show_img?>
        </div>
    </div>
</div>
<script src="../js/logout.js"></script>
</body>
</html>