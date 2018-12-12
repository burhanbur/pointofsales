<!doctype html>
<html class="fixed">
	<?php $this->load->view('backend/includes/head'); ?>
	<body>
		<section class="body">
			<!-- start: header -->
			<?php $this->load->view('backend/includes/header'); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php $this->load->view('backend/includes/sidebar'); ?>
				<!-- end: sidebar -->

				<!-- start: content -->
				<?php $this->load->view($content); ?>
				<!-- end: content -->
			</div>			
		</section>
		<?php $this->load->view('backend/includes/javascripts'); ?>
	</body>
</html>