<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php 
            echo ecobit_site_icon();
            wp_head(); 
            if ( is_front_page() ){
                $dynamic_class = 'main_menu';
                $top_btn_class = 'd-none d-sm-block btn_1 home_page_btn';
            } else {
                $dynamic_class = 'main_menu single_page_menu';
                $top_btn_class = 'd-none d-sm-block btn_1';
            }
        ?>
    </head>
    <body <?php body_class(); ?>>

    <!--::header part start::-->
    <header class="<?php echo esc_attr($dynamic_class)?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                            echo ecobit_theme_logo( 'navbar-brand' );
                        ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse main-menu-item',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav',
                                    'walker'         => new ecobit_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }

                            if( ecobit_opt( 'ecobit_header_btn' ) == 1 ){
                                $btn_lbl = !empty( ecobit_opt( 'header_btn_label' ) ) ? ecobit_opt( 'header_btn_label' ) : '';
                                $btn_url = !empty( ecobit_opt( 'booking_btn_url' ) ) ? ecobit_opt( 'booking_btn_url' ) : '';
                                ?>
                                <a class="<?php echo esc_attr( $top_btn_class )?>" href="<?php echo esc_url($btn_url)?>"><?php echo esc_html($btn_lbl)?></a>
                                <?php 
                            }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'ecobit_page_titlebar' ) ){
	    ecobit_page_titlebar();
    }

