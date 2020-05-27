<?php 
/**
 * @Packge     : Ecobit
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'ecobit_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'ecobit' ),
        'description' => esc_html__( 'Select the theme color.', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_general_section',
        'default'     => '#ff4800',
    )
);


// Header booking button field
Epsilon_Customizer::add_field(
    'ecobit_header_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Header button show/hide', 'ecobit' ),
        'section'     => 'ecobit_header_section',
        'default'     => true
    )
);

// Booking button label
Epsilon_Customizer::add_field(
    'header_btn_label',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Header button label', 'ecobit' ),
        'section'           => 'ecobit_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'sign up'
    )
);

// Booking button url
Epsilon_Customizer::add_field(
    'booking_btn_url',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Header button url', 'ecobit' ),
        'section'           => 'ecobit_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#',
    )
);

// Booking button hover background color
Epsilon_Customizer::add_field(
    'ecobit_booking_btn_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Button Hover BG Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_header_section',
        'default'     => '#ff4800'
    )
);

 
// Header background color field
Epsilon_Customizer::add_field(
    'ecobit_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'ecobit' ),
        'description' => esc_html__( 'Select the header background color.', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_header_section',
        'default'     => '#562fc7',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'ecobit_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_header_section',
        'default'     => '#ffffff',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'ecobit_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_header_section',
        'default'     => '#ff4800',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'ecobit_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_header_section',
        'default'     => '#ffffff',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'ecobit_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'ecobit_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'ecobit' ),
        'description' => esc_html__( 'Set post excerpt length.', 'ecobit' ),
        'section'     => 'ecobit_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'ecobit_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'ecobit' ),
        'section'     => 'ecobit_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'ecobit_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'ecobit' ),
        'section'     => 'ecobit_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'ecobit_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'ecobit' ),
        'section'     => 'ecobit_blog_section',
        'default'     => true
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'ecobit_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'ecobit' ),
        'section'           => 'ecobit_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'ecobit_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'ecobit' ),
        'section'           => 'ecobit_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'ecobit_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'ecobit_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_fof_section',
        'default'     => '#656565',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'ecobit' ),
        'section'     => 'ecobit_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'ecobit_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'ecobit' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'ecobit' ),
        'section'     => 'ecobit_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'ecobit_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'ecobit' ),
        'section'     => 'ecobit_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'ecobit' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'ecobit_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'ecobit' ),
        'section'     => 'ecobit_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Social Profile section
Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile Section', 'ecobit' ),
        'section'     => 'ecobit_footer_section',
        'default'     => true,

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'ecobit_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'ecobit' ),
        'section'     => 'ecobit_footer_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'ecobit_header_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'ecobit_footer_section',
		'label'        => esc_html__( 'Social Profile Links', 'ecobit' ),
        'button_label' => esc_html__( 'Add new social link', 'ecobit' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
        ),
        'default'      => [
            [
                'social_link_title' => esc_html__( 'Facebook', 'ecobit' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-facebook',
            ],
            [
                'social_link_title' => esc_html__( 'Twitter', 'ecobit' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-twitter',
            ],
            [
                'social_link_title' => esc_html__( 'Instagram', 'ecobit' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-instagram',
            ],
            [
                'social_link_title' => esc_html__( 'Behance', 'ecobit' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-behance',
            ],
        ],
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'ecobit' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'ecobit' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '#',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'ecobit' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'ecobit_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'ecobit_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_footer_section',
        'default'     => '#182028',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'ecobit_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'ecobit_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'ecobit' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'ecobit_footer_section',
        'default'     => '#ff4800',
    )
);

