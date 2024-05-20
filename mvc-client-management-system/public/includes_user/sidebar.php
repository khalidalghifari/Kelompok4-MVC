 <div class="sidebar-menu">
     <header class="logo">
         <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="dashboard.php"> <span id="logo">
                 <h1>CMS</h1>
             </span>
             <!--<img id="logo" src="" alt="Logo"/>-->
         </a>
     </header>
     <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
     <!--/down-->
     <div class="down">
         <p><?= $_SESSION['login'] ?></p>
         <p>System Administrator in Company</p>
         <ul>
             <li><a class="tooltips" href="/user/profile"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
             <li><a class="tooltips" href="/user/password"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
             <li><a class="tooltips" href="/user/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
         </ul>
     </div>
     <!--//down-->
     <div class="menu">
         <ul id="menu">
             <li><a href="/user/dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

             <li><a href="/user/invoices"><i class="fa fa-file-text-o"></i> <span>Invoices</span></a></li>


             <li><a href="/user/invoices/search/searchInvoice"><i class="fa fa-search"></i> <span>Search Invoice</span></a></li>

         </ul>
     </div>
 </div>