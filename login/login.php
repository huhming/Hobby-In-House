<meta charset="utf-8" />
<?php

  session_start();     //session 사용하기 위해 필수

  $con=mysqli_connect('localhost','ab5502ghals','ghfkd33*',"ab5502ghals");
  //checking connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{

//checking the VALUES
if($_POST["inputid"] == "" || $_POST["inputpw"]== "" ){
  echo'<script>alert("id, pw값을 적어주세요!"); history.back();</script>';
}

$userid = base64_encode(hash('sha512', $_POST['inputid'], true));
$password = base64_encode(hash('sha512', $_POST['inputpw'], true));

$sql=mysqli_query($con,"SELECT * FROM accounts WHERE usrid='$userid'");
$member=mysqli_fetch_array($sql);   //연관배열의 형태로 DB를 저장

//checking(working)
//print_r($member['usrpw']." <-DB의 PW  ///  그리고 입력받은 값은: ". $password);


# $member=$sql->fetch_array();

# $pw_fromDB=$member['usrpw'];

if($password === $member['usrpw']){

  $_SESSION['userid']=base64_encode(hash('sha512', $_POST['inputid'], true));  //이렇게 쓰기만 해도 세션값이 선언, 초기화됨.
  $_SESSION['userpw']=base64_encode(hash('sha512', $_POST['inputpw'], true));
  $_SESSION['nickname']=$member['nickname'];

  echo '<script>
        alert("로그인 되었습니다! 어서오세요 ';
  echo $member['nickname'];
  echo ' 님!");
        location="http://ab5502ghals.dothome.co.kr/my_info.html";
        </script>';
}else{
  echo '<script>
        alert("아이디나 패스워드를 다시 확인해주세요.");
        location="http://ab5502ghals.dothome.co.kr/index.html";
        </script>';
}

}
?>
