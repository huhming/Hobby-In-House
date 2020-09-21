<?php
include("dbconnect.php");
$sql="delete from board where idx={$_GET['idx']}";
$result=mysqli_query($conn, $sql);
if($result===false){
	                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
			                error_log(mysqli_error($conn));
			                echo mysqli_error($conn);
}
else{
	                echo '삭제됐습니다.';
}
	echo "<a href=\"index.php\">돌아가기</a><br><a href=\"write.php\">글작성     </a><a href=\"update.php?idx={$_GET['idx']}\">글 수정 </a><br><a href=\"see.php\">글조회</a>";
	?>
