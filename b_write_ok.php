<?php
include("dbconnect.php");
if($_POST['subject']==""){echo "<script>alert(\"빈칸 노노노\");history.back();</script>";}
elseif($_POST['content']==""){echo "<script>alert(\"빈칸 노노노노노\");history.back();</script>";}
else{
session_start();
$sql="select *from accounts where id='{$_SESSION['id']}' and pwd='{$_SESSION['pwd']}'"; $res=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($res);
$sql="
INSERT IGNORE INTO board
(title, author, content, date, id)
	VALUES(
		'{$_POST['title']}',
		'{$row['author']}',
		'{$_POST['content']}',
		now(),
		'{$_SESSION['id']}'
		)
";
$result=mysqli_query($conn, $sql);
if($result===false){
	echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
	error_log(mysqli_error($conn));
	echo mysqli_error($conn);
}
else{
	$row['point']=$row['point']+5;
	$sql="
        UPDATE site
                SET
			point='{$row['point']}'
		where id='{$_SESSION['id']}'
";
	mysqli_query($conn, $sql);
	header("location:./see.php");
}
}
?>
