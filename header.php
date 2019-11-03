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

		<?php 
		
		$preset = get_theme_mod( 'layout_preset', '' ); 
		$content_width = get_theme_mod( 'content_width', '');
		$fitted = get_theme_mod( 'fit_to_content_width', '' );

		if ($fitted) {
			$column = intdiv( $content_width, 3) . 'px';
			$edge = 'auto';
		} else {
			$column = '1fr';
			$edge = '5vw';
		}

		switch ($preset) {
			case 'stacked': 
				echo
				'<style type="text/css">
					.grid {
						grid-template-columns: ' . $edge . ' repeat(3, ' . $column . ') ' . $edge . ';
						grid-template-areas: ". br na na ."
						 					 "ma ma ma ma ma"
											 ". fo fo fo .";
					}
					.main > * {
						max-width: ' . $content_width . 'px;
					}
					.wp-block-cover__inner-container {
						max-width: ' . $content_width . 'px;
					}
				</style>';
				break;
			case 'sidebar':
				echo
				'<style>
					.grid {
						grid-template-columns: ' . $edge . ' repeat(3, ' . $column . ') ' . $edge . ';
						grid-template-areas: ". br ma ma ."
											 ". na ma ma ."
											 ". . ma ma ."
											 ". fo fo fo .";
					}
					.menu ul {
						flex-direction: column;
						align-items: flex-start;
						justify-content: flex-start;
					}
					.main {
						padding-top: 36px;
					}
					.main > * {
						max-width: ' . $content_width . 'px;
					}
					.wp-block-cover__inner-container {
						max-width: ' . $content_width . 'px;
					}
				</style>';
				break;
			default:
				// Do nothing
		}
		?>

	</head>
	<body <?php body_class(); ?>>

		<!-- grid -->
		<div class="grid">

			<!-- branding -->
			<header class="branding">
				<a href="<?php echo home_url(); ?>">
					<?php bloginfo('name'); ?>
				</a>
				<?php if (get_theme_mod('show_tagline', '')) { ?>
					<p class="tagline"><?php bloginfo('description'); ?>
				<?php } ?>
			</header class="branding">
			<!-- /branding -->

			<!-- nav -->
			<nav class="nav" role="navigation">
				<?php aspen_nav(); ?>
			</nav>
			<!-- /nav -->
