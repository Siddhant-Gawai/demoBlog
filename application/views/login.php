<!-----flash messages--->
<div class="container-fluid">
	<div id="mydivs">
		<?php echo $this->session->flashdata('success'); ?>

		<script>
			setTimeout(function() {
				$('#mydivs').hide('fast');
			}, 3000);
		</script>
	</div>
</div>
<!-----flash messages end--->


<div class="">
	<?php echo form_open('Auth/login'); ?>
	<div class="form-signin">
	
		<h1 class="h3 mb-3 font-weight-normal d-flex justify-content-center">Login Form</h1>
		 <?php if(!empty($errors)) {
			echo '<p class="d-flex justify-content-center text-danger">';
	  echo  $errors;
	  echo '</p>';
    } ?>
		<div class="login">
			<div class="form-label">
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" name="email" class="form-control" placeholder="Email address">
				<span style="color:red"><?php echo form_error('email'); ?></span>
			</div>
			<div class="form-label">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span style="color:red"><?php echo form_error('password'); ?></span>
			</div>
			<div class="section">
				<button class="btn btn-primary btn-block" type="submit">Sign in</button>
				<a class="btn " href="<?php echo base_url('Auth/register'); ?>">Sign Up</a>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
