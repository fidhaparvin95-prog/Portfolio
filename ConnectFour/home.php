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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a5f0d8af53.js" crossorigin="anonymous"></script>

</head>

<body style="height: auto;">

    <?php
    //As soon as the user logs in the status of the user is updated to online
    $status = "online";
    $userid = $_SESSION["suserid"];
    include 'db.php';
    $updatestatus = "UPDATE `profile` SET `Status`='$status' WHERE `user_id`='$userid' and `user`='student'";
    $rs = mysqli_query($conn, $updatestatus);
    ?>
    <!-- Navigation bar -->
    <?php
    $page = "home";
    include 'navigation_bar.php';
    ?>
    <!-- End of Navigation bar -->


    <!-- Acknowledgment- Bootstrap - I have used bootstrap modal and carousel in this part -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">How to play?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Acknowledgment - usage of Bootstrap Carousel -->
                    <!-- Displaying a tutotial of how to play by using screen shots of playing the game -->
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="height: auto;">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="images/howtoplay1.png" class="d-block w-100" alt="...">
                                <div>
                                    <p>Each icons on the tile has a meaning and it is given on the left hand side. Click on any icon according to your interest. For example if you like coffee,
                                        click on any of the coffee icon and the tile is reserved for you.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="images/howtoplay2.png" class="d-block w-100" alt="...">
                                <div>
                                    <p>If you are a coffe person, which coffee tile to click? You can click on any coffee tile that would create a connect four.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/howtoplay3.png" class="d-block w-100" alt="...">
                                <div>
                                    <p>Earn a point for each connect four created</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal -->
    <!-- Acknowledgement - Usage of bootstrap modal -->
    <!-- This section explains the meaning of each icon in a triggered modal box -->
    <div class="modal fade" id="icondescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">How to change icons?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- End of modal -->
    <!-- Body of home page -->
    <div class="game-container">
        <div class="row" style="height:auto;">
            <div class="col-md-3" style="padding:1%;">
                <!-- Button that triggers the modal about the meaning of each icon -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#icondescription" style="float:right;background-color: #DE3163;border-color:#DE3163;">
                    What does the icon mean?
                </button>
            </div>
            <!-- Game container. Game is created with the help of javascript -->
            <div class="col-md-6">
                <div class="container-fluid" style="text-align:center;padding:1%;">
                    <h2 style="color: #605A5A;">Play and <span style="color: #DE3163;font-weight:bold;">Connect</span> with people</h2>

                </div>
            </div>
            <div class="col-md-3" style="padding:1%;">
                <!-- Button that triggers modal box for how to play section -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left:12%;background-color: #DE3163;border-color:#DE3163;">
                    How to play?
                </button>
            </div>

        </div>
        <div class="row d-flex justify-content-center" style="height: auto;">
            <div class="col-md-3">
                <div class="icon-description">
                    <!-- Section where the list of top player details are disaplyed. Data is displayed by javascript  -->
                    <h3 id="heading" style="color: #605A5A;text-align:center;margin:5px;"><img src="images/trophy.png" style="height:30px;padding-right:10px;">Top Players</h3>
                    <table id="topplayer">
                    </table>
                </div>
                <div class="icon-description" id="status" style="margin-top: 15px;min-height:310px;max-height:225px;overflow-y:scroll;">
                    <!-- Section where the details of people who are online is displayed. Data is displayed by javascript     -->
                    <h3 id="heading" style="color: #605A5A;text-align:center;margin:5px;">People Online</h3>
                    <div id="online">


                    </div>
                </div>

            </div>
            <!-- Connect four board which is created in a form with buttons for each tile. Board is entirely created by javascript -->
            <div class="col-md-6 game" style="width:auto;">

                <form name="board" id="board" method="post" action="game_control.php" style="position: relative;">

                </form>
            </div>

            <div class="col-md-3">
                <div class="icon-description">
                    <!-- Displaying the users current score. Data is fetched and displayed by java script -->
                    <h1 id="score" style="text-align: center;color:#DE3163;"></h1>
                    <p style="text-align: center;color:#605A5A">Your Score</p>

                </div>
                <div class="chat">
                    <!-- Chat section where the previously sent messages are viewed in the chatbox -->
                    <div class="mssg-area" id="mssg-area"></div>
                    <!-- Form to send a new message in the chat box -->
                    <form method="post" action="addmessage.php">
                        <div style="display: flex;align-items:center;">
                            <input type="hidden" id="sessionuser" value="<?php print($_SESSION["suserid"]); ?>">
                            <textarea id="msg" name="msg" style="height: 50px;width:100%;border-radius:10px;margin:10px;"></textarea>
                            <button style="width:30%;height:50px;border-radius:10px;background-color:#DE3163;color:white;border-color:#DE3163;font-size:1.2rem;margin:8px;">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" style="margin: 0 auto;display:block;padding:20px;">
            <!-- Feedback section where users will be able to send feebacks about the application -->
            <div class="row" id="feedback" style="height: 350px;width:100%;background-color:white;border:2px solid #B6B1B1;box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.9);">
                <div class="col-md-4">
                    <img src="images/feedback1.png" style="padding: 20px;">
                </div>
                <div class="col-md-4">
                    <form method="post" action="feedback.php" style="width:auto;height:auto;">
                        <input type="text" id="nam" name="nam" style="width:91%;margin-top:30px;margin-left:20px;border-radius:10px;border-style:solid;" placeholder="Your Name">
                        <input type="text" id="em" name="em" style="width:91%;margin:20px;border-radius:10px;border-style:solid;" placeholder="Your Email">
                        <textarea id="mssg" name="mssg" style="height:100px;width:91%;margin-left:20px;margin-bottom:20px;border-radius:10px;border:2px solid rgb(118,118,118);" placeholder="Your Message"></textarea><br>
                        <button style="height:40px;width:100px;background-color:#DE3163;border-radius:5px;color:white;border-style:solid;border: 1px solid #DE3163;margin:0 auto;display:block;">Send</button>
                        <h5 style="text-align: center;color:green;margin:2%;"><?php if (isset($_GET["mssg_feed"])) {
                                                                                    print("Thank You for your feedback");
                                                                                } ?></h5>
                    </form>
                </div>
                <div class="col-md-4">
                    <!-- Contact details section -->
                    <div class="container" style="height:auto;text-align:center;margin-top:10%;">
                        <h1 style="color:#605A5A;">Contact</h1>
                        <p style="color:#DE3163;">0123456789</p>
                        <p style="color:#DE3163;">xyz@ucl.ac.ul</p>
                        <p style="color:#DE3163;">www.xyz.com</p>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

</html>