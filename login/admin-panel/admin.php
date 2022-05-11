<div class="container content-lk">
    <div class="user-profile-header">
        <div class="flexbox-container">
            <div class="user-profile-header-info">
                <div class="flex-item">
                    <a href="#">
                        <? if ($user['user_avatar'] == NULL) : ?>
                            <img class="avatar" src="img/svg/login.png">
                        <? else : ?>
                            <!--<img src="<? echo $user['user_avatar']; ?>" alt="" width="32px" height="32px">-->
                            <img class="avatar" src="<? echo $user['user_avatar']; ?>">
                        <? endif; ?>
                        <!--<div class="avatar-form-group">
                            <span class="avatar-file">
                                <input name="file" type="file" accept=".jpg,.jpeg,.gif,.png,.webp" name="file" id="input__file" class="input input__file" multiple>
                                <label for="input__file" class="avatar-file-botton">
                                    <span class="avatar-file"><img class="input__file-icon" src="/img/download.png" alt="Выбрать файл" width="32"></span>
                                </label>
                            </span>
                        </div>-->
                    </a>
                </div>
                <div class="flex-item">
                    <div>Логин: </div>
                    <? if ($user['admin'] == "0") : ?>
                        <div><span class="login"><? echo $user['login']; ?></span></div>
                    <? elseif ($user['admin'] == "1") : ?>
                        <div><span class="login"><? echo $user['login']; ?><sup class="sup">Админ</sup></span></div>
                    <? endif; ?>
                </div>
            </div>
            <div class="flex-item">
                <div class="mailing mail-lk">
                    <h4>Подписывайтесь на нашу рассылку!</h4>
                    <p class="undt-p">И будьте в курсе свежих новостей каждую неделю</p>
                    <form action="" class="form-mailing">
                        <input type="email" class="form-control" placeholder="Ваш e-mail">

                        <button type="submit" class="btn">Подписаться</button>
                    </form>
                    <p class="footnote">Нажимая на кнопку, вы даете согласие на обработку персональных данных и политику конфиденциальности.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-lk">
        <nav class="lk-nav">
            <span class="lk-nav-item">
                <a class="tab" href="./?page=lk">
                    <span class="text">Данные</span>
                </a>
            </span>
            <span class="lk-nav-item nav-selected">
                <a class="tab" href="./?page=admin">
                    <span class="text">Панель Администратора</span>
                </a>
            </span>
        </nav>


        <div class="admin-layout">
            <div class="left-side-news">
                <div class="blok-header">
                    Новости
                    <sup class="sup">10 последних статей</sup>
                </div>

                <table class="admin-panel">
                    <tr><button class="btn add-button openModal">Добавить статью</button></tr>
                    <tr><label id="add_article_message"></label></tr>
                    <!-- МОДАЛЬНОЕ ОКНО С ФОРМАМИ ДОБАВЛЕНИЯ -->
                    <dialog class="Modal" style="width: 60%;">
                        <div class="Modal-inner">

                            <h2>Добавление статьи</h2>

                            <form class="article-form" id="add_article_form" method="POST">
                                <div class="adding">
                                    <label for="article_title">Заголовок статьи:
                                        <!--<div class="form-note">
                                            Это имя будут видеть остальные пользователи сайта. Его можно сменить только один раз.
                                        </div>-->
                                    </label>

                                    <input type="text" name="title" id="article_title" placeholder="Название статьи">
                                </div>

                                <div class="adding">
                                    <label for="prewie_text">Превью текс:</label>
                                    <textarea name="preview" id="prewie_text" cols="30" rows="10" placeholder="Текст для превью: 
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>"></textarea>
                                </div>

                                <div class="adding">
                                    <label for="full_text">Полный текст статьи:</label>
                                    <textarea name="full-text" id="full_text" cols="40" rows="10" placeholder="Полный текст статьи: 
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>"></textarea>
                                </div>

                                <div class="adding">
                                    <label for="article_img">Изображение для превью:</label>
                                    <input type="text" name="image" id="article_img" placeholder="Ссылка на изображение в сети: https://live.staticflickr.com/65535/изображение для превью.jpg">
                                </div>

                                <div class="adding">
                                    <label for="game_id">Игра:</label>
                                    <select name="game" id="game_id">
                                        <option value="13">Другое</option>
                                        <? $games = sort_games_by_name_game("0,99999");;
                                        foreach ($games as $game) :
                                            if ($game['id'] == 13) :
                                                continue;
                                            else : ?>
                                                <option value="<? echo $game['id'] ?>"><? echo $game['name_game'] ?></option>
                                        <?
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="adding">
                                    <label for="add_slider">Добавить на слайдер:</label>
                                    <select name="game" id="add_slider">

                                        <option value="1">Да</option>
                                        <option value="0">Нет</option>

                                    </select>
                                </div>

                                <div class="article-button">
                                    <button class="btn add-button" id="add_new_article">Опубликовать</button>
                                </div>
                            </form>

                            <button class="btn add-button closeModal">Закрыть</button>
                    </dialog>

                    <script>
                        const openModal = document.querySelector('.openModal');
                        const closeModal = document.querySelector('.closeModal');
                        const Modal = document.querySelector('.Modal');

                        openModal.addEventListener('click', () => {
                            Modal.showModal()
                        })

                        closeModal.addEventListener('click', () => {
                            Modal.close()
                        })

                        Modal.addEventListener('click', (e) => {
                            if (e.target === Modal) Modal.close()
                        })
                    </script>
                    <!-- /МОДАЛЬНОЕ ОКНО С ФОРМАМИ ДОБАВЛЕНИЯ -->

                    <tr class="table-heading">
                        <th>ID</th>
                        <th>Заголовок</th>
                    </tr>

                    <? $articles = get_singles_all("0,10");
                    foreach ($articles as $article) :
                    ?>

                        <tr>
                            <td><? echo $article['id']; ?></td>
                            <td><? echo $article['title']; ?></td>
                            <td><button class="edit openModalEdit openModalEdit<? echo $article['id']; ?>"><span>Редактировать</span>
                                    <img src="/img/edit.png" alt="Редактировать"></button></td>
                            <!-- МОДАЛЬНОЕ ОКНО С ФОРМОЙ РЕДАКТИРОВАНИЯ -->
                            <dialog class="ModalEdit ModalEdit<? echo $article['id']; ?>" style="width: 60%;">
                                <div class="Modal-inner">

                                    <h2>Редактировать статью</h2>

                                    <form class="article-form" id="edit_article_form" onsubmit="return false" method="POST">
                                        <div class="adding">
                                            <label for="edit_article_title">Заголовок статьи:</label>

                                            <input type="text" name="title" id="edit_article_title<? echo $article['id']; ?>" value="<? echo $article['title']; ?>">
                                        </div>

                                        <?
                                        $prewie_text = $article['prewie_text'];

                                        $prewie_text = str_replace('"', '&quot;', $prewie_text);
                                        ?>

                                        <div class="adding">
                                            <label for="edit_prewie_text">Превью текс:</label>
                                            <textarea name="preview" id="edit_prewie_text<? echo $article['id']; ?>" cols="30" rows="10"><? echo $prewie_text; ?></textarea>
                                        </div>

                                        <?
                                        $full_text = $article['full_text'];
                                        $full_text = str_replace('"', '&quot;', $full_text);
                                        ?>

                                        <div class="adding">
                                            <label for="edit_full_text">Полный текст статьи:</label>
                                            <textarea name="full-text" id="edit_full_text<? echo $article['id']; ?>" cols="40" rows="10"><? echo $full_text; ?></textarea>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_article_img">Изображение для превью:</label>
                                            <input type="text" name="image" id="edit_article_img<? echo $article['id']; ?>" value="<? echo $article['img']; ?>">
                                        </div>

                                        <div class="adding">
                                            <label for="edit_game_id">Игра:</label>
                                            <select name="game" id="edit_game_id<? echo $article['id']; ?>">
                                                <option value="13">Другое</option>
                                                <? $games = sort_games_by_name_game("0,99999");
                                                foreach ($games as $game) :
                                                    if ($game['id'] == 13) :
                                                        continue;
                                                    else :
                                                        if ($game['id'] == $article['games_id']) {
                                                ?>
                                                            <option value="<? echo $game['id'] ?>" selected><? echo $game['name_game'] ?></option>

                                                        <?
                                                        } else {

                                                        ?>
                                                            <option value="<? echo $game['id'] ?>"><? echo $game['name_game'] ?></option>

                                                <?
                                                        }
                                                    endif;
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_slider">Добавить на слайдер:</label>
                                            <select name="game" id="edit_slider<? echo $article['id']; ?>">
                                                <? if ($article['slider'] == 1) : ?>
                                                    <option value="1">Да</option>
                                                <? else : ?>
                                                    <option value="0">Нет</option>
                                                <? endif; ?>
                                            </select>
                                        </div>

                                        <div class="article-button">
                                            <label id="edit_article_message"></label>
                                            <button class="btn add-button" id="edit_article" onclick="edit_article_by_id(<? echo $article['id']; ?>)">Сохранить</button>

                                        </div>
                                    </form>

                                    <button class="btn add-button closeModalEdit closeModalEdit<? echo $article['id']; ?>">Закрыть</button>
                            </dialog>

                            <script>
                                const openModalEdit<? echo $article['id']; ?> = document.querySelector('.openModalEdit<? echo $article['id']; ?>');
                                const closeModalEdit<? echo $article['id']; ?> = document.querySelector('.closeModalEdit<? echo $article['id']; ?>');
                                const ModalEdit<? echo $article['id']; ?> = document.querySelector('.ModalEdit<? echo $article['id']; ?>');

                                openModalEdit<? echo $article['id']; ?>.addEventListener('click', () => {
                                    ModalEdit<? echo $article['id']; ?>.showModal()
                                })

                                closeModalEdit<? echo $article['id']; ?>.addEventListener('click', () => {
                                    ModalEdit<? echo $article['id']; ?>.close()
                                })

                                ModalEdit<? echo $article['id']; ?>.addEventListener('click', (e) => {
                                    if (e.target === ModalEdit<? echo $article['id']; ?>) ModalEdit<? echo $article['id']; ?>.close()
                                })
                            </script>
                            <!-- /МОДАЛЬНОЕ ОКНО С ФОРМОЙ РЕДАКТИРОВАНИЯ -->

                            <td><button class="delete delete-article" onclick="delete_article(<? echo $article['id']; ?>, '<? echo $article['title']; ?>')"><span>Удалить</span>
                                    <img src="/img/delete.png" alt="Редактировать"></button></td>

                        </tr>

                    <? endforeach; ?>
                </table>
            </div>

            <div class="right-side-games">
                <div class="blok-header">
                    Игры
                    <sup class="sup">10 последних игр</sup>
                </div>

                <table class="admin-panel">
                    <tr><button class="btn add-button openModalTwo">Добавить игру</button></tr>
                    <tr><label id="add_game_message"></label></tr>
                    <!-- МОДАЛЬНОЕ ОКНО С ФОРМАМИ ДОБАВЛЕНИЯ -->
                    <dialog class="ModalTwo" style="width: 60%;">
                        <div class="Modal-inner">

                            <h2>Добавление игры</h2>

                            <form class="article-form" id="add_game_form" method="POST">
                                <div class="adding">
                                    <label for="game_name">Название игры:
                                        <!--<div class="form-note">
                                            Это имя будут видеть остальные пользователи сайта. Его можно сменить только один раз.
                                        </div>-->
                                    </label>

                                    <input type="text" name="Name-game" id="game_name" placeholder="Название игры">
                                </div>

                                <div class="adding">
                                    <label for="game_image">Изображение игры:</label>
                                    <input type="text" name="Game-image" id="game_image" placeholder="Полный текст статьи: https://live.staticflickr.com/65535/изображение для превью.jpg">
                                </div>

                                <div class="adding">
                                    <label for="description">Описание игры:</label>
                                    <textarea name="Game-description" id="description" cols="40" rows="10" placeholder="Текст описания игры: 
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>"></textarea>
                                </div>

                                <div class="adding">
                                    <label for="platform">Платформы:</label>
                                    <input type="text" name="Platform" id="platform" placeholder="PC, XboxSX/S, PS5, NSW, XboxOne, PS4">
                                </div>

                                <div class="adding">
                                    <label for="genre">Жанры:</label>
                                    <input type="text" name="Genre" id="genre" placeholder="Экшен, RPG">
                                </div>

                                <div class="adding">
                                    <label for="release_date">Дата выхода:</label>
                                    <input type="text" name="Date-release" id="release_date" placeholder="2022-01-22">
                                </div>


                                <div class="switch">
                                    <h5>Редактировать магазины</h5>
                                    <input type="checkbox" id="toggle" />
                                    <label for="toggle"></label>
                                </div>

                                <section class="admin-shops">
                                    <div class="adding-shop">
                                        <label for="release_date">Steam:</label>
                                        <input type="number" name="shop-name" id="release_date" placeholder="Цена">
                                        <input type="text" name="shop-link" id="release_date" placeholder="Ссылка на магазин">
                                    </div>

                                    <div class="adding-shop">
                                        <label for="release_date">GabeStore:</label>
                                        <input type="number" name="shop-name" id="release_date" placeholder="Цена">
                                        <input type="text" name="shop-link" id="release_date" placeholder="Ссылка на магазин">
                                    </div>

                                    <div class="adding-shop">
                                        <label for="release_date">EpicGames:</label>
                                        <input type="number" name="shop-name" id="release_date" placeholder="Цена">
                                        <input type="text" name="shop-link" id="release_date" placeholder="Ссылка на магазин">
                                    </div>

                                    <div class="adding-shop">
                                        <label for="release_date">SteamPay:</label>
                                        <input type="number" name="shop-name" id="release_date" placeholder="Цена">
                                        <input type="text" name="shop-link" id="release_date" placeholder="Ссылка на магазин">
                                    </div>

                                    <div class="adding-shop">
                                        <label for="release_date">Sous-Buy:</label>
                                        <input type="number" name="shop-name" id="release_date" placeholder="Цена">
                                        <input type="text" name="shop-link" id="release_date" placeholder="Ссылка на магазин">
                                    </div>

                                    <div class="adding-shop">
                                        <label for="release_date">Zaka-Zaka:</label>
                                        <input type="number" name="shop-name" id="release_date" placeholder="Цена">
                                        <input type="text" name="shop-link" id="release_date" placeholder="Ссылка на магазин">
                                    </div>
                                </section>
                                <script>
                                    let switcher = document.querySelector('#toggle');
                                    let admin_shops = document.querySelector('.admin-shops');

                                    admin_shops.style.display = 'none';

                                    switcher.addEventListener('click', () => {
                                        if (admin_shops.style.display === 'none') {
                                            admin_shops.style.display = 'block';
                                        } else if (admin_shops.style.display === 'block') {
                                            admin_shops.style.display = 'none';
                                        }
                                    })
                                </script>

                                <div class="article-button">
                                    <button class="btn add-button" id="add_new_game">Добавить игру</button>
                                </div>
                            </form>

                            <button class="btn add-button closeModalTwo">Закрыть</button>
                    </dialog>

                    <script>
                        const openModalTwo = document.querySelector('.openModalTwo');
                        const closeModalTwo = document.querySelector('.closeModalTwo');
                        const ModalTwo = document.querySelector('.ModalTwo');

                        openModalTwo.addEventListener('click', () => {
                            ModalTwo.showModal()
                        })

                        closeModalTwo.addEventListener('click', () => {
                            ModalTwo.close()
                        })

                        ModalTwo.addEventListener('click', (e) => {
                            if (e.target === ModalTwo) ModalTwo.close()
                        })
                    </script>
                    <!-- /МОДАЛЬНОЕ ОКНО С ФОРМАМИ ДОБАВЛЕНИЯ -->


                    <tr class="table-heading">
                        <th>ID</th>
                        <th>Название</th>
                    </tr>
                    <? $games = get_games_by_limit("0,10");
                    foreach ($games as $game) :
                    ?>

                        <tr>
                            <td><? echo $game['id']; ?></td>
                            <td><? echo $game['name_game']; ?></td>
                            <td>
                                <button class="edit openModalEditTwo openModalEditTwo<? echo $game['id']; ?>"><span>Редактировать</span>
                                    <img src="/img/edit.png" alt="Редактировать">
                                </button>
                            </td>
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

                                        <div class="article-button">
                                            <label id="edit_game_message"></label>
                                            <button class="btn add-button" id="edit_game" onclick="edit_game_by_id(<? echo $game['id']; ?>)">Сохранить</button>
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


                            <td><button class="delete delete-game" onclick="delete_game(<? echo $game['id']; ?>, '<? echo $game['name_game']; ?>')"><span>Удалить</span>
                                    <img src="/img/delete.png" alt="Редактировать"></button></td>
                        </tr>

                    <? endforeach; ?>
                </table>
            </div>
        </div>

        <!--<div class="cap">
            <span>Последние 10 добавленых новостей и игр</span>
        </div>-->
    </div>
</div>