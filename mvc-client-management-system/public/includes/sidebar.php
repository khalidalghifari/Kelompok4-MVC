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
         <h1>
             <?= $_SESSION['login'] ?>
         </h1>
         <ul>
             <li><a class="tooltips" href="/admin/profile"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
             <li><a class="tooltips" href="/admin/password"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
             <li><a class="tooltips" href="/admin/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
         </ul>
     </div>
     <!--//down-->
     <div class="menu">
         <ul id="menu">
             <li><a href="/admin"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

             <li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span> Services</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                 <ul id="menu-academico-sub">
                     <li id="menu-academico-avaliacoes"><a href="/admin/service/add"> Add Services</a></li>
                     <li id="menu-academico-boletim"><a href="/admin/service">Manage Services</a></li>

                 </ul>
             </li>
             <li><a href="/admin/client/add"><i class="fa fa-user"></i> <span>Add Clients</span></a></li>
             <li><a href="/admin/client"><i class="fa fa-table"></i> <span>Clients List</span></a></li>
             <li><a href="/admin/invoices"><i class="fa fa-file-text-o"></i> <span>Invoices</span></a></li>
             <li><a href="/admin/invoice/searchInvoice"><i class="fa fa-search"></i> <span>Search Invoice</span></a></li>
         </ul>
     </div>
 </div>