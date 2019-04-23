
        <?php	

			$con = mysqli_connect('localhost','root','apmsetup','notice_board') or die("연결 안됨");
			mysqli_select_db($con,'notice_board');
			$Writer =  ($_POST['Writer']);
			$pass =  ($_POST['pass']);
            $title =  ($_POST['title']);
            $comment =  ($_POST['comment']);
			$date =  date("Y-m-d H:i:s");
            $visit =  0; 
            //DB 입력
			$result = mysqli_query($con,"INSERT INTO board_user(board_num, board_title, board_data, board_date, board_visit, board_pass, board_write_user) 
                                        VALUES('{$board_num}', '{$title}', '{$comment}', '{$date}','{$visit}','{$pass}','{$Writer}');") or die("전송실패");
            mysqli_close($con);
             echo " <script>alert('작성이 완료되었습니다.'); location.href = 'users.php';</script>";
        ?>  