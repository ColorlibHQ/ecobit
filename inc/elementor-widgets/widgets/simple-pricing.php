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
 * Ecobit elementor simple pricing section widget.
 *
 * @since 1.0
 */
class Ecobit_Simple_Pricing extends Widget_Base {

	public function get_name() {
		return 'ecobit-simple-pricing';
	}

	public function get_title() {
		return __( 'Simple Pricing', 'ecobit' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'ecobit-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Simple Pricing Section ------------------------------
        $this->start_controls_section(
            'pricing_heading',
            [
                'label' => __( 'Simple Pricing Heading', 'ecobit' ),
            ]
        );
        $this->add_control(
            'pricing_header',
            [
                'label'         => esc_html__( 'Simple Pricing Header', 'ecobit' ),
                'description'   => esc_html__('Use <br> tag for line break', 'ecobit'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Simple Pricing</h2><p>Life firmament under them evening make after called dont saying likeness isn\'t wherein also forth she\'d air two without</p>', 'ecobit' )
            ]
        );
        $this->add_control(
            'pricing_contents', [
                'label' => __( 'Create New', 'ecobit' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'pricing_img',
                        'label'     => __( 'Pricing Image', 'ecobit' ),
                        'type'      => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Package Name', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Business', 'ecobit' )
                    ],
                    [
                        'name'  => 'currency_symbol',
                        'label' => __( 'Currency Symbol', 'ecobit' ),
                        'type'  => Controls_Manager::SELECT,
                        'label_block' => true,
                        'default' => 'usd',
                        'options'   => [
                            'usd'  => '$',
                            'eur'  => '€',
                            'yuan' => '¥',
                        ]
                    ],
                    [
                        'name'  => 'price',
                        'label' => __( 'Package Price', 'ecobit' ),
                        'type'  => Controls_Manager::NUMBER,
                        'label_block' => true,
                        'default' => 50.00
                    ],
                    [
                        'name'  => 'period',
                        'label' => __( 'Package Period', 'ecobit' ),
                        'type'  => Controls_Manager::SWITCHER,
                        'label_block'   => false,
                        'label_on'      => 'Monthly',
                        'label_off'     => 'Yearly',
                        'default'       => 'yes',
                        'options'       => [
                            'yes'       => 'Monthly',
                            'no'        => 'Yearly'
                        ]
                    ],
                    [
                        'name'  => 'bandwidth',
                        'label' => __( 'Bandwidth', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '2GB Bandwidth', 'ecobit' )
                    ],
                    [
                        'name'  => 'account',
                        'label' => __( 'Account', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Two Account', 'ecobit' )
                    ],
                    [
                        'name'  => 'storage',
                        'label' => __( 'Storage', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '15GB Storage', 'ecobit' )
                    ],
                    [
                        'name'  => 'sale_service',
                        'label' => __( 'Sale Service', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Sale After Service', 'ecobit' )
                    ],
                    [
                        'name'  => 'domain',
                        'label' => __( 'Domain', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '3 Host Domain', 'ecobit' )
                    ],
                    [
                        'name'  => 'support',
                        'label' => __( 'Support', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '24/7 Support', 'ecobit' )
                    ],
                    [
                        'name'  => 'btn_label',
                        'label' => __( 'Button Label', 'ecobit' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Purchase Now', 'ecobit' )
                    ],
                    [
                        'name'  => 'btn_url',
                        'label' => __( 'Button URL', 'ecobit' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#'
                        ]
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
                    '{{WRAPPER}} .pricing_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();
        

        // Single Simple Pricing Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Pricing Color Settings', 'ecobit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
   
        $this->add_control(
            'plan_title_color', [
                'label'     => __( 'Plan Title Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_price_color', [
                'label'     => __( 'Plan Price Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_period_color', [
                'label'     => __( 'Plan Period Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_sep_color', [
                'label'     => __( 'Separator Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3, .pricing_part .single_pricing_part ul' => 'border-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_list_color', [
                'label'     => __( 'Pricing List Item Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part ul li' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->add_control(
            'button_styles_separator',
            [
                'label'     => __( 'Anchor Link Styles', 'ecobit' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Anchor Link Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .pricing_btn' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'button_hvr_styles_separator',
            [
                'label'     => __( 'Anchor Link Hover Styles', 'ecobit' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_hvr_txt_color', [
                'label'     => __( 'Anchor Link Hover Color', 'ecobit' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .pricing_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );  

        $this->end_controls_section();

    }
    
    public function single_pricing_table( $pricing_img, $title, $currency_symbol, $price, $period, $bandwidth, $account, $storage, $sale_service, $domain, $support, $btn_label, $btn_url ){ ?>
        <div class="col-lg-3 col-sm-6">
            <div class="single_pricing_part">
                <?php
                    if( $pricing_img ){
                        echo wp_kses_post( $pricing_img );
                    }

                    if ($currency_symbol == 'usd') {
                        $currency_symbol = '$';
                    }
                    elseif ($currency_symbol == 'eur') {
                        $currency_symbol = '€';
                    }
                    elseif ($currency_symbol == 'yuan') {
                        $currency_symbol = '¥';
                    }

                    if ($period == 'yes') {
                        $period = __('mo', 'ecobit');
                    } else {
                        $period = __('yr', 'ecobit');
                    }
                    
                    echo '<p>' .esc_html( $title ) . '</p>';
                    echo '<h3>' .esc_html( $currency_symbol ) . esc_html( $price ) . ' <span>/ '. esc_html( $period ) . '</span></h3>';
                    echo '<ul>';
                        echo '<li>' .esc_html( $bandwidth ) . '</li>';
                        echo '<li>' .esc_html( $account ) . '</li>';
                        echo '<li>' .esc_html( $storage ) . '</li>';
                        echo '<li>' .esc_html( $sale_service ) . '</li>';
                        echo '<li>' .esc_html( $domain ) . '</li>';
                        echo '<li>' .esc_html( $support ) . '</li>';
                    echo '</ul>';

                    // Button =============
                    if( $btn_label ){
                        echo "<a href='". esc_url($btn_url) . "' class='pricing_btn'>".esc_html( $btn_label )."</a>";
                    }
                ?>
            </div>
        </div>
    <?php
    }

	protected function render() {

    $settings = $this->get_settings();
    $pricing_header = !empty( $settings['pricing_header'] ) ? $settings['pricing_header'] : '';
    $pricing_contents = !empty( $settings['pricing_contents'] ) ? $settings['pricing_contents'] : '';
    $dynamic_class = is_front_page() ? 'pricing_part section_padding home_page_pricing' : 'pricing_part section_padding single_page_pricing';

    $ellipse_2     = ECOBIT_DIR_ANIMATE_ICON_IMG_URI . 'ellipse_2.png';
    ?>

    <!--::pricing part start::-->
    <section class="<?php echo esc_attr($dynamic_class)?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle text-center">
                        <?php
                            // Simple Pricing Header =============
                            if( $pricing_header ){
                                echo wp_kses_post( wpautop( $pricing_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $pricing_contents ) && count( $pricing_contents ) > 0 ){
                    foreach ( $pricing_contents as $item ) {
                        $pricing_img = !empty( $item['pricing_img']['id'] ) ? wp_get_attachment_image($item['pricing_img']['id'], 'ecobit_pricing_img_81x71', false, ['alt' => 'price image']) : '';
                        $title = !empty( $item['title'] ) ? $item['title'] : '';
                        $currency_symbol = !empty( $item['currency_symbol'] ) ? $item['currency_symbol'] : '';
                        $price = !empty( $item['price'] ) ? $item['price'] : '';
                        $period = !empty( $item['period'] ) ? $item['period'] : '';
                        $bandwidth = !empty( $item['bandwidth'] ) ? $item['bandwidth'] : '';
                        $account = !empty( $item['account'] ) ? $item['account'] : '';
                        $storage = !empty( $item['storage'] ) ? $item['storage'] : '';
                        $sale_service = !empty( $item['sale_service'] ) ? $item['sale_service'] : '';
                        $domain = !empty( $item['domain'] ) ? $item['domain'] : '';
                        $support = !empty( $item['support'] ) ? $item['support'] : '';
                        $btn_label = !empty( $item['btn_label'] ) ? $item['btn_label'] : '';
                        $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
                        
                        $this->single_pricing_table( $pricing_img, $title, $currency_symbol, $price, $period, $bandwidth, $account, $storage, $sale_service, $domain, $support, $btn_label, $btn_url );
                    }
                }
                ?>   
            </div>
        </div>
        <img src="<?php echo $ellipse_2?>" alt="ellipse 2" class="feature_icon_2 custom-animation2">
    </section>
    <!--::pricing part end::-->
    <?php
    }
}
