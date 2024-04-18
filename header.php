<?php
/**
 * Default header - must include wp_head in <head> tags.
 * right after the opening <body> tag include wp_body_open
 *
 * @package EmigmaPress
 */

?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONTAWESOME KIT -->
    <script src="https://kit.fontawesome.com/f99060360b.js" crossorigin="anonymous"></script>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">

    <?php wp_body_open(); ?>

    <div class="d-print-none pt-md-9 px-md-6 p-md-3 pt-5 pt-md-0  w-100" id="search-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 px-md-8">
                    <div class="search-bar position-relative p-3 bg-white">

                            <!-- CLOSE BUTTONS
                            <?php if (wp_is_mobile()): ?>
                                <a class="clear" data-dismiss="search" aria-hidden="false" aria-label="Gumb zapri okno">&times;</a>
                            <?php endif; ?>

                            <a class="close" data-dismiss="search" aria-hidden="false" aria-label="Gumb zapri okno"><i class="fa-solid fa-x text-primary"></i></a>
                            -->

                        <?php get_search_form(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="page" class="site">

        <header id="header" class="site-header">

            <div class="header-wrapper d-flex flex-column align-items-center justify-content-between">

                <!-- STICKY NAVBAR -->
                <div class="nav-wrapper d-flex align-items-center justify-content-md-between justify-content-center
                        fw-medium flex-md-row flex-column gap-md-0 gap-8" id="nav-sticky">

                    <?php if ( has_custom_logo() ) : ?>
                        <div class="desktop-logo d-none d-md-block">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex">
                        <nav id="site-navigation-sticky" class="main-navigation">
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location'  => 'menu-main',
                                        'container_class' => 'main-menu-container align-items-center',
                                        'container_id'    => 'navbar-sticky',
                                        'menu_class'      => 'navbar-nav d-flex flex-column flex-md-row',
                                        'fallback_cb'     => '',
                                        'menu_id'         => 'main-menu',
                                    )
                            ); ?>
                            
                        </nav>

                        <h2>STICKY NAV IS HERE</h2>
                        
                        <a href="" class="ms-4 d-none d-md-block search-trigger" id="s-search-trigger">
                            <i class="fas fa-search text-secondary"></i>
                        </a>
                    </div>

                </div>

                <!-- NAVBAR -->
                <div class="nav-wrapper d-flex align-items-center justify-content-md-between justify-content-center
                        fw-medium flex-md-row flex-column gap-md-0 gap-8" id="nav">

                    <?php if ( has_custom_logo() ) : ?>
                        <div class="desktop-logo d-none d-md-block">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex">
                        <nav id="site-navigation" class="main-navigation">
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location'  => 'menu-main',
                                        'container_class' => 'main-menu-container align-items-center',
                                        'container_id'    => 'navbar',
                                        'menu_class'      => 'navbar-nav d-flex flex-column flex-md-row',
                                        'fallback_cb'     => '',
                                        'menu_id'         => 'main-menu',
                                    )
                            ); ?>

                        </nav>

                        <h2>NAVBAR IS HERE</h2>

                        <a href="" class="ms-4 d-none d-md-block search-trigger" id="search-trigger">
                            <i class="fas fa-search text-secondary"></i>
                        </a>
                    </div>

                </div>

                <!-- MOBILE NAVBAR (replaces nav wrapper, uses same menu) -->
                <div class="d-none mobile-nav">
                    <i id="burger">burger icon</i>
                </div>


                <!--HERO SECTION-->
                <div class="hero-wrapper position-relative w-100 d-flex mt-3 mt-md-7 mb-4 mb-md-8 px-md-15">
                    <h2>HERO WRAPPER CONTENT</h2>
                </div>

            </div> <!--header wrapper-->

        </header>

        <div id="main-content" class="site-content">