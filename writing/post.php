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

        if($_SESSION['nickname']==$member['author']){ //글 작성자와 현재 로그인된 사람의 닉네임이 같을 시에만 이 버튼이 보임
          echo"
          <button><a href='../post_rewriting.html?postid=".$postid."'>글 수정</a></button>
          <button><a href='../post_delete.html?postid=".$member['post_id']."'>글 삭제</a></button>
          ";
        }
      }
?>
