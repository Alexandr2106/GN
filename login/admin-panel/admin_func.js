$('#add_new_article').click(function (event) {

    event.preventDefault();

    var errors = 0;
    let article_title = $('#article_title').val().trim();
    let prewie_text = $('#prewie_text').val().trim();
    let full_text = $('#full_text').val().trim();
    let article_img = $('#article_img').val().trim();
    let game_id = $("#game_id option:selected").val();
    let add_slider = $("#add_slider option:selected").val();
    let add_mailing = $("#add_mailing option:selected").val();

    if (article_title == "") {
        $('#article_title').css("border-color", "red");
        errors++;
    } else {
        $('#article_title').css("border-color", "");
    }
    if (prewie_text == "") {
        $('#prewie_text').css("border-color", "red");
        errors++;
    } else {
        $('#prewie_text').css("border-color", "");
    }
    if (full_text == "") {
        $('#full_text').css("border-color", "red");
        errors++;
    } else {
        $('#full_text').css("border-color", "");
    }
    if (article_img == "") {
        $('#article_img').css("border-color", "red");
        errors++;
    } else {
        $('#article_img').css("border-color", "");
    }

    if (errors == 0) {

        let data = new FormData();
        data.append('action', 'add_new_article');
        data.append('article_title', article_title);
        data.append('prewie_text', prewie_text);
        data.append('full_text', full_text);
        data.append('article_img', article_img);
        data.append('game_id', game_id);
        data.append('add_slider', add_slider);
        data.append('add_mailing', add_mailing);

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#add_new_article").prop("disabled", true);

            },
            success: function (data) {
                if (data == "Статья успешно добавленна.") {
                    $('#add_article_message').css("color", "green");
                    $('#add_article_message').html(data);
                    $('#add_article_form').each(function () {
                        this.reset();
                    });
                    Modal.close();
                    $("#add_new_article").prop("disabled", false);
                    /* location.reload()
                    return false; */
                } else {
                    $('#add_article_message').css("color", "red");
                    $('#add_article_message').html(data);
                    Modal.close()
                    $("#add_new_article").prop("disabled", false);
                }

            }
        })
    }
});


