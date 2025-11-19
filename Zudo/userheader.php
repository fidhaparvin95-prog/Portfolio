<!-- Navigation Bar for customer User after logging in -->
<!-- Acknowledgment - Partial usage of youtube to create this navigation bar navigation bar -->
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
                    <a href="index.php" class="nav-link">home</a>
                </li>
                <li class="<?php if ($page == "usermens") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="mens.php" class="nav-link">mens</a>
                </li>
                <li class="<?php if ($page == "userwomens") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="womens.php" class="nav-link">womens</a>
                </li>
                <li class="<?php if ($page == "userboys") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="boys.php" class="nav-link">boys</a>
                </li>
                <li class="<?php if ($page == "usergirls") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="girls.php" class="nav-link">girls</a>
                </li>
                <li class="<?php if ($page == "userprofile") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="userprofile.php" class="nav-link">profile</a>
                </li>
                
                <li class="<?php if ($page == "") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="logout.php" class="nav-link">Logout(
                    <?php print($_SESSION["susername"]) ?> )</a>
                </li>
                
            </ul>
            
        </nav>
    </header>