let post_img = document.getElementsByClassName('postImg');


for (let i = 0; i < post_img.length; i++){
    // let move_width = (post_img[i].width - post_img[i].height) / 2;
    let move_height = (post_img[i].height - post_img[i].width) / 2;
    if(post_img[i].width > post_img[i].height){
        post_img[i].style.height = "120px";
        post_img[i].style.marginLeft = ((post_img[i].height - post_img[i].width) / 2)+"px";
    } else{
        post_img[i].style.width = "120px";
        post_img[i].style.marginTop = ((post_img[i].width - post_img[i].height) / 2)+"px";
    }
}