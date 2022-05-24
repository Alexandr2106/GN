<? 
include("../DB.php");
if(isset($_POST['comment']) && isset($_POST['article_id'])){
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment'];
    $article_id = $_POST['article_id'];
    add_new_comment($comment,$article_id, $user_id);
    echo "Комментарий добавлен";
}
if(isset($_POST['comment']) && isset($_POST['post_id'])){
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    add_new_post_comment($comment, $post_id, $user_id);
    echo "Ответ добавлен";
}




?>