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

//let idchecking = false;
function checkid(){
    let id = $('#inp-id').val();
    if(id){
        if (!validateId(id)) {
            alert("아이디는 4~12자 문자열이여야 합니다.")
            return;
        }
        url = "checkid.php?id="+id;
        window.open(url,"chkid","width=300,height=100");
        return;
    }
    //idchecking = true;
};
//console.log(idchecking);


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
    
    let birth_year = $('#sel-birth-year').val();
    let birth_month = $('#sel-birth-month').val();
    let birth_day = $('#sel-birth-day').val();
    if(!(birth_year && birth_month && birth_day)){
        alert("생년월일을 선택해주시기 바랍니다.")
        return;
    }

    let id = $('#inp-id').val();
    if(!id){
        alert("아이디를 입력해주세요.")
        return;
    }
    // if(!idchecking){
    //     alert("아이디 중복확인을 해주세요")
    //     return;
    // }
    // console.log(idchecking);
    // if (!validateId(id)) {
    //     alert("아이디는 4~12자 문자열이여야 합니다.")
    //     return;
    // }

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

    let addr = $('#sample6_detailAddress').val();
    if(!addr){
        alert('주소란을 입력해주세요.');
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

//---------------id중복 체크---------------
// function checkid(){
//     let id = $('#inp-id').val();
//     if(id){
//         if (!validateId(id)) {
//             alert("아이디는 4~12자 문자열이여야 합니다.")
//             return;
//         }
//         url = "checkid.php?id="+id;
//         window.open(url,"chkid","width=300,height=100");
//         return;
//     }
//     idchecking = true;
// };
// console.log(idchecking);
//-----------주소 API-------------
function sample6_execDaumPostcode() {
    new daum.Postcode({
        oncomplete: function(data) {
            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

            // 각 주소의 노출 규칙에 따라 주소를 조합한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수

            //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
            if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                addr = data.roadAddress;
            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                addr = data.jibunAddress;
            }

            // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
            if(data.userSelectedType === 'R'){
                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraAddr !== ''){
                    extraAddr = ' (' + extraAddr + ')';
                }
                // 조합된 참고항목을 해당 필드에 넣는다.
                document.getElementById("sample6_extraAddress").value = extraAddr;
            
            } else {
                document.getElementById("sample6_extraAddress").value = '';
            }
            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            document.getElementById('sample6_postcode').value = data.zonecode;
            document.getElementById("sample6_address").value = addr;
            // 커서를 상세주소 필드로 이동한다.
            document.getElementById("sample6_detailAddress").focus();
        }
    }).open();
}
