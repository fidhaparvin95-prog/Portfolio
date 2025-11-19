<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css'  href='style.css?v=<?php echo time(); ?>'>
</head>
<body>
   <div class="background">
    <!-- Acknowledgement - The video used in the login page is from https://www.flaticon.com/ -->
    <video autoplay muted loop id="background-video">
        <source src="images/background-video.mp4" type="video/mp4">
    </video>
        <h1 class="appname">Let's <span style="color: #DE3163;">Connect</span></h1>
        <!-- Login form of the website -->
        <form name="loginform" class="login" method="post" action="logincontrol.php">
            <table width = 100% >
                <tr>
                    <td colspan="3" style="padding: 20px;padding-bottom: 20px;">
                        <label style="font-size: 2.5rem;color: #DE3163;">Login</label>
                    </td>
                </tr>
                <tr>
                <td style="padding-left: 20px;padding-right:30px;">
                    <label><input type="radio" name="option" value="student" checked>Student</label>
                </td>
                <td style="padding-left: 20px;padding-right:30px;">
                    
                    <label><input type="radio" name="option" value="staff">Staff</label>
                </td>
                <td style="padding-left: 20px;padding-right:30px;">
                    
                    <label><input type="radio" name="option" value="admin">Admin</label>
                </td>
                </tr>
                
                <tr>
                    <td colspan="3" style="padding: 20px;padding-right:30px;">
                        <input type="text" class="frm" id="uname" name="uname" placeholder="Email" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-left: 20px;padding-right: 30px;">
                        <input type="password" class="frm" id="pwd" name="pwd" placeholder="password" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 20px;padding-right:30px;">
                        <button type="submit" value="login" style="height:50px; width: 100%;border-radius: 10px;background-color: #DE3163;color: white;font-size: 1.5rem;font-family: 'Times New Roman', Times, serif;border-color: #DE3163;border-style: solid;">Login</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <!-- Error or success message for login -->
                        <h5 style="text-align: center;color:<?php if(isset($_GET["mssg1"])){print("green");}else{print("red");}?>;">
                        <?php if(isset($_GET["errormssg"])){print("Invalid student details");}
                        elseif(isset($_GET["mssg1"])){print("Account created. Login to continue");}
                        elseif(isset($_GET["errormssg1"])){print("Invalid staff details");}
                        elseif(isset($_GET["errormssg2"])){print("Invalid admin details");}
                        ?>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-bottom:30px;text-align: center;padding-top:10px;">
                        <a href="signup.php" style="color: #605A5A;">Not a user yet? <span style="color: #DE3163;">Sign Up</span></a>
                    </td>
                </tr>
            </table>
        </form>
   </div>
</body>
</html>