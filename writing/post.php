<meta charset="utf-8" />
<?php

  session_start();     //session 사용하기 위해 필수

  $con=mysqli_connect('localhost','ab5502ghals','ghfkd33*',"ab5502ghals");
  //checking connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
          $postid=$_GET['postid'];
          $sql=mysqli_query($con,"SELECT * FROM bulletin WHERE post_id='$postid'");
          $member=mysqli_fetch_array($sql);
          
          if(preg_match("/<script>/i",$member['content']) || preg_match("/<script>/i",$member['title'])){
            echo "<script>alert('XSS attack alarm!!');history.back();</script>";
          }

          echo"<strong>제목:</strong><h1>".$member['title']."</h1>-----------------------------------------<br>"
              .$member['content'].
              "<br>-----------------------------------------";


        }

?>
