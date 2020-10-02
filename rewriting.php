<meta charset="utf-8">
<?php

  session_start();     //session 사용하기 위해 필수

  $con=mysqli_connect('localhost','ab5502ghals','ghfkd33*',"ab5502ghals");
  //checking connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{

          $afterT=$_POST['inputTitle'];
          $afterC=$_POST['inputContent'];
          $postid=$_POST['postid'];
          if(preg_match("/<script>/i",$afterT) || preg_match("/<script>/i",$afterC)){
            echo"<script>alert('XSS attack alarm!!');history.back();</script>";
          }
          $sql=mysqli_query($con,"UPDATE bulletin SET title ='$afterT', content='$afterC' WHERE post_id='$postid'");
          echo"<script>alert('수정 완료.');location.href='communication.html';</script>";
        }
?>