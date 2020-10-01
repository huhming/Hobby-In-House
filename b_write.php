<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>게시물 작성</title>
</head>
<body>
	<form action="write_ok.php" method="post" enctype = "multipart/form-data">
		<h1>글작성</h1>
		<ul>
			<li>
				<label>
				제목
				<input type="text" name="subject">
				</label>
			</li>
		</ul>
		<ul>
    </li>
				<label>
				작성자
<?php
include("dbconnect.php");
session_start();
$sql="select *from accounts where id='{$_SESSION['id']}' and pwd='{$_SESSION['pwd']}'"; $res=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($res); echo $row['nick'];?>

				</label>
      </li>
    </ul>
		<ul>
      <li>
				<label>
				내용
				<input type="text" name="content">
				</label>
			</li>
    </ul>
		<p>
			<input type="file" name="file" id="dImageFile" accept="image/*">
		<button type="button" onclick="location.href='index.php';">취소</button>
			<button type="subit">완료</button>
		</p>
</body>
</html>
