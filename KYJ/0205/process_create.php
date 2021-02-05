<?php
// require_once('./view/php_connect_root.php');
require_once('./view/php_connect_h.php');

$filtered = array(
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./designSource/kyj/" . $filename;
$show_img = '';
$msg = '';
$author_id = '';
if(is_uploaded_file($tempname)){
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
      '$author_id',
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
$msg .= '<br><br> <a href="index.php">돌아가기</a><br><br>';

require_once('./view/html_top.php');
?>
</div>
<div id="Wrap" class="wrap_posts">
    <h1><a class="main_title" href="index.php">게시판</a></h1>
    <div class="show_box">
        <div class="cru_box">
            <?=$msg?>
            <?=$show_img?>
        </div>
    </div>
    <?php
    require_once('./view/bottom.php');
    ?>