$('#add_new_game').click(function (event) {

    event.preventDefault();

    var errors = 0;
    let game_name = $('#game_name').val().trim();
    let game_image = $('#game_image').val().trim();
    let description = $('#description').val().trim();
    let platform = $('#platform').val().trim();
    let genre = $("#genre").val().trim();
    let release_date = $("#release_date").val().trim();

    if ($('#toggleSteam').is(":checked")) {
        var Steam_price = $(`#Steam-price`).val().trim();
        var Steam_link = $(`#Steam-link`).val().trim();

        if (Steam_price == "") {
            $('#Steam-price').css("border-color", "red");
            errors++;
        } else {
            $('#Steam-price').css("border-color", "");
        }
        if (Steam_link == "") {
            $('#Steam-link').css("border-color", "red");
            errors++;
        } else {
            $('#Steam-link').css("border-color", "");
        }
    } else {
        var Steam_price = "NULL";
        var Steam_link = "NULL";
    }

    if ($('#toggleGabeStore').is(":checked")) {
        var GabeStore_price = $(`#GabeStore-price`).val().trim();
        var GabeStore_link = $(`#GabeStore-link`).val().trim();

        if (GabeStore_price == "") {
            $('#GabeStore-price').css("border-color", "red");
            errors++;
        } else {
            $('#GabeStore-price').css("border-color", "");
        }
        if (GabeStore_link == "") {
            $('#GabeStore-link').css("border-color", "red");
            errors++;
        } else {
            $('#GabeStore-link').css("border-color", "");
        }
    } else {
        var GabeStore_price = "NULL";
        var GabeStore_link = "NULL";
    }

    if ($('#toggleEpicGames').is(":checked")) {
        var EpicGames_price = $(`#EpicGames-price`).val().trim();
        var EpicGames_link = $(`#EpicGames-link`).val().trim();

        if (EpicGames_price == "") {
            $('#EpicGames-price').css("border-color", "red");
            errors++;
        } else {
            $('#EpicGames-price').css("border-color", "");
        }
        if (EpicGames_link == "") {
            $('#EpicGames-link').css("border-color", "red");
            errors++;
        } else {
            $('#EpicGames-link').css("border-color", "");
        }
    } else {
        var EpicGames_price = "NULL";
        var EpicGames_link = "NULL";
    }

    if ($('#toggleSteamPay').is(":checked")) {
        var SteamPay_price = $(`#SteamPay-price`).val().trim();
        var SteamPay_link = $(`#SteamPay-link`).val().trim();

        if (SteamPay_price == "") {
            $('#SteamPay-price').css("border-color", "red");
            errors++;
        } else {
            $('#SteamPay-price').css("border-color", "");
        }
        if (SteamPay_link == "") {
            $('#SteamPay-link').css("border-color", "red");
            errors++;
        } else {
            $('#SteamPay-link').css("border-color", "");
        }
    } else {
        var SteamPay_price = "NULL";
        var SteamPay_link = "NULL";
    }

    if ($('#toggleSous-Buy').is(":checked")) {
        var Sous_Buy_price = $(`#Sous-Buy-price`).val().trim();
        var Sous_Buy_link = $(`#Sous-Buy-link`).val().trim();

        if (Sous_Buy_price == "") {
            $('#Sous-Buy-price').css("border-color", "red");
            errors++;
        } else {
            $('#Sous-Buy-price').css("border-color", "");
        }
        if (Sous_Buy_link == "") {
            $('#Sous-Buy-link').css("border-color", "red");
            errors++;
        } else {
            $('#Sous-Buy-link').css("border-color", "");
        }
    } else {
        var Sous_Buy_price = "NULL";
        var Sous_Buy_link = "NULL";
    }

    if ($('#toggleZaka-Zaka').is(":checked")) {
        var Zaka_Zaka_price = $(`#Zaka-Zaka-price`).val().trim();
        var Zaka_Zaka_link = $(`#Zaka-Zaka-link`).val().trim();

        if (Zaka_Zaka_price == "") {
            $('#Zaka-Zaka-price').css("border-color", "red");
            errors++;
        } else {
            $('#Zaka-Zaka-price').css("border-color", "");
        }
        if (Zaka_Zaka_link == "") {
            $('#Zaka-Zaka-link').css("border-color", "red");
            errors++;
        } else {
            $('#Zaka-Zaka-link').css("border-color", "");
        }
    } else {
        var Zaka_Zaka_price = "NULL";
        var Zaka_Zaka_link = "NULL";
    }



    if (game_name == "") {
        $('#game_name').css("border-color", "red");
        errors++;
    } else {
        $('#game_name').css("border-color", "");
    }
    if (game_image == "") {
        $('#game_image').css("border-color", "red");
        errors++;
    } else {
        $('#game_image').css("border-color", "");
    }
    if (description == "") {
        $('#description').css("border-color", "red");
        errors++;
    } else {
        $('#description').css("border-color", "");
    }
    if (platform == "") {
        $('#platform').css("border-color", "red");
        errors++;
    } else {
        $('#platform').css("border-color", "");
    }
    if (genre == "") {
        $('#genre').css("border-color", "red");
        errors++;
    } else {
        $('#genre').css("border-color", "");
    }
    if (release_date == "") {
        $('#release_date').css("border-color", "red");
        errors++;
    } else {
        $('#release_date').css("border-color", "");
    }

    if (errors == 0) {

        let data = new FormData();
        data.append('action', 'add_new_game');
        data.append('game_name', game_name);
        data.append('game_image', game_image);
        data.append('description', description);
        data.append('platform', platform);
        data.append('genre', genre);
        data.append('release_date', release_date);

        data.append('Steam_price', Steam_price);
        data.append('Steam_link', Steam_link);

        data.append('GabeStore_price', GabeStore_price);
        data.append('GabeStore_link', GabeStore_link);

        data.append('EpicGames_price', EpicGames_price);
        data.append('EpicGames_link', EpicGames_link);

        data.append('SteamPay_price', SteamPay_price);
        data.append('SteamPay_link', SteamPay_link);

        data.append('Sous_Buy_price', Sous_Buy_price);
        data.append('Sous_Buy_link', Sous_Buy_link);

        data.append('Zaka_Zaka_price', Zaka_Zaka_price);
        data.append('Zaka_Zaka_link', Zaka_Zaka_link);


        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#add_new_game").prop("disabled", true);

            },
            success: function (data) {
                if (data == "Игра успешно добавленна.") {
                    $('#add_game_message').css("color", "green");
                    $('#add_game_message').html(data);
                    $('#add_game_form').each(function () {
                        this.reset();
                    });
                    ModalTwo.close();
                    $("#add_new_game").prop("disabled", false);
                    /* location.reload()
                    return false; */
                } else {
                    $('#add_game_message').css("color", "red");
                    $('#add_game_message').html(data);
                    ModalTwo.close()
                    $("#add_new_game").prop("disabled", false);
                }

            }
        })
    }
})

