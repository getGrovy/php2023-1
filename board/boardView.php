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


    <main id="main" class="container">
            <div class="intro__inner   center">
                <picture class="intro__images small">
                    <source srcset="../assets/img/board01.png, ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x"/>
                    <img src="../assets/img/board01.png" alt="게시판이미지">
                </picture>
                <h2>게시글 보기</h2>
                <p class="intro__text">
                    웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                    관련된 사항은 여기서 확인하세요!
                </p>
            </div>
            <div class="board__inner   mt70">
                <div class="board__view">
                    <table>
                        <colgroup>
                            <col style="width: 20%;">
                            <col style="width: 80%;">
                        </colgroup>
                        <tbody>
                            <!-- <tr>
                                <th>제목</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>등록자</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>등록일</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>조회수</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td></td>
                            </tr> -->
<?php
    // http://localhost/board/boardView.php?[1-9]
    // [1-9]
    // 잘못된경로로 접근하셨어요
    
    $query_string=getenv("QUERY_STRING"); // Get값으로 넘어온 값들을 구합니다.
    $searchName = 'boardID=';
    $searchChk = true;
    //잇냐없냐
    $pos= strpos($query_string, $searchName);
    
    //boardID= 가 있는지 확인 하고 
    // if($pos === false ||!preg_match("/^[0-9]/i",substr($query_string, (int)strlen($searchName)))){
    // echo substr($query_string, (int)strlen($searchName));
    
    if($pos === false ||!is_numeric(substr($query_string, (int)strlen($searchName)))) {
        // 포함되어 있지 않다.
        echo "<tr><td colspan='4'>잘못된접근입니다.</td></tr>";
        die();
    } 
    $boardID = $_GET['boardID'];
    $sql = "update board set boardView = boardView+1 where boardID = {$boardID}";
    $connect -> query($sql);

    $sql = "select B.boardTitle , B.boardContents, M.youName, B.regTime, B.boardView From board B join members M on (m.memberID = b.memberID) where boardID = {$boardID}";
    $result =$connect -> query($sql);
    //1. 보더 아이디 값이 없을때 board로 보내지말기
    //2. 확인 / 취소누르면 삭제 안되게 
    //3. 쓴사람이 수정 하기
    //4. 쓴사람의 비밀번호가 같을경우 수정하기 

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";
        echo "<tr>";
            echo "<th>제목</th>";
            echo "<td>".$info['boardTitle']."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>등록자</th>";
            echo "<td>".$info['youName']."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>등록일</th>";
            echo "<td>".date('Y-m-d',$info['regTime'])."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>조회수</th>";
            echo "<td>".$info['boardView']."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>내용</th>";
            echo "<td>".$info['boardContents']."</td>";
        echo "</tr>";
    }else{
        echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    }
?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="board__btn mb100">
                <a href="boardModify.php?boardID=<?=$boardID?>" class="btnStyle3">수정하기</a>
                <!-- <a href="boardRemove.php?boardID=<?=$_GET['boardID']?>" class="btnStyle3" onclick="confirm('정말삭제할거니?', '')">삭제하기</a> -->
                <a  class="btnStyle3" onclick="chkDel(<?=$_GET['boardID']?>)">삭제하기</a>
                <a href="board.php" class="btnStyle3">목록보기</a>
            </div>
        </main>
    <!-- main -->    
    <?php include "../include/footer.php" ?>
    <!-- header -->
    <script>
        function chkDel(num){
            let chkConfirm = confirm("정말삭제하시겠습니까?");
            if(chkConfirm){
                location.href ='boardRemove.php?boardID='+num;
            }
        }
    </script>
</body>
</html>