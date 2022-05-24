$("#search_form").on("change", "input[name=tag]", function(){
    $('#ssearch').html("").show();
    let tag = $('input[name="tag"]:checked').val();
    if (tag == "s-games") {
        $('#search').attr("placeholder","Найти игру...");
    } else if (tag == "s-news") {
        $('#search').attr("placeholder","Найти статью...");
    } else if (tag == "s-help") {
        $('#search').attr("placeholder","Найти тему...");
    }
    $('#search').val('');
});

$("#search").keyup(function () {
    let tag = $('input[name="tag"]:checked').val();
    let value = $("#search").val().trim();
    if (value === "") {

        if (tag == "s-games") {
            $("#ssearch_games").html("");
        } else if (tag == "s-news") {
            $("#ssearch_news").html("");
        } else if (tag == "s-help") {
            $("#ssearch_help").html("");
        }

    } else {
        let data = new FormData();
        data.append("search_tag", tag);
        data.append("search_value", value);
        
            $.ajax({
                type: 'POST',
                url: './search.php',
                data: data,
                processData: false,
                contentType: false,
                dataType: "text",
                beforeSend: function () {

                },
                success: function (data) {
                    if(data){
                        $('#ssearch').html(data).show();
                    }else{
                        $('#ssearch').html("Ничего не найдено...").show();
                    }
                },
            });
    }
});