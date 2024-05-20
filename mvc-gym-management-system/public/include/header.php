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
					<li><a href="/" class="active">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/contact">Contact</a></li>
					<?php if (strlen($_SESSION['uid']) == 0) : ?>
						<li><a href="/login/admin">Admin</a></li>
					<?php else : ?>
						<li><a href="/history">Booking History</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</header>