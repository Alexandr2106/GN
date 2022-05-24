<?php
require "./DB.php";
if (isset($_POST['search_tag']) && $_POST['search_tag'] == "s-games") {

    $value = $_POST['search_value'];
    $Query = "SELECT * FROM `games` WHERE `name_game` LIKE '%$value%'";
    $results = get_search_results($Query);
    foreach ($results as $result) {

?>
        <div class="game-item">
            <div class="game-img">
                <a href="./?game_id=<? echo $result['id']; ?>&go=0&page_num=1">
                    <img src="<? echo $result['Gimg']; ?>" alt="">
                </a>
            </div>
            <div class="game-deatils">
                <div class="row game-name">
                    <a href="./?game_id=<? echo $result['id']; ?>&go=0&page_num=1"><? echo $result['name_game']; ?></a>
                </div>
                <div class="game-specs">
                    <div class="specs-item">
                        <span>Платформа:</span>
                        <span><? echo $result['platform']; ?></span>
                    </div>
                    <div class="specs-item">
                        <span>Жанр:</span>
                        <span><? echo $result['genre']; ?></span>
                    </div>
                    <div class="specs-item">
                        <span>Дата выхода:</span>
                        <span><? if ($result['release_date'] == NULL) {
                                    echo "скоро";
                                } else {
                                    echo $result['release_date'];
                                } ?></span>
                    </div>
                </div>
                <div class="row view-all-about"><a href="./?game_id=<? echo $result['id']; ?>">ВСЕ НОВОСТИ ИГРЫ</a></div>
            </div>
        </div>
    <?
    }
} elseif (isset($_POST['search_tag']) && $_POST['search_tag'] == "s-news") {

    $value = $_POST['search_value'];
    $Query = "SELECT * FROM `articles` WHERE `title` LIKE '%$value%'";
    $results = get_search_results($Query);
    foreach ($results as $result) {
        $comments_count = get_comments_count_by_id($result["id"]);
        $game = get_games_by_id($result["games_id"]);
    ?>

        <div class="container">
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <a href="./?id=<?php echo $result["id"]; ?>">
                            <img class="imga" src="<?php echo $result["img"]; ?>">
                        </a>
                    </div>
                    <div class="title">
                        <a href="./?id=<?php echo $result["id"]; ?>" class="heading"><?php echo $result["title"]; ?>
                        </a>
                    </div>
                    <div class="text">
                        <?php

                        $stroka = iconv('UTF-8', 'windows-1251', $result["prewie_text"]); //Меняем кодировку на windows-1251

                        $stroka = substr($stroka, 0, 600); //Обрезаем строку

                        $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                        echo $stroka . "  ...  " . " <a href='./?id=" . $result["id"] . "'><span>     [Далее]</span></a>";

                        ?>
                    </div>
                    <div class="descript-wrap">
                        <a href="#"><span style="color: #bfbfbf;"><?php echo $game['name_game']; ?></span></a>
                        <span class="comments">
                            <img src="img/chat-bubble.png" class="imgi" alt="Комменты">
                            <?php echo $comments_count; ?>
                        </span>
                        <span class="views">
                            <img src="img/view.png" class="imgi" alt="Просмотры">
                            <?php echo $result["views"]; ?>
                        </span>
                        <span class="date" style="padding-right: 0;"><?php echo $result["pubdate"]; ?></span>

                    </div>
                </div>
            </div>
        </div>
    <?
    }
} elseif (isset($_POST['search_tag']) && $_POST['search_tag'] == "s-help") {
    $value = $_POST['search_value'];
    $Query = "SELECT * FROM `posts` WHERE `post_title` LIKE '%$value%'";
    $results = get_search_results($Query);
    foreach ($results as $result) {
    ?>
        <div class="help-item">
            <div class="question">
                <a href="./?page=post&post_id=<? echo $result['post_id'] ?>"><? echo $result['post_title'] ?></a>
            </div>

            <div class="help-info">
                <div class="help-descript">
                    <span class="date" style="padding-right: 0;"><? echo $result['pubdate'] ?></span>

                    <span class="views">
                        <img src="img/view-dark.png" class="imgi" alt="Просмотры">
                        <? echo $result['views']; ?>
                    </span>

                    <span class="comments">
                        <img src="img/chat-bubble-dark.png" class="imgi" alt="Комменты">
                        <? $comments_count = get_count_post_comments($result['post_id']); ?>
                        <? echo $comments_count; ?>
                    </span>
                </div>
            </div>

            <div class="annotation">
                <? echo $result['post_comment'] ?>
            </div>

            <!--<div class="status">
                                <span class="status-open">Открыт <img src="/img/close.png" alt="Вопрос открыт"></span>
                            </div>
                            <div class="status">
                                <span class="status-check">Закрыт <img src="/img/check.png" alt="Вопрос открыт"></span>
                            </div>-->
        </div>
<?
    }
}
