<?php require "../php/DB.php"; ?>


<?php

$single = get_singele_by_id($_GET['id']);
$game = get_games_by_id($single["games_id"]);

if (!isset($_COOKIE['ViewsCookie'])) {

    views_update($_GET['id']);
    setcookie("ViewsCookie", $single['id'], time() + 900);
} else if (isset($_COOKIE['ViewsCookie'])) {

    if (stristr($_COOKIE['ViewsCookie'], $single['id']) == false) {

        $arr =  $_COOKIE['ViewsCookie'];
        setcookie("ViewsCookie", "", time() - 900);
        $arr .= "-" . $single['id'];
        setcookie("ViewsCookie", $arr, time() + 900);
        views_update($_GET['id']);
    }
}
?>

<div>
    <div style="border: 1px solid black">
        <div>

            <img src="<?php echo $single["img"]; ?>" loading="lazy">

            <div>
                <h2><?php echo $single["title"]; ?></h2>
                <p><?php echo $single["full_text"]; ?></p>
                <div>
                    <span><?php echo $single["pubdate"]; ?></span>
                    <div>
                        <span><?php echo $game; ?></span>
                        <span><?php echo $single["views"]; ?></span>
                        <span>кол-во комментов</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>