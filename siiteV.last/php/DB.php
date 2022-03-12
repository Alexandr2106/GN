<?php
$dbhost = "localhost";
$dbname = "gamenews_db";
$username = "root";
$password = "";


$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);

//Получение всех статей
function get_singles_all(){
    global $db;
    $singles = $db -> query("SELECT * FROM `articles` ORDER BY `pubdate` DESC");
    return $singles;
}

//Получение всех статей, кроме 2 последних
function get_singles_minus_last_two(){
    global $db;
    $singles_minus_last_two = $db -> query("SELECT * FROM `articles` WHERE `id` not in (select max(`id`) from `articles`) and `id` not in (select max(`id`-1) from `articles`) ORDER BY `pubdate` DESC");
    return $singles_minus_last_two;
}

//Получение 2 последних статей
function get_FirstTwoSingles(){
    global $db;
    $FirstTwoSingles = $db -> query("SELECT * FROM `articles` WHERE `id` = (SELECT MAX(`id`) FROM `articles`) OR `id` = (SELECT MAX(`id` - 1) FROM `articles`)  ORDER BY `pubdate` DESC");
    return $FirstTwoSingles;
}

//Получение статьи по id  
function get_singele_by_id($id){
    global $db;
    $articles = $db -> query("SELECT * FROM `articles` WHERE `id` = $id");
    if (is_array($articles) || is_object($articles)){
        foreach ($articles as $article) {
            return $article;
        }
    }
}

//Получение игры по её ID
function get_games_by_id($id){
    global $db;
    $games = $db -> query("SELECT * FROM `games` WHERE `id` = $id");
    if (is_array($games) || is_object($games)){
        foreach ($games as $game) {
            return $game['name_game'];
        }
    }
}
//Увеличение кол-ва просмотров статьи по id

function views_update($id){
    global $db;
    $views_update = $db -> query("UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = $id");
    return $views_update;
    
}

//Получение всех игр 
function get_games_all(){
    global $db;
    $games_all = $db -> query("SELECT * FROM `games`");
    return $games_all;
}

//Получение всех статей для слайдера 
function get_singeles_for_slider(){
    global $db;
    $singeles_for_slider = $db -> query("SELECT * FROM `articles` WHERE `slider` = 1 ORDER BY `pubdate` DESC");
    return $singeles_for_slider;
}
?>