<!-- 게시글 하단의 댓글 쓰기 클릭 -> reply_write.php 문으로 이동, 여기서 내용을 작성하면 db에 댓글을 쓴 게시글의 번호,댓글 번호, 쓴 사람의 닉네임, 댓글 내용이 전송된다. -->

<!-- 게시글 내용 -->

<?php
header("Content-Type:text/html; charset = UTF-8");
session_start();
$con = mysqli_connect('localhost', 'root', 'family0831',"web");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL : " .mysqli_connect_error();
      exit();
    } //Check connection


    $con_num = $_GET['post_id']; //게시글의 번호(post_id)를 $con_num에 저장하기.
    if (empty($con_num))
    {
      alert('잘못된 접근입니다.');
      exit();
    }

$insert_query = "INSERT INTO reply(con_num,nickname,content) VALUES('$con_num','$nickname', '$content')";

mysqli_query($con, $insert_query);

if(mysqli_query($con, $insert_query))
{
  echo "insert succesfully";
}
else {
  echo "Error";
}

mysqli_close($con);

?>
