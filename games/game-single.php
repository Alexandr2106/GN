<div class="container content-game">
    <div class="layout">
        <aside class="sidebar">
            <nav class="sorts">
                <div class="blok-header">
                    Сортировка
                </div>
                <ul class="sort">
                    <li class="sort-item">
                        <a href="./?page=games&go=0&page_num=1"><span class="filter <? if (empty($_GET['sort'])) {
                                                                                        echo "sort-selected";
                                                                                    } ?>">игры</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="./?page=games&go=0&page_num=1&sort=1"><span class="filter <? if (isset($_GET['sort']) && $_GET['sort'] == "1") {
                                                                                                echo "sort-selected";
                                                                                            } ?>">по дате выхода</span></a>

                    </li>
                    <li class="sort-item">
                        <a href="./?page=games&go=0&page_num=1&sort=2"><span class="filter <? if (isset($_GET['sort']) && $_GET['sort'] == "2") {
                                                                                                echo "sort-selected";
                                                                                            } ?>">по алфавиту</span></a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="game-list">
            <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="#" onclick="window.history.back();">Назад</a></li>
                </ol>
            </section>

            <?
            $game = get_games_by_id($_GET['game_id']);
            if ($game['release_date'] == NULL) {
                $game['release_date'] = "скоро";
            }
            ?>
            <div class="game-items">
                <div class="game-item">
                    <div class="game-img">
                        <a href="#">
                            <img src="<? echo $game['Gimg']; ?>" alt="">
                        </a>
                    </div>
                    <div class="game-deatils">
                        <div class="row game-name">
                            <a href="#"><? echo $game['name_game']; ?></a>
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
                                <span><? echo $game['release_date']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="value-comment">Новости: 7</div>

            <div class="container">
                <div class="news-block">
                    <div class="inner-box">
                        <div class="image">
                            <a href="./?id=<?php echo $single["id"]; ?>">
                                <img class="imga" src="<?php echo $single["img"]; ?>">
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

                            echo $stroka . "  ...  " . " <a href='./?id=" . $single["id"] . "'><span>     [Далее]</span></a>";

                            ?>
                        </div>
                        <div class="descript-wrap">
                            <a href="#"><span style="color: #bfbfbf;"><?php echo $game; ?></span></a>
                            <span class="comments">
                                <img src="img/chat-bubble.png" class="imgi" alt="Комменты">
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

            <div class="price-block">
                <div>
                    <div class="game-price-header">
                        <div class="game-price-name">
                            <h1>Посмтореть <?php echo $game; ?>:</h1>
                        </div>
                    </div>

                    <div class="game-prices">
                        <div class="shop-list">

                            <a href="<?php echo $shops['steam_link']; ?>" target="_blank" class="game-prices-item">
                                <div class="item-one">
                                    <img src="/img/logo-shop/steam.png" alt="Steam" title="Steam" sizes="(max-width: 164px) 100vw, 164px">
                                </div>

                                <div class="item-two">
                                    <div class="game-price">
                                        <span class="price-value"><?php echo $shops['steam_price']; ?></span>
                                        <span class="currency">₽</span>
                                        <span class="buy-btn">посмотреть</span>
                                    </div>
                                </div>
                            </a>

                            <a href="<?php echo $shops['gabestore_link']; ?>" target="_blank" class="game-prices-item">
                                <div class="item-one">
                                    <img src="/img/logo-shop/gabestore.png" alt="GabeStore" title="GabeStore" sizes="(max-width: 164px) 100vw, 164px">
                                </div>

                                <div class="item-two">
                                    <div class="game-price">
                                        <span class="price-value"><?php echo $shops['gabestore_price']; ?></span>
                                        <span class="currency">₽</span>
                                        <span class="buy-btn">посмотреть</span>
                                    </div>
                                </div>
                            </a>

                            <a href="<?php echo $shops['EpicGames_link']; ?>" target="_blank" class="game-prices-item">
                                <div class="item-one">
                                    <img src="/img/logo-shop/epic.png" alt="Epic Games" title="Epic Games" sizes="(max-width: 164px) 100vw, 164px">
                                </div>

                                <div class="item-two">
                                    <div class="game-price">
                                        <span class="price-value"><?php echo $shops['EpicGames_price']; ?></span>
                                        <span class="currency">₽</span>
                                        <span class="buy-btn">посмотреть</span>
                                    </div>
                                </div>
                            </a>

                            <a href="<?php echo $shops['SteamPay_link']; ?>" target="_blank" class="game-prices-item">
                                <div class="item-one">
                                    <img src="/img/logo-shop/steampay.png" alt="STEAMPAY" title="STEAMPAY" sizes="(max-width: 164px) 100vw, 164px">
                                </div>

                                <div class="item-two">
                                    <div class="game-price">
                                        <span class="price-value"><?php echo $shops['SteamPay_price']; ?></span>
                                        <span class="currency">₽</span>
                                        <span class="buy-btn">посмотреть</span>
                                    </div>
                                </div>
                            </a>

                            <a href="<?php echo $shops['SousBuy_link']; ?>" target="_blank" class="game-prices-item">
                                <div class="item-one">
                                    <img src="/img/logo-shop/sous.png" alt="SousBuy" title="SousBuy" sizes="(max-width: 164px) 100vw, 164px">
                                </div>

                                <div class="item-two">
                                    <div class="game-price">
                                        <span class="price-value"><?php echo $shops['SousBuy_price']; ?></span>
                                        <span class="currency">₽</span>
                                        <span class="buy-btn">посмотреть</span>
                                    </div>
                                </div>
                            </a>

                            <a href="<?php echo $shops['ZakaZaka_link']; ?>" target="_blank" class="game-prices-item">
                                <div class="item-one">
                                    <img src="/img/logo-shop/zaka.png" alt="Zaka-Zaka" title="Zaka-Zaka" sizes="(max-width: 164px) 100vw, 164px">
                                </div>

                                <div class="item-two">
                                    <div class="game-price">
                                        <span class="price-value"><?php echo $shops['ZakaZaka_price']; ?></span>
                                        <span class="currency">₽</span>
                                        <span class="buy-btn">посмотреть</span>
                                    </div>
                                </div>
                            </a>
                            <p>В данный момент игра не продаётся ни в каком магазине.</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>