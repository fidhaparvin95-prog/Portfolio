<header>        
        <nav class="navbar">
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <a href="#" class="nav-branding">ZUDO</a>
            <ul class="nav-menu">
                <li class="<?php if ($page == "userhome") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="userhome.php" class="nav-link">home</a>
                </li>
                <li class="<?php if ($page == "usermens") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="mensloggedin.php" class="nav-link">mens</a>
                </li>
                <li class="<?php if ($page == "userwomens") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="womensloggedin.php" class="nav-link">womens</a>
                </li>
                <li class="<?php if ($page == "userboys") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="boysloggedin.php" class="nav-link">boys</a>
                </li>
                <li class="<?php if ($page == "usergirls") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="girlsloggedin.php" class="nav-link">girls</a>
                </li>
                
                <li class="<?php if ($page == "") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="sign-in.php" class="nav-link">Logout(
                    <?php print($_SESSION["susername"]) ?> )</a>
                </li>
                
            </ul>
            
        </nav>
    </header>