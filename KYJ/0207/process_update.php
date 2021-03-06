<?php
require_once('config.php');

settype($_POST['id'], 'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$tempname = $_FILES["uploadfile"]["tmp_name"];
$show_img = '';
$msg = '';
$sql = '';
if(is_uploaded_file($tempname)){
    $filename = $_FILES["uploadfile"]["name"];
    $folder = "./designSource/kyj/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $msg = "이미지가 성공적으로 수정되었습니다.<br>";
        $show_img = "<img class=\"show_img\" src=\"$folder\">";
    } else {
        $msg = "이미지 수정에 실패하였습니다.<br>";
        error_log(mysqli_error($conn));
    }

    $sql = "
    UPDATE topic
        SET
            title = '{$filtered['title']}',
            description = '{$filtered['description']}',
            img_test = '$folder'
        WHERE
            id = {$filtered['id']}
    ";
} else {
    $sql = "
    UPDATE topic
        SET
            title = '{$filtered['title']}',
            description = '{$filtered['description']}'
        WHERE
            id = {$filtered['id']}
    ";
}

$result = mysqli_query($conn, $sql);
if($result === false){
    $msg .= 'db 수정에 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    $msg .= 'db 수정에 성공했습니다.';
}
$msg .= '<br><br> <a href="php_post.php">돌아가기</a><br><br>';

require_once('./view/html_top.php');
?>
</div>
<div id="Wrap" class="wrap_posts">
    <h1><a class="main_title" href="php_post.php">게시판</a></h1>
    <div class="show_box">
        <div class="cru_box">
            <?=$msg?>
            <?=$show_img?>
        </div>
    </div>
</div>
    <?php
    require_once('./view/bottom.php');
    ?>