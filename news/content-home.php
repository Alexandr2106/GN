<main class="container content" style="background-color: #fbfbfb;">
    <div class="blok-header">
        Последнее
    </div>

    <div class="secContainer">
        <div class="game-block">
            <p style="margin-bottom: 5px; font-weight: 500; font-size: 24px; line-height: 42px;">
                Игры
            </p>
            <ol class="list-group">

                <?php
                $games_all = get_games_all();
                $g = 0;
                foreach ($games_all as $Ngame) :
                    if ($g <= 9) :
                ?>

                        <li class="list-group-item">
                            <a href="./?game_id=<? echo $Ngame['id']; ?>">
                                <img class="Gimg" src="<?php echo $Ngame["Gimg"] ?>" alt="">
                                <p class="game-heading">
                                    <?php echo $Ngame["name_game"] ?>

                                    <div class="small-game-name">
                                        <?php
                                        $stroka = iconv('UTF-8', 'windows-1251', $Ngame["name_game"]); //Меняем кодировку на windows-1251

                                        $stroka = substr($stroka, 0, 15); //Обрезаем строку

                                        $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                                        echo $stroka . "...";
                                        ?>
                                    </div>
                                </p>
                            </a>
                        </li>


                    <?php endif; ?>
                    <?php $g++; ?>
                <?php endforeach; ?>

            </ol>
            <a href="./?page=games&go=0&page_num=1">
                <p style="text-align: center; margin-top: 20px; font-size: 14px; font-weight: 500;">Посмотреть ещё</p>
            </a>
        </div>

        <!--  Первые два в блоке с играми  -->
        <div class="twelwe">
            <?php
            $FirstTwoSingles = get_FirstTwoSingles();
            $comments_count = get_comments_count_by_id($_GET['id']);
            $sinF = 0;
            foreach ($FirstTwoSingles as $FirstSingles) :
                if ($sinF <= 1) :
                    $comments_count = get_comments_count_by_id($FirstSingles["id"]);
            ?>
                    <?php $game = get_games_by_id($FirstSingles["games_id"]); ?>

                    <div class="container" style="padding: 0;">
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="./?id=<?php echo $FirstSingles["id"]; ?>">
                                        <img class="imga" loading="lazy" src="<?php echo $FirstSingles["img"]; ?>">
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="./?id=<?php echo $FirstSingles["id"]; ?>" class="heading"><?php echo $FirstSingles["title"]; ?></a>
                                </div>
                                <div class="text">
                                    <?php

                                    $stroka = iconv('UTF-8', 'windows-1251', $FirstSingles["prewie_text"]); //Меняем кодировку на windows-1251

                                    $stroka = substr($stroka, 0, 300); //Обрезаем строку

                                    $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                                    echo $stroka . " ..." . " <a href='./?id=" . $FirstSingles["id"] . "'><span>[Далее]</span></a>";

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
                                        <?php echo $FirstSingles["views"]; ?>
                                    </span>
                                    <span class="date" style="padding-right: 0;"><?php echo $FirstSingles["pubdate"]; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
                <?php $sinF++; ?>
            <?php endforeach; ?>

        </div>
    </div>

    <!--  Главная лента  -->

    <?php
    $singles_minus_last_two = get_singles_minus_last_two();

    foreach ($singles_minus_last_two as $single) :
        $comments_count = get_comments_count_by_id($single["id"]);

    ?>
        <?php $game = get_games_by_id($single["games_id"]); ?>

        <div class="container" style="padding: 0;">
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <a href="./?id=<?php echo $single["id"]; ?>">
                            <img class="imga" loading="lazy" src="<?php echo $single["img"]; ?>">
                        </a>
                    </div>
                    <div class="title">
                        <a href="./?id=<?php echo $single["id"]; ?>" class="heading"><?php echo $single["title"]; ?>
                        </a>
                    </div>
                    <div class="text">
                        <?php

                        $stroka = iconv('UTF-8', 'windows-1251', $single["prewie_text"]); //Меняем кодировку на windows-1251

                        $stroka = substr($stroka, 0, 600); //Обрезаем строку

                        $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                        echo $stroka . " ..." . " <a href='./?id=" . $single["id"] . "'><span>[Далее]</span></a>";

                        ?>
                    </div>
                    <div class="descript-wrap">
                        <a href="#"><span style="color: #bfbfbf;"><?php echo $game['name_game']; ?></span></a>
                        <span class="comments">
                            <img src="img/chat-bubble.png" loading="lazy" class="imgi" alt="Комменты">
                            <?php echo $comments_count; ?>
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


    <div class="link-more">

        <a href="./?page=news&go=0&page_num=1" onclick="window.localStorage.clear()" class="link-mn">
            <p>больше новостей</p>
        </a>

    </div>
</main>