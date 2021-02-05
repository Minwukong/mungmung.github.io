<?php
require_once('./view/php_top.php');

$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
$select_form = '<p><select name="author_id">';
while ($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}
$select_form .= '</select></p>';
// if(isset($_GET['id'])){
//     $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
//     $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_array($result);
//     $article['title'] = $row['title'];
//     $article['description'] = $row['description'];
// }

// require_once('upload.php');
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
                <input type="file" name="uploadfile" value="" />
                <button type="submit" name="upload">업로드</button>
                <?= $select_form ?>
                <p><input class="submit_btn" type="submit"></p>
            </form>
        </div>
    </div>

    <?php
    require_once('./view/bottom.php');
    ?>