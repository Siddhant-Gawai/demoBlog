<div class="">
	<?php echo form_open('Auth/register'); ?>
	<div class="form-signin">
		<h1 class="h3 mb-3 font-weight-normal d-flex justify-content-center">Registration Form</h1>
		<div class="login">
			<div class="form-label">
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" name="email" class="form-control" placeholder="Email address" autofocus>
				<span style="color:red"><?php echo form_error('email'); ?></span>
			</div>
			<div class="form-label">
				<label for="fname" class="sr-only">First Name</label>
				<input type="text" name="fname" class="form-control" placeholder="First Name" >
				<span style="color:red"><?php echo form_error('fname'); ?></span>
			</div>
			<div class="form-label">
				<label for="lname" class="sr-only">Last Name</label>
				<input type="text" name="lname" class="form-control" placeholder="Last Name" >
				<span style="color:red"><?php echo form_error('lname'); ?></span>
			</div>
			<div class="form-label">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span style="color:red"><?php echo form_error('password'); ?></span>
			</div>
			<div class="section">
				<button class="btn btn-primary btn-block" type="submit">Sign Up</button>
				<a class="btn " href="<?php echo base_url('Auth/login'); ?>">Sign In</a>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
