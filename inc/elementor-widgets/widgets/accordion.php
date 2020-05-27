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
 * Ecobit elementor accordion section widget.
 *
 * @since 1.0
 */
class Ecobit_FAQ extends Widget_Base {

	public function get_name() {
		return 'ecobit-faq';
	}

	public function get_title() {
		return __( 'FAQ', 'ecobit' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'ecobit-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  FAQ Section ------------------------------
        $this->start_controls_section(
            'faq_heading',
            [
                'label' => __( 'FAQ Heading', 'ecobit' ),
            ]
        );
        $this->add_control(
            'faq_header',
            [
                'label'         => esc_html__( 'FAQ Header', 'ecobit' ),
                'description'   => esc_html__('Use <br> tag for line break', 'ecobit'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Frequently Ask Question</h2><p>Beginning gathered divided upon blessed seasons form herb years subdue</p>', 'ecobit' )
            ]
        );
        $this->add_control(
            'faq_contents', [
                'label' => __( 'Create New', 'ecobit' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Accordion Title', 'ecobit' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'What is white box testing and list the types of white box testing?', 'ecobit' )
                    ],
                    [
                        'name'  => 'body',
                        'label' => __( 'Accordion Body', 'ecobit' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.', 'ecobit' )
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

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sec_ttitle', [
                'label'     => __( 'Big Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();
        

        // Single FAQ Color Settings ==============================
        $this->start_controls_section(
            'single_acc_color_sett', [
                'label' => __( 'Single Accordion Color Settings', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
   
        $this->add_control(
            'acc_title_color', [
                'label'     => __( 'Accordion Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_part button' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'acc_txt_color', [
                'label'     => __( 'Accordion Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_part .card .card-body' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'acc_border_color', [
                'label'     => __( 'Accordion Border Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_part .card' => 'border-color: {{VALUE}};',
                ],
            ]
        );    
        

        $this->end_controls_section();

    }
    
    public function single_faq_item( $accordion_header, $accordion_body, $counter, $behaviour ){ ?>
       
        <div class="card">
            <div class="card-header" id="heading<?php echo $counter?>">
                <h5 class="mb-0">
                    <button class="btn btn-link<?php echo $counter != 1 ? ' collapsed' : ''; ?>" data-toggle="collapse" data-target="#collapse<?php echo $counter?>"
                        aria-expanded="<?php echo $behaviour?>" aria-controls="collapse<?php echo $counter?>">
                        <?php
                            echo wp_kses_post( $accordion_header );
                        ?>
                    </button>
                </h5>
            </div>

            <div id="collapse<?php echo $counter?>" class="collapse <?php echo $behaviour == 'true' ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $counter?>"
                data-parent="#accordion">
                <div class="card-body">
                    <?php
                        echo wp_kses_post( $accordion_body );
                    ?>
                </div>
            </div>
        </div>
             
    <?php
    }

	protected function render() {

    $settings = $this->get_settings();

    // call load widget script
    $this->load_widget_script();

    $faq_header = !empty( $settings['faq_header'] ) ? $settings['faq_header'] : '';
    $faq_contents = !empty( $settings['faq_contents'] ) ? $settings['faq_contents'] : '';
    $dynamic_class = is_front_page() ? 'pricing_part section_padding home_page_pricing' : 'pricing_part section_padding single_page_pricing';
    ?>

    <!--::accordion part start::-->
    <section class="accordion_part padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle text-center">
                        <?php
                            // FAQ Header =============
                            if( $faq_header ){
                                echo wp_kses_post( wpautop( $faq_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div id="accordion">
                        <?php
                        if( is_array( $faq_contents ) && count( $faq_contents ) > 0 ){
                            $counter = 0;
                            foreach ( $faq_contents as $item ) {
                                $accordion_header = !empty( $item['title'] ) ? $item['title'] : '';
                                $accordion_body = !empty( $item['body'] ) ? $item['body'] : '';
                                $counter++;
                                $behaviour = ($counter == 1) ? 'true' : 'false';
                                
                                $this->single_faq_item( $accordion_header, $accordion_body, $counter, $behaviour );
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::accordion part end::-->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {

            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight){
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    } 
                });
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
}
