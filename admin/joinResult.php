

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입 완료 페이지</title>
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
                    <source srcset="../assets/img/joinEnd01.png, ../assets/img/joinEnd01@2x.png 2x, ../assets/img/joinEnd01@3x.png 3x"/>
                    <img src="../assets/img/joinEnd01.png" alt="회원가입이미지">
                </picture>
                <p class="intro__text">
                회원가입을 축하 드립니다.<br>로그인해 주세요
                </p>
                
            </div>
            <!-- intro__inner -->
            <div class="join__inner bmStyle">
            <h2>가입 완료</h2>
            <div class="index">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li class="active" >3</li>
                </ul>
            </div>
            <div class="login__inner  mt50">
                <p>로그인을 하시면 게시글 및 댓글 작성이 가능합니다.
                <div class="login__form">
                    <form action="#" name="#" mmethod="post">
                        <fieldset>
                            <legend class="blind">로그인 영역</legend>
                            <div>
                                <label for="youEmail" class="blind required">이메일</label>
                                <input type="email" id="youEmail" name="youEmail" class="inputStyle" placeholder="이메일을 적어주세요" required>
                            </div>
                            <div>
                                <label for="youPass" class="blind required">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호 적어주세요" required>
                            </div>
                        </fieldset>
                        <button type="submit" class="btnStyle2 mt20">관리자 로그인</button>
                    </form>
                </div>
            </div>
            
        </div>
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- header -->
 
</body>
</html>