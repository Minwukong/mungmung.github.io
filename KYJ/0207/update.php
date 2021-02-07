<?php 
require_once('config.php');
require_once('./view/php_top.php');

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
    require_once('./view/html_top.php');
?>
    </div>
    <div id="Wrap" class="wrap_posts">
        <h1><a class="main_title" href="index.php">게시판</a></h1>
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
<?php
    require_once('./view/bottom.php');
?>