function delete_game(game_id, game_name, $page) {

    let confirmation = confirm(`Вы действительно хоите удалить "${game_name}"?`);

    if (confirmation == true) {

        let data = new FormData();
        data.append('action', 'delete_game');
        data.append('game_id', game_id);
        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {
                $(".delete-game").prop("disabled", true);
            },
            success: function (data) {
                if ($page == 0) {
                    if (!data) {
                        alert(`Ошибка, данные не полученны`);
                    } else {
                        alert(data);
                    }
                    location.reload();
                    return false;
                } else {
                    if (!data) {
                        alert(`Ошибка, данные не полученны`);
                    } else {
                        alert(data);
                        window.history.back();
                    }
                }
            }
        })
    }
}

function delete_article(article_id, title, page) {

    let confirmation = confirm(`Вы действительно хоите удалить "${title}"?`);

    if (confirmation == true) {

        let data = new FormData();
        data.append('action', 'delete_article');
        data.append('article_id', article_id);
        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {
                $(".delete-article").prop("disabled", true);
            },
            success: function (data) {
                if (page == 0) {
                    if (!data) {
                        alert(`Ошибка, данные не полученны`);
                    } else {
                        alert(data);
                    }
                    location.reload();
                    return false;
                } else {
                    if (!data) {
                        alert(`Ошибка, данные не полученны`);
                    } else {
                        alert(data);
                    }
                    window.history.back();
                }

            }
        })
    }
}

function edit_article_by_id(article_id) {


    var errors = 0;
    let edit_article_title = $(`#edit_article_title${article_id}`).val().trim();
    let edit_prewie_text = $(`#edit_prewie_text${article_id}`).val().trim();
    let edit_full_text = $(`#edit_full_text${article_id}`).val().trim();
    let edit_article_img = $(`#edit_article_img${article_id}`).val().trim();
    let edit_game_id = $(`#edit_game_id${article_id} option:selected`).val();
    let edit_slider = $(`#edit_slider${article_id} option:selected`).val();
    let edit_mailing = $(`#edit_mailing${article_id} option:selected`).val();

    if (edit_article_title == "") {
        $(`#edit_article_title${article_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_article_title${article_id}`).css("border-color", "");
    }
    if (edit_prewie_text == "") {
        $(`#edit_prewie_text${article_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_prewie_text${article_id}`).css("border-color", "");
    }
    if (edit_full_text == "") {
        $(`#edit_full_text${article_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_full_text${article_id}`).css("border-color", "");
    }
    if (edit_article_img == "") {
        $(`#edit_article_img${article_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_article_img${article_id}`).css("border-color", "");
    }

    if (errors == 0) {

        let data = new FormData();
        data.append('action', 'edit_article');
        data.append('article_id', article_id);
        data.append('edit_article_title', edit_article_title);
        data.append('edit_prewie_text', edit_prewie_text);
        data.append('edit_full_text', edit_full_text);
        data.append('edit_article_img', edit_article_img);
        data.append('edit_game_id', edit_game_id);
        data.append('edit_slider', edit_slider);
        data.append('edit_mailing', edit_mailing);

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $(`#edit_article${article_id}`).prop("disabled", true);

            },
            success: function (data) {
                if (data == "Статья успешно изменена.") {
                    $(`#edit_article_message${article_id}`).css("color", "green");
                    $(`#edit_article_message${article_id}`).html(data);
                    location.reload()
                    return false;
                } else {
                    $(`#edit_article_message${article_id}`).css("color", "red");
                    $(`#edit_article_message${article_id}`).html(data);

                    $(`#edit_article${article_id}`).prop("disabled", false);
                }

            }
        })
    }
}


