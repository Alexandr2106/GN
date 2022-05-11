<?
include("../../DB.php");

//Добавление статьи
if (isset($_POST['action']) && $_POST['action'] == "add_new_article") {
    $article_title = $_POST['article_title'];
    $prewie_text = $_POST['prewie_text'];
    $full_text = $_POST['full_text'];
    $article_img = $_POST['article_img'];
    $game_id = $_POST['game_id'];
    $add_slider = $_POST['add_slider'];

    $result = add_new_article($article_title, $prewie_text, $full_text, $article_img, $game_id, $add_slider);
    if ($result > 0) {
        echo "Статья успешно добавленна.";
    } else {
        echo "*Ошибка! Статья не добавлена.";
    }
}
//Добавление игры
if (isset($_POST['action']) && $_POST['action'] == "add_new_game") {
    $game_name = $_POST['game_name'];
    $game_image = $_POST['game_image'];
    $description = $_POST['description'];
    $platform = $_POST['platform'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];

    $result = add_new_game($game_name, $game_image, $description, $platform, $genre, $release_date);
    if ($result > 0) {
        echo "Игра успешно добавленна.";
    } else {
        echo "*Ошибка! Игра не добавлена.";
    }
}
//Удаление игры
if (isset($_POST['action']) && $_POST['action'] == "delete_game") {

    $result = delete_game($_POST['game_id']);
    if ($result > 0) {
        echo "*Ошибка! Игра не удалена.";
    } elseif ($result == "К этой игре привязаны статьи.") {
        echo $result;
    } else {
        echo "Игра успешно удалена.";
    }
}
//Удаление статьи
if (isset($_POST['action']) && $_POST['action'] == "delete_article") {

    $result = delete_article($_POST['article_id']);
    if ($result > 0) {
        echo "*Ошибка! Статья не удалена.";
    } else {
        echo "Статья успешно удалена.";
    }
}
//Редактирование статьи
if (isset($_POST['action']) && $_POST['action'] == "edit_article") {
    $article_id = $_POST['article_id'];
    $edit_article_title = $_POST['edit_article_title'];
    $edit_prewie_text = $_POST['edit_prewie_text'];
    $edit_full_text = $_POST['edit_full_text'];
    $edit_article_img = $_POST['edit_article_img'];
    $edit_game_id = $_POST['edit_game_id'];
    $edit_slider = $_POST['edit_slider'];

    $result = edit_article($article_id, $edit_article_title, $edit_prewie_text, $edit_full_text, $edit_article_img, $edit_game_id, $edit_slider);
    if ($result == 1) {
        echo "Статья успешно изменена.";
    } elseif ($result == -1) {
        echo "*Ошибка! Такой статьи не существует, обновите страницу.";
    } else {
        echo "*Ошибка! Статья не изменена.";
    }
}

//Редактирование игры
if (isset($_POST['action']) && $_POST['action'] == "edit_game") {
    $game_id = $_POST['game_id'];
    $edit_game_name = $_POST['edit_game_name'];
    $edit_game_img = $_POST['edit_game_img'];
    $edit_description = $_POST['edit_description'];
    $edit_platform = $_POST['edit_platform'];
    $edit_genre = $_POST['edit_genre'];
    $edit_release_date = $_POST['edit_release_date'];

    $result = edit_game($game_id, $edit_game_name, $edit_game_img, $edit_description, $edit_platform, $edit_genre, $edit_release_date);
    if ($result == 1) {
        echo "Игра успешно изменена.";
    } elseif ($result == -1) {
        echo "*Ошибка! Такой игры не существует, обновите страницу.";
    } else {
        echo "*Ошибка! Игра не изменена.";
    }
}
