<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_text_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_text_slider';
    }

    public function get_title()
    {
        return esc_html__('Santoi Text Slider', 'Santoi-core');
    }

    public function get_icon()
    {
        return 'teconce-custom-icon';
    }

    public function get_categories()
    {
        return ['santoi-ele-widgets-cat'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'Santoi-Logo-Content',
            [
                'label' => esc_html__('Santoi Slider', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'widget_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('We Have Had the Pleasure of Working with Some Clients', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'widget_sub_title',
            [
                'label' => esc_html__('Sub Title ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Track your entire project from start to finish with beautiful views that make project planning a breeze manage your resources.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $repeater = new \Elementor\Repeater();
        
         $repeater->add_control(
            'slide_text',
            [
                'label' => esc_html__('Slide Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Professional Image', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Slide Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
       
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    ],
                    [
                    ],
                    [
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Santoi_Logo_Content',
            [
                'label' => esc_html__('Text Slide Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
       
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .santoi--textslider-area .swiper-slide,
                    {{WRAPPER}} .santoi--textslider-area .swiper-slide span' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .santoi--textslider-area .swiper-slide span',
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title typography', 'textdomain'),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .santoi--textslider-area .swiper-slide',
            ]
        );
        
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .santoi--textslider-area .swiper-slide i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        
       $this->add_responsive_control(
			'gap_slide',
			[
				'label' => esc_html__( 'Gap between Slider', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .santoi--textslider-area .swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'gap_txt_icon',
			[
				'label' => esc_html__( 'Gap Between Text & Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .santoi--textslider-area .swiper-slide' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        $count = 1;
        ?>
        <section class="st1-text_slider has_fade_anim">
            <!-- Text slider start  -->
            <?php if ( $settings['list'] ) {?>
          <div class="santoi--textslider-area">
            <div class="santoi--textslider-wrap">
             <div class="swiper-container santoi_text_slider">
                <div class="swiper-wrapper">
                    <?php foreach (  $settings['list'] as $item ) { ?>
                    <div class="swiper-slide"><span><?php echo $item['slide_text'];?></span> <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                    <?php } ?>
                    
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- Text slider end -->
        </section>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_text_slider());

