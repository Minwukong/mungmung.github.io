<?php
require_once('inner_config.php');

$userName = '';
if(isset($_SESSION['name'])){
    $userName = $_SESSION['name'];
}

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['post_num'])
);

$sql = "
    INSERT INTO comments
        (post_num, name, contents, created)
    VALUES(
        '{$filtered['id']}',
        '$userName',
        '{$_POST['content']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result === false){
    echo 'db 저장에 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    echo "<script>location.href='/php_post.php?id=".$filtered['id']."';</script>";
}

?>