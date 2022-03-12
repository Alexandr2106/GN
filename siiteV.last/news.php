<?php require "./php/DB.php"; ?>



<?php

$get_singles_all = get_singles_all();


foreach ($get_singles_all as $single) :


?>
        <?php $game = get_games_by_id($single["games_id"]); ?>

        <div class="container" style="padding: 0;">
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <a href="./NewsLine/content-single.php?id=<?php echo $single["id"]; ?>">
                            <img class="imga" src="<?php echo $single["img"]; ?>">
                        </a>
                    </div>
                    <div class="title">
                        <a href="./NewsLine/content-single.php?id=<?php echo $single["id"]; ?>" class="heading"><?php echo $single["title"]; ?>
                        </a>
                    </div>
                    <p class="text">
                        <?php

                        $stroka = iconv('UTF-8', 'windows-1251', $single["prewie_text"]); //Меняем кодировку на windows-1251

                        $stroka = substr($stroka, 0, 600); //Обрезаем строку

                        $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                        echo $stroka . " ..." . " <a href='./NewsLine/content-single.php?id=" . $single["id"] . "'><span>[Далее]</span></a>";

                        ?>
                    </p>
                    <div class="descript-wrap">
                        <a href="#"><span style="color: #bfbfbf;"><?php echo $game; ?></span></a>
                        <span class="comments">
                            <img src="img/chat-bubble.png" class="imgi" alt="Комменты">
                            1
                        </span>
                        <span class="views">
                            <img src="img/view.png" class="imgi" alt="Просмотры">
                            <?php echo $single["views"]; ?>
                        </span>
                        <span class="date" style="padding-right: 0;"><?php echo $single["pubdate"]; ?></span>

                    </div>
                </div>
            </div>
        </div>

<?php endforeach; ?>






