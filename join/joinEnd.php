

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
                    <?php
                        include "../connect/connect.php";
                        $youEmail = $_POST["youEmail"];
                        $youName = $_POST["youName"];
                        $youPass = $_POST["youPass"];
                        $youPassC = $_POST["youPassC"];
                        $youPhone = $_POST["youPhone"];
                        $regTime = time();
                        // echo $youEmail, $youName, $youPass, $youPhone;
                        // $sql = "INSERT INTO members(youEmail, youName, youPass, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";
                        // $connect -> query($sql);

                        //메시지출력
                        function msg($alert){
                            echo "<p class='intro__text'>$alert</p>";
                        }
                        //이메일 유효성검사
                        $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/",$youEmail);
                        if($check_mail == false){
                            msg("이메일이 잘못됨 올바른 이메일 작성해주세요");
                            
                            exit;
                        }
                        //이름 유효성검사
                        $check_name = preg_match("/^[가-힣]{9,15}$/",$youName);
                        if($check_name == false){
                            msg("이름은 한글로 3-5 글자만 가능합니다.");
                            exit;
                        }
                        //비밀번호 유효성 검사
                        if($youPass !==$youPassC){
                            msg("비밀번호가 일치하지 않습니다. 다시한번 확인해 주세요");
                            exit;
                        }
                        // $youPass = sha1($youPass);   //암호화
                        //휴대폰 번호 유효성 검사
                        $check_number = preg_match("/(010|011|016|017|018|019)-[0-9]{4}-[0-9]{4}$/" ,$youPhone);
                        if($check_number == false){
                            msg("번호가 정확하지 않습니다. 올바른번호 (000-0000-0000) 형식으로 작성해 주세요");
                            exit;

                        }
                        // 이메일 중복검사
                        
                        $isEmailCheck = false;
                        $sql = "SELECT youEmail FROM members WHERE youEmail = '$youEmail'";
                        $result = $connect -> query($sql);
                        if($result){
                            $count = $result -> num_rows;
                            if($count ==0){
                                $isEmailCheck = true;
                            }else{
                                msg("이미 회원가입이 되어 있는 이메일입니다. 로그인해주세요");
                                exit;
                            }
                        }else{
                            msg("에러발생1111");
                        }


                        $isPhoneCheck = false;
                        $sql = "SELECT youPhone FROM members WHERE youPhone = '$youPhone'";
                        $result = $connect -> query($sql);
                        if($result){
                            $count = $result -> num_rows;
                            if($count ==0){
                                $isPhoneCheck = true;
                            }else{
                                msg("이미 회원가입이 되어 있는 번호입니다. 로그인해주세요");
                                exit;
                            }
                        }else{
                            msg("에러발생2222");
                            exit;
                        }
                        // 입력
                        
                        if($isEmailCheck ==true && $isPhoneCheck ==true){
                            $sql = "INSERT INTO members(youEmail, youName, youPass, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";
                            $result = $connect -> query($sql);
                            if($result){
                                msg("회원가입을 축하합니다 ! 로그인 해주세요 ! <br><div class='intro__btn'><a href='../login/login.php'>로그인</a></div> ");
                                
                            }else{
                                msg("에러발생333333");
                                exit;
                            }
                        }else { 
                            msg("이미 회원가입 되어 있습니다. 로그인해주세요");
                            exit;
                        }
                        
                    ?> 
                </p>
                
            </div>
            <!-- intro__inner -->
            
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>
    <!-- header -->
 
</body>
</html>