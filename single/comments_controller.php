<? 
include("../DB.php");
if(isset($_POST['user_login']) && isset($_POST['comment']) && isset($_POST['article_id'])){
    $user_login = $_POST['user_login'];
    $user_avatar = $_POST['user_avatar'];
    $comment = $_POST['comment'];
    $article_id = $_POST['article_id'];
    add_new_comment($user_login,$comment,$article_id,$user_avatar);
    echo "Комментарий добавлен";
}





?>