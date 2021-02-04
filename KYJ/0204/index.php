<?php
require_once('./view/php_top.php');

$article = array(
    'title' => '환영합니다.',
    'description' => '글을 둘러보거나 작성할 수 있습니다.'
);
$update_link = '';
$delete_link = '';
$author = '';
$date = '';
$post_inner_img = '';
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);
    $article['created'] = htmlspecialchars($row['created']);

    $update_link = '<a class="update_link" href="update.php?id=' . $_GET['id'] . '">수정</a>';
    $delete_link = '
    <form action="process_delete.php" method="post" class="delete_link">
        <input type="hidden" name="id" value="' . $_GET['id'] . '">
        <input class="delete_link_inner" type="submit" value="삭제">
    </form>
    ';
    $author = "<p>by {$article['name']}</p>";
    $date = "<p>{$article['created']}</p>";

    if (($row['img_test'])) {
        $post_inner_img = "<img class=\"post_innerImg\" src=\"{$row['img_test']}\">";
    }
}


require_once('./view/html_top.php');
require_once('./view/html_slide.php');
?>
</div>
<div id="Wrap" class="wrap_posts">
    <h1><a class="main_title" href="index.php">게시판</a></h1>
    <div class="post_box">
        <a class="create" id="create" href="create.php">글쓰기</a>
        <div class="postImg_box" id="postImg_box">
            <?= $list; ?>
        </div>
    </div>
    <div class="show_box">
        <div class="update_delete">
            <?= $update_link ?>
            <?= $delete_link ?>
        </div>
        <div>
            <?= $post_inner_img ?>
            <h2><?= $article['title'] ?></h2>
            <?= $article['description'] ?>
            <?= $author ?>
            <?= $date ?>
        </div>
    </div>
    <?php
    require_once('./view/bottom.php');
    ?>