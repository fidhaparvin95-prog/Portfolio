<div class="nav-container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="navappname">Let's <span style="color: #DE3163;">Connect</span></h1>
            </div>        
          <div class="col-md-4">
            <ul class="nav-items">
            <a href="home.php"><li class="<?php if($page == "home"){print("navitem fas fa-home active");}else{print("fas fa-home");} ?>" style="color:#DE3163;font-size:1.8rem;"></li></a>
            <a href="profile.php"><li class="<?php if($page == "profile"){print("navitem fas fa-user-alt active");}else{print("fas fa-user-alt");} ?>" style="color:#DE3163;font-size:1.8rem;"></li></a>
            <a href="logout.php"><li class="fa fa-power-off" style="color:#DE3163;font-size:1.8rem;"></li></a>
            </ul>
          </div>
          <div class="col-md-4">
            <img src="<?php print($_SESSION["suserpic"]);?>" id="user-profile" style="float: right;border-radius:50%;height:40px;width:50px;margin:4%;border:2px solid #DE3163;">
          </div>
        </div>
        </div>
    </div>