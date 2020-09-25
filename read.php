#reply테이블에는 게시글 순서(board_idx) 댓글 순서(reply_idx) 닉네임(nickname), 댓글 내용(reply_cont)을 기재\

#html에서 댓글 적는 란의 name을 reply_content 라고 지정, db이름은 reply_cont
<?php 
header("Content-Type:text/html; charset = UTF-8");
session_start();
#board_idx는 게시글의 번호 변수
$board_idx = $_POST[""]
$conn = mysqli_connect("localhost", "root", family0831);
mysqli_query($conn, 'SET NAMES utf8');
$sql = "SELECT MAX(reply_idx) AS reply_idx FROM reply WHERE board_idx = '$board_idx'";
$result = $conn ->query($sql);
$row = mysqli_fetch_array($res);
$reply_idx = $row['reply_idx']+1;

$sql2 = "INSERT INTO reply (board_idx, reply_idx, reply_cont, nickname) values('$board_idx','$reply_idx', '$reply_content','".$_SESSSION['nickname']."' )";
$result2 = $conn ->query($sql2);

$sql3 = "SELECT * from reply where board_idx = '$board_idx' and reply_idx = '$reply_idx' and nickname = '".$_SESSION['$nickname']"'and reply_content = '$reply_cont'";
$result3  = $conn ->query($sql3);
$row3 = mysqli_fetch_array($result3);
/*
mysqli_select_db($conn, "reply");
$result = mysqli_query($conn,"SELECT * FROM reply");
$reply_content = $_GET['reply_idx'];
$sql  =mq
$board = $sql->fetch_array(); #

<div id = "bulletin.php">
<h1><?php echo $b
mysql_query("set names utf8");
$reply_content = "select reply_cont from reply";
<form class="" action="sign_in.php" method="post">
*/


 ?>
