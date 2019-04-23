<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>
<?php

        $con = mysqli_connect('localhost','root','apmsetup','notice_board') or die("연결 안됨");
        mysqli_select_db($con,'notice_board');
        $username =  htmlentities($_POST['username']); //XSS 방지
        $password =  htmlentities($_POST['password']); //XSS 방지
        $nickname =  htmlentities($_POST['nickname']); //XSS 방지
        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");

        $sql = mysqli_query($con, "select * from users where username='{$username}'") or die("쿼리 오류");
        $row= mysqli_num_rows($sql);
        if($row >=1){
                echo "<script>alert('아이디가 같은 사람이 있습니다');history.back();</script>";
            }
                else{
                    $sql = mysqli_query($con, "select * from users where nickname='{$nickname}'") or die("쿼리 오류");
                    $row= mysqli_num_rows($sql);
                }
            if($row >= 1){
                    echo "<script>alert('닉네임이 같은 사람이 있습니다');history.back();</script>";
            }
                else{
                    
                        //사용자의 정보를 DATABATSE에 입력
                        $sql = mysqli_query($con,"INSERT INTO users(nickname, username, pw) VALUES( '{$nickname}', '{$username}', '{$password}');") or die("전송실패"); 
                        echo "<script>alert('회원가입이 완료 되었습니다.'); location.href = 'index.html';</script>";
                }
                mysqli_close($con); 


?>