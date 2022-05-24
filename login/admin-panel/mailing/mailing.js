$('#mailing_lk').click(function (event) {
    event.preventDefault();
    let errors = 0;
    let email = $('#mailing_email_lk').val().trim();
    let login = $('#mailing_login_lk').val().trim();

    if (isEmail($('#mailing_email_lk').val().trim()) === false) {
        $('#mailing_email_lk_message').html("*Вы не правильно ввели почту (пример: xxxxxx@xxx.xx)");
        $('#mailing_email_lk').css("border-color", "red");
        errors++;
    } else {
        $('#mailing_email_lk_message').html("");
        $('#mailing_email_lk').css("border-color", "#ced4da");
    }
    let action = "add_new_mailing";

    let data = new FormData();
    data.append("action", action);
    data.append("email", email);
    data.append("login", login);

    if (errors == 0) {
        $.ajax({
            url: "./login/admin-panel/mailing/mailing.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#mailing_lk").prop("disabled", true);

            },
            success: function (data) {
                if (data == "Подписка успешно оформлена.") {
                    $('#mailing_email_lk_message').css("color", "green");
                    $('#mailing_email_lk_message').html(data);
                    $("#mailing_lk").prop("disabled", false);
                    location.reload()
                    return false;
                } else {
                    $('#mailing_email_lk_message').css("color", "red");
                    $('#mailing_email_lk_message').html(data);

                    $("#mailing_lk").prop("disabled", false);
                }

            }
        })
    }

})
$('#mailing_main').click(function (event) {
    event.preventDefault();
    let errors = 0;
    let email = $('#mailing_email_main').val().trim();

    if (typeof $('#mailing_login_main').val() !== "undefined") {
        var login = $('#mailing_login_main').val();
    }



    if (isEmail($('#mailing_email_main').val().trim()) === false) {
        $('#mailing_email_main_message').html("*Вы не правильно ввели почту (пример: xxxxxx@xxx.xx)");
        $('#mailing_email_main').css("border-color", "red");
        errors++;
    } else {
        $('#mailing_email_main_message').html("");
        $('#mailing_email_main').css("border-color", "#ced4da");
    }
    let action = "add_new_mailing";

    let data = new FormData();
    data.append("action", action);
    data.append("email", email);
    if (typeof login !== "undefined") {
        data.append("login", login);
    }
    if (errors == 0) {
        $.ajax({
            url: "./login/admin-panel/mailing/mailing.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#mailing_main").prop("disabled", true);

            },
            success: function (data) {
                if (data == "Подписка успешно оформлена.") {
                    $('#mailing_email_main_message').css("color", "green");
                    $('#mailing_email_main_message').html(data);
                    $("#mailing_main").prop("disabled", false);
                    /* location.reload()
                    return false;  */
                } else {
                    $('#mailing_email_main_message').css("color", "red");
                    $('#mailing_email_main_message').html(data);

                    $("#mailing_main").prop("disabled", false);
                }

            }
        })
    }

})