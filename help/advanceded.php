<style>
@media (max-width: 1400px) {
    .advanced {
        display: grid !important;
    }
}
</style>
<? $post = get_post($_GET['post_id']); ?>
<? $comments_count = get_count_post_comments($_GET['post_id']); ?>
<div class="container content-game">
    <main class="help">
        <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|'; margin-bottom: 20px;">
            <ol class="breadcrumb" style="margin: 0;">
                <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                <li class="breadcrumb-item"><a href="./?page=help" class="disabled">Помощь</a></li>
                <li class="breadcrumb-item"><a href="#" onclick="window.history.back();">Назад</a></li>
            </ol>
        </section>

        <div class="blok-header">Реклама на GameNews</div>

        <div class="mb-4">
            <img src="../img/advanced_logo/advanced-img.webp" style="border-radius: 10px; width: 100%;">
        </div>
        <div class="advanced" style="gap: 4rem; flex-direction: row; display: flex;">
            <div>
                <p>По вопросам размещения рекламы на GameNews.ru обращайтесь по адресу: <a href="mailto:sales-gn@bk.ru" target="_blank" style="font-size: 18px; color: var(--hover-color);">sales-gn@bk.ru</a>
                </p>
                <br>
                <p>Будем рады сотрудничеству!</p>

                <br>
                <p>Прямая связь по рекламе через почту <a href="mailto:contact-gn@bk.ru" target="_blank" style="color: var(--hover-color);">sales-gn@bk.ru.</a></p>
                <br>
                <h4 style="border-bottom: 1px solid;padding-bottom: 10px;margin-bottom: 10px;">География GameNews</h4>
                <img src="/img/advanced_logo/geography.webp" alt="География GameNews" style="width: 100%;">

                <br>

                <h4 style="border-bottom: 1px solid;padding-bottom: 10px;margin-bottom: 10px;">Наши поситители</h4>
                <div style="display: flex;flex-wrap: wrap;gap: 10px;">
                    <div>
                        <img src="/img/advanced_logo/age.webp" alt="География GameNews" style="width: 100%;">
                    </div>
                    <div>
                        <img src="/img/advanced_logo/typ.webp" alt="География GameNews" style="width: 100%;">
                    </div>
                </div>

                <h4 style="border-bottom: 1px solid;padding-bottom: 10px;margin-bottom: 10px;">Визиты</h4>
                <img src="/img/advanced_logo/count.webp" alt="География GameNews" style="width: 100%;">
            </div>

            <aside style="display: flex;flex-direction: column; max-width: 320px; width: 100%;">
                <div style="display: flex;flex-direction: column;align-items: center; gap: 40px;">
                    <div style="display: flex;align-items: center;gap: 10px;">
                        <img width="64" height="64" src="/img/advanced_logo/vk.webp" alt="GameNews @ VKontakte">

                        <div style="display: flex;flex-direction: column;justify-content: space-between; gap: 10px;">
                            <h3 style="margin: 0;padding: 0;font-size: inherit;font-weight: inherit;line-height: 16px;">GameNews Вконтакте</h3>
                            <a class="link_soc" href="https://vk.com/public213923260" target="_blank" style="background: var(--nav-color);text-align: center;border-radius: 5px;color: white;font-size: 14px;padding: 5px 10px; transform: skew(-5deg);">ПОДПИСАТЬСЯ</a>
                        </div>
                    </div>

                    <div style="display: flex;align-items: center;gap: 10px;">
                        <img width="64" height="64" src="/img/advanced_logo/tg.webp" alt="GameNews @ Telegram">

                        <div style="display: flex;flex-direction: column;justify-content: space-between; gap: 10px;">
                            <h3 style="margin: 0;padding: 0;font-size: inherit;font-weight: inherit;line-height: 16px;">GameNews Telegram</h3>
                            <a class="link_soc" href="https://t.me/+DYKOa1ye55FjYTgy" target="_blank" style="background: var(--nav-color);text-align: center;border-radius: 5px;color: white;font-size: 14px;padding: 5px 10px; transform: skew(-5deg);">ПОДПИСАТЬСЯ</a>
                        </div>
                    </div>

                </div>
            </aside>
        </div>
    </main>
</div>