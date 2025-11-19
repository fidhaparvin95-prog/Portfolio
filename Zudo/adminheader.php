<!-- Navigation Bar for Admin User -->
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
            <li class="<?php if ($page == "adminhome") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                <a href="adminhome.php" class="nav-link">home</a>
            </li>
            <li class="<?php if ($page == "viewproduct") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                <a href="viewproduct.php" class="nav-link">View Product</a>
            </li>
            <li class="<?php if ($page == "updateproduct") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                <a href="updateproduct.php" class="nav-link">Update Product</a>
            </li>           
            <li class="<?php if ($page == "addadmin") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                <a href="addadmin.php" class="nav-link">Admin Control</a>
            </li>
            <li class="<?php if ($page == "adminlogout") {
                print("nav-item active");
            } else {
                print("nav-item");
            } ?>">
                <a href="logout.php" class="nav-link">Logout(
                    <?php print($_SESSION["susername"]) ?> )
                </a>
            </li>
        </ul>
    </nav>
</header>