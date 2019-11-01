<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700&display=swap" rel="stylesheet">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<!-- grid -->
		<div class="grid">

			<!-- branding -->
			<header class="branding">
				<a href="<?php echo home_url(); ?>">
					<?php bloginfo('name'); ?>
				</a>
			</header class="branding">
			<!-- /branding -->

			<!-- nav -->
			<nav class="nav" role="navigation">
				<?php aspen_nav(); ?>
			</nav>
			<!-- /nav -->
