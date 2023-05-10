<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionChk.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main"  class="container">
        <div class="intro__inner bmStyle  center">
            <picture class="intro__images small">
                <!-- ../assets/img/intro01.png -->
                <source srcset="/assets/img/board01.png, assets/img/board01@2x.png 2x, assets/img/board01@3x.png 3x"/>
                <img src="assets/img/board01.png" alt="게시판이미지">
            </picture>
            <h2>게시글 수정하기</h2>
            <p class="intro__text">
                웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                관련된 사항은 여기서 확인하세요!
            </p>
        </div>
        <div class="board__inner">
            <div class="board__write">
                <form action="boardModifySave.php" name="boardModifySave" method="post">
                <!-- <form action="boardModifySave.php" name="boardModifySave" method="post"> -->
                    <fieldset>
                        <legend class="blind">게시글작성하기</legend>
<?php 
    $boardID = $_GET['boardID'];
    $sql = "select memberID,boardID,boardTitle,boardContents from board where boardID = {$boardID}";
    echo $sql;
    $result = $connect -> query($sql);

    if($result){
        $info = $result->fetch_array(MYSQLI_ASSOC);
    }
    echo "<div style='display:none'><label for='boardID'>번호</label><input type='text' id='boardID' name='boardID' class='inputStyle' value ='".$info['boardID']."'></div>";
    echo "<div style='display:none'><label for='memberID'>번호</label><input type='text' id='memberID' name='memberID' class='inputStyle' value ='".$info['memberID']."'></div>";
    echo "<div style='display:none'><label for='youPass'>번호</label><input type='text' id='youPass' name='youPass' class='inputStyle' value ='0'></div>";
    echo "<div style='display:none'><label for='inputPass'>번호</label><input type='text' id='inputPass' name='inputPass' class='inputStyle' value ='1'></div>";
    echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value ='".$info['boardTitle']."'></div>";
    echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents'  class='inputStyle' rows='20'>".$info['boardContents']."</textarea></div>";
    // echo "<div class='mt50'><label for='boardChk'>비밀번호</label><input type='password' id='boardChk' name='boardChk' class='inputStyle' autocomplete='0ff' required placeholder='글을수정하려면 로그인 비밀번호를 입력하세요'></div>";
?>
<div>
                        <!-- <button type="submit" class="btnStyle3">수정하기</button> -->
                        <button class="btnStyle3">수정하기</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <!-- main -->    
    <?php include "../include/footer.php" ?>
    <!-- header -->
    
</body>
</html>