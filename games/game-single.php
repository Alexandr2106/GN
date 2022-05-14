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
            <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|'; display: flex; justify-content: space-between; flex-wrap: wrap;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="./?page=games&go=0&page_num=1">Назад</a></li>
                </ol>

                <? $game = get_games_by_id($_GET['game_id']);

                if ($admin == 1) : ?>

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button class="admin-btn openModalEditTwo openModalEditTwo<? echo $game['id']; ?>">Редактировать</button>
                            <!-- МОДАЛЬНОЕ ОКНО С ФОРМОЙ РЕДАКТИРОВАНИЯ -->
                            <dialog class="ModalEditTwo ModalEditTwo<? echo $game['id']; ?>" style="width: 60%;">
                                <div class="Modal-inner">

                                    <h2>Редактирование игры</h2>

                                    <form class="article-form" id="adit_game_form" onsubmit="return false" method="POST">
                                        <div class="adding">
                                            <label for="edit_game_name">Название игры:</label>

                                            <input type="text" name="Name-game" id="edit_game_name<? echo $game['id']; ?>" value="<? echo $game['name_game']; ?>">
                                        </div>

                                        <div class="adding">
                                            <label for="edit_game_img">Изображение игры:</label>
                                            <input type="text" name="Game-image" id="edit_game_img<? echo $game['id']; ?>" value="<? echo $game['Gimg']; ?>">
                                        </div>

                                        <?
                                        $description = $game['description'];

                                        $description = str_replace('"', '&quot;', $description);
                                        ?>

                                        <div class="adding">
                                            <label for="edit_description">Описание игры:</label>
                                            <textarea name="Game-description" id="edit_description<? echo $game['id']; ?>" cols="30" rows="10"><? echo $description; ?></textarea>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_platform">Платформы:</label>
                                            <input type="text" name="Platform" id="edit_platform<? echo $game['id']; ?>" value="<? echo $game['platform']; ?>">
                                        </div>

                                        <div class="adding">
                                            <label for="edit_genre">Жанры:</label>
                                            <input type="text" name="Genre" id="edit_genre<? echo $game['id']; ?>" value="<? echo $game['genre']; ?>">
                                        </div>

                                        <div class="adding">
                                            <label for="edit_release_date">Дата выхода:</label>
                                            <input type="text" name="Date-release" id="edit_release_date<? echo $game['id']; ?>" value="<? echo $game['release_date']; ?>">
                                        </div>

                                        <div class="switch">
                                            <h5>Редактировать магазины</h5>
                                        </div>

                                        <section class="admin-shops">

                                            <?
                                            $shops = get_shops_by_game_id($game['id']);
                                            ?>

                                            <div class="adding-shop">
                                                <div class="switch">
                                                    <label>Steam:</label>
                                                    <?
                                                    if ($shops['steam_price'] == NULL) :
                                                    ?>
                                                        <input type="checkbox" id="toggleSteam<? echo $game['id']; ?>" />
                                                    <?
                                                    else :
                                                    ?>
                                                        <input type="checkbox" id="toggleSteam<? echo $game['id']; ?>" checked/>
                                                    <?
                                                    endif;
                                                    ?>
                                                    <label for="toggleSteam<? echo $game['id']; ?>"></label>
                                                </div>
                                                <div class="inputSteam<? echo $game['id']; ?>">
                                                    <input type="number" id="Steam-price<? echo $game['id']; ?>" value="<? echo $shops['steam_price']; ?>" placeholder="Цена">
                                                    <input type="text" id="Steam-link<? echo $game['id']; ?>" value="<? echo $shops['steam_link']; ?>" placeholder="Ссылка">
                                                </div>
                                            </div>

                                            <div class="adding-shop">
                                                <div class="switch">
                                                    <label>GabeStore:</label>
                                                    <?
                                                    if ($shops['gabestore_price'] == NULL) :
                                                    ?>
                                                        <input type="checkbox" id="toggleGabeStore<? echo $game['id']; ?>" />
                                                    <?
                                                    else :
                                                    ?>
                                                        <input type="checkbox" id="toggleGabeStore<? echo $game['id']; ?>" checked/>
                                                    <?
                                                    endif;
                                                    ?>
                                                    <label for="toggleGabeStore<? echo $game['id']; ?>"></label>
                                                </div>

                                                <div class="inputGabeStore<? echo $game['id']; ?>">
                                                    <input type="number" id="GabeStore-price<? echo $game['id']; ?>" value="<? echo $shops['gabestore_price']; ?>" placeholder="Цена">
                                                    <input type="text" id="GabeStore-link<? echo $game['id']; ?>" value="<? echo $shops['gabestore_link']; ?>" placeholder="Ссылка">
                                                </div>
                                            </div>

                                            <div class="adding-shop">
                                                <div class="switch">
                                                    <label>EpicGames:</label>
                                                    <?
                                                    if ($shops['EpicGames_price'] == NULL) :
                                                    ?>
                                                        <input type="checkbox" id="toggleEpicGames<? echo $game['id']; ?>" />
                                                    <?
                                                    else :
                                                    ?>
                                                        <input type="checkbox" id="toggleEpicGames<? echo $game['id']; ?>" checked/>
                                                    <?
                                                    endif;
                                                    ?>
                                                    <label for="toggleEpicGames<? echo $game['id']; ?>"></label>
                                                </div>

                                                <div class="inputEpicGames<? echo $game['id']; ?>">
                                                    <input type="number" id="EpicGames-price<? echo $game['id']; ?>" value="<? echo $shops['EpicGames_price']; ?>" placeholder="Цена">
                                                    <input type="text" id="EpicGames-link<? echo $game['id']; ?>" value="<? echo $shops['EpicGames_link']; ?>" placeholder="Ссылка">
                                                </div>
                                            </div>

                                            <div class="adding-shop">
                                                <div class="switch">
                                                    <label>SteamPay:</label>
                                                    <?
                                                    if ($shops['SteamPay_price'] == NULL) :
                                                    ?>
                                                        <input type="checkbox" id="toggleSteamPay<? echo $game['id']; ?>" />
                                                    <?
                                                    else :
                                                    ?>
                                                        <input type="checkbox" id="toggleSteamPay<? echo $game['id']; ?>" checked/>
                                                    <?
                                                    endif;
                                                    ?>
                                                    <label for="toggleSteamPay<? echo $game['id']; ?>"></label>
                                                </div>

                                                <div class="inputSteamPay<? echo $game['id']; ?>">
                                                    <input type="number" id="SteamPay-price<? echo $game['id']; ?>" value="<? echo $shops['SteamPay_price']; ?>" placeholder="Цена">
                                                    <input type="text" id="SteamPay-link<? echo $game['id']; ?>" value="<? echo $shops['SteamPay_link']; ?>" placeholder="Ссылка">
                                                </div>
                                            </div>

                                            <div class="adding-shop">
                                                <div class="switch">
                                                    <label>Sous-Buy:</label>
                                                    <?
                                                    if ($shops['SousBuy_price'] == NULL) :
                                                    ?>
                                                        <input type="checkbox" id="toggleSous-Buy<? echo $game['id']; ?>" />
                                                    <?
                                                    else :
                                                    ?>
                                                        <input type="checkbox" id="toggleSous-Buy<? echo $game['id']; ?>" checked/>
                                                    <?
                                                    endif;
                                                    ?>
                                                    <label for="toggleSous-Buy<? echo $game['id']; ?>"></label>
                                                </div>
                                                <div class="inputSous-Buy<? echo $game['id']; ?>">
                                                    <input type="number" id="Sous-Buy-price<? echo $game['id']; ?>" value="<? echo $shops['SousBuy_price']; ?>" placeholder="Цена">
                                                    <input type="text" id="Sous-Buy-link<? echo $game['id']; ?>" value="<? echo $shops['SousBuy_link']; ?>" placeholder="Ссылка">
                                                </div>
                                            </div>

                                            <div class="adding-shop">
                                                <div class="switch">
                                                    <label>Zaka-Zaka:</label>
                                                    <?
                                                    if ($shops['ZakaZAka_price'] == NULL) :
                                                    ?>
                                                        <input type="checkbox" id="toggleZaka-Zaka<? echo $game['id']; ?>" />
                                                    <?
                                                    else :
                                                    ?>
                                                        <input type="checkbox" id="toggleZaka-Zaka<? echo $game['id']; ?>" checked/>
                                                    <?
                                                    endif;
                                                    ?>
                                                    <label for="toggleZaka-Zaka<? echo $game['id']; ?>"></label>
                                                </div>
                                                <div class="inputZaka-Zaka<? echo $game['id']; ?>">
                                                    <input type="number" id="Zaka-Zaka-price<? echo $game['id']; ?>" value="<? echo $shops['ZakaZAka_price']; ?>" placeholder="Цена">
                                                    <input type="text" id="Zaka-Zaka-link<? echo $game['id']; ?>" value="<? echo $shops['ZakaZaka_link']; ?>" placeholder="Ссылка">
                                                </div>
                                            </div>
                                        </section>

                                        <script>
                                            let switcherSteam<? echo $game['id']; ?> = document.querySelector('#toggleSteam<? echo $game['id']; ?>');
                                            let switcherGabeStore<? echo $game['id']; ?> = document.querySelector('#toggleGabeStore<? echo $game['id']; ?>');
                                            let switcherEpicGames<? echo $game['id']; ?> = document.querySelector('#toggleEpicGames<? echo $game['id']; ?>');
                                            let switcherSteamPay<? echo $game['id']; ?> = document.querySelector('#toggleSteamPay<? echo $game['id']; ?>');
                                            let switcherSous_Buy<? echo $game['id']; ?> = document.querySelector('#toggleSous-Buy<? echo $game['id']; ?>');
                                            let switcherZaka_Zaka<? echo $game['id']; ?> = document.querySelector('#toggleZaka-Zaka<? echo $game['id']; ?>');

                                            let inputSteam<? echo $game['id']; ?> = document.querySelector('.inputSteam<? echo $game['id']; ?>');
                                            let inputGabeStore<? echo $game['id']; ?> = document.querySelector('.inputGabeStore<? echo $game['id']; ?>');
                                            let inputEpicGames<? echo $game['id']; ?> = document.querySelector('.inputEpicGames<? echo $game['id']; ?>');
                                            let inputSteamPay<? echo $game['id']; ?> = document.querySelector('.inputSteamPay<? echo $game['id']; ?>');
                                            let inputSous_Buy<? echo $game['id']; ?> = document.querySelector('.inputSous-Buy<? echo $game['id']; ?>');
                                            let inputZaka_Zaka<? echo $game['id']; ?> = document.querySelector('.inputZaka-Zaka<? echo $game['id']; ?>');

                                            if (switcherSteam<? echo $game['id']; ?>.checked){
                                                inputSteam<? echo $game['id']; ?>.style.display = 'block';
                                            }else{
                                                inputSteam<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherGabeStore<? echo $game['id']; ?>.checked){
                                                inputGabeStore<? echo $game['id']; ?>.style.display = 'block';
                                            }else{
                                                inputGabeStore<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherEpicGames<? echo $game['id']; ?>.checked){
                                                inputEpicGames<? echo $game['id']; ?>.style.display = 'block';
                                            }else{
                                                inputEpicGames<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherSteamPay<? echo $game['id']; ?>.checked){
                                                inputSteamPay<? echo $game['id']; ?>.style.display = 'block';
                                            }else{
                                                inputSteamPay<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherSous_Buy<? echo $game['id']; ?>.checked){
                                                inputSous_Buy<? echo $game['id']; ?>.style.display = 'block';
                                            }else{
                                                inputSous_Buy<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherZaka_Zaka<? echo $game['id']; ?>.checked){
                                                inputZaka_Zaka<? echo $game['id']; ?>.style.display = 'block';
                                            }else{
                                                inputZaka_Zaka<? echo $game['id']; ?>.style.display = 'none';
                                            }


                                            switcherSteam<? echo $game['id']; ?>.addEventListener('click', () => {
                                                if (inputSteam<? echo $game['id']; ?>.style.display === 'none') {
                                                    inputSteam<? echo $game['id']; ?>.style.display = 'block';
                                                } else if (inputSteam<? echo $game['id']; ?>.style.display === 'block') {
                                                    inputSteam<? echo $game['id']; ?>.style.display = 'none';
                                                }
                                            })

                                            switcherGabeStore<? echo $game['id']; ?>.addEventListener('click', () => {
                                                if (inputGabeStore<? echo $game['id']; ?>.style.display === 'none') {
                                                    inputGabeStore<? echo $game['id']; ?>.style.display = 'block';
                                                } else if (inputGabeStore<? echo $game['id']; ?>.style.display === 'block') {
                                                    inputGabeStore<? echo $game['id']; ?>.style.display = 'none';
                                                }
                                            })

                                            switcherEpicGames<? echo $game['id']; ?>.addEventListener('click', () => {
                                                if (inputEpicGames<? echo $game['id']; ?>.style.display === 'none') {
                                                    inputEpicGames<? echo $game['id']; ?>.style.display = 'block';
                                                } else if (inputEpicGames<? echo $game['id']; ?>.style.display === 'block') {
                                                    inputEpicGames<? echo $game['id']; ?>.style.display = 'none';
                                                }
                                            })

                                            switcherSteamPay<? echo $game['id']; ?>.addEventListener('click', () => {
                                                if (inputSteamPay<? echo $game['id']; ?>.style.display === 'none') {
                                                    inputSteamPay<? echo $game['id']; ?>.style.display = 'block';
                                                } else if (inputSteamPay<? echo $game['id']; ?>.style.display === 'block') {
                                                    inputSteamPay<? echo $game['id']; ?>.style.display = 'none';
                                                }
                                            })

                                            switcherSous_Buy<? echo $game['id']; ?>.addEventListener('click', () => {
                                                if (inputSous_Buy<? echo $game['id']; ?>.style.display === 'none') {
                                                    inputSous_Buy<? echo $game['id']; ?>.style.display = 'block';
                                                } else if (inputSous_Buy<? echo $game['id']; ?>.style.display === 'block') {
                                                    inputSous_Buy<? echo $game['id']; ?>.style.display = 'none';
                                                }
                                            })

                                            switcherZaka_Zaka<? echo $game['id']; ?>.addEventListener('click', () => {
                                                if (inputZaka_Zaka<? echo $game['id']; ?>.style.display === 'none') {
                                                    inputZaka_Zaka<? echo $game['id']; ?>.style.display = 'block';
                                                } else if (inputZaka_Zaka<? echo $game['id']; ?>.style.display === 'block') {
                                                    inputZaka_Zaka<? echo $game['id']; ?>.style.display = 'none';
                                                }
                                            })
                                        </script>

                                        <div class="article-button">
                                            <label id="edit_game_message"></label>
                                            <button class="btn add-button" style="margin: auto;" id="edit_game" onclick="edit_game_by_id(<? echo $game['id']; ?>)">Сохранить</button>
                                        </div>
                                    </form>

                                    <button class="btn add-button closeModalEditTwo closeModalEditTwo<? echo $game['id']; ?>">Закрыть</button>
                            </dialog>

                            <script>
                                const openModalEditTwo<? echo $game['id']; ?> = document.querySelector('.openModalEditTwo<? echo $game['id']; ?>');
                                const closeModalEditTwo<? echo $game['id']; ?> = document.querySelector('.closeModalEditTwo<? echo $game['id']; ?>');
                                const ModalEditTwo<? echo $game['id']; ?> = document.querySelector('.ModalEditTwo<? echo $game['id']; ?>');

                                openModalEditTwo<? echo $game['id']; ?>.addEventListener('click', () => {
                                    ModalEditTwo<? echo $game['id']; ?>.showModal()
                                })

                                closeModalEditTwo<? echo $game['id']; ?>.addEventListener('click', () => {
                                    ModalEditTwo<? echo $game['id']; ?>.close()
                                })

                                ModalEditTwo<? echo $game['id']; ?>.addEventListener('click', (e) => {
                                    console.log(e.target)
                                    if (e.target === ModalEditTwo<? echo $game['id']; ?>) ModalEditTwo<? echo $game['id']; ?>.close()
                                })
                            </script>
                            <!-- /МОДАЛЬНОЕ ОКНО С ФОРМОЙ РЕДАКТИРОВАНИЯ -->
                        </li>

                        <li class="breadcrumb-item"><button class="admin-btn delete-game" onclick="delete_game(<? echo $game['id']; ?>, '<? echo $game['name_game']; ?>', 1)">Удалить</button></li>
                    </ol>
                <? endif; ?>
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

                        <img src="<? echo $game['Gimg']; ?>" alt="">

                    </div>
                    <div class="game-deatils">
                        <div class="row">
                            <span class="game-name-s"><? echo $game['name_game']; ?></span>
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


            <!-- БЛОК ДЛЯ ОПИСАНИЯ ИГРЫ -->
            <div class="game-discript">
                <h2>Об игре <? echo $game['name_game']; ?></h2>

                <div class="game_story description">
                    <? echo $game['description']; ?>
                </div>
            </div>
            <!-- /БЛОК ДЛЯ ОПИСАНИЯ ИГРЫ -->

            <? $articles_count = get_articles_count_by_game_id($_GET['game_id']); ?>
            <div class="value-comment">Новости: <? echo $articles_count; ?></div>

            <?

            if ($articles_count != 0) :
                $limit_start = 0;
                $limit_end = 5;
                if (isset($_GET['go'])) {
                    $limit_start += $_GET['go'];
                }
                $articles = get_articles_by_game_id($_GET['game_id'], "$limit_start,$limit_end");


                foreach ($articles as $article) :
                    $comments_count = get_comments_count_by_id($article["id"]);
            ?>

                    <div class="container">
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="./?id=<?php echo $article["id"]; ?>">
                                        <img class="imga" src="<?php echo $article["img"]; ?>">
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="./?id=<?php echo $article["id"]; ?>" class="heading"><?php echo $article["title"]; ?>
                                    </a>
                                </div>
                                <div class="text">
                                    <?php

                                    $stroka = iconv('UTF-8', 'windows-1251', $article["prewie_text"]); //Меняем кодировку на windows-1251

                                    $stroka = substr($stroka, 0, 600); //Обрезаем строку

                                    $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                                    echo $stroka . "  ...  " . " <a href='./?id=" . $article["id"] . "'><span>     [Далее]</span></a>";

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
                                        <?php echo $article["views"]; ?>
                                    </span>
                                    <span class="date" style="padding-right: 0;"><?php echo $article["pubdate"]; ?></span>

                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>

                <? if ($articles_count > 5) : ?>

                    <div class="pages">
                        <?php
                        $game_id = $_GET['game_id'];
                        $count = get_articles_count_by_game_id($_GET['game_id']);
                        $count_1 = $count;
                        $count = $count;
                        //print_r($count);
                        $go = 5;
                        $page_count = 0;
                        for ($i = 1;; $i++) {
                            if ($count > 0) {
                                $page_count++;
                            } else {
                                break;
                            }
                            $count -= 5;
                        }
                        //print_r($page_count);
                        $page_num = $_GET['page_num'];
                        if ($page_count > 2) {
                        ?>



                            <!-- Шаг назад -->
                            <? if ($_GET['go'] > 0) : ?>
                                <a href="./?game_id=<? echo $game_id; ?>$game_id&go=<? print($_GET['go'] - 5); ?>&page_num=<? echo $_GET['page_num'] - 1; ?>">&#10094;</a>
                            <? endif; ?>



                            <?
                            if ($page_num <= 4 || $page_count < 8) {
                            ?>

                                <a class="<?php if ($page_num == 1) {
                                                echo " a-active";
                                            } ?>" href="./?game_id=<? echo $game_id; ?>&go=0&page_num=1">1</a>

                            <?
                            } else {
                            ?>
                                <a class="<?php if ($page_num == 1) {
                                                echo " a-active";
                                            } ?>" href="./?game_id=<? echo $game_id; ?>&go=0&page_num=1">1</a>
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
                                        echo "' href='./?game_id=$game_id&go=$go&page_num=$i'>$i</a></li>";
                                    }
                                } elseif ($page_num <= 4) {

                                    if ($i >= 2 && $i <= 6) {
                                        echo "<a class='";
                                        if ($page_num == $i) {
                                            echo " a-active";
                                        }
                                        echo "' href='./?game_id=$game_id&go=$go&page_num=$i'>$i</a></li>";
                                    }
                                } elseif ($page_num > ($page_count - 3)) {

                                    if ($i >= ($page_count - 5) && $i <= $page_count) {
                                        echo "<a class='";
                                        if ($page_num == $i) {
                                            echo " a-active";
                                        }
                                        echo "' href='./?game_id=$game_id&go=$go&page_num=$i'>$i</a></li>";
                                    }
                                }

                                $go += 5;
                            }

                            ?>



                            <?
                            if ($page_num > ($page_count - 4) || $page_count < 8) {
                            ?>

                                <a class="<?php if ($page_num == $page_count) {
                                                echo " a-active";
                                            } ?>" href="./?game_id=<? echo $game_id; ?>&go=<? echo $go; ?>&page_num=<? echo $page_count; ?>"><? echo $page_count; ?></a>

                            <?
                            } else {
                            ?>
                                <p style="line-height: 32px;">...</p>
                                <a class="<?php if ($page_num == $page_count) {
                                                echo " a-active";
                                            } ?>" href="./?game_id=<? echo $game_id; ?>&go=<? echo $go; ?>&page_num=<? echo $page_count; ?>"><? echo $page_count; ?></a>
                            <?
                            }
                            ?>



                            <!-- Шаг вперёд -->
                            <? if (($_GET['go'] + 5) < $count_1) : ?>
                                <a href="./?game_id=<? echo $game_id; ?>&go=<? print($_GET['go'] + 5); ?>&page_num=<? echo $_GET['page_num'] + 1; ?>">&#10095;</a>
                            <? endif; ?>

                            <?
                        } else {
                            //Шаг назад
                            if ($_GET['go'] > 0) :
                            ?>
                                <a href="./?game_id=<? echo $game_id; ?>&go=<? print($_GET['go'] - 5); ?>&page_num=<? echo $_GET['page_num'] - 1; ?>">&#10094;</a>
                            <?
                            endif;
                            $go = 0;
                            for ($i = 1; $i <= $page_count; $i++) {

                                echo "<a class='";
                                if ($page_num == $i) {
                                    echo " a-active";
                                }
                                echo "' href='./?game_id=$game_id&go=$go&page_num=$i'>$i</a></li>";

                                $go += 5;
                            }
                            //Шаг вперёд
                            if (($_GET['go'] + 5) < $count_1) :
                            ?>
                                <a href="./?game_id=<? echo $_GET['game_id'] ?>&go=<? print($_GET['go'] + 5); ?>&page_num=<? echo $_GET['page_num'] + 1; ?>">&#10095;</a>
                        <?
                            endif;
                        }
                        ?>
                    </div>
                <? endif; ?>
            <? else : ?>
                <p>Новостей по данной игре пока нет. Извините за предоставленные неудобства(</p>
            <? endif; ?>
            <!-- Блок с ценами на игру -->
            <?
            if ($_GET['game_id'] != 13) {
            ?>
                <div class="price-block">
                    <div>
                        <div class="game-price-header">
                            <div class="game-price-name">
                                <h1>Посмтореть <?php echo $game['name_game']; ?>:</h1>
                            </div>
                        </div>

                        <div class="game-prices">
                            <div class="shop-list">

                                <?
                                $shops = get_shops_by_game_id($_GET['game_id']);
                                $shopsQuantity = 0;
                                if ($shops['steam_link'] != NULL) {
                                    $shopsQuantity++;
                                ?>

                                    <a href="<?php echo $shops['steam_link']; ?>" target="_blank" class="game-prices-item">
                                        <div class="item-one">
                                            <img src="/img/logo-shop/steam.png" alt="Steam" title="Steam" sizes="(max-width: 164px) 100vw, 164px">
                                        </div>

                                        <div class="item-two">
                                            <div class="game-price">
                                                <?php if ($shops['steam_price'] == 0) {
                                                ?>
                                                    <span class="price-value">Бесплатно</span>
                                                <?
                                                } else {
                                                ?>
                                                    <span class="price-value"><? echo $shops['steam_price']; ?></span>
                                                    <span class="currency">₽</span>
                                                <? } ?>

                                                <span class="buy-btn">посмотреть</span>
                                            </div>
                                        </div>
                                    </a>
                                <?
                                }
                                if ($shops['gabestore_link'] != NULL) {
                                    $shopsQuantity++;
                                ?>
                                    <a href="<?php echo $shops['gabestore_link']; ?>" target="_blank" class="game-prices-item">
                                        <div class="item-one">
                                            <img src="/img/logo-shop/gabestore.png" alt="GabeStore" title="GabeStore" sizes="(max-width: 164px) 100vw, 164px">
                                        </div>

                                        <div class="item-two">
                                            <div class="game-price">
                                                <span class="price-value">
                                                    <?php if ($shops['gabestore_price'] == 0) {
                                                    ?>
                                                        <span class="price-value">Бесплатно</span>
                                                    <?
                                                    } else {
                                                    ?>
                                                        <span class="price-value"><? echo $shops['gabestore_price']; ?></span>
                                                        <span class="currency">₽</span>
                                                    <? } ?>

                                                    <span class="buy-btn">посмотреть</span>
                                            </div>
                                        </div>
                                    </a>
                                <?
                                }
                                if ($shops['EpicGames_link'] != NULL) {
                                    $shopsQuantity++;
                                ?>
                                    <a href="<?php echo $shops['EpicGames_link']; ?>" target="_blank" class="game-prices-item">
                                        <div class="item-one">
                                            <img src="/img/logo-shop/epic.png" alt="Epic Games" title="Epic Games" sizes="(max-width: 164px) 100vw, 164px">
                                        </div>

                                        <div class="item-two">
                                            <div class="game-price">
                                                <span class="price-value">
                                                    <?php if ($shops['EpicGames_price'] == 0) {
                                                    ?>
                                                        <span class="price-value">Бесплатно</span>
                                                    <?
                                                    } else {
                                                    ?>
                                                        <span class="price-value"><? echo $shops['EpicGames_price']; ?></span>
                                                        <span class="currency">₽</span>
                                                    <? } ?>

                                                    <span class="buy-btn">посмотреть</span>
                                            </div>
                                        </div>
                                    </a>
                                <?
                                }
                                if ($shops['SteamPay_link'] != NULL) {
                                    $shopsQuantity++;
                                ?>
                                    <a href="<?php echo $shops['SteamPay_link']; ?>" target="_blank" class="game-prices-item">
                                        <div class="item-one">
                                            <img src="/img/logo-shop/steampay.png" alt="STEAMPAY" title="STEAMPAY" sizes="(max-width: 164px) 100vw, 164px">
                                        </div>

                                        <div class="item-two">
                                            <div class="game-price">
                                                <span class="price-value">
                                                    <?php if ($shops['SteamPay_price'] == 0) {
                                                    ?>
                                                        <span class="price-value">Бесплатно</span>
                                                    <?
                                                    } else {
                                                    ?>
                                                        <span class="price-value"><? echo $shops['SteamPay_price']; ?></span>
                                                        <span class="currency">₽</span>
                                                    <? } ?>

                                                    <span class="buy-btn">посмотреть</span>
                                            </div>
                                        </div>
                                    </a>
                                <?
                                }
                                if ($shops['SousBuy_link'] != NULL) {
                                    $shopsQuantity++;
                                ?>
                                    <a href="<?php echo $shops['SousBuy_link']; ?>" target="_blank" class="game-prices-item">
                                        <div class="item-one">
                                            <img src="/img/logo-shop/sous.png" alt="SousBuy" title="SousBuy" sizes="(max-width: 164px) 100vw, 164px">
                                        </div>

                                        <div class="item-two">
                                            <div class="game-price">
                                                <span class="price-value">
                                                    <?php if ($shops['SousBuy_price'] == 0) {
                                                    ?>
                                                        <span class="price-value">Бесплатно</span>
                                                    <?
                                                    } else {
                                                    ?>
                                                        <span class="price-value"><? echo $shops['SousBuy_price']; ?></span>
                                                        <span class="currency">₽</span>
                                                    <? } ?>

                                                    <span class="buy-btn">посмотреть</span>
                                            </div>
                                        </div>
                                    </a>
                                <?
                                }
                                if ($shops['ZakaZaka_link'] != NULL) {
                                    $shopsQuantity++;
                                ?>
                                    <a href="<?php echo $shops['ZakaZaka_link']; ?>" target="_blank" class="game-prices-item">
                                        <div class="item-one">
                                            <img src="/img/logo-shop/zaka.png" alt="Zaka-Zaka" title="Zaka-Zaka" sizes="(max-width: 164px) 100vw, 164px">
                                        </div>

                                        <div class="item-two">
                                            <div class="game-price">
                                                <?php if ($shops['ZakaZAka_price'] == 0) {
                                                ?>
                                                    <span class="price-value">Бесплатно</span>
                                                <?
                                                } else {
                                                ?>
                                                    <span class="price-value"><? echo $shops['ZakaZAka_price']; ?></span>
                                                    <span class="currency">₽</span>
                                                <? } ?>

                                                <span class="buy-btn">посмотреть</span>
                                            </div>
                                        </div>
                                    </a>
                                <?
                                }
                                if ($shopsQuantity == 0) {
                                ?>
                                    <p>В данный момент игра не продаётся ни в каком магазине.</p>
                                <?
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?
            }
            ?>


        </main>
    </div>
</div>