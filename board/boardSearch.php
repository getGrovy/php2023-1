<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
    }else{
        $page =1;
    }
    $searchKeyword = $_GET["searchKeyword"];
    $searchOption = $_GET["searchOption"];

    $searchKeyword =$connect ->real_escape_string(trim($searchKeyword));
    $searchOption =$connect ->real_escape_string(trim($searchOption));
    
    
    $sql = "SELECT b.boardId, b.boardTitle, b.boardContents, m.youName , b.regtime , b.boardview from board b join members m on (b.memberid=m.memberid) " ;
    switch($searchOption){
        case "title":
            $sql .="where b.boardTitle like '%{$searchKeyword}%' order by boardID desc" ;
            break;
        case "content":
            $sql .="where b.boardContents like '%{$searchKeyword}%' order by boardID desc" ;
            break;
        case "name":
            $sql .="where m.youName like '%{$searchKeyword}%' order by boardID desc" ;
            break;
    }
    // echo $sql;
    $result = $connect -> query($sql);
    
    $totalCount = $result -> num_rows;
    // echo $totalCount;

    // $sql = "SELECT b.boardId, b.boardTitle, b.boardContents, m.youName , b.regtime , b.boardview from board b join members m on (b.memberid=m.memberid) where b.boardTitle like '%{$searchKeyword}%' order by boardID desc" ;
    // $sql = "SELECT b.boardId, b.boardTitle, b.boardContents, m.youName , b.regtime , b.boardview from board b join members m on (b.memberid=m.memberid) where b.boardContents like '%{$searchKeyword}%' order by boardID desc" ;
    // $sql = "SELECT b.boardId, b.boardTitle, b.boardContents, m.youName , b.regtime , b.boardview from board b join members m on (b.memberid=m.memberid) where m.youName like '%{$searchKeyword}%' order by boardID desc" ;
    
    
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>검색 결과</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
            <div class="intro__inner center">
                <picture class="intro__images small">
                    <source srcset="../assets/img/board01.png, ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x"/>
                    <img src="../assets/img/board01.png" alt="게시판이미지">
                </picture>
                <h2>검색 결과</h2>
                <p class="intro__text">
                    웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                    총 <em><?= $totalCount ?></em> 건의 게시물이 검색되었습니다.
                </p>
            </div>
            <div class="board__inner mt70">
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
<?php
    $viewNum = 20;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql.=" limit {$viewLimit}, {$viewNum}";
    $result = $connect ->query($sql);

    if($result) {
        $count = $result -> num_rows;

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
            echo "<tr><td colspan='5'> 게시글이 없습니다. </td></tr>";
        }

    }
?>
                            <!-- <tr>
                                <td>10</td>
                                <td><a href="boardView.html">게시판 제목</a></td>
                                <td>엡쓰</td>
                                <td>2022-02-02</td>
                                <td>100</td>
                            </tr> -->
                        </tbody>
                </table>
            </div>
            <div class="board__pages mb70">
                <ul>
<?php
     //게시글 총 갯수 
    // 몇 페이지??

    //총 페이지 갯수 
    $boardTotalCount = ceil($totalCount/$viewNum);
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //이전 페이지 
    if($page != 1 &&  $boardTotalCount > 1){
        $prevPage = $page-1;
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    //페이지
    for($i=$startPage ;$i <= $endPage ; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        if($i > 0 && $i <=$boardTotalCount ){
            echo "<li class ='{$active}'><a href = 'boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
        }
    }
    // 다음 페이지
    if($page < $boardTotalCount){
        $nextPage = $page+1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
        echo "<li><a href='boardSearch.php?page={$boardTotalCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }
?>
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
</body>
</html>