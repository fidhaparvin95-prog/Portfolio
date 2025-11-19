<header>        
        <nav class="navbar">
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <a href="#" class="nav-branding">ZUDO</a>
            <ul class="nav-menu">
                <li class="<?php if ($page == "home") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="index.php" class="nav-link">home</a>
                </li>
                <li class="<?php if ($page == "mens") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="mens.php" class="nav-link">mens</a>
                </li>
                <li class="<?php if ($page == "womens") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="womens.php" class="nav-link">womens</a>
                </li>
                <li class="<?php if ($page == "boys") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="boys.php" class="nav-link">boys</a>
                </li>
                <li class="<?php if ($page == "girls") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="girls.php" class="nav-link">girls</a>
                </li>
                <li class="<?php if ($page == "contact") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="contact.php" class="nav-link">contact us</a>
                </li>
                <li class="<?php if ($page == "login") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                    <a href="sign-in.php" class="nav-link">Login</a>
                </li>
                
            </ul>
            
        </nav>
    </header>