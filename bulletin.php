<meta charset="utf-8">
<?php
  session_start();

  $con=mysqli_connect('localhost','ab5502ghals','ghfkd33*',"ab5502ghals");

  //checking connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
          $title=$_POST['title'];
          $content=$_POST['contents'];
          $usrid=$_SESSION['nickname']; //로그인 기능 구현 전

          $sql=mysqli_query($con,
            "
            INSERT INTO bulletin(
              title,content,author
              )
              VALUES(
              '$title','$content','$usrid'
            );
            "
          );  //so far, posting must have been done.
        }

  echo "<script>alert('게시물 게시완료.');location.href='communication.html'</script>";
 ?>
