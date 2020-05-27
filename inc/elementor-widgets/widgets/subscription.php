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
 * Ecobit elementor subscription section widget.
 *
 * @since 1.0
 */
class Ecobit_Subscription extends Widget_Base {

	public function get_name() {
		return 'ecobit-subscription';
	}

	public function get_title() {
		return __( 'Subscription', 'ecobit' );
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
            'subscription_section',
            [
                'label' => __( 'Subscription Section Content', 'ecobit' ),
            ]
        );
        $this->add_control(
			'sub_head',
			[
                'label'     => __( 'Subscription Heading', 'ecobit' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => __( '<h2>Experience the most simple way to <br>manage business</h2>', 'ecobit' )
			]
        );

        $this->add_control(
			'sub_form',
			[
                'label'         => __( 'Subscription Form Shortcode', 'ecobit' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'placeholder'   => '[contact-form-7 id="670" title="Subscription Form"]'
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
                'label' => __( 'Subscription Style', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_part h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'form_styles_separator',
            [
                'label'     => __( 'Form Styles', 'ecobit' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'input_color', [
                'label'     => __( 'Input Field Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_part .form-control' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_part .btn_2' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_color', [
                'label'     => __( 'Button Hover Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_part .btn_2:hover' => 'background-color: transparent; color: {{VALUE}}!important; border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $sub_head = !empty( $settings['sub_head'] ) ? $settings['sub_head'] : '';
        $form_shortcode = !empty( $settings['sub_form'] ) ? $settings['sub_form'] : '';
        $dynamic_class = is_front_page() ? 'subscribe_part padding_bottom' : 'subscribe_part section_padding';

        $ellipse_5   = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_5.png';
    ?>

    <!--::subscribe us part end::-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_text text-center">
                        <?php                            
                            //Header Text ==============
                            if( $sub_head ){
                                echo wp_kses_post( wpautop( $sub_head ) );
                            }
                        ?>
                        <div class="subscribe_form">
                            <?php                            
                                //Form Shortcode ==============
                                if( $form_shortcode ){
                                    echo do_shortcode( $form_shortcode );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo $ellipse_5?>" alt="ellipse 5" class="feature_icon_2 custom-animation2">
    </section>
    <!--::subscribe us part end::-->
    <?php

    }
	
}
