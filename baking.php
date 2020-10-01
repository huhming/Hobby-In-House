<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Baking</title>
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

                <a class="login" href="login.html">
                    <img src="images/login.png" alt="no_image" class="login_icon">
                </a>

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
                        <li><a href="communication.html">Communication</a></li>
                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->
    </section> <!-- end s-pageheader -->


    <!-- 갤러리형 게시판 부분
    ================================================== -->
    <section class="s-content">

        <div class="writingPage">
            <button class="writing-btn" type="button"><a href="writing.html">WRITING</button></a>
        </div>

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1>Category: Baking</h1>

                <p class="lead">
                    '집에서 뭐하지? 사람들이랑 만나지도 못하고.. 베이킹이나 도전해볼까?<br>
                    아 근데 오븐도 없는데 뭔 베이킹이야.'라고 생각하는 사람을 위한 곳. <br>
                    자신의 베이킹 레시피를 공유하며 사람들과 상호소통할 수 있는 곳! <br>
                    초보용 노오븐 베이킹 레시피 정보가 가득한 곳!<br>
                    HIH 베이킹 게시판입니다.
                </p>

            </div>
        </div>

        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
                <?php
                include("dbconnect.php");
                $pageNum=10;
                $sql="select *from bulletin order by idx";
                $res=mysqli_query($conn, $sql);
                $pageTotal=mysqli_num_rows($res);
                if(!isset($_GET['start']))$start=0;
                else{
                $start=$_GET['start']*$pageNum;}
                if(!$start)$start=0;
                if(isset($_GET['search'])){
                	$sel=$_GET['kind'];
                	$search=$_GET['search'];
                	$sql="select *from bulletin where $sel like '%$search%' order by idx";
                	$res=mysqli_query($conn, $sql);
                	$pageTotal=mysqli_num_rows($res);
                	$sql="select *from bulletin where $sel like '%$search%' order by idx limit $start, $pageNum";
                }
                else{
                	$sql="select *from bulletin order by idx desc limit $start, $pageNum";
                }
                $res=mysqli_query($conn, $sql);
                $j=1*$start+1;
                while($row=mysqli_fetch_array($res)){
                $j=$j+1;
                echo '
                <article class="masonry__brick entry format-standard" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="single-standard.html" class="entry__thumb-link">
                            <img src="images/thumbs/masonry/lamp-400.jpg"
                                 srcset="images/thumbs/masonry/lamp-400.jpg 1x, images/thumbs/masonry/lamp-800.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__date">
                                <a href="single-standard.html">'.$row["date"].'</a>
                            </div>
                            <h1 class="entry__title"><a href="single-standard.html">'.$row["title"].'</a></h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>'.
                                $row["content"].
                            '</p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="category.html">'.$row["author"].'</a>
                            </span>
                        </div>
                    </div>
                </article> <!-- end article -->';}
                $pages=$pageTotal/$pageNum;
                for($i=0;$i<$pages;$i++){
                	if(isset($sel)){
                		$no=$_GET['no'];

                		echo "<a href=$_SERVER[PHP_SELF]?kind=$sel&search=$search&no=$i&&start=$i>[$i]</a>";}
                		else{
                	echo "<a href=$_SERVER[PHP_SELF]?start=$i>[$i]</a>";}}
                echo '<a href="index.php">돌아가기</a>';
                session_start();
                if(isset($_SESSION['id'])){
                			echo "<p><a href=\"write.php\">글작성</a></p>";}
                ?>















            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><span class="pgn__num current">1</span></li>
                        <li><a class="pgn__num" href="#0">2</a></li>
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
                             심성현 sh970627@gmail.com<br>
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

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
