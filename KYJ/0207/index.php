<?php
require_once('config.php');
// require_once('./view/php_top.php');

// $article = array(
//     'title' => '환영합니다.',
//     'description' => '글을 둘러보거나 작성할 수 있습니다.'
// );
// $update_link = '';
// $delete_link = '';
// $author = '';
// $date = '';
// $post_inner_img = '';
// $comments = '';
// $filtered_id = '';
// if (isset($_GET['id'])) {
//     $pnum = $_GET['id'];
//     $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
//     $sql = "SELECT * FROM topic LEFT JOIN member ON topic.author_id = member.id WHERE topic.id={$filtered_id}";
//     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
//     $row = mysqli_fetch_array($result);
//     $article['title'] = htmlspecialchars($row['title']);
//     $article['description'] = htmlspecialchars($row['description']);
//     $article['name'] = htmlspecialchars($row['name']);
//     $article['created'] = htmlspecialchars($row['created']);
//     $article['author_id'] = htmlspecialchars($row['author_id']);

//     $update_link = '<a class="update_link" href="update.php?id=' . $_GET['id'] . '">수정</a>';
//     $delete_link = '
//     <form action="process_delete.php" method="post" class="delete_link">
//         <input type="hidden" name="id" value="' . $_GET['id'] . '">
//         <input class="delete_link_inner" type="submit" value="삭제">
//     </form>
//     ';
//     $comment_link ='
//     <form action="./comment/comment_create.php" method="POST" class="comment_link">
//         <input type="hidden" name="post_num" value="'.$_GET['id'].'">
//         <input type="hidden" class="username" name="username" value="'.$userName.'">
//         <textarea name="content" class="comm_con"></textarea>
//         <input class="comm_btn" type="submit" value="작성">
//     </form>
//     ';
//     $author = $article['name'];
//     $author_id = $article['author_id'];
//     $date = $article['created'];

//     if (($row['img_test'])) {
//         $post_inner_img = "<p><img class=\"post_innerImg\" src=\"{$row['img_test']}\"></p>";
//     }
// }

require_once('./view/html_top.php');
require_once('./view/html_slide.php');
?>

<script type="text/javascript" src="./js/postImg.js?ver=1"></script>
<script src="./js/slide.js"></script>
    <?php
    require_once('./view/bottom.php');
    ?>