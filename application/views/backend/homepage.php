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
				<section role="main" class="content-body">
					<header class="page-header">
						<h2><i class="fa fa-home"></i><?php echo ' '.$judul; ?></h2>					
					</header>
					
				<?php $this->load->view($content); ?>
				</section>
				<!-- end: content -->
			</div>			
		</section>
		<?php $this->load->view('backend/includes/javascripts'); ?>
	</body>
</html>