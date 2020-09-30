<meta charset="utf-8" />
<?php
    $usrid=base64_encode(hash('sha512', $_POST['userid'], true));
    $usrpw=base64_encode(hash('sha512', $_POST['userpw'], true));
    $usrname=$_POST['username'];
    $con=mysqli_connect('localhost','ab5502ghals','ghfkd33*',"ab5502ghals");

//checking connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

//id,pw INSERT
    $sql=mysqli_query($con,"SELECT * FROM accounts");

//script inserting protect!
    if(preg_match("/<script>/i",$usrid) || preg_match("/<script>/i",$usrpw)){
      echo"<script>alert('XSS attack alarm!!');history.back();</script>";
    }

    $error_detect=0;


    while($member=mysqli_fetch_array($sql)){
      if($member['nickname']==$usrname){
        $error_detect=1;
        echo"<script>alert('이미 닉네임이 사용중입니다.');location.href='http://ab5502ghals.dothome.co.kr/sign_in.html';</script>";
      }
      if($member['usrid']==$usrid || $member['usrpw']==$usrpw){
        $error_detect=1;
        echo"<script>alert('이미 id/pw가 사용중입니다.');location.href='http://ab5502ghals.dothome.co.kr/sign_in.html';</script>";
      }
    }

    if(!($error_detect)){
      $sql=mysqli_query($con,"INSERT INTO accounts(usrid,usrpw,nickname) VALUES('$usrid','$usrpw','$usrname')");

      echo '
      <a href="sign_in.html">회원가입</a> |
      <a href="index.html">로그인</a> |
      <a href="bulletin.html">게시판</a> |
      <a href="my_info.html">내 정보 수정</a>
      <a href="score_list.html">점수판</a>
      <br>
      <script>
      alert("sign-in completed!");
            location="http://ab5502ghals.dothome.co.kr/index.html";
      </script>';         //using JS is better I think.
    }

/*
//INSERT checking             ::error is on, but working, Dont know why

      $result = mysqli_query($con, $sql);
      if($result === false){
            echo mysqli_error($con);
      }
*/


?>
