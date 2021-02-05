<?php
    include "db.php";
    $id = $_GET['id'];
    $sql = mq("select * from member where id='".$id."'");
    $member = $sql->fetch_array();

    if($member==0){
?>
        <div><?php echo $id;?>는 사용가능한 아이디입니다.</div>
<?php
    }else{
?>  
        <div style='color:red;'><?php echo $id;?>는 중복된 아이디입니다!</div>
<?php
    }
?>
<button value="닫기" onclick="window.close()">닫기</button>
