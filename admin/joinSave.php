<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 회원가입 페이지</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    <?php include "../include/header.php" ?>
    <!-- header -->
    <main id="main " class="container">
            <div class="intro__inner bmStyle center">
                <picture class="intro__images">
                    <source srcset="../assets/img/join01.png, ../assets/img/join01@2x.png 2x, ../assets/img/join01@3x.png 3x"/>
                    <img src="../assets/img/join01.png" alt="회원가입이미지">
                </picture>
                <p class="intro__text">
                    회원가입을 해주시면 다양한 정보를 자유롭게 볼수 있습니다.
                </p>
            </div>
            <!-- intro__inner -->
            <div class="join__inner">
                <h2>이용약관</h2>
                <div class="index">
                    <ul>
                        <li>1</li>
                        <li class="active">2</li>
                        <li>3</li>
                    </ul>
                </div>
                <div class="join__inner bmStyle">
                    <h2>회원가입</h2>
                    <div class="join__form">
                        <form action="joinResult.php" name="joinResult" method="post" onsubmit="return joinChecks()">
                            <fieldset>
                                <legend class="blind">회원가입영역</legend>
                                <div>
                                    <label for="youName" class="required">이름</label>
                                    <input type="text" id="youName" name="youName" class="inputStyle" maxlength="5"  placeholder="이름을 적어주세요" required>
                                    <p class="msg" id="youNameComment"></p><!-- 이름은 한글로만 작성할 수 있습니다. -->
                                    
                                </div>
                                <div class="over">
                                    <label for="youEmail" class="required">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" class="inputStyle"  placeholder="이메일을 적어주세요" required>
                                    <a href="#a" class="youCheck btnStyle2" onclick='emailChecking()'>이메일 중복검사</a>
                                    <p class="msg" id="youEmailComment"></p><!-- 이메일이 존재합니다. -->
                                </div>
                                <div class="over">
                                    <label for="youNick" class="required">닉네임</label>
                                    <input type="text" id="youNick" name="youNick" class="inputStyle"  placeholder="닉네임을 적어주세요" required>
                                    <a href="#a" class="youCheck btnStyle2">닉네임 중복검사</a>
                                    <p class="msg" id="youNickComment"></p> <!--닉네임이 존재합니다. -->
                                </div>
                                <div>
                                    <label for="youPass" class="required">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" class="inputStyle"  placeholder="비밀번호 적어주세요" required>
                                    <p class="msg" id="youPassComment"></p><!-- 비밀번호, 특수기호, 숫자가 들어가야합니다. -->
                                </div>
                                <div>
                                    <label for="youPassC" class="required">비밀번호 확인</label>
                                    <input type="password" id="youPassC" name="youPassC" class="inputStyle"  placeholder="다시 ! 비밀번호 적어주세요" required>
                                    <p class="msg" id="youPassCComment"></p><!-- 비밀번호가 일치하지 않습니다. -->
                                    
                                </div>
                                <div>
                                    <label for="youBirth">생년월일</label>
                                    <input type="text" id="youBirth" name="youBirth" class="inputStyle"  placeholder="YYYY-MM-DD" maxlength="15" required>
                                    <p class="msg" id="youBirthComment"></p><!-- 생년월일을 양식에 맞게 적어주세요. -->
                                </div>
                                <div>
                                    <label for="youPhone">연락처</label>
                                    <input type="text" id="youPhone" name="youPhone" class="inputStyle"  placeholder="연락처를 적어주세요" required>
                                    <p class="msg" id="youPhoneComment"></p><!-- 연락처를 입력해 주세요 -->
                                </div>
                            </fieldset>
                            <button type="submit" class="btnStyle">회원가입 완료</button>
                        </form>
                    </div>
                </div> 
            </div>
            <!-- join__inner -->
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- header -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>

        let isEmailCheck = false;

        function emailChecking(){
            let youEmail = $("#youEmail").val();
            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("* 이메일을 입력해주세요");
            }else {
                $.ajax({
                    type : "POST",
                    url : "joinCheck.php",
                    data : {"youEmail" : youEmail, "type" : "isEmailCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("* 사용 가능한 이메일 입니다");
                            isEmailCheck = true;
                        }else {
                            $("#youEmailComment").text("* 이미 존재하는 이메일 입니다");
                            isEmailCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }

        function joinChecks(){
            // 이름 유효성 체크
            if($("#youName").val() == ''){
                $("#youName").val('');
                $("#youName").focus();
                $("#youNameComment").text(" * 이름을 입력해 주세요");
                return false;
            }
            let getYouName = RegExp(/^[가-힣]+$/);
            if(!getYouName.test($("#youName").val())){
                $("#youName").val('');
                $("#youName").focus();
                $("#youNameComment").text(" * 이름은 한글로만 입력해 주세요");

                return false;
            }
            $("#youNameComment").text("");

            // 이멜
            if($("#youEmail").val() == ''){
                $("#youEmail").focus();
                $("#youEmailComment").text(" * 이메일을 입력해 주세요");
                return false;
            }
            let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i);
            if(!getYouEmail.test($("#youEmail").val())){
                $("#youEmail").focus();
                $("#youEmailComment").text(" * 이메일을 형식에 맞게 작성해줘");
                $("#youEmail").val('');

                return false;
            }
            // 닉넴
            if($("#youNick").val() == ''){
                $("#youNick").focus();
                $("#youNickComment").text(" * 닉네임을 입력해 주세요");
                return false;
            }
            let getyouNick = RegExp(/^[가-힣|0-9]+$/);
            if(!getyouNick.test($("#youNick").val())){
                alert($("#youNick").val());
                $("#youNick").focus();
                $("#youNickComment").text(" * 닉네임은 한글 또는 숫자만 사용 가능합니다.");
                $("#youNick").val('');
                return false;
            }
            // 비밀번호 유효성 검사
            if($("#youPass").val() == ''){
                $("#youPass").focus();
                $("#youPassComment").text(" * 비밀번호를 입력해 주세요");
                return false;
            }
            // 8~20자 이내, 공백x , 영문, 숫자, 특문
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#youPass").focus();
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#youPass").focus();
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                $("#youPass").focus();
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }

            // 비밀번호 확인 유효성 검사
             if($("#youPassC").val() == ''){
                $("#youPassC").focus();
                $("#youPassCComment").text(" * 확인 비밀번호를 입력해 주세요");
                return false;
            }
            //비밀번호 동일한지 확인
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text(" * 비밀번호가 일치하지않습니다");
                return false;
            }

            // 생년월일유효성검사
            if($("#youBirth").val() == ''){
                $("#youBirth").focus();
                $("#youBirthComment").text(" * 확인 생년월일을 입력해 주세요");
                return false;
            }
            let getYouBirth = RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])+$/);
            if(!getyouBirth.test($("#youBirth").val())){
                alert("birth");
                $("#youBirth").focus();
                $("#youBirthComment").text(" * 생년월일이 정확하지 않습니다. (YYYY-MM-DD)");
                $("#youBirth").val('');
                return false;
            }

            // 연락처 유효성 검사 
            if($("#YouPhone").val() == ''){
                $("#YouPhone").focus();
                $("#YouPhoneComment").text(" * 확인 연락처를 입력해 주세요");
                return false;
            }
            let getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getYouPhone.test($("#YouPhone").val())){
                alert("phone");
                $("#YouPhone").focus();
                $("#YouPhoneComment").text(" * 휴대폰 번호가 정확하지 않습니다. (000-0000-0000)");
                $("#YouPhone").val('');
                return false;
            }
        }   
    </script>
</body>
</html>