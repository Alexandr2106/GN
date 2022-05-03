<? 
include("../DB.php");
if(isset($_POST['user_login']) && isset($_POST['comment']) && isset($_POST['article_id'])){
    $user_login = $_POST['user_login'];
    $comment = $_POST['comment'];
    $article_id = $_POST['article_id'];
    $admin = 0;
    add_new_comment($user_login,$comment,$article_id,$admin);
    echo "Комментарий добавлен";
}





?>