
	<?php echo form_open_multipart('Blog/add'); ?>
	<div class="form-signin">
		<h1 class="h3 mb-3 font-weight-normal d-flex justify-content-center">Add a new blog</h1>
		<div class="login">
		<?php if(!empty($errors)) {
			echo '<p class="d-flex justify-content-center text-danger">';
	  echo  $errors;
	  echo '</p>';
    } ?>
			<div class="form-label">
				<label for="title" class="sr-only">Title</label>
				<input type="text" name="title" class="form-control" placeholder="Blog - Title" autofocus>
				<span style="color:red"><?php echo form_error('title'); ?></span>
			</div>
			<div class="form-label">
				<label for="desc" class="sr-only">Description</label>
				<textarea type="text" name="desc" class="form-control" placeholder="Blog - Description" > </textarea>
				<span style="color:red"><?php echo form_error('desc'); ?></span>
			</div>
			<div class="form-label">
				<label for="category"  class="sr-only">Category</label>
			<select class="form-control" name="category" >
				  <option disabled>Select a category</option>
				  <option value="angular">Angular</option>
				  <option value="vue">Vue</option>
				  <option value="food">Food</option>
			</select>
			</div>
			<div class="form-label">
				<label for="image" class="sr-only">Image</label>
				<input type="file" accept="image/*" name="image" class="form-control" placeholder="Select a image">
				<span style="color:red"><?php echo form_error('image'); ?></span>
			</div>
			<div class="section">
				<button class="btn btn-primary btn-block" type="submit">Add</button>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

