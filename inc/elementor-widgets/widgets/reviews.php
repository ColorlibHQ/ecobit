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
 * Ecobit elementor reviews section widget.
 *
 * @since 1.0
 */
class Ecobit_Reviews extends Widget_Base {

	public function get_name() {
		return 'ecobit-reviews';
	}

	public function get_title() {
		return __( 'Reviews', 'ecobit' );
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
            'review_section',
            [
                'label' => __( 'Reviews Section Content', 'ecobit' ),
            ]
        );
        $this->add_control(
			'rev_img',
			[
				'label'         => esc_html__( 'Review Image', 'ecobit' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
        );

        $this->add_control(
            'review_contents', [
                'label' => __( 'Create New', 'ecobit' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'      => 'reviews',
                        'label'     => __( 'Reviews Content', 'ecobit' ),
                        'type'      => Controls_Manager::WYSIWYG,
                        'default'       => __( '<h2>With efficiency to unlock more opportunities</h2><p>Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.</p>', 'ecobit' )
                    ],
                    [
                        'name'      => 'client_name',
                        'label'         => esc_html__( 'Client Name', 'ecobit' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'       => esc_html__( 'Mitchel Jeferson', 'ecobit' )
                    ],
                    [
                        'name'      => 'client_designation',
                        'label'         => esc_html__( 'Client Designation', 'ecobit' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'       => esc_html__( 'CEO of softking', 'ecobit' )
                    ],
                ],
            ],
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
                'label' => __( 'Reviews Heading Style', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big  Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'client_name_color', [
                'label'     => __( 'Client Name Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'client_desig_color', [
                'label'     => __( 'Designation Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'client_nav_color', [
                'label'     => __( 'Navigator Dot Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .owl-dots button.owl-dot.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();

        // Loading widget script
        $this->load_widget_script();

        $rev_img   = !empty( $settings['rev_img']['id'] ) ? wp_get_attachment_image( $settings['rev_img']['id'], 'ecobit_review_img_595x545', false, array( 'alt' => 'review image' ) ) : '';
        $reviews = !empty( $settings['review_contents'] ) ? $settings['review_contents'] : '';
        $client_name = !empty( $settings['client_name'] ) ? $settings['client_name'] : '';
        $client_designation = !empty( $settings['client_designation'] ) ? $settings['client_designation'] : '';

        $ellipse_4   = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_4.png';

        function single_review_item( $review_content, $client_name, $client_designation ){ ?>
            <div class="review_part_text">
                <?php
                    if( $review_content ){
                        echo wp_kses_post( wpautop( $review_content ) );
                    }

                    echo '<h3>'.$client_name.', <span>'.$client_designation.'</span></h3>';
                ?>
            </div>
        <?php
        }
    ?>

    <!--::about_us part start::-->
    <section class="review_part padding_bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="review_img">
                        <?php
                            if( $rev_img ){
                                echo wp_kses_post( $rev_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="review_slider owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ( $reviews as $review ) {
                                $review_content = !empty( $review['reviews'] ) ? $review['reviews'] : '';
                                $client_name = !empty( $review['client_name'] ) ? $review['client_name'] : '';
                                $client_designation = !empty( $review['client_designation'] ) ? $review['client_designation'] : '';
                                
                                single_review_item( $review_content, $client_name, $client_designation );    
                            }
                        }
                        ?>                        
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo $ellipse_4?>" alt="ellipse 4" class="feature_icon_2 custom-animation2">
    </section>
    <!--::about_us part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                var review = $('.review_slider');
                if (review.length) {
                    review.owlCarousel({
                    items: 1,
                    loop: true,
                    dots: true,
                    autoplay: false,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    nav: false,
                    });
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    } 
	
}
