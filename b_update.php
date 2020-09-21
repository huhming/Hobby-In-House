<?php
include("dbconnect.php");
$sql="select *from board where idx={$_GET['idx']}";
$res=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($res);
?>
<!doctype html>
<html>
<head>
        <meta charset="utf-8">
        <title>게시물 수정</title>
</head>
<body>
<form action="update_ok.php?idx=<?php echo $_GET['idx']?>" method="post">
                <h1>글수정</h1>
                <ul>
                        <li>
                                <label>
                                제목
				<input type="text" name="subject" value="<?php echo $row['subject']?>">
                                </label>
                        </li>
                </ul>
                <ul>
                        <li>
                                <label>
                                작성자
				<?php echo $row['writer']?>

                                </label>
                        </li>
                </ul>
                <ul>
                        <li>
                                <label>
                                내용
				<input type="text" name="content" value="<?php echo $row['content']?>">
                                </label>
                        </li>
                </ul>
                <p>
                        <button type="button" onclick="history.back();">취소</button>
                        <button type="subit">완료</button>
                </p>
</body>
</html>
