<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 관리자 회원가입 페이지</title>
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
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>
                <div class="join__agree bmStyle">
                    <div>
                        <h3 class="blind">웹쓰 블로그 이용약관</h3>
                        <div class="scroll">
                            제1조 (목적)<br>
                            본 약관은 [회사명] (이하 "회사"라 함)이 제공하는 모든 서비스(이하 "서비스"라 함)의 이용 조건과 절차, 회사와 회원 간의 권리, 의무 및 책임사항 등을 규정하는 것을 목적으로 합니다.<br><br>
                            제2조 (용어의 정의)<br>
                            본 약관에서 사용하는 용어의 정의는 다음과 같습니다.<br>
                            "서비스"라 함은 회사가 제공하는 모든 서비스를 의미합니다.<br>
                            "회원"이라 함은 회사와 서비스 이용계약을 체결하고 회사가 제공하는 서비스를 이용하는 개인 또는 법인을 말합니다.<br>
                            "아이디(ID)"라 함은 회원의 식별과 회원의 서비스 이용을 위하여 회원이 정하고 회사가 승인하는 문자와 숫자의 조합을 말합니다.<br>
                            "비밀번호"라 함은 회원이 부여 받은 아이디와 일치된 회원임을 확인하고 회원의 개인정보를 보호하기 위하여 회원 자신이 정한 문자와 숫자의 조합을 말합니다.<br>
                            "게시물"이라 함은 회원이 서비스를 이용함에 있어 회사에 제공한 모든 정보나 자료를 말합니다.<br><br>
                            제3조 (약관의 효력 및 변경)<br>
                            본 약관은 서비스를 이용하는 모든 회원에게 적용됩니다.<br>
                            회사는 합리적인 사유가 있을 경우 언제든지 본 약관을 변경할 수 있으며, 변경된 약관은 회사가 제공하는 웹사이트 내의 적절한 장소에 게시하여 효력이 발생됩니다.<br>
                            회원은 변경된 약관에 동의하지 않을 경우 회원탈퇴를 선택할 수 있습니다.<br><br>
                            제4조 (서비스의 제공 및 변경)<br>
                            회사는 회원에게 안정적인 서비스 제공을 위하여 최선의 노력을 다합니다.<br>
                            회사는 서비스를 변경, 중단, 추가할 수 있으며, 이에 대한 사전 공지 및 설명을 제공할 수 있습니다.<br>
                        </div>
                        <div class="check">
                            <input type="checkbox" id="agreeCheck1" class="agreeCheck">
                            <label for="agreeCheck1">블로그 이용약관에 동의합니다.</label>
                        </div>
                    </div>
                    <div class="mt60">
                        <h3 class="blind">개인정보 수집 및 이용안내</h3>
                        <div class="scroll">
                            수집하는 개인정보의 항목 및 수집방법<br>
                            수집항목 : 이름, 연락처(이메일 주소, 전화번호), 주소, 결제 정보 등<br>
                            수집방법 : 홈페이지, 모바일 앱, 이메일, 이벤트 응모, 상담 게시판 등<br><br>
                            개인정보의 수집 및 이용 목적<br>
                            회사는 수집한 개인정보를 다음의 목적을 위해 이용합니다.<br>
                            서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 요금 정산<br>
                            회원 관리<br>
                            불만처리 등 민원처리<br>
                            마케팅 및 광고에 활용<br>
                            기타 서비스 이용에 따른 문의사항 또는 불만 처리<br><br>
                            개인정보의 보유 및 이용기간<br>
                            회사는 회원탈퇴 시 또는 수집한 개인정보의 이용목적이 달성되거나 보유기간이 종료한 경우 해당 정보를 지체 없이 파기합니다. 단, 다음의 경우에는 아래의 이유에 따라 보존합니다.<br>
                            관련 법령에 따라 보존하여야 하는 경우 : 상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령에 따라 일정 기간 보존하여야 하는 경우에는 해당 기간 동안 보존합니다.<br>
                            회사 내부 방침에 의한 보존필요성이 있는 경우 : 고객 상담 및 민원처리 등에 필요한 경우에는 해당 정보를 보존합니다.<br>
                            개인정보의 파기절차 및 방법<br>
                            회사는 수집한 개인정보의 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 파기절차 및 방법은 다음과 같습니다.<br>
                            파기절차<br>
                            회사는 파기 사유가 발생한 개인정보를 선정하고, 회사의 개인정보 보호책임자의 승인을 받아 개인정보를 파기합니다.
                            수집하는 개인정보의 항목 및 수집방법<br>
                            수집항목 : 이름, 연락처(이메일 주소, 전화번호), 주소, 결제 정보 등<br>
                            수집방법 : 홈페이지, 모바일 앱, 이메일, 이벤트 응모, 상담 게시판 등<br><br>
                            개인정보의 수집 및 이용 목적<br>
                            회사는 수집한 개인정보를 다음의 목적을 위해 이용합니다.<br>
                            서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 요금 정산<br>
                            회원 관리<br>
                            불만처리 등 민원처리<br>
                            마케팅 및 광고에 활용<br>
                            기타 서비스 이용에 따른 문의사항 또는 불만 처리<br><br>
                            개인정보의 보유 및 이용기간<br>
                            회사는 회원탈퇴 시 또는 수집한 개인정보의 이용목적이 달성되거나 보유기간이 종료한 경우 해당 정보를 지체 없이 파기합니다. 단, 다음의 경우에는 아래의 이유에 따라 보존합니다.<br>
                            관련 법령에 따라 보존하여야 하는 경우 : 상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령에 따라 일정 기간 보존하여야 하는 경우에는 해당 기간 동안 보존합니다.<br>
                            회사 내부 방침에 의한 보존필요성이 있는 경우 : 고객 상담 및 민원처리 등에 필요한 경우에는 해당 정보를 보존합니다.<br>
                            개인정보의 파기절차 및 방법<br>
                            회사는 수집한 개인정보의 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 파기절차 및 방법은 다음과 같습니다.<br>
                            파기절차<br>
                            회사는 파기 사유가 발생한 개인정보를 선정하고, 회사의 개인정보 보호책임자의 승인을 받아 개인정보를 파기합니다.
                        </div>
                        <div class="check">
                            <input type="checkbox" id="agreeCheck2" class="agreeCheck">
                            <label for="agreeCheck2">개인정보 수집 및 이용에 동의합니다. </label>
                        </div>
                    </div>
                    <diuv>
                        <p class="agreeMsg">　</p>
                        <a href="joinSave.php" class="agreeBtn">동의</a>
                    </diuv>
                </div>
            </div>
            <!-- join__inner -->
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- header -->
    <script>
        // 체크 검사
        const agree = document.querySelector(".agreeBtn");
        const agreeCheck = document.querySelectorAll(".agreeCheck");
        const agreeMsg = document.querySelector(".agreeMsg");

        agree.addEventListener("click", (e)=>{
            agreeCheck.forEach((check)=>{
                if(check.checked == false){
                    agreeMsg.innerText = "체크박스를 다시 한번 확인해주세요.";
                    e.preventDefault();
                }
            })
        });
    </script>
</body>
</html>