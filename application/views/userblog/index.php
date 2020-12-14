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
	<section class="blog-section">
	<div class="container">
	<div class="row">
	<?php foreach($blog as $b){ ?>
		<div class="blog-card">	
				<div class="row">
					<div class="col-2">
						<img height="120px" width="120px" src="<?php echo $b['attachment']; ?>" alt="Image" />
					</div>
					<div class="col-10">
						<div class="card-title d-flex justify-content-left">
							<h3> <?php echo $b['title']; ?> </h3>
						</div>
						<p class="card-text d-flex justify-content-left"> <?php echo $b['description']; ?> </p>
						<div class="card-body">
    <a style="text-decoration: none;" class="card-link"><?php echo $b['category']; ?></a>
    <a style="text-decoration: none;" class="card-link"><?php echo $b['created']; ?></a>
  </div>
					
					</div>
				</div>
			
		</div>
		<?php } ?>
	</div>
	</div>
	</section>
