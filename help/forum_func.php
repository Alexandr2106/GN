<?
include("../DB.php");

//Функции для добавления файла
function can_upload($file)
{
    // если имя пустое, значит файл не выбран
    if ($file['name'] == '')
        return 'Вы не выбрали файл.';
    /* если размер файла 0, значит его не пропустили настройки 
	сервера из-за того, что он слишком большой */
    if ($file['size'] == 0)
        return 'Файл слишком большой.';
    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    // если расширение не входит в список допустимых - return
    if (!in_array($mime, $types))
        return 'Недопустимый тип файла.';
    return true;
}

function make_upload($file, $user, $post_id)
{
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    // формируем уникальное имя картинки: случайное число и name
    if (file_exists("../img/posts_img/" . "$user/" . $post_id)) {

        $name = mt_rand(0, 10000) . $file['name'] . "." . $mime;
        copy($file['tmp_name'], "../img/posts_img/" . "$user/" . "$post_id/" . $name);
    } else {
        if (file_exists("../img/posts_img/$user")) {
            mkdir("../img/posts_img/$user/$post_id", 0700);
        } else {
            mkdir("../img/posts_img/$user", 0700);
            mkdir("../img/posts_img/$user/$post_id", 0700);
        }

        $name = mt_rand(0, 10000) . $file['name'] . "." . $mime;
        copy($file['tmp_name'], "../img/posts_img/" . "$user/" . "$post_id/" . $name);
    }
}
if (isset($_POST['post_title'])) {
    $post_user = $_POST['post_user'];
    $post_title = $_POST['post_title'];
    $post_comment = $_POST['post_comment'];
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $post_id = substr(str_shuffle($permitted_chars), 0, 10);

    if (isset($_FILES["files0"])) {
        for ($i = 0;; $i++) {
            $check = can_upload($_FILES["files$i"]);
            if ($check === true) {
                make_upload($_FILES["files$i"], $post_user, $post_id);
                $result[$i] = $post_id;
            } else {
                break;
            }
        }
    }

    $result = add_new_post($post_user, $post_title, $post_comment, $post_id);
    echo $result;
}
