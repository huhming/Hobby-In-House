<!doctypei html>
<html>
	<head>
		<meta charset="utf-8">
	<head>
	<body>
<script>
	function search1(){
		if(frm1.search.value){
			frm1.submit();
		}else{
			location.href="see.php";
		}
	}
</script>
<div>
	<form method="get" name=frm1 action="see.php">검색
	<select name=kind>
	<option value=subject selected>제목
	<option value=writer selected>글쓴이
	<option value=content selected>내용
	</select>
	<input type=text size=45 name=search>
	<input type="button" name=byn1 onclick="search1()" value="찾기">
	<input type="hidden" name="no" value=0>
	</form>
</div>

<?php
include("dbconnect.php");
$pageNum=10;
$sql="select *from bulletin order by idx";
$res=mysqli_query($conn, $sql);
$pageTotal=mysqli_num_rows($res);
if(!isset($_GET['start']))$start=0;
else{
$start=$_GET['start']*$pageNum;}
if(!$start)$start=0;
if(isset($_GET['search'])){
	$sel=$_GET['kind'];
	$search=$_GET['search'];
	$sql="select *from bulletin where $sel like '%$search%' order by idx";
	$res=mysqli_query($conn, $sql);
	$pageTotal=mysqli_num_rows($res);
	$sql="select *from bulletin where $sel like '%$search%' order by idx limit $start, $pageNum";
}
else{
	$sql="select *from board order by idx desc limit $start, $pageNum";
}
$res=mysqli_query($conn, $sql);
$j=1*$start+1;
while($row=mysqli_fetch_array($res)){;
echo "<tr><td>".$j.'</td><td>'."<a href=\"view.php?idx={$row['idx']}\">".$row['subject'].'</td><td>'.$row['writer'].'</td><td>'.$row['date']."</ol></a></td>";
$j=$j+1;}
$pages=$pageTotal/$pageNum;
for($i=0;$i<$pages;$i++){
	if(isset($sel)){
		$no=$_GET['no'];
		echo "<a href=$_SERVER[PHP_SELF]?kind=$sel&search=$search&no=$i&&start=$i>[$i]</a>";}
		else{
	echo "<a href=$_SERVER[PHP_SELF]?start=$i>[$i]</a>";}}
echo '<a href="index.php">돌아가기</a>';
session_start();
if(isset($_SESSION['id'])){
			echo "<p><a href=\"write.php\">글작성</a></p>";}
?>
	</table>
	</body>
</html>
