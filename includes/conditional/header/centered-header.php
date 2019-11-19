<?php 

function print_centered_header ($args) { ?>
    
    <?php if (get_theme_mod('include_super_nav', '')) { ?>
        <!-- super-nav -->
        <nav class="super-nav" role="navigation">
            <div class="super-nav-container">
                <?php aspen_super_nav(); ?>
            </div>
        </nav>
        <!-- /super-nav -->
    <?php } ?>

    <!-- header -->
    <header class="header">

        <div class="nav">

            <?php if (get_theme_mod('include_primary_nav', '')) { ?>
                <!-- primary-nav -->
                <nav class="primary-nav" role="navigation">
                    <?php aspen_primary_nav(); ?>
                </nav>
                <!-- /primary-nav -->
            <?php } ?>

            <!-- branding -->
            <div class="branding">
                <div class="branding-content">
                    <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    <?php if (get_theme_mod('show_tagline', '')) { ?>
                        <p class="tagline"><?php bloginfo('description'); ?>
                    <?php } ?>
                </div>
            </div class="branding">
            <!-- /branding -->

            <?php if (get_theme_mod('include_secondary_nav', '')) { ?>
                <!-- secondary-nav -->
                <nav class="secondary-nav" role="navigation">
                    <?php aspen_secondary_nav(); ?>
                </nav>
                <!-- /secondary-nav -->
            <?php } ?>

        </div>

    <!-- /header -->
    </header>

<?php } ?>
