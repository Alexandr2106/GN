<?

include("../../DB.php");

//Функции для добавления файла
function can_upload($file)
{
    if ($file['name'] == '')
        return 'Вы не выбрали файл.';

    if ($file['size'] == 0)
        return 'Файл слишком большой.';

    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    if (!in_array($mime, $types))
        return 'Недопустимый тип файла.';

    return true;
}

function make_upload($file, $login)
{
    $getMime = explode('.', $file['name']);

    $mime = strtolower(end($getMime));
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $unick = substr(str_shuffle($permitted_chars), 0, 40);
    if (file_exists("../../img/users_logo/" . $login)) {

        $imges = glob("../../img/users_logo/" . $login . "/*");
        foreach ($imges as $imge) {
            if (is_file($imge))
                unlink($imge);
        }



        
        $name = $unick . $login . "." . $mime;
        copy($file['tmp_name'], '../../img/users_logo/' . "$login/" . $name);
        add_user_avatar('img/users_logo/' . "$login/" . $name, $login);
    } else {

        mkdir("../../img/users_logo/" . $login, 0700);
        $name = $unick . $login . "." . $mime;
        copy($file['tmp_name'], '../../img/users_logo/' . "$login/" . $name);
        add_user_avatar('img/users_logo/' . "$login/" . $name, $login);
    }
}


//Другие функции
function change_login($new_login, $login)
{
    $result = check_logins($new_login);
    if ($result > 0) {
        echo "Такой логин уже существует. Придумайте новый.";
    } else {

        change_login_on_db($new_login, $login);


        echo "Логин был успешно изменён.";
    }
}



if (isset($_POST['new_login']) && isset($_POST['login'])) {
    $new_login = $_POST['new_login'];
    $login = $_POST['login'];

    change_login($new_login, $login);
}
if (isset($_POST['new_password']) && isset($_POST['password'])) {
    $new_password = $_POST['new_password'];
    $password = $_POST['password'];
    $login = $_POST['login'];
    $result = change_password_on_db($login, $new_password, $password);
    echo $result;
}

// если была произведена отправка формы
if (isset($_FILES['file'])) {
    // проверяем, можно ли загружать изображение
    $check = can_upload($_FILES['file']);
    if ($check === true) {
        // загружаем изображение на сервер
        make_upload($_FILES['file'], $_POST['login']);
        echo "<strong id='file_status' style='color: green'>Файл успешно загружен!</strong>";
    } else {
        // выводим сообщение об ошибке
        echo "<strong style='color: red'>*$check</strong>";
        $_FILES = array();
    }
}

if(isset($_POST['user_mailing_email'])){
    $email = $_POST['user_mailing_email'];
    $result = drop_mailing($email);
    if($result == 0){
        echo "Подписка успешно отменена.";
    }else{
        echo $result;
    }
}