<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'qmffhrcpdls',
    'photos');

if (isset($_POST['upload'])) { 
    $filename = $_FILES['uploadfile']['tmp_name'];
    $handle = fopen($filename, "rb");
    $size = GetImageSize($_FILES['uploadfile']['tmp_name']);
    $width = $size[0];
    $height = $size[1];
    $imageblob = addslashes(fread($handle, filesize($filename)));

    fclose($handle);

    //메모리 오류 방지
    ini_set("memory_limit" , -1);
    $query = "INSERT INTO images
        (image, title, width, height)
        VALUES(
            '$imageblob', 
            '$filename', 
            '$width',
            '$height')" ;
    mysqli_query($conn, $query);
    // echo "<script>location.href='images_list.php';</script>";

    $result = mysqli_query($conn, "SELECT * FROM images");
    $row = mysqli_fetch_array($result);
    if($result === false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($conn));
    } else {
        // header("Content-type: image/jpeg");
        // $show_img = $row['image'];
        $show_img = "<div class=\"show_img\">{$row['image']}</div>";
        // echo '<a href="index.php">돌아가기</a>';
    }
}
?>