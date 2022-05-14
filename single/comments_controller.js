function add_new_comment(){
    let user_id = $("#user_id").val().trim();
    let article_id = $("#article_id").val().trim();
    let comment = $("#comment").val().trim();
    let error = 0;
    if(comment == ""){
        $("#comment_error").html("*Введите комментарий.");
        $("#comment").css("border-color","red");
        error++;
    }else{
        $("#comment_error").html("");
        $("#comment").css("border-color","#c3c3c3");
        if(error > 0){
            error--;
        }
    }
    if(error == 0){
        $.ajax({
            url: "./single/comments_controller.php",
            type: "POST",
            cache: false,
            data: {

                user_id: user_id,
                comment: comment,
                article_id: article_id,

            },
            beforeSend: function () {

                $("#com-btn").prop("disabled", true);

            },
            success: function (data) {
                

                if (!data) {
                    alert("Операция не выполнена, попробуйте позже.");
                }else if(data == "Комментарий добавлен"){
                    location.reload();
                    return false;
                }
            }
        })
    }
}