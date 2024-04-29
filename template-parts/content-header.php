<?php
global $jdExtras;
$logo = get_field('logo', 'options');
?>
<nav class="navbar navbar-expand-lg navbar-light py-2 d-lg-flex d-none">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
            <div class="left fw-bold text-uppercase text-black">
	            <?php echo wp_nav_menu(
		            array(
			            'theme_location' => 'primary-left',
			            'container'      => false,
			            'add_li_class'   => 'nav-item me-4',
			            'items_wrap'     => '<ul id="%1$s" class="navbar-nav d-flex justify-content-evenly w-100 %2$s">%3$s</ul>',
			            'walker'         => new bootstrap_5_wp_nav_menu_walker()
		            )
	            ); ?>
            </div>
            <div class="logo mx-5">
                <a href="/"><img src="<?php echo $logo; ?>" alt="" height="90px" class="text-center"></a>
            </div>
            <div class="right fw-bold text-uppercase text-black">
	            <?php echo wp_nav_menu(
		            array(
			            'theme_location' => 'primary-right',
			            'container'      => false,
			            'add_li_class'   => 'nav-item me-4',
			            'items_wrap'     => '<ul id="%1$s" class="navbar-nav d-flex justify-content-evenly %2$s">%3$s</ul>',
			            'walker'         => new bootstrap_5_wp_nav_menu_walker()
		            )
	            ); ?>
            </div>
        </div>
    </div>
</nav>

<nav class="mobile-menu d-lg-none d-md-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-2 d-flex">
                <div class="hamburger-icon me-4">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1 class="fw-bold text-uppercase">VintageTerms</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid menu">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a class="close-menu"></a>
                </div>
	            <div>
		            <?php echo wp_nav_menu(
			            array(
				            'theme_location' => 'mobile',
				            'container'      => false,
				            'add_li_class'   => 'nav-item fw-bold text-uppercase',
				            'items_wrap'     => '<ul id="%1$s" class="navbar-nav %2$s">%3$s</ul>',
				            'walker'         => new bootstrap_5_wp_nav_menu_walker()
			            )
		            ); ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="page-shade"></div>