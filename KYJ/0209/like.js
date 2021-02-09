
    
$(document).ready(function (){
    
    $("#btn-like").each(function(idx, el) {
        let button = $(el)
        let heartShape = button.find(".heart")
        $.get("./process_like.php", {
            getLikedByCode: button.data("articleId")
        }, function(res) {
            //heartShape.text(res == "liked" ? "♥" : "♡")
            if(res=="liked"){
                
                heartShape.css("fill","rgb(237, 73, 86)");
                $("#empty_heart").addClass("heart_hide");
                $("#full_heart").removeClass("heart_hide");
                
            }else{
                
                heartShape.css("fill","");
                $("#empty_heart").removeClass("heart_hide");
                $("#full_heart").addClass("heart_hide");
                
            };
            //button.fadeIn(500)
        });
    });

    $("#btn-like").on("click", function(e) {
        let button = $(e.currentTarget || e.target);
        //var likeCount = button.find(".like-count")
        let heartShape = button.find(".heart");

        $.post("./process_like.php", {
            articleId: button.data("articleId")
        }, function(res) {
            console.log(res);
            // alert(res);
            
            //let addCount = (res == "like" ? 1 : res == "unlike" ? -1 : 0)
            //likeCount.text(+likeCount.text() + addCount)
            //heartShape.text(res == "like" ? "♥" : res == "unlike" ? "♡" : "♡")
            if(res=="like"){
                heartShape.css("fill","rgb(237, 73, 86)");
                $("#empty_heart").addClass("heart_hide");
                $("#full_heart").removeClass("heart_hide");
            }else if(res=="unlike"){
                heartShape.css("fill","");
                $("#empty_heart").removeClass("heart_hide");
                $("#full_heart").addClass("heart_hide");
            }
            else{
                heartShape.css("fill","");
                $("#empty_heart").removeClass("heart_hide");
                $("#full_heart").addClass("heart_hide");
            };
        });
    });
});
