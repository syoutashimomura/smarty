$(function(){
    "use strict";

    $("#user").focus();

    //delete
    $("#todos").on("click", ".delete_todo", function(){
        //id取得
        var id = $(this).parents("tr").data("id");
        //ajax処理
        if (confirm("削除しますか？")) {
            $.post("_ajax.php", {
                id: id,
                mode: "delete"
            }, function(){
                $("#todo_" + id).fadeOut(800);
            });
        }
    });

});
