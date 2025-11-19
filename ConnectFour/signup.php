<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign Up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css'  href='style.css?v=<?php echo time(); ?>'>
</head>
<body>
   <div class="background">
   <video autoplay muted loop id="background-video">
        <source src="images/background-video.mp4" type="video/mp4">
    </video>
        <h1 class="appname">Let's <span style="color: #DE3163;">Connect</span></h1>
        <form name="signupform" class="login" method="post" action="signupcontrol.php">
            <table width = 100%>
                <tr>
                    <td colspan="2" style="padding: 10px;padding-bottom: 0;">
                        <label style="font-size: 2.5rem;color: #DE3163;">Sign Up</label>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px;">
                        <input type="text" class="frm" id="fname" name="fname" placeholder="First Name" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;" >
                    </td>
                    <td style="padding: 5px;padding-right:15px;">
                        <input type="text" class="frm" id="lname" name="lname" placeholder="Last Name" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;" >
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 5px;padding-right:15px;">
                        <input type="text" class="frm" id="em" name="em" placeholder="Email" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 5px;padding-right:15px;">
                        <input type="password" class="frm" id="pwd" name="pwd" placeholder="Password" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 5px;padding-right:15px;">
                        <input type="password" class="frm" id="cpwd" name="cpwd" placeholder="Confirm Password" style="width: 100%;height: 50px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 5px;padding-bottom:30px;padding-right:15px;padding-top:10px;">
                        <button type="submit" value="login" style="height:50px; width: 100%;border-radius: 10px;background-color: #DE3163;color: white;font-size: 1.5rem;font-family: 'Times New Roman', Times, serif;border-color: #DE3163;border-style: solid;">Sign Up</button>
                    </td>
                </tr>
            </table>
        </form>
   </div>
</body>
</html>