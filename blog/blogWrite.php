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
    <title>블로그</title>
    <?php include "../include/head.php" ?>
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
    <style>
        :not(.auto-height)>.toastui-editor-defaultUI>.toastui-editor-main {
            background-color: #fff;
        }
    </style>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    <?php include "../include/header.php" ?>
    <!-- header -->
    <main id="main" class="container">
            <div class="blog__search bmStyle">
                <h2>개발자 블로그 게시글 작성</h2>
                <p>개발과 관련된 글입니다.</p>
            </div>
            <div class="blog__inner">
                <div class="blog__write">
                    <form action="blogWriteSave.php" name="blogWriteSave" method="post" enctype="multipart/form-data">
                         <fieldset>
                             <legend class="blind">게시글작성하기</legend>
                             <div>
                                <label for="blogCategory">카테고리</label>
                                <select name="blogCategory" id="blogCategory" required>
                                    <option value="javascript">javascript</option>
                                    <option value="jquery">jquery</option>
                                    <option value="react">react</option>
                                    <option value="html">html</option>
                                    <option value="css">css</option>
                                </select>
                             </div>
                             <div>
                                 <label for="blogTitle">제목</label>
                                 <input type="text" id="blogTitle" name="blogTitle" class="inputStyle" required>
                             </div>
                             <div>
                                 <label for="blogContents">내용</label>
                                 <textarea name="blogContents" id="blogContents"  class="inputStyle" rows="20" required></textarea>
                                 <!-- <div id="editor"></div> -->
                             </div>
                             <div class="mt30">
                                <label for="blogFile">파일</label>
                                <input type="file" name="blogFile" id="blogFile" accept=".jpg, .jpeg, .png, .gif" placeholder=".jpg, .png, .gif만 넣을수 있습니다. 이미지용량은 1메가를 넘길수 없습니다">
                             </div>
                             <button type="submit" class="btnStyle3">저장하기</button>
                         </fieldset>
                    </form>
                 </div>
            </div>
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
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
    <script>
        const Editor = toastui.Editor;

        const editor = new Editor({
            el: document.querySelector('#editor'),
            height: '1000px',
            initialEditType: 'markdown',
            previewStyle: 'vertical'
            });
    </script>
</body>
</html>