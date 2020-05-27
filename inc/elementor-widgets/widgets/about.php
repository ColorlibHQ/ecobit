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
class Ecobit_About_Us extends Widget_Base {

	public function get_name() {
		return 'ecobit-about-us';
	}

	public function get_title() {
		return __( 'About Us', 'ecobit' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'ecobit-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'about_section',
            [
                'label' => __( 'About Us Section Content', 'ecobit' ),
            ]
        );
        $this->add_control(
			'number_img',
			[
				'label'         => esc_html__( 'Number Image', 'ecobit' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
        );
        $this->add_control(
            'about_content',
            [
                'label'         => esc_html__( 'About Us Content', 'ecobit' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Easy To <br>Access Social Media</h2><p>Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.</p>', 'ecobit' )
            ]
        );
        $this->add_control(
            'about_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'ecobit' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'learn more', 'ecobit' )
            ]
        );
        $this->add_control(
            'about_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'ecobit' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'img_position',
            [
                'label'         => esc_html__( 'Change Image Position', 'ecobit' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_block'   => false,
				'label_on'      => 'LEFT',
				'label_off'     => 'RIGHT',
                'default'       => 'no',
                'options'       => [
                    'no'      => 'LEFT',
                    'yes'     => 'RIGHT'
                ]
            ]
        );

        $this->add_control(
			'about_img',
			[
				'label'         => esc_html__( 'Right Image', 'ecobit' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
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
                'label' => __( 'About Us Heading Style', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big  Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .about_us .about_us_text .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn_bg_color', [
                'label' => __( 'Button BG & Border Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2' => 'background: {{VALUE}}; border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .about_us .about_us_text .btn_2:hover' => 'color: {{VALUE}}!important; border-color: {{VALUE}}; background: transparent!important;',
                ],
            ]
        ); 
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $number_img   = !empty( $settings['number_img']['id'] ) ? wp_get_attachment_image( $settings['number_img']['id'], 'ecobit_about_number_img_62x56', false, array( 'alt' => 'number image' ) ) : '';
        $ban_content = !empty( $settings['about_content'] ) ? $settings['about_content'] : '';
        $button_label = !empty( $settings['about_btnlabel'] ) ? $settings['about_btnlabel'] : '';
        $button_url = !empty( $settings['about_btnurl']['url'] ) ? $settings['about_btnurl']['url'] : '';
        $about_img   = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'ecobit_about_img_627x548', false, array( 'alt' => 'about one image' ) ) : '';
        $img_position = !empty( $settings['img_position'] ) ? $settings['img_position'] : '';
        $ellipse_4   = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_4.png';
        $dynamic_class   = ($img_position == 'yes') ? 'about_us right_time' : 'about_us section_padding';
    ?>

    <!--::about_us part start::-->
    <section class="<?php echo $dynamic_class?>">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <?php if ( $img_position == 'yes' ) { ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="learning_img">
                            <?php
                                if( $about_img ){
                                    echo wp_kses_post( $about_img );
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                ?>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <?php
                            if( $number_img ){
                                echo wp_kses_post( $number_img );
                            }
                            
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
                <?php if ( $img_position != 'yes' ) { ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="learning_img">
                            <?php
                                if( $about_img ){
                                    echo wp_kses_post( $about_img );
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </div>
        <img src="<?php echo $ellipse_4?>" alt="ellipse 4" class="feature_icon_1 custom-animation1">
    </section>
    <!--::about_us part end::-->
    <?php

    }
	
}
