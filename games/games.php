<div class="container content-game">
    <div class="layout">
        <aside class="sidebar">
            <nav class="sorts">
                <div class="blok-header">
                    Сортировка
                </div>
                <ul class="sort">
                    <li class="sort-item">
                        <a href="./?page=games&go=0&page_num=1"><span class="filter <? if(empty($_GET['sort'])){ echo "sort-selected"; } ?>">игры</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="./?page=games&go=0&page_num=1&sort=1"><span class="filter <? if(isset($_GET['sort']) && $_GET['sort'] == "1"){ echo "sort-selected"; } ?>">по дате выхода</span></a>

                    </li>
                    <li class="sort-item">
                        <a href="./?page=games&go=0&page_num=1&sort=2"><span class="filter <? if(isset($_GET['sort']) && $_GET['sort'] == "2"){ echo "sort-selected"; } ?>">по алфавиту</span></a>
                    </li>
                </ul>
            </nav>
        </aside>


        <main class="game-list">
            <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="#" class="disabled" style="text-decoration: none; cursor: auto;" disabled>Игры</a></li>
                </ol>
            </section>

            <div class="game-items">
                <?
                $limit_start = 0;
                $limit_end = 15;
                if (isset($_GET['go'])) {
                    $limit_start += $_GET['go'];
                }
                if (empty($_GET['sort'])) {
                    $games = get_games_by_limit("$limit_start,$limit_end");
                } elseif (isset($_GET['sort']) && $_GET['sort'] == "1") {
                    $games = sort_games_by_release_date("$limit_start,$limit_end");
                } elseif (isset($_GET['sort']) && $_GET['sort'] == "2") {
                    $games = sort_games_by_name_game("$limit_start,$limit_end");
                }

                foreach ($games as $game) :
                    if ($game['id'] == "13") {
                        continue;
                    }
                ?>

                    <div class="game-item">
                        <div class="game-img">
                            <a href="./?game_id=<? echo $game['id']; ?>&go=0&page_num=1">
                                <img src="<? echo $game['Gimg']; ?>" alt="">
                            </a>
                        </div>
                        <div class="game-deatils">
                            <div class="row game-name">
                                <a href="./?game_id=<? echo $game['id']; ?>&go=0&page_num=1"><? echo $game['name_game']; ?></a>
                            </div>
                            <div class="game-specs">
                                <div class="specs-item">
                                    <span>Платформа:</span>
                                    <span><? echo $game['platform']; ?></span>
                                </div>
                                <div class="specs-item">
                                    <span>Жанр:</span>
                                    <span><? echo $game['genre']; ?></span>
                                </div>
                                <div class="specs-item">
                                    <span>Дата выхода:</span>
                                    <span><? if ($game['release_date'] == NULL) {
                                                echo "скоро";
                                            } else {
                                                echo $game['release_date'];
                                            } ?></span>
                                </div>
                            </div>
                            <div class="row view-all-about"><a href="./?game_id=<? echo $game['id']; ?>">ВСЕ НОВОСТИ ИГРЫ</a></div>
                        </div>
                    </div>
                <?

                endforeach;
                ?>

            </div>

            <div class="pages">
                <?php
                $count_games = get_count_games();
                $count_1 = $count_games[0];
                $count = $count_games[0];
                $go = 15;
                $page_count = 0;
                for ($i = 1;; $i++) {
                    if ($count > 0) {
                        $page_count++;
                    } else {
                        break;
                    }
                    $count -= 15;
                }
                $page_num = $_GET['page_num'];

                if ($page_count > 2 || $page_count < 8) {

                ?>



                    <!-- Шаг назад -->
                    <? if ($_GET['go'] > 0) : ?>
                        <a href="./?page=games&go=<? print($_GET['go'] - 15); ?>&page_num=<? echo $_GET['page_num'] - 1; ?><? if (isset($_GET['sort'])) {
                                                                                                                                echo "&sort=" . $_GET['sort'];
                                                                                                                            }  ?>">&#10094;</a>
                    <? endif; ?>



                    <?
                    if ($page_num <= 4) {
                    ?>

                        <a class="<?php if ($page_num == 1) {
                                        echo " a-active";
                                    } ?>" href="./?page=games&go=0&page_num=1<? if (isset($_GET['sort'])) {
                                                                                    echo "&sort=" . $_GET['sort'];
                                                                                }  ?>">1</a>

                    <?
                    } else {
                    ?>
                        <a class="<?php if ($page_num == 1) {
                                        echo " a-active";
                                    } ?>" href="./?page=games&go=0&page_num=1<? if (isset($_GET['sort'])) {
                                                                                    echo "&sort=" . $_GET['sort'];
                                                                                }  ?>">1</a>
                        <p style="line-height: 32px;">...</p>

                    <?
                    }
                    ?>





                    <?php

                    for ($i = 2; $i <= $page_count - 1; $i++) {



                        if ($page_num > 4 && $page_num < ($page_count - 2)) {

                            if ($i <= ($page_num + 2) && $i >= ($page_num - 2)) {
                                echo "<a class='";
                                if ($page_num == $i) {
                                    echo " a-active";
                                }
                                if (empty($_GET['sort'])) {
                                    echo "' href='./?page=games&go=$go&page_num=$i'>$i</a></li>";
                                } else {
                                    echo "' href='./?page=games&go=$go&page_num=$i&sort=" . $_GET['sort'] . "'>$i</a></li>";
                                }
                            }
                        } elseif ($page_num <= 4) {

                            if ($i >= 2 && $i <= 6) {
                                echo "<a class='";
                                if ($page_num == $i) {
                                    echo " a-active";
                                }
                                if (empty($_GET['sort'])) {
                                    echo "' href='./?page=games&go=$go&page_num=$i'>$i</a></li>";
                                } else {
                                    echo "' href='./?page=games&go=$go&page_num=$i&sort=" . $_GET['sort'] . "'>$i</a></li>";
                                }
                            }
                        } elseif ($page_num > ($page_count - 3)) {

                            if ($i >= ($page_count - 5) && $i <= $page_count) {
                                echo "<a class='";
                                if ($page_num == $i) {
                                    echo " a-active";
                                }
                                if (empty($_GET['sort'])) {
                                    echo "' href='./?page=games&go=$go&page_num=$i'>$i</a></li>";
                                } else {
                                    echo "' href='./?page=games&go=$go&page_num=$i&sort=" . $_GET['sort'] . "'>$i</a></li>";
                                }
                            }
                        }

                        $go += 15;
                    }

                    ?>



                    <?
                    if ($page_num > ($page_count - 4) || $page_count < 8) {
                    ?>

                        <a class="<?php if ($page_num == $page_count) {
                                        echo " a-active";
                                    } ?>" href="./?page=games&go=<? echo $go; ?>&page_num=<? echo $page_count; ?><? if (isset($_GET['sort'])) {
                                                                                                                                echo "&sort=" . $_GET['sort'];
                                                                                                                            }  ?>"><? echo $page_count; ?></a>

                    <?
                    } else {
                    ?>
                        <p style="line-height: 32px;">...</p>
                        <a class="<?php if ($page_num == $page_count) {
                                        echo " a-active";
                                    } ?>" href="./?page=games&go=<? echo $go; ?>&page_num=<? echo $page_count; ?><? if (isset($_GET['sort'])) {
                                                                                                                                echo "&sort=" . $_GET['sort'];
                                                                                                                            }  ?>"><? echo $page_count; ?></a>
                    <?
                    }
                    ?>



                    <!-- Шаг вперёд -->
                    <? if (($_GET['go'] + 15) < $count_1) : ?>
                        <a href="./?page=games&go=<? print($_GET['go'] + 15); ?>&page_num=<? echo $_GET['page_num'] + 1; ?><? if (isset($_GET['sort'])) {
                                                                                                                                echo "&sort=" . $_GET['sort'];
                                                                                                                            }  ?>">&#10095;</a>
                    <? endif; ?>

                    <?
                } else {
                    //Шаг назад
                    if ($_GET['go'] > 0) :
                    ?>
                        <a href="./?page=games&go=<? print($_GET['go'] - 15); ?>&page_num=<? echo $_GET['page_num'] - 1; ?><? if (isset($_GET['sort'])) {
                                                                                                                                echo "&sort=" . $_GET['sort'];
                                                                                                                            }  ?>">&#10094;</a>
                    <?
                    endif;
                    $go = 0;
                    for ($i = 1; $i <= $page_count; $i++) {

                        echo "<a class='";
                        if ($page_num == $i) {
                            echo " a-active";
                        }
                        if (empty($_GET['sort'])) {
                            echo "' href='./?page=games&go=$go&page_num=$i'>$i</a></li>";
                        } else {
                            echo "' href='./?page=games&go=$go&page_num=$i&sort=" . $_GET['sort'] . "'>$i</a></li>";
                        }
                        $go += 15;
                    }
                    //Шаг вперёд
                    if (($_GET['go'] + 15) < $count_1) :
                    ?>
                        <a href="./?page=games&go=<? print($_GET['go'] + 15); ?>&page_num=<? echo $_GET['page_num'] + 1; ?><? if (isset($_GET['sort'])) {
                                                                                                                                echo "&sort=" . $_GET['sort'];
                                                                                                                            }  ?>">&#10095;</a>
                <?
                    endif;
                }

                ?>
                
            </div>
        </main>
    </div>
</div>