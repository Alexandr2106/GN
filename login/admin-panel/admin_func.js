$('#add_new_article').click(function(event) {

    event.preventDefault();

    var errors = 0;
    let article_title = $('#article_title').val().trim();
    let prewie_text = $('#prewie_text').val().trim();
    let full_text = $('#full_text').val().trim();
    let article_img = $('#article_img').val().trim();
    let game_id = $("#game_id option:selected").val();
    let add_slider = $("#add_slider option:selected").val();

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

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function() {

                $("#add_new_article").prop("disabled", true);

            },
            success: function(data) {
                if (data == "Статья успешно добавленна.") {
                    $('#add_article_message').css("color", "green");
                    $('#add_article_message').html(data);
                    $('#add_article_form').each(function() {
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


$('#add_new_game').click(function(event) {

    event.preventDefault();

    var errors = 0;
    let game_name = $('#game_name').val().trim();
    let game_image = $('#game_image').val().trim();
    let description = $('#description').val().trim();
    let platform = $('#platform').val().trim();
    let genre = $("#genre").val().trim();
    let release_date = $("#release_date").val().trim();


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

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function() {

                $("#add_new_game").prop("disabled", true);

            },
            success: function(data) {
                if (data == "Игра успешно добавленна.") {
                    $('#add_game_message').css("color", "green");
                    $('#add_game_message').html(data);
                    $('#add_game_form').each(function() {
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
    } else {
        console.log(errors);
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
            beforeSend: function() {
                $(".delete-game").prop("disabled", true);
            },
            success: function(data) {
                if ($page == 0) {
                    if (!data) {
                        alert(`Ошибка, данные не полученны`);
                    } else {
                        alert(data);
                    }
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

function delete_article(article_id, title) {

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
            beforeSend: function() {
                $(".delete-article").prop("disabled", true);
            },
            success: function(data) {
                if (!data) {
                    alert(`Ошибка, данные не полученны`);
                } else {
                    alert(data);
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
    let edit_game_id = $(`#edit_game_id${article_id}  option:selected`).val();
    let edit_slider = $(`#edit_slider${article_id}  option:selected`).val();

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

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function() {

                $("#edit_article").prop("disabled", true);

            },
            success: function(data) {
                if (data == "Статья успешно изменена.") {

                    location.reload()
                    return false;
                } else {
                    $('#edit_article_message').css("color", "red");
                    $('#edit_article_message').html(data);

                    $("#edit_article").prop("disabled", false);
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

        $.ajax({
            url: "./login/admin-panel/admin_func.php",
            type: "POST",
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function() {

                $("#edit_game").prop("disabled", true);

            },
            success: function(data) {
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