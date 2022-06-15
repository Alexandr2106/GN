<? $post = get_post($_GET['post_id']); ?>
<? $comments_count = get_count_post_comments($_GET['post_id']); ?>
<div class="container content-game">
    <div class="layout">
        <aside class="sidebar">
            <nav class="sorts">
                <div class="blok-header">
                    Помощь
                </div>
                <ul class="sort">
                    <li class="sort-item">
                        <a href="./?page=help"><span class="filter">Форумы</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="./?page=about_us"><span class="filter sort-selected">О нас</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="./?page=advanceded"><span class="filter">Реклама</span></a>
                    </li>
                </ul>
            </nav>
        </aside>


        <main class="help about-us" style="font-size: 16px;">
            <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|'; margin-bottom: 20px;">
                <ol class="breadcrumb" style="margin: 0;">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="./?page=help" class="disabled">Помощь</a></li>
                    <li class="breadcrumb-item"><a href="#" onclick="window.history.back();">Назад</a></li>
                </ol>
            </section>

            <div class="blok-header">О сайте</div>

            <p>GameNews — проект, который рассказывает всем о видеоиграх.
                Новости игр и техники на GameNews — самое интересное и актуальное. То, что нужно современному человеку.
            </p>
            <br>
            <p>GameNews.ru может предложить вам:</p>
            <ul>
                <li>Читать здесь статьи;</li>
                <li>Общаться в комментариях;</li>
                <li>Создавать блоги.</li>
            </ul>
            <br>
            <p>Что можно найти на GameNews:</p>
            <ul>
                <li>Новости игр на PS4, PC (ПК), Xbox One, PS5, Xbox Series X, Nintendo Switch, iOS, Android и других систем, девайсов и платформ;</li>
                <li>Обзоры игр PS4, PC (ПК), Xbox One, PS5, Xbox Series X, Nintendo Switch, iOS, Android и других систем, девайсов и платформ;</li>
                <li>Обзоры гаджетов, мониторов, ноутбуков, наушников, клавиатур, мышей и другого железа;</li>
                <li>Распродажи игр в Steam и EGS;</li>
                <li>Трейлеры игр, фильмов и сериалов по играм, тизеры, геймплей.</li>
            </ul>

            <h3>Контакты</h3>
            <p style="margin-bottom: 10px;">Email для связи: <a href="mailto:contact-gn@bk.ru" target="_blank" style="color: var(--hover-color);">contact-gn@bk.ru</a></p>

            <p>По вопросам размещения рекламы на GameNews <a href="./?page=advanceded" target="_blank" style="color: var(--hover-color);">смотрите соответствующую страничку</a>.</p>
            <p style="margin-bottom: 10px;">Будем рады сотрудничеству!</p>

            <p style="margin-bottom: 10px;">Прямая связь по рекламе через почту <a href="mailto:sales-gn@bk.ru" target="_blank" style="color: var(--hover-color);">sales-gn@bk.ru</a>.</p>

            <p style="margin-bottom: 10px;">Ознакомится с пользовательским соглашением можете <a href="./?page=rules" target="_blank" style="color: var(--hover-color);">на соответствующей страничке</a>.</p>
        </main>
    </div>
</div>