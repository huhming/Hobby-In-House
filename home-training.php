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

    <!-- favicons 지워도 OK??
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


     <!--css부분 추가-->
    <style>
    .writing{
        float: right;
        margin-right:50px;
    }
    </style>


</head>

<body id="top">

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader s-pageheader--home">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <h1>Hobby In House.</h1>
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
    </section> <!-- end s-pageheader -->


    <!-- 갤러리형 게시판 부분
    ================================================== -->
    <section class="s-content">

        <!--버튼 부분-->
        <br><br><br>
        <span> <input class="writing" type="button" value="글 작성하기" onclick="location.href=''"></span> <!--글작성하는 페이지 비워놔써-->
        <br><br>


        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1>Category: Home-Training</h1>

                <p class="lead">
                    코로나 시국에 함부로 헬스장가기 두려운 지금! 확진자보다 무서운 확찐자! 집에 있는 시간이 많은만큼 홈트레이닝을 통해 건강한 생활을 해봅시다.
                    운동기구없이도 누구나 쉽게 할 수 있는 운동들이 준비되어있습니다. 효과적인 운동방법 소개, 운동기구 추천 등 home-training에 대한 정보들이 정리되어 있습니다.
                </p>
            </div>
        </div>



        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <article class="masonry__brick entry format-standard" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="ht1.html" class="entry__thumb-link">
                            <img src="images/home-training/ht1_cover.PNG"
                            srcset="images/home-training/ht1_cover.PNG 1x, images/home-training/ht1_cover.PNG 2x" alt="">
                        </a>
                    </div>




                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__date">
                                <a href="ht1.html">September 25, 2020</a>
                            </div>
                            <h1 class="entry__title"><a href="ht1.html">나혼자한다! 홈트레이닝!</a></h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                운동기구없이도 혼자서 홈트레이닝을 하는 방법!
                            </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="home-training.html">Home-training</a>
                                <a href="home-training.html">Health</a>
                            </span>
                        </div>
                    </div>

                </article> <!-- end article -->





                <article class="masonry__brick entry format-standard">

                    <div class="entry__thumb">
                        <a href="ht2.html" class="entry__thumb-link">

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
                            <img src="<?php thumbnail($row[image], save_name,100,200)?>"
                                 srcset="images/home-training/ht2_cover.PNG 1x, images/home-training/ht2_cover.PNG 2x" alt="">
                        </a>
                    </div>

                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__date">
                                <a href="ht2.html">September 15, 2020</a>
                            </div>
                            <h1 class="entry__title"><a href="ht2.html">(2주 다이어트) 뱃살제거 프로젝트</a></h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                2주만 해도 뱃살이 쏘옥 들어간다고? 집중적으로 뱃살빼기에 효과적인 운동!
                            </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="home-training.html">Home-training</a>
                                <a href="home-training.html">Health</a>
                            </span>
                        </div>
                    </div>

                </article> <!-- end article -->




            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->







        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

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
