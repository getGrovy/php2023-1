<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    
    if(isset($_GET['blogID'])){
        $blogId =$_GET['blogID'];
        $blogSql = "SELECT * FROM blog WHERE BlogID = {$blogId}";
        $blogResult = $connect -> query($blogSql);
        $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);
    }else{
        header("Location: blog.php");
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    <?php include "../include/header.php" ?>
    <!-- header -->
    <main id="main" class="container">
            <div class="blog__title bmStyle" style="background-image: url(../html/assets/blog/<?= $blogInfo['blogImgFile']?>);">
            <span class="cate"><?= $blogInfo['blogCategory']?></span>
            <h2 class="title"><?= $blogInfo['blogTitle']?></h2>
            <div class="info">
                <span class="author"><?= $blogInfo['blogAuthor']?></span>
                <span class="date"><?= date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                <div class="modify">
                    <a href="#">수정</a>
                    <a href="#">삭제</a>
                </div>
            </div>
        </div>
        <div class="blog__inner">
            <div class="left mt70">
                <div class="blog__contents">
                    <p><?= $blogInfo['blogContents']?></p>
                </div>
            </div>
            <div class="right mt70">
                <div class="blog__aside">
                    <?php include "../include/blogTitle.php" ?>
                    <?php include "../include/blogCate.php" ?>
                    <?php include "../include/blogLastest.php" ?>
                    <?php include "../include/blogPopular.php" ?>
                    <?php include "../include/blogComment.php" ?>

                    <!-- <div class="intro">
                        <picture class="img">
                            <source srcset="assets/img/blogIntro01.png, assets/img/blogIntro01@2x.png 2x, assets/img/blogIntro01@3x.png 3x"/>
                            <img src="assets/img/blogIntro01.png" alt="소개이미지">
                        </picture>
                        <p class="text">
                            허리아프고 배도 아파 
                        </p>
                    </div>
                    <div class="cate">
                        <h4>카테고리</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 글</h4>
                    </div>
                    <div class="cate">
                        <h4>인기 글</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 댓글</h4>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- blog__article -->
        <div class="blog__article">
            <h3>관련글</h3>
            <?php include "../include/blogArticle.php"  ?>
        </div>
        <!-- blog__article -->
        <!-- blog__comment -->
        <div class="blog__comment">
            <h3>댓글쓰기</h3>
            <div>

            </div>
        </div>
        <!-- blog__comment -->
        <!-- 
        <div class="into__inner"></div>     
        <div class="banners__inner"></div>
        <div class="board__inner"></div> 
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
   
    <?php include "../include/footer.php" ?>
    <!-- header -->
    
</body>
</html>