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
                <?php
                    include "../connect/connect.php";
                    include "../connect/session.php";

                    $youEmail = $_POST['youEmail'];
                    $youPass = $_POST['youPass'];

                    // echo $youPass, $youEmail;
                    
                    // 데이터 출력
                    function msg($alert){
                        echo "<p class='intro__text'>$alert</p>";
                    }
                    // 유효성검사
                    $sql = "SELECT memberId, youEmail, youPass, youName from members where youEmail = '$youEmail' and youPass = '$youPass'";
                    $sql = "SELECT memberId, youEmail, youPass, youName from members where youEmail = '$youEmail' and youPass = '$youPass'";

                    $result = $connect ->query($sql);

                    if($result){
                        $count  = $result -> num_rows;
                        if($count ==0){
                            msg("이메일 또는 비밀번호가 틀렸습니다. 다시 한번 확인해주세요! <br><br><div class='intro__btn'><a href='../login/login.php'>로그인</a></div>" );
                        }else{
                            //로그인 성공
                            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                            
                            // echo "<pre>";
                            //     var_dump($memberInfo);
                            // echo "</pre>";

                            // 세션 생성
                            $_SESSION['memberID'] = $memberInfo['memberId'];
                            $_SESSION['youEmail'] = $memberInfo['youEmail'];
                            $_SESSION['youName'] = $memberInfo['youName'];

                            header("Location: ../main/main.php");
                        }
                    }
                ?>
                
            </div>
            <!-- intro__inner -->
            
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- header -->
 
</body>
</html>