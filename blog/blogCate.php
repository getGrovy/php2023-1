<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['category'])){
        $category =$_GET['category'];
        
    }else{
        header("Location: blog.php");
    }
        // echo "<pre>";
        // echo $categoryCount;
        // echo "</pre>";
        $blogSql = "SELECT * FROM blog WHERE blogCategory = '{$category}'";
        $categoryResult = $connect -> query($blogSql);
        $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
        $categoryCount = $categoryResult -> num_rows;
        
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
                <div class="blog__search bmStyle">
                    <?php 
                    if($categoryCount ==0){
                    ?>
                    <h2>🙁 게시글이 없습니다 🙁</h2>
                    <p>다른 카테고리를 선택해 주세요</p>
                    <?php 
                    }else{
                    ?>
                    <h2><?= $categoryInfo['blogCategory'] ?></h2>
                    <p><?= $categoryInfo['blogCategory'] ?>과 관련된 글이 <?= $categoryCount?>건 있습니다.</p>
                    <?php 
                    }
                    ?>
                </div>
            <div class="blog__inner">
                <div class="left mt70">
                <div class="cards__inner row line4">
                    <?php 
                        foreach($categoryResult as $blog){?>
                            <div class="card">
                                <figure class="card__img">
                                    <a href="blogView.php?blogID=<?=$blog['blogID'] ?>">
                                        <img src="../html/assets/blog/<?=$blog['blogImgFile'] ?>" alt="<?=$blog['blogTitle'] ?>">
                                    </a>
                                </figure>
                                <div class="card__title">
                                    <h3>
                                        <a href="blogView.php?blogID=<?=$blog['blogID'] ?>">
                                            <?=$blog['blogTitle'] ?>
                                        </a>
                                    </h3>
                                    <p><?=$blog['blogContents'] ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    ?>                            
                            <!-- <div class="card">
                                <figure class="card__img">
                                    <source srcset="../html/assets/img/blog01-min.jpg, ../html/assets/img/blog01@2x-min.jpg 2x, ../html/assets/img/blog01@3x-min.jpg 3x"/>
                                    <img src="../html/assets/img/blog01-min.jpg" alt="소개이미지">
                                </figure>
                                <div class="card__title">
                                    <h3>프로그래밍에 대해서</h3>
                                    <p>보통 개발을 할 때 가장 필요한 스킬은 검색이다. 검색 키워드에 따라 해결 방안들이 다르고, 결과도 다를 수 있다. 검색 키워드에 따라 해결 방안들이 다르고, 결과도 다를 수 있다.</p>
                                </div>
                                <div class="card__info">
                                    <a href="#" class="more">더보기</a>
                               
                                </div>
                            </div>
                            <div class="card">
                                <figure class="card__img">
                                    <source srcset="../html/assets/img/blog02-min.jpg, ../html/assets/img/blog02@2x-min.jpg 2x, ../html/assets/img/blog02@3x-min.jpg 3x"/>
                                    <img src="../html/assets/img/blog02-min.jpg" alt="소개이미지">
                                </figure>
                                <div class="card__title">
                                    <h3>프로그래밍에 대해서</h3>
                                    <p>프로그래머는 컴퓨터 소프트웨어를 개발하는 사람으로, 다양한 프로그래밍 언어와 기술을 사용하여 소프트웨어를 만듭니다. 프로그래머는 주로 소프트웨어의 설계, 코딩, 테스트 및 유지보수를 담당하며, 다양한 프로그래밍 분야에서 활동할 수 있습니다.</p>
                                </div>
                                <div class="card__info">
                                    <a href="#" class="more">더보기</a>
                                  
                                </div>
                            </div>
                            <div class="card">
                                <figure class="card__img">
                                    <source srcset="../html/assets/img/blog03-min.jpg, ../html/assets/img/blog03@2x-min.jpg 2x, ../html/assets/img/blog03@3x-min.jpg 3x"/>
                                    <img src="../html/assets/img/blog03-min.jpg" alt="소개이미지">
                                </figure>
                                <div class="card__title">
                                    <h3>프로그래밍에 대해서</h3>
                                    <p>프로그래머는 컴퓨터 언어와 문법을 이해하고, 이를 사용하여 소프트웨어를 개발하는 능력이 필요합니다. 또한, 소프트웨어 개발 과정에서 문제를 해결하고, 코드를 최적화하며, 시스템 보안을 유지하는 등의 역할을 수행합니다.</p>
                                </div>
                                <div class="card__info">
                                    <a href="#" class="more">더보기</a>
                                  
                                </div>
                            </div>
                            <div class="card">
                                <figure class="card__img">
                                    <source srcset="../html/assets/img/blog04-min.jpg, ../html/assets/img/blog04@2x-min.jpg 2x, ../html/assets/img/blog04@3x-min.jpg 3x"/>
                                    <img src="../html/assets/img/blog04-min.jpg" alt="소개이미지">
                                </figure>
                                <div class="card__title">
                                    <h3>프로그래밍에 대해서</h3>
                                    <p>프로그래머는 다양한 분야에서 일할 수 있습니다. 웹 개발, 게임 개발, 데이터베이스 관리, 모바일 앱 개발, 인공지능 및 기계 학습, 네트워크 및 보안 등의 분야에서 활동할 수 있습니다. 이를 위해서는 해당 분야의 기술과 지식을 습득하고, 적용할 수 있는 능력이 필요합니다.</p>
                                </div>
                                <div class="card__info">
                                    <a href="#" class="more">더보기</a>
                                  
                                </div>
                            </div>
                            <div class="card">
                                <figure class="card__img">
                                    <source srcset="../html/assets/img/blog01-min.jpg, ../html/assets/img/blog01@2x-min.jpg 2x, ../html/assets/img/blog01@3x-min.jpg 3x"/>
                                    <img src="../html/assets/img/blog01-min.jpg" alt="소개이미지">
                                </figure>
                                <div class="card__title">
                                    <h3>프로그래밍에 대해서</h3>
                                    <p>보통 개발을 할 때 가장 필요한 스킬은 검색이다. 검색 키워드에 따라 해결 방안들이 다르고, 결과도 다를 수 있다. 검색 키워드에 따라 해결 방안들이 다르고, 결과도 다를 수 있다.</p>
                                </div>
                                <div class="card__info">
                                    <a href="#" class="more">더보기</a>
                                   
                                </div>
                            </div>
                            <div class="card">
                                <figure class="card__img">
                                    <source srcset="../html/assets/img/blog02-min.jpg, ../html/assets/img/blog02@2x-min.jpg 2x, ../html/assets/img/blog02@3x-min.jpg 3x"/>
                                    <img src="../html/assets/img/blog02-min.jpg" alt="소개이미지">
                                </figure>
                                <div class="card__title">
                                    <h3>프로그래밍에 대해서</h3>
                                    <p>프로그래머는 컴퓨터 소프트웨어를 개발하는 사람으로, 다양한 프로그래밍 언어와 기술을 사용하여 소프트웨어를 만듭니다. 프로그래머는 주로 소프트웨어의 설계, 코딩, 테스트 및 유지보수를 담당하며, 다양한 프로그래밍 분야에서 활동할 수 있습니다.</p>
                                </div>
                                <div class="card__info">
                                    <a href="#" class="more">더보기</a>
                                  
                                </div>
                            </div> -->
                            
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