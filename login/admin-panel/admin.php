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
                    <? if ($admin == 0) : ?>
                        <div><span class="login"><? echo $user['login']; ?></span></div>
                    <? elseif ($admin == 1) : ?>
                        <div><span class="login"><? echo $user['login']; ?><sup class="sup">Админ</sup></span></div>
                    <? endif; ?>
                </div>
            </div>
            <div class="flex-item">

                <button class="btn openModalMailing" style="background-color: red; color: white;">Отправить недельную рассылку</button>
                <label id="send_mailing_messege"></label>
                <!-- МОДАЛЬНОЕ ОКНО С ФОРМОЙ ОТПРАВКИ НЕДЕЛЬНОЙ РАССЫЛКИ -->
                <dialog class="ModalMailing" style="width: 60%;">
                    <div class="Modal-inner">

                        <h2>Статьи в рассылке на этой неделе:</h2>

                        <form class="article-form" method="POST">
                            
                                <?
                                $results = add_mailing_articles();
                                //print_r($results);
                                foreach ($results as $result) :
                                ?>

                                    <div class="adding">
                                        <label><? echo $result['id']; ?></label>
                                        <label><? echo $result['title']; ?></label>
                                        <label><? echo $result['pubdate']; ?></label>
                                    </div>

                                    

                                <? endforeach; ?>
                            
                        </form>
                        <label id="send_mailing_stay" style="color:brown"></label>
                        <button class="btn add-button" id="send_mailing">Отправить</button>
                        <button class="btn add-button closeModalMailing">Закрыть</button>
                </dialog>

                <script>
                    const openModalMailing = document.querySelector('.openModalMailing');
                    const closeModalMailing = document.querySelector('.closeModalMailing');
                    const ModalMailing = document.querySelector('.ModalMailing');

                    openModalMailing.addEventListener('click', () => {
                        ModalMailing.showModal()
                    })

                    closeModalMailing.addEventListener('click', () => {
                        ModalMailing.close()
                    })

                    ModalMailing.addEventListener('click', (e) => {
                        if (e.target === ModalMailing) ModalMailing.close()
                    })
                </script>
                <!-- /МОДАЛЬНОЕ ОКНО С ФОРМОЙ ОТПРАВКИ НЕДЕЛЬНОЙ РАССЫЛКИ -->

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
                                    <select name="slider" id="add_slider">

                                        <option value="1">Да</option>
                                        <option value="0">Нет</option>

                                    </select>
                                </div>

                                <div class="adding">
                                    <label for="add_mailing">Добавить в недельную рассылку:</label>
                                    <select name="mailing" id="add_mailing">

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
                                            <label for="edit_slider<? echo $article['id']; ?>">Добавить на слайдер:</label>
                                            <select name="slider" id="edit_slider<? echo $article['id']; ?>">
                                                <? if ($article['slider'] == 1) : ?>
                                                    <option value="1" selected>Да</option>
                                                    <option value="0">Нет</option>
                                                <? else : ?>
                                                    <option value="1">Да</option>
                                                    <option value="0" selected>Нет</option>
                                                <? endif; ?>
                                            </select>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_mailing<? echo $article['id']; ?>">Добавить в недельную рассылку:</label>
                                            <select name="mailing" id="edit_mailing<? echo $article['id']; ?>">
                                                <? if ($article['mailing'] == 1) : ?>
                                                    <option value="1" selected>Да</option>
                                                    <option value="0">Нет</option>
                                                <? else : ?>
                                                    <option value="1">Да</option>
                                                    <option value="0" selected>Нет</option>
                                                <? endif; ?>
                                            </select>
                                        </div>

                                        <div class="article-button">
                                            <label id="edit_article_message<? echo $article['id']; ?>"></label>
                                            <button class="btn add-button" id="edit_article<? echo $article['id']; ?>" onclick="edit_article_by_id(<? echo $article['id']; ?>)">Сохранить</button>

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

                            <td><button class="delete delete-article" onclick="delete_article(<? echo $article['id']; ?>, '<? echo $article['title']; ?>',0)"><span>Удалить</span>
                                    <img src="/img/delete.png" alt="Удалить"></button></td>

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
                                    <h5>Добавить магазины</h5>
                                </div>

                                <section class="admin-shops">

                                    <div class="adding-shop">
                                        <div class="switch">
                                            <label>Steam:</label>
                                            <input type="checkbox" id="toggleSteam" />
                                            <label for="toggleSteam"></label>
                                        </div>
                                        <div class="inputSteam">
                                            <input type="number" id="Steam-price" placeholder="Цена">
                                            <input type="text" id="Steam-link" placeholder="Ссылка">
                                        </div>
                                    </div>

                                    <div class="adding-shop">
                                        <div class="switch">
                                            <label>GabeStore:</label>
                                            <input type="checkbox" id="toggleGabeStore" />
                                            <label for="toggleGabeStore"></label>
                                        </div>

                                        <div class="inputGabeStore">
                                            <input type="number" id="GabeStore-price" placeholder="Цена">
                                            <input type="text" id="GabeStore-link" placeholder="Ссылка">
                                        </div>
                                    </div>

                                    <div class="adding-shop">
                                        <div class="switch">
                                            <label>EpicGames:</label>
                                            <input type="checkbox" id="toggleEpicGames" />
                                            <label for="toggleEpicGames"></label>
                                        </div>

                                        <div class="inputEpicGames">
                                            <input type="number" id="EpicGames-price" placeholder="Цена">
                                            <input type="text" id="EpicGames-link" placeholder="Ссылка">
                                        </div>
                                    </div>

                                    <div class="adding-shop">
                                        <div class="switch">
                                            <label>SteamPay:</label>
                                            <input type="checkbox" id="toggleSteamPay" />
                                            <label for="toggleSteamPay"></label>
                                        </div>

                                        <div class="inputSteamPay">
                                            <input type="number" id="SteamPay-price" placeholder="Цена">
                                            <input type="text" id="SteamPay-link" placeholder="Ссылка">
                                        </div>
                                    </div>

                                    <div class="adding-shop">
                                        <div class="switch">
                                            <label>Sous-Buy:</label>
                                            <input type="checkbox" id="toggleSous-Buy" />
                                            <label for="toggleSous-Buy"></label>
                                        </div>
                                        <div class="inputSous-Buy">
                                            <input type="number" id="Sous-Buy-price" placeholder="Цена">
                                            <input type="text" id="Sous-Buy-link" placeholder="Ссылка">
                                        </div>
                                    </div>

                                    <div class="adding-shop">
                                        <div class="switch">
                                            <label>Zaka-Zaka:</label>
                                            <input type="checkbox" id="toggleZaka-Zaka" />
                                            <label for="toggleZaka-Zaka"></label>
                                        </div>
                                        <div class="inputZaka-Zaka">
                                            <input type="number" id="Zaka-Zaka-price" placeholder="Цена">
                                            <input type="text" id="Zaka-Zaka-link" placeholder="Ссылка">
                                        </div>
                                    </div>
                                </section>
                                <script>
                                    let switcherSteam = document.querySelector('#toggleSteam');
                                    let switcherGabeStore = document.querySelector('#toggleGabeStore');
                                    let switcherEpicGames = document.querySelector('#toggleEpicGames');
                                    let switcherSteamPay = document.querySelector('#toggleSteamPay');
                                    let switcherSous_Buy = document.querySelector('#toggleSous-Buy');
                                    let switcherZaka_Zaka = document.querySelector('#toggleZaka-Zaka');

                                    let inputSteam = document.querySelector('.inputSteam');
                                    let inputGabeStore = document.querySelector('.inputGabeStore');
                                    let inputEpicGames = document.querySelector('.inputEpicGames');
                                    let inputSteamPay = document.querySelector('.inputSteamPay');
                                    let inputSous_Buy = document.querySelector('.inputSous-Buy');
                                    let inputZaka_Zaka = document.querySelector('.inputZaka-Zaka');


                                    inputSteam.style.display = 'none';
                                    inputGabeStore.style.display = 'none';
                                    inputEpicGames.style.display = 'none';
                                    inputSteamPay.style.display = 'none';
                                    inputSous_Buy.style.display = 'none';
                                    inputZaka_Zaka.style.display = 'none';

                                    switcherSteam.addEventListener('click', () => {
                                        if (inputSteam.style.display === 'none') {
                                            inputSteam.style.display = 'block';
                                        } else if (inputSteam.style.display === 'block') {
                                            inputSteam.style.display = 'none';
                                        }
                                    })

                                    switcherGabeStore.addEventListener('click', () => {
                                        if (inputGabeStore.style.display === 'none') {
                                            inputGabeStore.style.display = 'block';
                                        } else if (inputGabeStore.style.display === 'block') {
                                            inputGabeStore.style.display = 'none';
                                        }
                                    })

                                    switcherEpicGames.addEventListener('click', () => {
                                        if (inputEpicGames.style.display === 'none') {
                                            inputEpicGames.style.display = 'block';
                                        } else if (inputEpicGames.style.display === 'block') {
                                            inputEpicGames.style.display = 'none';
                                        }
                                    })

                                    switcherSteamPay.addEventListener('click', () => {
                                        if (inputSteamPay.style.display === 'none') {
                                            inputSteamPay.style.display = 'block';
                                        } else if (inputSteamPay.style.display === 'block') {
                                            inputSteamPay.style.display = 'none';
                                        }
                                    })

                                    switcherSous_Buy.addEventListener('click', () => {
                                        if (inputSous_Buy.style.display === 'none') {
                                            inputSous_Buy.style.display = 'block';
                                        } else if (inputSous_Buy.style.display === 'block') {
                                            inputSous_Buy.style.display = 'none';
                                        }
                                    })

                                    switcherZaka_Zaka.addEventListener('click', () => {
                                        if (inputZaka_Zaka.style.display === 'none') {
                                            inputZaka_Zaka.style.display = 'block';
                                        } else if (inputZaka_Zaka.style.display === 'block') {
                                            inputZaka_Zaka.style.display = 'none';
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
                                                        <input type="checkbox" id="toggleSteam<? echo $game['id']; ?>" checked />
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
                                                        <input type="checkbox" id="toggleGabeStore<? echo $game['id']; ?>" checked />
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
                                                        <input type="checkbox" id="toggleEpicGames<? echo $game['id']; ?>" checked />
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
                                                        <input type="checkbox" id="toggleSteamPay<? echo $game['id']; ?>" checked />
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
                                                        <input type="checkbox" id="toggleSous-Buy<? echo $game['id']; ?>" checked />
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
                                                        <input type="checkbox" id="toggleZaka-Zaka<? echo $game['id']; ?>" checked />
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

                                            if (switcherSteam<? echo $game['id']; ?>.checked) {
                                                inputSteam<? echo $game['id']; ?>.style.display = 'block';
                                            } else {
                                                inputSteam<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherGabeStore<? echo $game['id']; ?>.checked) {
                                                inputGabeStore<? echo $game['id']; ?>.style.display = 'block';
                                            } else {
                                                inputGabeStore<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherEpicGames<? echo $game['id']; ?>.checked) {
                                                inputEpicGames<? echo $game['id']; ?>.style.display = 'block';
                                            } else {
                                                inputEpicGames<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherSteamPay<? echo $game['id']; ?>.checked) {
                                                inputSteamPay<? echo $game['id']; ?>.style.display = 'block';
                                            } else {
                                                inputSteamPay<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherSous_Buy<? echo $game['id']; ?>.checked) {
                                                inputSous_Buy<? echo $game['id']; ?>.style.display = 'block';
                                            } else {
                                                inputSous_Buy<? echo $game['id']; ?>.style.display = 'none';
                                            }
                                            if (switcherZaka_Zaka<? echo $game['id']; ?>.checked) {
                                                inputZaka_Zaka<? echo $game['id']; ?>.style.display = 'block';
                                            } else {
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


                            <td><button class="delete delete-game" onclick="delete_game(<? echo $game['id']; ?>, '<? echo $game['name_game']; ?>', 0)"><span>Удалить</span>
                                    <img src="/img/delete.png" alt="Удалить"></button></td>
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