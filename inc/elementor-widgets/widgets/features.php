<?php
namespace Ecobitelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Ecobit elementor Feature section widget.
 *
 * @since 1.0
 */
class Ecobit_Features extends Widget_Base {

	public function get_name() {
		return 'ecobit-features';
	}

	public function get_title() {
		return __( 'Features', 'ecobit' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'ecobit-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Feature Section ------------------------------
        $this->start_controls_section(
            'features_section',
            [
                'label' => __( 'Feature Contents', 'ecobit' ),
            ]
        );
        $this->add_control(
            'feature_contents', [
                'label' => __( 'Create New', 'ecobit' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'feature_img',
                        'label'     => __( 'Feature Image', 'ecobit' ),
                        'type'      => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Fully Secured', 'ecobit' )
                    ],
                    [
                        'name'  => 'text',
                        'label' => __( 'Text', 'ecobit' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'Made great fish shall beast, fourth land also Doesn tree without lesser likeness he fruit of called gathering day whose called were have', 'ecobit' )
                    ],
                ],
            ]
        );

        $this->end_controls_section(); // End section top content
        

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Feature Items Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Feature Items', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sec_ttitle', [
                'label'     => __( 'Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .use_sasu .single_feature_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .use_sasu .single_feature_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $features = !empty( $settings['feature_contents'] ) ? $settings['feature_contents'] : '';
    $ellipse_1 = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_1.png';

    function single_fet_item( $title, $text, $feature_img ){ ?>
        <div class="col-lg-4 col-sm-6">
            <div class="single_feature">
                <div class="single_feature_part">
                    <?php
                        if( $feature_img ){
                            echo wp_kses_post( $feature_img );
                        }

                        echo '<h4>' .esc_html( $title ) . '</h4>';
                        echo '<p>' .esc_html( $text ) . '</p>';
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!--::feature part start::-->
    <section class="use_sasu padding_top">
        <div class="container">
            <div class="row justify-content-center">
            <?php
            if( is_array( $features ) && count( $features ) > 0 ){
                foreach ( $features as $feature ) {
                    $feature_img = !empty( $feature['feature_img']['id'] ) ? wp_get_attachment_image($feature['feature_img']['id'], 'ecobit_feature_img_icon_97x83', false, ['alt' => 'feature icon']) : '';
                    $title = !empty( $feature['title'] ) ? $feature['title'] : '';
                    $text = !empty( $feature['text'] ) ? $feature['text'] : '';
                    
                    single_fet_item( $title, $text, $feature_img );    
                }
            }
            ?>
               
            </div>
        </div>
        <img src="<?php echo $ellipse_1?>" alt="ellipse 1" class="feature_icon_1 custom-animation1">
    </section>
    <!--::feature part end::-->
    <?php
    }
}