function edit_game_by_id(game_id) {


    var errors = 0;
    let edit_game_name = $(`#edit_game_name${game_id}`).val().trim();
    let edit_game_img = $(`#edit_game_img${game_id}`).val().trim();
    let edit_description = $(`#edit_description${game_id}`).val().trim();
    let edit_platform = $(`#edit_platform${game_id}`).val().trim();
    let edit_genre = $(`#edit_genre${game_id}`).val().trim();
    let edit_release_date = $(`#edit_release_date${game_id}`).val().trim();


    if ($(`#toggleSteam${game_id}`).is(":checked")) {
        var Steam_price = $(`#Steam-price${game_id}`).val().trim();
        var Steam_link = $(`#Steam-link${game_id}`).val().trim();

        if (Steam_price == "") {
            $(`#Steam-price${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#Steam-price${game_id}`).css("border-color", "");
        }
        if (Steam_link == "") {
            $(`#Steam-link${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#Steam-link${game_id}`).css("border-color", "");
        }
    } else {
        var Steam_price = "NULL";
        var Steam_link = "NULL";
    }

    if ($(`#toggleGabeStore${game_id}`).is(":checked")) {
        var GabeStore_price = $(`#GabeStore-price${game_id}`).val().trim();
        var GabeStore_link = $(`#GabeStore-link${game_id}`).val().trim();

        if (GabeStore_price == "") {
            $(`#GabeStore-price${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#GabeStore-price${game_id}`).css("border-color", "");
        }
        if (GabeStore_link == "") {
            $(`#GabeStore-link${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#GabeStore-link${game_id}`).css("border-color", "");
        }
    } else {
        var GabeStore_price = "NULL";
        var GabeStore_link = "NULL";
    }

    if ($(`#toggleEpicGames${game_id}`).is(":checked")) {
        var EpicGames_price = $(`#EpicGames-price${game_id}`).val().trim();
        var EpicGames_link = $(`#EpicGames-link${game_id}`).val().trim();

        if (EpicGames_price == "") {
            $(`#EpicGames-price${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#EpicGames-price${game_id}`).css("border-color", "");
        }
        if (EpicGames_link == "") {
            $(`#EpicGames-link${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#EpicGames-link${game_id}`).css("border-color", "");
        }
    } else {
        var EpicGames_price = "NULL";
        var EpicGames_link = "NULL";
    }

    if ($(`#toggleSteamPay${game_id}`).is(":checked")) {
        var SteamPay_price = $(`#SteamPay-price${game_id}`).val().trim();
        var SteamPay_link = $(`#SteamPay-link${game_id}`).val().trim();

        if (SteamPay_price == "") {
            $(`#SteamPay-price${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#SteamPay-price${game_id}`).css("border-color", "");
        }
        if (SteamPay_link == "") {
            $(`#SteamPay-link${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#SteamPay-link${game_id}`).css("border-color", "");
        }
    } else {
        var SteamPay_price = "NULL";
        var SteamPay_link = "NULL";
    }

    if ($(`#toggleSous-Buy${game_id}`).is(":checked")) {
        var Sous_Buy_price = $(`#Sous-Buy-price${game_id}`).val().trim();
        var Sous_Buy_link = $(`#Sous-Buy-link${game_id}`).val().trim();

        if (Sous_Buy_price == "") {
            $(`#Sous-Buy-price${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#Sous-Buy-price${game_id}`).css("border-color", "");
        }
        if (Sous_Buy_link == "") {
            $(`#Sous-Buy-link${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#Sous-Buy-link${game_id}`).css("border-color", "");
        }
    } else {
        var Sous_Buy_price = "NULL";
        var Sous_Buy_link = "NULL";
    }

    if ($(`#toggleZaka-Zaka${game_id}`).is(":checked")) {
        var Zaka_Zaka_price = $(`#Zaka-Zaka-price${game_id}`).val().trim();
        var Zaka_Zaka_link = $(`#Zaka-Zaka-link${game_id}`).val().trim();

        if (Zaka_Zaka_price == "") {
            $(`#Zaka-Zaka-price${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#Zaka-Zaka-price${game_id}`).css("border-color", "");
        }
        if (Zaka_Zaka_link == "") {
            $(`#Zaka-Zaka-link${game_id}`).css("border-color", "red");
            errors++;
        } else {
            $(`#Zaka-Zaka-link${game_id}`).css("border-color", "");
        }
    } else {
        var Zaka_Zaka_price = "NULL";
        var Zaka_Zaka_link = "NULL";
    }

    if (edit_game_name == "") {
        $(`#edit_game_name${game_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_game_name${game_id}`).css("border-color", "");
    }
    if (edit_game_img == "") {
        $(`#edit_game_img${game_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_game_img${game_id}`).css("border-color", "");
    }
    if (edit_description == "") {
        $(`#edit_description${game_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_description${game_id}`).css("border-color", "");
    }
    if (edit_platform == "") {
        $(`#edit_platform${game_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_platform${game_id}`).css("border-color", "");
    }
    if (edit_genre == "") {
        $(`#edit_genre${game_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_genre${game_id}`).css("border-color", "");
    }
    if (edit_release_date == "") {
        $(`#edit_release_date${game_id}`).css("border-color", "red");
        errors++;
    } else {
        $(`#edit_release_date${game_id}`).css("border-color", "");
    }




    if (errors == 0) {

        let data = new FormData();
        data.append('action', 'edit_game');
        data.append('game_id', game_id);
        data.append('edit_game_name', edit_game_name);
        data.append('edit_game_img', edit_game_img);
        data.append('edit_description', edit_description);
        data.append('edit_platform', edit_platform);
        data.append('edit_genre', edit_genre);
        data.append('edit_release_date', edit_release_date);

        data.append('Steam_price', Steam_price);
        data.append('Steam_link', Steam_link);

        data.append('GabeStore_price', GabeStore_price);
        data.append('GabeStore_link', GabeStore_link);

        data.append('EpicGames_price', EpicGames_price);
        data.append('EpicGames_link', EpicGames_link);

        data.append('SteamPay_price', SteamPay_price);
        data.append('SteamPay_link', SteamPay_link);

        data.append('Sous_Buy_price', Sous_Buy_price);
        data.append('Sous_Buy_link', Sous_Buy_link);

        data.append('Zaka_Zaka_price', Zaka_Zaka_price);
        data.append('Zaka_Zaka_link', Zaka_Zaka_link);

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#edit_game").prop("disabled", true);

            },
            success: function (data) {
                if (data == "Игра успешно изменена.") {

                    location.reload()
                    return false;
                } else {
                    $('#edit_game_message').css("color", "red");
                    $('#edit_game_message').html(data);

                    $("#edit_game").prop("disabled", false);
                }

            }
        })
    }
}

$('#send_mailing').click(function (event) {

    event.preventDefault();

    let confirmation = confirm(`Вы действительно хоите сделать недельную рассылку?`);

    if (confirmation == true) {

        let action = "SEND_MAILING";

        let data = new FormData();
        data.append('action', action);

        $.ajax({
            url: "./login/admin-panel/mailing/mailing.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#send_mailing").prop("disabled", true);
                $("#send_mailing_stay").html("Ожидайте, это процедура может занять некоторое время.");
                



            },
            success: function (data) {
                if (data == "Рассылка прошла успешно.") {
                    $('#send_mailing_messege').css("color", "green");
                    $('#send_mailing_messege').html(data);
                    ModalMailing.close();
                    $("#send_mailing").prop("disabled", false);
                    /* location.reload()
                    return false; */
                } else {
                    $('#send_mailing_messege').css("color", "red");
                    $('#send_mailing_messege').html(data);
                    ModalMailing.close()
                    $("#send_mailing").prop("disabled", false);
                }

            }
        })
    }



});