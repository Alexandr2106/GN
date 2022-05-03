<div class="container content-lk">
    <div class="user-profile-header">
        <div class="flexbox-container">
            <div class="user-profile-header-info">
                <div class="flex-item">
                    <a href="#">
                        <img class="avatar" src="https://i.playground.ru/a/MFS1RYdHiQre8i2RPXoRMg.jpeg?130x130" alt="Leg_endary">
                    </a>
                </div>
                <div class="flex-item">
                    <div>Логин: </div>
                    <div><span class="login"><? echo $_SESSION['login']; ?></span></div>
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
                </div>

                <table class="admin-panel">
                    <tr><button class="btn add-button">Добавить статью</button></tr>

                    <tr class="table-heading">
                        <td>ID</td>
                        <td>Заголовок</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>СОВЕТЫ И РЕКОМЕНДАЦИИ ПО ПВП DEATHLOOP</td>
                        <td><button class="edit">Редактировать</button></td>
                        <td><button class="delete">Удалить</button></td>
                        <td><button class="delete">Добавить на слайдер</button></td>
                    </tr>
                </table>
            </div>

            <div class="right-side-games">
                <div class="blok-header">
                    Игры
                </div>

                <table class="admin-panel">
                    <tr><button class="btn add-button">Добавить игру</button></tr>

                    <tr class="table-heading">
                        <td>ID</td>
                        <td>Название</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Deathloop</td>
                        <td><button class="edit">Редактировать</button></td>
                        <td><button class="delete">Удалить</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>