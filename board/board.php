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
            <div class="intro__inner  bmStyle center">
                <picture class="intro__images small">
                    <source srcset="../assets/img/board01.png, ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x"/>
                    <img src="../assets/img/board01.png" alt="게시판이미지">
                </picture>
                <h2>게시판</h2>
                <p class="intro__text">
                    웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                    관련된 사항은 여기서 확인하세요!
                </p>
            </div>
            <div class="board__inner  bmStyle mt70">
                <div class="board__search">
                    <div class="left" > 
                        <p>*총 <em>1111</em>건의 게시물이 등록 되어 있습니다.</p>
                    </div>
                    <div class="right">
                        <form action="boardSearch.php" name="boardSearch" id="boardSearch" method="get">
                            <fieldset>
                                <legend class="blind">게시판 검색영역</legend>
                                <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해 주세요." required>
                                <select name="searchOption" id="searchOption">
                                    <option value="title">제목</option>
                                    <option value="content">내용</option>
                                    <option value="name">등록자</option>
                                </select>
                                <button type="submit" class="btnStyle3 white">검색 </button>
                                <!-- <button type="submit" class="btnStyle3">글쓰기 </button> -->
                                <a class="btnStyle3" href="boardWrite.php"> 글쓰기</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="board__tables">
                    <table>
                        <colgroup>
                            <col style="width :5%">
                            <col>
                            <col style="width :10%">
                            <col style="width :15%">
                            <col style="width :7%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>10</td>
                                <td><a href="boardView.html">게시판 제목</a></td>
                                <td>엡쓰</td>
                                <td>2022-02-02</td>
                                <td>100</td>
                            </tr> -->
<?php
    if (isset($_GET['page'])){
        $page = abs((int)$_GET['page']);
        // abs([숫자])
    }else{
        $page =1;
    };
    $viewNum =10;
    $viewLimit = ($viewNum *$page)-$viewNum;
    // 1~20 desc limit $viewNum 0 , 20   $viewNum*1 -$viewNum   page1
    //21~40 desc limit $viewNum 20 , 20  $viewNum*2 -$viewNum   page2
    //40~60 desc limit $viewNum 40 , 60  $viewNum*3 -$viewNum   page3
    $sql = "SELECT boardId, boardTitle, regtime, boardview from board order by boardid desc limit {$viewLimit},{$viewNum};";
    $result =$connect -> query($sql);

    if($result){
        $count = $result ->num_rows;
        if($count > 0){
            for($i=0; $i<$count ; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                // echo "<pre>";
                // var_dump($info);
                // echo "</pre>";
                            echo "<tr>";
                            echo "<td>".$info['boardId']."</td>";
                            echo "<td><a href='boardView.php?boardID={$info['boardId']}'>".$info['boardTitle']."</a></td>";
                            echo "<td>".$info['youName']."</td>";
                            echo "<td>".date('Y-m-d',$info['regtime'])."</td>";
                            echo "<td>".$info['boardview']."</td>";
                            echo "</tr>";
            }
        }else{
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages mb70">
                    <ul>
<?php 
    //게시글 총 갯수 
    // 몇 페이지??
    $sql = "select count(boardId) from board";
    $result = $connect -> query($sql);

    $boardTotalCount = $result ->fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardId)'];
    $totCount = $boardTotalCount;
    
    //총 페이지 갯수 
    $boardTotalCount = ceil($boardTotalCount/$viewNum);
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    
    //처음으로 
    // if($page != 1 ){
    // //     echo "<li><a href='board.php?page=1'>처음으로</a></li>";
    // //     처음 페이지 초기화 
    // //     if($startPage < 1)$startPage =1;
    // //     마지막 페이지 초기화 
    // //     if($startPage > $boardTotalCount)$endPage =$boardTotalCount;
    // }
    //이전 페이지 
    if($page != 1 &&  $boardTotalCount > 1){
        $prevPage = $page-1;
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
    }
    //페이지
    for($i=$startPage ;$i <= $endPage ; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        if($i > 0 && $i <=$boardTotalCount ){
            echo "<li class ='{$active}'><a href = 'board.php?page={$i}'>{$i}</a></li>";
        }
    }
    // 다음 페이지
    if($page < $boardTotalCount){
        $nextPage = $page+1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
    }
?>
                        <!-- <li><a href='#'>처음으로</a></li>
                        <li><a href='#'>이전</a></li>
                        <li class='active'> <a  href='#'>1</a></li>
                        <li><a href='#'>2</a></li>
                        <li><a href='#'>3</a></li>
                        <li><a href='#'>4</a></li>
                        <li><a href='#'>5</a></li>
                        <li><a href='#'>6</a></li>
                        <li><a href='#'>7</a></li>
                        <li><a href='#'>8</a></li>
                        <li><a href='#'>다음</a></li>
                        <li><a href='#'>마지막으로</a></li> -->
                    </ul>
                </div>
            </div>
            
            <!-- 
            <div class="banners__inner"></div>
            <div class="sliders__inner"></div>
            <div class="cards__inner"></div>
            <div class="images__inner"></div>
            <div class="ads__inner"></div>
            <div class="texts__inner"></div>
            <div class="login__inner"></div>
            <div class="join__inner"></div>
            <div class="blog__inner"></div> 
            -->
    </main>
    <!-- main -->    
    <?php include "../include/footer.php" ?>
    <!-- header -->
    <script>
        document.querySelector(".board__search .left p em").innerHTML = <?=$totCount ?>;
    </script>
</body>
</html>