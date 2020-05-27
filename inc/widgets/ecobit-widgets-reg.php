<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Ecobit
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

 
function ecobit_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'ecobit'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'ecobit'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
    ));

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'ecobit' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="single_footer_part footer_1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'ecobit' ),
			'id'            => 'footer-2',
			'before_widget' => '<div class="col-sm-4 col-md-4 col-lg-2"><div id="%1$s" class="single_footer_part footer_2 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'ecobit' ),
			'id'            => 'footer-3',
			'before_widget' => '<div class="col-sm-4 col-md-4 col-lg-2"><div id="%1$s" class="single_footer_part footer_3 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'ecobit' ),
			'id'            => 'footer-4',
			'before_widget' => '<div class="col-sm-4 col-md-4 col-lg-2"><div id="%1$s" class="single_footer_part footer_4 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Five', 'ecobit' ),
			'id'            => 'footer-5',
			'before_widget' => '<div class="col-sm-4 col-md-3 col-lg-2"><div id="%1$s" class="single_footer_part footer_5 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	

}
add_action( 'widgets_init', 'ecobit_widgets_init' );
