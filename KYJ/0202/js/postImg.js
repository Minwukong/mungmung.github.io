// function deleteCookie(name) {
//     document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
//   }
  
//   deleteCookie('pop');

(function(){
    let post_img = document.getElementsByClassName('postImg');

    for (let i = 0; i < post_img.length; i++){
        if(post_img[i].width > post_img[i].height){
            post_img[i].style.height = "120px";
            post_img[i].style.marginLeft = ((post_img[i].height - post_img[i].width) / 2)+"px";
            console.log(post_img[i].width, post_img[i].height);
        } else if(post_img[i].width < post_img[i].height){
            post_img[i].style.width = "120px";
            post_img[i].style.marginTop = ((post_img[i].width - post_img[i].height) / 2)+"px";
        } else{
            post_img[i].style.width = "120px";
        }
    }
})();