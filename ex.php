<?
include ("./DB.php");
$games_all = get_games_all();
foreach ($games_all as $games){
    echo ($games['name_game']);
}
?>