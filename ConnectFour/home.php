<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='style.css?v=<?php echo time(); ?>'>   
    <title>Home</title>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a5f0d8af53.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        $status = "online";
		$userid = $_SESSION["suserid"];
        include 'db.php';
		$updatestatus = "UPDATE `login` SET `Status`='$status' WHERE `user_id`='$userid'";
		//echo $updatestatus;
		$rs = mysqli_query($conn, $updatestatus);
        ?>
    <!-- Navigation bar -->
    <?php
    $page = "home";
    include 'navigation_bar.php';
    ?>
    <!-- End of Navigation bar -->

    <div class="game-container">
        <div class="row" style="height:auto;">
            <div class="container-fluid" style="text-align:center;padding:1%;">
                <h2 style="color: #605A5A;">Play and <span style="color: #DE3163;font-weight:bold;">Connect</span> with people</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="height: auto;">
            <div class="col-md-3">

                <div class="icon-description">

                    <table>
                        <tr>
                            <th colspan="2">
                                <h3 id="heading" style="color: #605A5A;text-align:center;margin:5px;">What does the icons mean?</h3>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <li class="fas fa-hamburger"></li>
                            </td>
                            <td>
                                <h6>I'm a foodie...</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <li class="fas fa-music"></li>
                            </td>
                            <td>
                                <h6>I love music...</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <li class="fas fa-coffee"></li>
                            </td>
                            <td>
                                <h6>I'm a coffee person...</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <li class="fas fa-campground"></li>
                            </td>
                            <td>
                                <h6>I love camping...</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <li class="fas fa-futbol"></li>
                            </td>
                            <td>
                                <h6>I love foot ball...</h6>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="icon-description" id="status" style="margin-top: 15px;min-height:220px;max-height:225px;overflow-y:scroll;">
                    <h3 id="heading" style="color: #605A5A;text-align:center;margin:5px;">People Online</h3>
                    <div id="online">
            

                    </div>
                    </div>

            </div>
            <div class="col-md-6 game" style="width:auto;">

                <form name="board" id="board" method="post" action="game_control.php" style="position: relative;">

                </form>
            </div>

            <div class="col-md-3">
            <div class="icon-description">
                    <?php include 'db.php';
                    $q = "SELECT score FROM `login` WHERE `user_id` = " . $_SESSION["suserid"];
                    $rs = mysqli_query($conn, $q);
                    
                        while ($row = mysqli_fetch_array($rs)) {
                            $score = $row["score"];
                        }
                   
                    ?>
                    <h1 id="score" style="text-align: center;color:#DE3163;"><?php print($score); ?></h1>
                    <p style="text-align: center;color:#605A5A">Your Score</p>

                </div>
                <div class="chat">
                    <div class="mssg-area" id="mssg-area"></div>
            
                        <form method="post" action="addmessage.php" style="border-radius:0 0 10px 10px;box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.9);">
                        <div style="display: flex;align-items:center;">
                        <input type="hidden" id="sessionuser" value="<?php print($_SESSION["suserid"]);?>">
                        <textarea id="msg" name="msg" style="height: 50px;width:100%;border-radius:10px;margin:10px;"></textarea>
                        <button style="width:30%;height:50px;border-radius:10px;background-color:#DE3163;color:white;border-color:#DE3163;font-size:1.2rem;margin:8px;">Post</button>
                        </div>
                        </form>           
                    </div>
                </div>   
        </div>
    </div>
    
</body>

</html>