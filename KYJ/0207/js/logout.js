function logout(){
    const data = confirm("로그아웃 하시겠습니까?");
    if(data){
        location.href = "process_logout.php";
    }
}