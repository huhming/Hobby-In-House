<?php
include("dbconnect.php");
$sql="
        UPDATE board
                SET
			subject='{$_POST['subject']}',
			content='{$_POST['content']}',
			date=now()
		where idx='{$_GET['idx']}'

";
$result=mysqli_query($conn, $sql);
die(print_r($result));
if($result===false){
	                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
			                error_log(mysqli_error($conn));
			                echo mysqli_error($conn);
}
else{
          header("location:./view.php?idx={$_GET['idx']}");
}
?>
