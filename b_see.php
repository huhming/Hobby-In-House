<?php
include("dbconnect.php");
$sql="select *from board where idx={$_GET['idx']}";
$res=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($res);
echo mysqli_error($conn);
echo "<li>".htmlspecialchars($row['subject'])."</li>";
echo "<li>".$row['writer']."</li>";
echo "<li>".htmlspecialchars($row['content'])."</li>";
echo "<li>".$row['date']."</li>";
session_start();
if(isset($_SESSION['id'])){
if($_SESSION['id']==$row['id']||$_SESSION['id']=='admin'){
	echo "<a href=\"write.php\">글작성     </a><a href=\"update.php?idx={$_GET['idx']}\">글 수정      </a><a href=\"delete.php?idx={$_GET['idx']}\">글삭제     </a>";
}}
echo "<a href=\"index.php\">돌아가기</a></a> <form><button type=\"button\" onclick=\"history.back()\">취소</button></form>";
include("cmt.php");
?>
ubuntu@ip-172-31-54-3:/var/www/html$ cat view.php
<?php
include("dbconnect.php");
$sql="select *from board where idx={$_GET['idx']}";
$res=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($res);
echo mysqli_error($conn);
echo "<li>".htmlspecialchars($row['subject'])."</li>";
echo "<li>".$row['writer']."</li>";
echo "<li>".htmlspecialchars($row['content'])."</li>";
echo "<li>".$row['date']."</li>";
session_start();
if(isset($_SESSION['id'])){
if($_SESSION['id']==$row['id']||$_SESSION['id']=='admin'){
	echo "<a href=\"write.php\">글작성     </a><a href=\"update.php?idx={$_GET['idx']}\">글 수정      </a><a href=\"delete.php?idx={$_GET['idx']}\">글삭제     </a>";
}}
echo "<a href=\"index.php\">돌아가기</a></a> <form><button type=\"button\" onclick=\"history.back()\">취소</button></form>";
include("cmt.php");
?>
