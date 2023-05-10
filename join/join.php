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
                <h2>회원가입</h2>
                <div class="join__form">
                    <form action="joinEnd.php" name="#" method="post">
                        <fieldset>
                            <legend class="blind">회원가입영역</legend>
                            <div>
                                <label for="youEmail" class="required">이메일</label>
                                <input type="text" id="youEmail" name="youEmail"class="inputStyle" placeholder="이메일을 적어주세요" required>
                            </div>
                            <div>
                                <label for="youName" class="required">이름</label>
                                <input type="text" id="youName" name="youName" class="inputStyle"placeholder="이름을 적어주세요" required>
                            </div>
                            <div>
                                <label for="youPass" class="required">비밀번호</label>
                                <input type="password" id="youPass" name="youPass"class="inputStyle" placeholder="비밀번호 적어주세요" required>
                            </div>
                            <div>
                                <label for="youPassC" class="required">비밀번호 확인</label>
                                <input type="password" id="youPassC" name="youPassC"class="inputStyle" placeholder="다시 ! 비밀번호 적어주세요" required>
                            </div>
                            <div>
                                <label for="youPhone" class="required">연락처</label>
                                <input type="text" id="youPhone" name="youPhone"class="inputStyle" placeholder="비밀번호 적어주세요" required >
                            </div>
                        </fieldset>
                        <button type="submit" class="btnStyle">회원가입 완료</button>
                    </form>
                </div>
            </div> 
            <!-- join__inner -->
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- header -->
</body>
</html>