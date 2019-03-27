<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="index.css">
	<link rel="login" href="login.php">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-3.2.0.min.js"></script>
	<title>Document</title>


</head>

<body>

	<div class="hidden" style="display: none;"></div>
	<div class="main_log">
		<p class="main_text" onclick="location.href='https://www.naver.com'">Notice board</p>
	</div>
	<form action="login.php" method="POST" class="main_borad">
		<div class="username"><input type="text" placeholder="아이디를 입력하세요." name="username" class="user_box" /></div><br />
		<div class="password"><input type="password" placeholder="비밀번호를 입력하세요." name="password" class="pw_box" /></div><br />
		<input type="submit" name="login" value="로그인" class="login" />
		<div class="findbox"> </div>
	</form>
	<input type="submit" name="signup_bt" value="SIGNUP" class="create" id="signup_move" onclick="location.href='signup.php'"/>




	<!-- <script type="text/javascript">


	$('#signup_move').click(function (e) { 
		if($('.signup').css('right')==='0px' ){

				$('.signup').animate({
					right: -600
				}, 1000)
		}
		else{

				$('.signup').animate({
					right: 0
				}, 1000)

		};
		
	});
		
		
	</script> -->

</body>

</html>