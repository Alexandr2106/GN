$('#add_new_post').click(function (event) {
    event.preventDefault();
    let errors = 0;
    let post_title = $('#post_title').val();
    let post_user = $('#post_user').val();
    let post_comment = $('#post_comment').val();


    if (post_title.length > 250 || post_title == "") {
        $('#post_title').css("border-color", "red");
        $('#post_title_message').css("color", "red");
        $('#post_title_message').html("*Заголовок не может содержать больше 250 символов или быть пустым");
        errors++;
    } else {
        $('#post_title').css("border-color", "");
        $('#post_title_message').css("color", "");
        $('#post_title_message').html("");
    }

    if (post_comment == "") {
        $('#post_comment').css("border-color", "red");
        errors++;
    } else {
        $('#post_comment').css("border-color", "");
    }


    let data = new FormData();
    data.append('post_title', post_title);
    data.append('post_comment', post_comment);
    data.append('post_user', post_user);

    for (let i = 0; ; i++) {
        if ($('#UploadFiles')[0].files[i] != undefined) {
            data.append(`files${i}`, $('#UploadFiles')[0].files[i]);
            console.log($('#UploadFiles')[0].files[i])
        } else if (i > 5) {
            $('#images_message').css("color", "red");
            $('#images_message').html("*Превышенно максимальной кол-во изображений (5).");
            errors++;
            break;
        } else {
            $('#images_message').css("color", "");
            $('#images_message').html("");
            break;
        }

    }
    console.log(errors);
    if (errors == 0) {
        $.ajax({
            type: 'POST',
            url: './help/forum_func.php',
            data: data,
            processData: false,
            contentType: false,
            dataType: "text",
            beforeSend: function () {

                $("#add_new_post").prop("disabled", true);

            },
            success: function (data) {
                if (data == "success") {
                    $('#add_new_post_message').css("color", "green");
                    $('#add_new_post_message').html("Вопрос отправлен на проверку администратору.");
                    location.reload();
                    return false;
                } else {
                    $('#add_new_post_message').css("color", "red");
                    $('#add_new_post_message').html("*Что-то пошло не так, попробуйте повторить позднее.");
                    $("#add_new_post").prop("disabled", false);
                }

            },
        });
    }
});
