<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
            <link rel="stylesheet" href="list.css">
            <title>list</title>
        </head>
        <body>
       
        <section class="sec1 trans">
        <button class="back" type="button" onclick="location.replace('users.php');">Back</button>
            <div class="wrap">
                     <p class="pagetitle">notice board</p>
                            <div class="bgc_white trans">
                                     <p style='font-size:20px; text-align:center;flex:1'></p><br>
            </div>

                <?php
                    
                        $bno = $_GET['no'];
                        $con = mysqli_connect("localhost","root","apmsetup","notice_board");
                        mysqli_set_charset($con,"uft8");
                        mysqli_select_db($con,'notice_board') or die("error");
                        $result = mysqli_query($con,"select * from board_user where board_num ='{$bno}';") or die("에러");
                        $count=mysqli_num_rows($result);
                        $array = mysqli_fetch_array($result);
                        $visit = mysqli_query($con,"update board_user set board_visit = board_visit + 1 where board_num = '{$bno}';");

?>
                                        <table>
                                        <thead>
                                          <tr>
                                            <th>제목</td>
                                            <?echo "<td>".$array['board_title']."</td>"; ?>
                                         </tr>
                                         <tr>
                                            <th>글쓴이</td>
                                           <? echo "<td>".$array["board_write_user"]."</td>"; ?>
                                         </tr>                                         
                                            <th>작성일</td>
                                            <? echo "<td>".$array["board_date"]."</td>"; ?>
                                         </tr> 
                                         </tr>                                         
                                            <th>조회 수</td>
                                             <? echo "<td>".$array["board_visit"]."</td>"; ?>
                                         </tr> 
                                         </thead>
                                       </table>
                                         <div class='data_box'>
                                            <? echo "<p class='data'>".$array["board_data"]."</p>"; ?>
                                            </div>
                     <?
  
                    mysqli_close($con);
                
                    ?>