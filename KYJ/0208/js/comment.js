$(function(){
    $("#comm_btn").click(function(){
        $.ajax({
            url: "comment_create.php",
            type: "post",
            data: {
                "pnum": $(".pnum").val(),
                "dat_user": $(".dat_user").val(),
                "comm_con": $(".comm_con").val()
            },
            success: function(data){
                alert("댓글이 작성되었습니다.");
                location.reload();
            }
        });
    });

    $(".dat_del_btn").click(function(){
        $("$comm_modal_del").modal();
    });
});