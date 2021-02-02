//-------------form1----------------------
let btn1 = $('#agreement_btn');

$(btn1).on('click',function(e){
    e.preventDefault();
    if($("#chk1_1").prop("checked") && $("#chk1_2").prop("checked") && $("#chk1_3").prop("checked")){
        $("#ol-step1").removeClass('on');
        $("#ol-step2").addClass('on');
        $(".content1").css("display","none");
        $(".content2").css("display","");
    }else{
        alert("모든 항목을 체크해라")
    }
});
//-------------------form2-------------------------
function generateYears($select){
    for(let i = 1970; i<=2010;i++){
        $select.append('<option value="'+i +'">'+i+'</option>');
    }
}
function generateMonths($select){
    for(let i = 1; i<=12;i++){
        $select.append('<option value="'+i +'">'+i+'</option>');
    }
}
function generateDays($select){
    for(let i = 1; i<=31;i++){
        $select.append('<option value="'+i +'">'+i+'</option>');
    }
}
generateYears($('#sel-birth-year'));
generateMonths($('#sel-birth-month'));
generateDays($('#sel-birth-day'));


function validateName(name) {
    let re = /^[가-힣]{2,15}$/;
    return re.test(name);
}
function validateId(id) {
    let re = /^[a-zA-Z0-9]{4,12}$/;
    return re.test(id);
}
function validatePassword(password) {
    let re = /^(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/;
    return re.test(password);
}
$('#selectEmail').change(function(){ 
    $("#selectEmail option:selected").each(function () {
         if($(this).val()== '1'){ //직접입력일 경우 
            $("#inp-email02").val(''); //값 초기화 
            $("#inp-email02").attr("disabled",false); //활성화 
        }else{ //직접입력이 아닐경우 
            $("#inp-email02").val($(this).text()); //선택값 입력 
            $("#inp-email02").attr("disabled",true); //비활성화 
        } 
    });
});
function validateEmail1(email1) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))$/;
    return re.test(email1);
}
function validateEmail2(email2) {
    var re = /^((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email2);
}
function validateTel(tel) {
    let re = /^[0-9]{4}$/;
    return re.test(tel);
}

$('#form-register').submit(function(e){
    e.preventDefault();

    var name = $('#inp-name').val();
    if(!name){
        alert("이름을 입력해주세요.")
        return;
    }
    if (!validateName(name)) {
        alert("이름이 잘못 되었습니다.")
        return;
    }

    var gender = $('input[name="gender"]:checked').val();
    if(!gender){
        alert("성별은 필수 체크 사항입니다.")
        return;
    }
    
    let id = $('#inp-id').val();
    if(!id){
        alert("아이디를 입력해주세요.")
        return;
    }
    if (!validateId(id)) {
        alert("아이디는 4~12자 문자열이여야 합니다.")
        return;
    }

    var password = $('#inp-password').val();
    if(!password){
        alert("비밀번호를 입력해주세요.")
        return;
    }
    if(!validatePassword(password)){
        alert('비밀번호는 대문자와 숫자가 포함된 최소 8자 문자열이여야 합니다.');
        return;
    }
    var confirm = $('#inp-confirm').val();
    if(password !== confirm){
        alert('비밀번호와 일치하지 않습니다.');
        return;
    }

    var email1 = $('#inp-email01').val();
    if(!email1){
        alert("이메일을 입력해주세요.")
        return;
    }
    if (!validateId(email1)) {
        alert("이메일이 잘못된 형식입니다.")
        return;
    }
    var email2 = $('#inp-email02').val();
    if(!email2){
        alert("이메일을 입력해주세요.")
        return;
    }
    if (!validateEmail2(email2)) {
        alert("이메일이 잘못된 형식입니다.")
        return;
    }

    var tel1 = $('#inp-tel1').val();
    if(!tel1){
        alert("핸드폰 번호를 입력해주세요.")
        return;
    }
    if (!validateTel(tel1)) {
        alert("잘못된 번호입니다.")
        return;
    }
    var tel2 = $('#inp-tel2').val();
    if(!tel2){
        alert("핸드폰 번호를 입력해주세요.")
        return;
    }
    if (!validateTel(tel2)) {
        alert("잘못된 번호입니다.")
        return;
    }

    $(this).unbind('submit').submit()
    //submit(email,password,gender,birth);
});
$('#btn-back').click(function(){
    document.location.href = 'register.html';
});