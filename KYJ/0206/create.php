<?php
require_once('./view/php_top.php');
require_once('./view/html_top.php');
?>
</div>
<div id="Wrap" class="wrap_posts">
    <h1><a class="main_title" href="index.php">게시판</a></h1>
    <div class="show_box">
        <div class="cru_box">
            <form action="process_create.php" method="POST" enctype="multipart/form-data">
                <p>제목<input class="title_box" type="text" name="title" placeholder="제목" autocomplete="off"></p>
                <p>내용<textarea class="description_box" name="description" placeholder="내용"></textarea></p>
                <p><input type="file" name="uploadfile" value="" /></p>
                <p><input class="submit_btn" type="submit"></p>
            </form>
        </div>
    </div>

    <?php
    require_once('./view/bottom.php');
    ?>