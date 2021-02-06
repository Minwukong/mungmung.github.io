<script type="text/javascript">
(function(){
    let post_wrapper = document.getElementsByClassName("post_wrapper");
    let welcome = document.getElementsByClassName("welcome");
    // let post_wrapper = document.getElementById("post_wrapper");
    // let welcome = document.getElementById("welcome");

    let get_id = <?php echo json_encode($temp); ?>;

    if (get_id === true) {
        for (let i in post_wrapper){
            post_wrapper[i].style.display = "block";
            // post_wrapper[i].css("display","block");
        }
        for (let i in welcome){
            welcome[i].style.display = "none";
            // welcome[i].css("display","none");
        }
        // post_wrapper.style.display = "block";
        // welcome.style.display = "none";
    } else {
        for (let i in post_wrapper){
        post_wrapper[i].style.display = "none";
        // post_wrapper[i].css("display","none");
        }
        for (let i in welcome){
        welcome[i].style.display = "block";
        // welcome[i].css("display","block");
        }
        // post_wrapper.style.display = "none";
        // welcome.style.display = "block";
    }
});
</script>