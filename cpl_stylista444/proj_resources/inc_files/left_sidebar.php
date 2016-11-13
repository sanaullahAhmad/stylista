
<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->


        <div style="color:#FFFFFF; width:200px; font-size:16px; padding:30px; font-weight:bold;">Stylista Admin</div>

        <!-- Sidebar Profile links -->
        <div id="profile-links">
            Hello, <a href="#" title="Edit your profile"><?php echo $_SESSION['adm']; ?></a><br />
            <br />
            <a href="#" target="_blank" title="View the Site">View the site</a> | <a href="index.php?singout=1" title="Sign Out">Sign Out</a>
        </div>        

        <ul id="main-nav">  <!-- Accordion Menu -->

            <li>
                <a href="index.php" class="nav-top-item no-submenu" > <!-- Add the class "no-submenu" to menu items with no sub menu -->
                    Dashboard
                </a>       
            </li>

            <li>
                <a href="#" class="nav-top-item <?php if ($pagename == 'pages.php') {
    echo "current";
} ?>">
                    Pages
                </a>
                <ul>
                    <li><a href="pages.php">Manage Pages</a></li>
                </ul>
            </li>

            <!--li>
                    <a href="#" class="nav-top-item <?php if (($pagename == 'intro.php')) {
    echo "current";
} ?>">
                            Manage Home
                    </a>
                    <ul>
                            <li><a href="intro.php">Welcome Text</a></li>
                            
                            
                    </ul>
            </li-->

            <!--li>
                    <a href="#" class="nav-top-item">
                            Events Calendar
                    </a>
                    <ul>
                            <li><a href="#">Calendar Overview</a></li>
                            <li><a href="#">Add a new Event</a></li>
                            <li><a href="#">Calendar Settings</a></li>
                    </ul>
            </li-->
            <li>
                <a href="#" class="nav-top-item <?php if ($pagename == 'intro.php' || $pagename == 'slider.php') {
    echo "current";
} ?>">
                    Manage Header
                </a>
                <ul>
                    <li><a href="slider.php">Manage Slider</a></li>
                    <li><a href="intro.php">Welcome Text</a></li>

                </ul>
            </li>
            <li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'event.php'){echo "current";}?>">
                            Events
                    </a>
                    <ul>
                            <li><a href="event.php">Manage Events</a></li>
                            
                    </ul>
            </li>
            <li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'slider_images.php'){echo "current";}?>">
                            Slider Images
                    </a>
                    <ul>
                            <li><a href="slider_images.php">Manage Slider Images</a></li>
                            
                    </ul>
            </li>
            <li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'shops.php'){echo "current";}?>">
                            Shops
                    </a>
                    <ul>
                            <li><a href="shops.php">Manage Shops</a></li>
                            
                    </ul>
            </li>
            <li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'deals.php'){echo "current";}?>">
                            Deals
                    </a>
                    <ul>
                            <li><a href="deals.php">Manage Deals</a></li>
                            
                    </ul>
            </li>
            <li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'products.php'){echo "current";}?>">
                            Products
                    </a>
                    <ul>
                            <li><a href="products.php">Manage Products</a></li>
                            
                    </ul>
            </li>
            <li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'users.php'){echo "current";}?>">
                            Users
                    </a>
                    <ul>
                            <li><a href="users.php">Manage Users</a></li>
                            
                    </ul>
            </li>

            <!--li>
                    <a href="#" class="nav-top-item">
                            Settings
                    </a>
                    <ul>
                            <li><a href="#">General</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Your Profile</a></li>
                            <li><a href="#">Users and Permissions</a></li>
                    </ul>
            </li-->
            <!--li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'users.php') {
    echo "current";
} ?>">
                            User Management
                    </a>
                    <ul>
                            <li><a href="users.php">Manage Users</a></li>
                            
                    </ul>
            </li-->
            <!--li>
                    <a href="#" class="nav-top-item <?php if ($pagename == 'adds.php') {
    echo "current";
} ?>">
                            Adds Management
                    </a>
                    <ul>
                            <li><a href="adds.php">Manage Adds</a></li>
                            
                            
                    </ul>
            </li-->
            <!--li>
                                    <a href="#" class="nav-top-item <?php if ($pagename == 'console.php') {
    echo "current";
} ?>">
                                            Console Management
                                    </a>
                                    <ul>
                                            <li><a href="console.php">Manage Consoles</a></li>
                                            
                                            
                                    </ul>
                            </li-->  
            <!--li>
                                    <a href="#" class="nav-top-item <?php if ($pagename == 'games.php') {
    echo "current";
} ?>">
                                            Games Management
                                    </a>
                                    <ul>
                                            <li><a href="games.php">Manage Games</a></li>
                                            
                                            
                                    </ul>
                            </li-->
            <!--li>
                                   <a href="#" class="nav-top-item <?php if ($pagename == 'accessories.php') {
    echo "current";
} ?>">
                                           Accessories Management
                                   </a>
                                   <ul>
                                           <li><a href="accessories.php">Manage Accessories</a></li>
                                           
                                           
                                   </ul>
                           </li-->

        </ul> <!-- End #main-nav -->


    </div></div> <!-- End #sidebar -->