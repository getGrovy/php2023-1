<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<?php
    $memberID =$_SESSION['memberID'];
    $blogAuthor =$_SESSION['youName'];

    $blogCategory=$_POST['blogCategory'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = nl2br($_POST['blogContents']);

    $blogView =1;
    $blogLike =0;
    $regTime=time();

    $blogImgFile =$_FILES['blogFile'];
    $blogImgSize =$_FILES['blogFile']['size'];
    $blogImgType =$_FILES['blogFile']['type'];
    $blogImgName =$_FILES['blogFile']['name'];
    $blogImgTmp =$_FILES['blogFile']['tmp_name'];
    // echo "<pre>";
    //     var_dump($blogImgFile);
    // echo "</pre>";
    if($blogImgType){
        $fileTypeExtension = explode("/",$blogImgType);
        $fileType = $fileTypeExtension[0];
        $fileExtension = $fileTypeExtension[1];

        // 이미지 타입 확인
        if($fileType =="image"){
            if($fileExtension=="jpeg"| $fileExtension=="png"| $fileExtension=="gif"|$fileExtension=="jpg"){
                $blogImgDir = '../html/assets/blog/';
                $blogImgName= "img_".time().rand(1,99999)."."."{$fileExtension}";
                
            echo "이미지 파일이 맞습니다";
            $sql ="INSERT INTO blog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCategory', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '0', '$regTime')";
            }else{
                echo"<script>alert('이미지파일이아닙니다.')</script>";
            }
        }else{
            echo"<script>alert('이미지파일이아닙니다.')</script>";
        }
    }else{
        // echo"<script>alert('이미지파일을 첨부하지 않았습니다.')</script>";
        $sql = "INSERT INTO blog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCategory', '$blogAuthor', '$blogView', '$blogLike', 'img_default.jpg', '$blogImgSize', '0', '$regTime')";
    }
    // 이미지 사이즈 확인
    if($blogImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }
    echo $sql;
    $result = $connect -> query($sql);
    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
    
    header("Location: blog.php");
    
?>
