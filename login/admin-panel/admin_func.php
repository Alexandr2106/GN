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
    $add_mailing = $_POST['add_mailing'];

    $result = add_new_article($article_title, $prewie_text, $full_text, $article_img, $game_id, $add_slider, $add_mailing);
    if ($result > 0) {
        echo "Статья успешно добавленна.";
    } elseif ($result == -1) {
        echo "*Ошибка! Статья с таким заголовком уже существует.";
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

    $Steam_price = $_POST['Steam_price'];
    if ($Steam_price == "NULL") {
        $Steam_price == NULL;
    }
    $Steam_link = $_POST['Steam_link'];
    if ($Steam_link == "NULL") {
        $Steam_link == NULL;
    }

    $GabeStore_price = $_POST['GabeStore_price'];
    if ($GabeStore_price == "NULL") {
        $GabeStore_price == NULL;
    }
    $GabeStore_link = $_POST['GabeStore_link'];
    if ($GabeStore_link == "NULL") {
        $GabeStore_link == NULL;
    }

    $EpicGames_price = $_POST['EpicGames_price'];
    if ($EpicGames_price == "NULL") {
        $EpicGames_price == NULL;
    }
    $EpicGames_link = $_POST['EpicGames_link'];
    if ($EpicGames_link == "NULL") {
        $EpicGames_link == NULL;
    }

    $SteamPay_price = $_POST['SteamPay_price'];
    if ($SteamPay_price == "NULL") {
        $SteamPay_price == NULL;
    }
    $SteamPay_link = $_POST['SteamPay_link'];
    if ($SteamPay_link == "NULL") {
        $SteamPay_link == NULL;
    }

    $Sous_Buy_price = $_POST['Sous_Buy_price'];
    if ($Sous_Buy_price == "NULL") {
        $Sous_Buy_price == NULL;
    }
    $Sous_Buy_link = $_POST['Sous_Buy_link'];
    if ($Sous_Buy_link == "NULL") {
        $Sous_Buy_link == NULL;
    }

    $Zaka_Zaka_price = $_POST['Zaka_Zaka_price'];
    if ($Zaka_Zaka_price == "NULL") {
        $Zaka_Zaka_price == NULL;
    }
    $Zaka_Zaka_link = $_POST['Zaka_Zaka_link'];
    if ($Zaka_Zaka_link == "NULL") {
        $Zaka_Zaka_link == NULL;
    }

    $result = add_new_game($game_name, $game_image, $description, $platform, $genre, $release_date, $Steam_price, $Steam_link, $GabeStore_price, $GabeStore_link, $EpicGames_price, $EpicGames_link, $SteamPay_price, $SteamPay_link, $Sous_Buy_price, $Sous_Buy_link, $Zaka_Zaka_price, $Zaka_Zaka_link);
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
    $edit_mailing = $_POST['edit_mailing'];

    $result = edit_article($article_id, $edit_article_title, $edit_prewie_text, $edit_full_text, $edit_article_img, $edit_game_id, $edit_slider, $edit_mailing);
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

    $Steam_price = $_POST['Steam_price'];
    if ($Steam_price == "NULL") {
        $Steam_price == NULL;
    }
    $Steam_link = $_POST['Steam_link'];
    if ($Steam_link == "NULL") {
        $Steam_link == NULL;
    }

    $GabeStore_price = $_POST['GabeStore_price'];
    if ($GabeStore_price == "NULL") {
        $GabeStore_price == NULL;
    }
    $GabeStore_link = $_POST['GabeStore_link'];
    if ($GabeStore_link == "NULL") {
        $GabeStore_link == NULL;
    }

    $EpicGames_price = $_POST['EpicGames_price'];
    if ($EpicGames_price == "NULL") {
        $EpicGames_price == NULL;
    }
    $EpicGames_link = $_POST['EpicGames_link'];
    if ($EpicGames_link == "NULL") {
        $EpicGames_link == NULL;
    }

    $SteamPay_price = $_POST['SteamPay_price'];
    if ($SteamPay_price == "NULL") {
        $SteamPay_price == NULL;
    }
    $SteamPay_link = $_POST['SteamPay_link'];
    if ($SteamPay_link == "NULL") {
        $SteamPay_link == NULL;
    }

    $Sous_Buy_price = $_POST['Sous_Buy_price'];
    if ($Sous_Buy_price == "NULL") {
        $Sous_Buy_price == NULL;
    }
    $Sous_Buy_link = $_POST['Sous_Buy_link'];
    if ($Sous_Buy_link == "NULL") {
        $Sous_Buy_link == NULL;
    }

    $Zaka_Zaka_price = $_POST['Zaka_Zaka_price'];
    if ($Zaka_Zaka_price == "NULL") {
        $Zaka_Zaka_price == NULL;
    }
    $Zaka_Zaka_link = $_POST['Zaka_Zaka_link'];
    if ($Zaka_Zaka_link == "NULL") {
        $Zaka_Zaka_link == NULL;
    }

    $result = edit_game($game_id, $edit_game_name, $edit_game_img, $edit_description, $edit_platform, $edit_genre, $edit_release_date, $Steam_price, $Steam_link, $GabeStore_price, $GabeStore_link, $EpicGames_price, $EpicGames_link, $SteamPay_price, $SteamPay_link, $Sous_Buy_price, $Sous_Buy_link, $Zaka_Zaka_price, $Zaka_Zaka_link);
    if ($result == 1) {
        echo "Игра успешно изменена.";
    } elseif ($result == -1) {
        echo "*Ошибка! Такой игры не существует, обновите страницу.";
    } else {
        echo "*Ошибка! Игра не изменена.";
    }
}
//Публикация темы
if (isset($_POST['action']) && $_POST['action'] == "publishPost") {

    $id = $_POST['id'];
    $result = publishPost($id);
    echo $result;
}
//Удаление темы
if (isset($_POST['action']) && $_POST['action'] == "deletePost") {

    $id = $_POST['id'];
    $result = deletePost($id);
    if ($result[0] == "success") {
        $user_id = $result[1];
        $post_id = $result[2];

        if (file_exists("../../img/posts_img/$user_id/$post_id")) {
            $imges = glob("../../img/posts_img/$user_id/$post_id/*");
            foreach ($imges as $imge) {
                if (is_file($imge))
                    unlink($imge);
            }
            rmdir("../../img/posts_img/$user_id/$post_id");
        }
    }
    echo $result[0];
}
