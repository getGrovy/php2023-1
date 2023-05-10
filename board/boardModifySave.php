<?php
    include "../connect/connect.php";
    include "../connect/session.php";

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
                로그인 비밀번호를 입력하셔야<br>
                글을 삭제 할수 있어요 ! 
            </p>
        </div>
        <div class="board__inner">
            <div class="board__write">
                <!-- <form action="boardModifySave.php" name="boardModifySave" method="post"> -->
                <form action="boardModifySave.php" name="boardModifySave" method="post">
                    <fieldset>
                        <legend class="blind">게시글 수정하기</legend>
<?php 
    $youPass  = '';
    $memberID = $_POST['memberID'];
    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $youPass_1 =  $_POST['youPass'];
    $youPass_2 =  $_POST['inputPass'];
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardTitle = $connect -> real_escape_string($boardTitle);

    if( isset($_SESSION['memberId']) == $memberID ){
        $memberID = $_SESSION['memberId'];
        $sql = "update board set boardContents = '{$boardContents}', boardTitle = '{$boardTitle}' where boardID = '{$boardID}'";
        $connect -> query($sql);
?>
    <script>
        location.href="board.php";
    </script>
<?php
    }else if($youPass_1 == $youPass_2){
        $sql = "update board set boardContents = '{$boardContents}', boardTitle = '{$boardTitle}' where boardID = '{$boardID}'";
        $connect -> query($sql);
?>
    <script>
        location.href="board.php";
    </script>
<?php
}else {
    // echo "<script>alert('비밀번호가 틀렸습니다. 다시 확인해주세요!')</script>";
    $sql = "select youPass from members where memberID = {$memberID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result->fetch_array(MYSQLI_ASSOC);
    }
        $youPass = $info['youPass'];
        echo "<div><label for='inputPass'>비밀번호를 입력해주세요</label><input type='text' id='inputPass' name='inputPass' class='inputStyle'></div>";
        echo "<div style='display:none'><label for='memberID'></label><input type='text' id='memberID' name='memberID' class='inputStyle' value='".$memberID."'></div>";
        echo "<div style='display:none'><label for='youPass'></label><input type='text' id='youPass' name='youPass' class='inputStyle' value='".$info['youPass']."'></div>";
        echo "<div style='display:none'><label for='boardID'>번호</label><input type='text' id='boardID' name='boardID' class='inputStyle' value ='".$boardID."'></div>";
        echo "<div style='display:none'><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value ='".$boardTitle."'></div>";
        echo "<div style='display:none'><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents'  class='inputStyle' rows='20'>".$boardContents."</textarea></div>";
    }  
?>
                        <button class="btnStyle3" onclick="">확인</button>
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