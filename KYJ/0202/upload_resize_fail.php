<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'qmffhrcpdls',
    'photos');

if (isset($_POST['upload'])) { 
    $filename = $_FILES['uploadfile']['tmp_name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $handle = fopen($tempname, "rb");

    $size = GetImageSize($_FILES['uploadfile']['tmp_name']);
    $width = $size[0];
    $height = $size[1];

    //메모리 오류 방지
    ini_set("memory_limit" , -1);
    // $query = "INSERT INTO images (image, title, width, height) VALUES ('$imageblob', '$filename', '$width','$height')" ;
    // mysqli_query($conn, $query);
    // echo "<script>location.href='images_list.php';</script>";

    // if($result === false){
    //     echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
    //     error_log(mysqli_error($conn));
    // } else {
        //200 넘으면 리사이징
        if($width > 200){
            $new_width = 200;
            $new_height = $height * (200/$width);

            $image_p = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($filename);
            imagecopyresampled($image_p, $image, 0,0,0,0, $new_width, $new_height, $width, $height);
            imagejpeg($image_p, "$tempname", 100);
            imagedestroy($image);
            imagedestroy($image_p);
        } else {
            $new_width = $width;
            $new_height = $height;

            $image_p = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($filename);
            imagecopyresampled($image_p, $image, 0,0,0,0, $new_width, $new_height, $width, $height);
            imagejpeg($image_p, "$tempname", 100);
            imagedestroy($image);
            imagedestroy($image_p);
        }

        $size = GetImageSize($_FILES['uploadfile']['tmp_name']);
        $width = $size[0];
        $height = $size[1];
        
        $imageblob = addslashes(fread($handle, filesize($tempname)));
        $filesize = filesize($tempname);

        $query = "INSERT INTO images (image, title, width, height) VALUES ('$imageblob', '$filename', '$width','$height')" ;
        mysqli_query($conn, $query);

        $result = mysqli_query($conn, "SELECT * FROM images");
        $row = mysqli_fetch_array($result);

        header("Content-type: image/jpeg");
        echo $row['image'];
        echo '<a href="index.php">돌아가기</a>';
    // }
    
    fclose($handle);
}
?>