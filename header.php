<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a9d9d4569b.js" crossorigin="anonymous"></script>

		<?php wp_head(); ?>

		<?php aspen_styles(); ?>

	</head>
	<body <?php body_class(); ?>>

		<!-- grid -->
		<div class="grid">

			<?php aspen_header(); ?>

			<!-- backgrounds -->
			<div class="branding-bg"></div>
			<div class="nav-bg"></div>
			<!-- /backgrounds -->

