<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Hobby In House</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!--css부분 추가-->
    <style>
        .imagess { text-align: center; }
        .modify{
            float: right;
            margin-right:10px;}
        .remove{
            float: right;
            margin-right:50px;
        }
        .list{
            float: left;
            margin-left:50px;
        }

    </style>


    <!--js부분 추가-->
    <script type="text/javascript">
        function button_event(){
        if (confirm("정말 삭제하시겠습니까?") == true)
            document.form.submit();
        else{
            return;}
        }
    </script>


</head>

<body id="top">

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <h1>Hobby In House.</h1>
                    </a>
                </div> <!-- end header__logo -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>

                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <ul class="header__nav">
                        <li class="current"><a href="index.html" title="">Home</a></li>
                        <li><a href="baking.html">Baking</a></li>
                        <li><a href="cooking.html">Cooking</a></li>
                        <li><a href="craft.html">Craft</a></li>
                        <li><a href="game.html">Game</a></li>
                        <li><a href="home-training.html">Home-Training</a></li>
                        <li><a href="psychological-test.html">Psychological-test</a></li>
                    </ul> <!-- end header__nav -->


                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <!--버튼 부분-->
        <br><br><br>
        <span> <input class="list" type="button" value="목록" onclick="location.href='home-training.html'"></span>
                    <!--수정,삭제는 내가 쓴 글일 경우 ,클릭시 이동하는거 확인해주세욤-->
        <span> <input class="remove" type="button" value="삭제" onclick="button_event();"></span>
        <span> <input class="modify" type="button" value="수정" onclick="location.href=''"></span>  <!--글작성하는 페이지 비워놔써-->
        <br><br><br>




        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    나혼자한다! 홈트레이닝!
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date">September 25, 2020</li>
                    <li class="cat">
                        In
                        <a href="#0">Home-training</a>
                        <a href="#0">Health</a>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->


            <!-- 썸네일 만들기 위한 php문 -->
                                      <?php

                                      header("Content-Type:text/html; charset = UTF-8");

                                      $con = mysqli_connect('localhost', 'root', 'family0831','web');
                                          if (mysqli_connect_errno())
                                          {
                                            echo "Failed to connect to MySQL : " .mysqli_connect_error();
                                            exit();
                                          } //Check connection

                                      $post_id = $_GET['post_id'];

                                      $query = "SELECT file_id, name_orig, name_save from upload_file ORDER BY reg_time DESC where post_id = ".$post_id"";
                                      $stmt = mysqli_prepare($con, $query);
                                      $exec = mysqli_stmt_execute($stmt);
                                      $result = mysqli_stmt_get_result($stmt);

                                      $info_image = getimagesize('../data');
                                      switch($info_image['mime']){
                                        case "image/gif";
                                        $new_image = imagecreatefromgif(../data.$name_save);
                                        break;
                                        case "image/jpeg";
                                        $new_image = imagecreatefromgif(../data.$name_save);
                                        break;

                                      function thumbnail($file, $save_filename, $max_width, $max_height)
                                      {
                                        $src_img = ImageCreateFromjpeg($file);
                                        $img_info = getImageSize($file);
                                        $img_width = $img_info[0];
                                        $img_height = $img_info[1];

                                        if(($img_width / $max_width) == ($img_height/$max_height))
                                        {
                                          $dst_width = $max_width;
                                          $dst_height = $max_height;
                                        }
                                        else if(($img_width / $max_width) < ($img_height / $max_height))
                                        {
                                          $dst_Width = $max_width;
                                          $dst_height = $max_height;

                                      else {
                                        $dst_width = $max_width;
                                        $dst_height = $max_width*($img_height / $img_width);
                                      }

                                      $dst_img = imagecreatetruecolor($dst_width, $dst_height);

                                      ImageCopyResized($dst_img, $src_img, 0, 0, 0, 0, $dst_width, $dst_width, $dst_height, $img_width, $img_height);

                                      ImageInterlace($dst_img);
                                      ImageJPEG($dst_img, $save_filename);
                                      imagedestroy($dst_img);
                                      imagedestroy($src_img);

                                      }
                                       ?>

                                       <?php

                                       $con = mysqli_connect("localhost", "ab5502ghals","ghfdk33*", "ab5502ghals");
                                       if (mysqli_connect_errno())
                                       {
                                         echo "Failed to connect to MySQL : " .mysqli_connect_error();
                                         exit();
                                       }

                                      mysql_select_db("upload_file,$connect");
                                      $query = "select * from upload_file where id = $id";
                                      $result = mysqli_query($query, $con);
                                      $row = mysqli_fetch_array($result);

                                      Header("Content-type : image/jpeg");
                                      // 이미지를 나타내는 변수는 $row[image]

                                      ?>
            <div class="col-full s-content__main">
                <div class="imagess">
                <img src="<?php thumbnail($row[image],save_name, 500,500)?>" alt="" width="500" height="500px">
                <br><br>
                <img src="<?php thumbnail($row[image],save_name, 500,500)?>" alt="" width="500" height="500px">
                <br><br>
                <img src="<?php thumbnail($row[image],save_name, 500,500)?>" alt="" width="500" height="500px">
                <br><br>
                <img src="<?php thumbnail($row[image],save_name, 500,500)?>" alt="" width="500" height="500px">
                <br><br>

                </div>
            </div> <!-- end s-content__main -->

        </article>


    </section> <!-- s-content -->



    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <span>Contributor<br>
                     김률아 hobby0519@gmail.com<br>
                     김민겸 gms08184@gmail.com<br>
                            박준희 qaz74792@gmail.com<br>
                            심성현 sh010604@naver.com<br>
                            전명환 ab5502ghals@naver.com<br>
                     허미림 wowoo3545@gmail.com</span><br>
                  <span>© Copyright Hobby In House 2020</span>
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
