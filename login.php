<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body></body>

<?php
		$username = ($_POST['username']); //POST 방식으로 값 받아서 변수에 저장
		$password =  ($_POST['password']); //POST 방식으로 값 받아서 변수에 저장
		$con = mysqli_connect('localhost','root','apmsetup','notice_board') or die("연결 안됨"); //데이터베이스 연결
		$username =  mysqli_real_escape_string($con, $username); // SQL Injection 방지
		$password = mysqli_real_escape_string($con, $password); // SQL Injection 방지	
		$result = mysqli_query($con, "select * from users where username='{$username}' and pw='{$password}';") or die("아이디와 패스워드를 확인해주세요!!");
		if(mysqli_num_rows($result) == 0){
			echo "<script>alert('아이디와 패스워드를 확인해주세요');
								window.history.back(-1); </script>";
		}
		else{
			if($username =='admin'){
					echo " <script>alert('관리자님 환영합니다.')</script>";
					echo "<script>location.href='adminpage.php'</script>";
				   }
			else{
				$nick = mysqli_query($con, "select nickname from users where username='{$username}';") or die("오류"); //로그인한 사용자의 닉네임확인
				$nickname = mysqli_fetch_array($nick);
				echo " <script>alert(' {$nickname[0]}환영합니다.')</script>";
				echo "<script>location.href='users.php'</script>";					
			   }
			}	
		mysqli_close($con);	
    ?>
	</html>