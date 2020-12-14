<!--Doctype HTML-->
<html>

<head>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<!-- Stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>

<body>
	<header>
		<section class="section-header">
			<div class="col-md-12 col-sm-6">
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
					<div class="container-fluid">
						<a class="navbar-brand" href="<?php echo base_url('Welcome/index'); ?>">Blog-X</a>
						<a class="navbar-brand" href="<?php echo base_url('Welcome/index'); ?>">Home</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
							<ul class="navbar-nav">
								<li class="nav-item text-light">
									<?php
									if (empty($this->session->userdata('logged_in'))) {
										$session_data = array('logged_in' => FALSE);
										$this->session->set_userdata($session_data);
										echo '<a class="nav-link" href="';
										echo base_url('Auth/login');
										echo '">Login</a>';
									}
									?>
								</li>
								<li class="nav-item text-light">
									<?php
									if (empty($this->session->userdata('logged_in'))) {
									} else {
										$user_id = $this->session->userdata('id');
										$username = $this->session->userdata('username');
										echo '<a class="text-light" style="text-decoration: none;">';
										echo $username;
										echo  '&nbsp; &nbsp;</a>';
										echo '<a class="text-light" style="text-decoration: none;" href="';
										echo base_url('Blog/add');
										echo  '">Add a new BlogX &nbsp; &nbsp;</a>';
										echo '<a class="text-light" style="text-decoration: none;" href="';
										echo base_url('Blog/userindex');
										echo  '">My Account &nbsp; &nbsp;</a>';
										echo '<a class="text-light" style="text-decoration: none;" href="';
										echo base_url('Auth/logout');
										echo '">Logout</a>';
									}
									?>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</section>
	</header>
