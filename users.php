<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
            <link rel="stylesheet" href="users.css">
            <title>board</title>
        </head>
        <body>
       
        <section class="sec1 trans">
            <div class="wrap">
                     <p class="pagetitle">notice board</p>
                            <div class="bgc_white trans">
                                <div style="display : flex">
                                     <p style='font-size:20px; text-align:center;flex:1'></p><br>
            </div>
            <input type="submit" name="board_write" value="글쓰기"  class="button_write" onclick="location.replace('board_write.html');">
            <form action="users.php" method="POST" class="main_borad">
            <div class="inputbox">
                <div class="textbox">
                    <input type="text" name="titlename" class="inputtext">
                </div>
                <input type="submit" name="titleinserct" value="입력"  class="button">
            </div> 

                <table>
                  <thead>
                    <tr>
                      <th>번호</td>
                      <th>제목</td>
                      <th>작성자</td>
                      <th>날짜</td>
                      <th>조회 수</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody style="background: rgb(255,255,255,0.3);">
                    <?php


                        if(isset($_POST['titleinserct'])){ //게시글 제목 검색
                            $select =  ($_POST['titlename']); 
                            $con = mysqli_connect("localhost","root","apmsetup","notice_board");
                            mysqli_set_charset($con,"uft8");
                            mysqli_select_db($con,'notice_board') or die("error");
                            $result = mysqli_query($con,"select * from board_user where board_title='{$select}';") or die("에러");
                            $count=mysqli_num_rows($result);
                        if($count =0){
                                echo "
                                <tr>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td> 
                                    <td>NOT found</td>

                                </tr>";
                        }
                        else{
                                    while ($array = mysqli_fetch_array($result)) {
                                         
                                        
                                        echo "<tr>";
                                        echo "<td>".$array["board_num"]."</td>";
                                        echo "<td><a href='list.php?no=".$array['board_num']."'>".$array['board_title']."</a></td>"; 
                                        echo "<td>".$array["board_write_user"]."</td>";
                                        echo "<td>".$array["board_date"]."</td>";
                                        echo "<td>".$array["board_visit"]."</td>";
                                        echo "</tr>";
                                       

                            }
                        
                        }
                    }
                    else{
                        $con = mysqli_connect("localhost","root","apmsetup","notice_board");
                        mysqli_set_charset($con,"uft8");
                        mysqli_select_db($con,'notice_board') or die("error");
                        $result=mysqli_query($con,"select * from board_user") or die("에러");
                        $count=mysqli_num_rows($result);
                        if($count =0){
                                echo "
                                <tr>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td>
                                    <td>NOT found</td> 
                                    <td>NOT found</td>

                                </tr>";
                        }
                        else{
                                    while ($array = mysqli_fetch_array($result)) {
                                         
                                        ?><form action="list.php"><?
                                        echo "<tr>";
                                       
                                        echo "<td>".$array["board_num"]."</td>";
                                        echo "<td><a href='list.php?no=".$array['board_num']."'>".$array['board_title']."</a></td>"; 
                                        echo "<td>".$array["board_write_user"]."</td>";
                                        echo "<td>".$array["board_date"]."</td>";
                                        echo "<td>".$array["board_visit"]."</td>";
                                        echo "</tr>";
                                        ?></form><?

                            }
                        
                        }
                    }
                
                    mysqli_close($con);
                
                    ?>
                  </tbody>
                </table>
                </form>

        </body>
        </html>