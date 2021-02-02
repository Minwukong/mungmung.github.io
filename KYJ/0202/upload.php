<?php
error_reporting(0);
?>
<?php
    $msg = "";

    //업로드 누르면
    if (isset($_POST['upload'])) { 
    
        $filename = $_FILES["uploadfile"]["name"]; 
        $tempname = $_FILES["uploadfile"]["tmp_name"];     
        // $folder = "D:/image/".$filename; 
        $folder = "./designSource/kyj".$filename;
            
        $db = mysqli_connect("localhost", "root", "qmffhrcpdls", "first"); 
    
            // Get all the submitted data from the form 
            // $sql = "INSERT INTO image (filename) VALUES ('$filename')"; 
            $sql = "INSERT INTO topic (img_test) VALUES ('$folder')";
    
            // Execute query 
            mysqli_query($db, $sql); 
            
            // Now let's move the uploaded image into the folder: image 
            if (move_uploaded_file($tempname, $folder))  { 
                $msg = "이미지가 성공적으로 업로드되었습니다.";
            }else{ 
                $msg = "이미지 업로드에 실패하였습니다.";
            } 
    } 
    // $result = mysqli_query($db, "SELECT * FROM image"); 
    $result = mysqli_query($db, "SELECT * FROM topic"); 
    if($result === false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($conn));
    } else {
        echo '성공했습니다.<br><br> <a href="index.php">돌아가기</a>';
    }
?>