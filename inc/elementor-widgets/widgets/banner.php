<?php
namespace Ecobitelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Ecobit elementor about us section widget.
 *
 * @since 1.0
 */
class Ecobit_Banner extends Widget_Base {

	public function get_name() {
		return 'ecobit-banner';
	}

	public function get_title() {
		return __( 'Banner', 'ecobit' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'ecobit-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'ecobit' ),
            ]
        );
        $this->add_control(
			'left_img',
			[
				'label'         => esc_html__( 'Left Image', 'ecobit' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'ecobit' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h1>Building Networks For People</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'ecobit' )
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'ecobit' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'try for free', 'ecobit' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'ecobit' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Heading Style', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big  Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();


        
        // Button Style ==============================
        $this->start_controls_section(
            'btn_styles', [
                'label' => __( 'Button Styles', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'btnn_txt_color', [
                'label' => __( 'Button Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn_bg_color', [
                'label' => __( 'Button BG & Border Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_separator',
            [
                'label'     => __( 'Hover Styles', 'ecobit' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btnn_hvr_txt_color', [
                'label' => __( 'Button Hover Text & Border Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2:hover' => 'color: {{VALUE}}!important; border-color: {{VALUE}}; background: transparent!important;',
                ],
            ]
        ); 
        $this->end_controls_section();


        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'ecobit' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $left_img   = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'ecobit_banner_left_img_719x664', false, array( 'alt' => 'banner left image' ) ) : '';
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $button_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $button_url = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';

        $ellipse_7    = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_7.png';
        $ellipse_8    = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_8.png';
        $ellipse_1    = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_1.png';
        $ellipse_2    = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_2.png';
        $ellipse_3    = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_3.png';
        $ellipse_4    = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_4.png';
    ?>

    <!--::banner part start::-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="banner_img d-none d-lg-block">
                        <?php
                            //Left image ==============
                            if( $left_img ){
                                echo wp_kses_post(  $left_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <?php
                                //Content ==============
                                if( $ban_content ){
                                    echo wp_kses_post( wpautop( $ban_content ) );
                                }
                                // Button =============
                                if( $button_label ){
                                    echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo $ellipse_7?>" alt="" class="feature_icon_1 custom-animation1">
        <img src="<?php echo $ellipse_8?>" alt="" class="feature_icon_2 custom-animation2">
        <img src="<?php echo $ellipse_1?>" alt="" class="feature_icon_3 custom-animation3">
        <img src="<?php echo $ellipse_2?>" alt="" class="feature_icon_4 custom-animation4">
        <img src="<?php echo $ellipse_3?>" alt="" class="feature_icon_5 custom-animation5">
        <img src="<?php echo $ellipse_4?>" alt="" class="feature_icon_6 custom-animation6">
    </section>
    <!--::banner part start::-->
    <?php

    }
	
}
