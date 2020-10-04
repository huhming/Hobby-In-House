<?php
$select_query = "SELECT * FROM reply WHERE idx = $_GET[idx]";

mysqli_query($con, $select_query);

if(mysql_query($con, $select_query))
  {echo "select succesfully";}
  else {
    echo "error";
  }


  if(mysqli_num_rows($result))
  {
    while ($row = mysqli_fetch_assoc($result))
    {
      echo "댓글 번호 : ". $row["reply_id"]. "닉네임 : ".$row["nickname"]. "내용 :". $row['content']. "<br>";
    }
  }
  else {
    echo "테이블에 데이터가 없습니다. ";

  }
  mysqli_close($con);
?>
