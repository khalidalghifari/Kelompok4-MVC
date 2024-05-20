 <header class="app-header"><a class="app-header__logo" href="index.php">GYM MS</a>
   <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
   <!-- Navbar Right Menu-->
   <ul class="app-nav">


     <!-- User Menu-->
     <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">Welcome : <?= $_SESSION['name'] ?> <i class="fa fa-user fa-lg"></i></a>
       <ul class="dropdown-menu settings-menu dropdown-menu-right">
         <li><a class="dropdown-item" href="/adminds/changepassword"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
         <li><a class="dropdown-item" href="/adminds/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
         <li><a class="dropdown-item" href="/adminds/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
       </ul>
     </li>
   </ul>
 </header>