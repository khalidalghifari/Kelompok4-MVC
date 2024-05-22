<header class="header-section">
    <div class="header-top">
        <div class="row m-0">
            <div class="col-md-6 d-none d-md-block p-0">
            </div>
            <div class="col-md-6 text-left text-md-right p-0">
                <?php if (strlen($_SESSION['uid']) == 0) : ?>
                    <div class="header-info d-none d-md-inline-flex">
                        <i class="material-icons">account_circle</i>
                        <a href="/user/login">
                            <p>Login</p>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="header-info d-none d-md-inline-flex">
                        <i class="material-icons">account_circle</i>
                        <a href="/user/profile">
                            <p>My Profile</p>
                        </a>
                    </div>
                    <div class="header-info d-none d-md-inline-flex">
                        <i class="material-icons">brightness_7</i>
                        <a href="/user/changepassword">
                            <p>Change Password</p>
                        </a>
                    </div>
                    <div class="header-info d-none d-md-inline-flex">
                        <i class="material-icons">logout</i>
                        <a href="/user/logout">
                            <p>Logout</p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <a href="/" class="site-logo" style="color:#fff; font-weight:bold; font-size:26px;">
            GYM MS<br />
            <small style="margin-top:-4%;">Gym Management System</small>
        </a>
        <div class="container">
            <ul class="main-menu">
                <?php
                $current_page = basename($_SERVER['REQUEST_URI'], ".php");
                ?>
                <li><a href="/" class="<?= $current_page == '' ? 'active' : '' ?>">Home</a></li>
                <li><a href="/about" class="<?= $current_page == 'about' ? 'active' : '' ?>">About</a></li>
                <li><a href="/contact" class="<?= $current_page == 'contact' ? 'active' : '' ?>">Contact</a></li>
                <?php if (strlen($_SESSION['uid']) == 0) : ?>
                    <li><a href="/login/admin" class="<?= $current_page == 'login/admin' ? 'active' : '' ?>">Admin</a></li>
                <?php else : ?>
                    <li><a href="/history" class="<?= $current_page == 'history' ? 'active' : '' ?>">Booking History</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
