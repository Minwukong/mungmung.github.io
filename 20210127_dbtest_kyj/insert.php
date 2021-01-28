<?php 
$conn = mysqli_connect("localhost","root","qmffhrcpdls","opentutorials");
// 일부러 오류낸 sql
$sql = "
    INSER INTO topic ( 
        title,
        description,
        created
    ) VALUES (
        'MySQL',
        'MySQL is ....',
        NOW()
    )";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
}    
?>