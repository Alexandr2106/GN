<section class="mail">
    <div class="container content">
        <div class="mailing">
            <h4>Подписывайтесь на нашу рассылку!</h4>
            <p class="undt-p">И будьте в курсе свежих новостей каждую неделю</p>
            <form class="form-mailing" method="POST">
                <? if(isset($_SESSION['user_id'])): ?>
                <input type="text" class="form-control" id="mailing_login_main" style="display: none;" value="<? echo $user['id']; ?>">
                <? endif; ?>
                <input type="email" class="form-control" id="mailing_email_main" placeholder="Ваш e-mail">
                <label for="mailing_email_main" id="mailing_email_main_message" style="color: red;"></label>
                <button type="submit" class="btn" id="mailing_main">Подписаться</button>
            </form>
            <p class="footnote">Нажимая на кнопку, вы даете согласие на обработку персональных данных и политику конфиденциальности.</p>
        </div>
    </div>
</section>