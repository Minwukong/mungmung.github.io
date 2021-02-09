$(document).ready(function (){
    // $(".btn-like").each(function(idx, el) {
    //     var button = $(el)
    //     var heartShape = button.find(".heart-shape")
    //     $.get("./like_proc.php", {
    //         getLikedByCode: button.data("articleId")
    //     }, function(res) {
    //         heartShape.text(res == "liked" ? "♥" : "♡")
    //         button.fadeIn(500)
    //     })
        
        
    // })

    $("#btn-like").on("click", function(e) {
        let button = $(e.currentTarget || e.target);
        //var likeCount = button.find(".like-count")
        let heartShape = button.find(".heart");

        $.post("./process_like.php", {
            articleId: button.data("articleId")
        }, function(res) {
            console.log(res)
            //var addCount = (res == "like" ? 1 : res == "unlike" ? -1 : 0)
            //likeCount.text(+likeCount.text() + addCount)
            //heartShape.text(res == "like" ? "♥" : res == "unlike" ? "♡" : "♡")
            heartShape.css("fill","rgb(237, 73, 86)");
            $("#empty_heart").addClass("heart_hide");
            $("#full_heart").removeClass("heart_hide");
        })

    })

});