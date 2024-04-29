<?php
global $jdExtras;
$logo = get_field('logo', 'options');
?>

<footer class="py-5">
	<div class="container">
		<div class="col-md-6">
			<?php dynamic_sidebar('footer-1') ?>
		</div>
        <div class="col-md-6"></div>
	</div>
</footer>

<section class="copyright py-4">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-6 text-start d-flex align-items-center">
                <h5 class="fw-bold text-uppercase mb-0">&copy; <?php echo date('Y'); ?> VINTAGETERMS. All Rights Reserved.</h5>
            </div>
            <div class="col-md-6 text-end d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/cards.png" alt="" class="ms-auto text-end img-fluid">
            </div>
        </div>
    </div>
</section>