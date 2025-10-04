<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */
 
 

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Santoi_Stylish_Shape extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Santoi_Stylish_Shape';
    }

    public function get_title()
    {
        return esc_html__('Santoi Stylish Shape', 'santoi-core');
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
			'home_banner_section',
			[
				'label' => esc_html__( 'Content', 'santoi-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'shape_style',
            [
                'label' => esc_html__('Select Shape Style', 'santoi-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'st_icon',
                'options' => [
                    'st_icon'  => esc_html__('Stylish SVG Shape Only', 'santoi-core'),
                    'st_one'  => esc_html__('Icon with Background color', 'santoi-core'),
                    'st_two'  => esc_html__('Icon with Text', 'santoi-core'),
                    'st_three'  => esc_html__('Message Bubble One', 'santoi-core'),
                    'st_four'  => esc_html__('Message Bubble Two', 'santoi-core'),
                    'st_five'  => esc_html__('Support Bubble', 'santoi-core'),
                ],
            ]
        );
        $this->add_control(
			'shape_title',
			[
				'label' => esc_html__( 'Title', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => esc_html__( 'Regular Checkup', 'santoi-core' ),
                'condition' => [
                    'shape_style' => [ 'st_four', 'st_three', 'st_two','st_five' ],
                ],
			]
		);
		
		  $this->add_control(
			'shape_title_alt',
			[
				'label' => esc_html__( 'Alter Title', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( '', 'santoi-core' ),
                'condition' => [
                    'shape_style' => ['st_two','st_five' ],
                ],
			]
		);
		
			

        $this->add_control(
			'shape_icon',
			[
				'label' => esc_html__( 'Icon', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-stethoscope',
					'library' => 'solid',
				],
			]
		);
		
		$this->add_control(
            'shape_animation',
            [
                'label' => esc_html__('Select Shape Animation Type', 'santoi-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'none',
                'options' => [
                    'none'  => esc_html__('None', 'santoi-core'),
                    'anim_one'  => esc_html__('Animation One', 'santoi-core'),
                    'anim_two'  => esc_html__('Animation Two', 'santoi-core'),
                    'anim_three'  => esc_html__('Animation Three', 'santoi-core'),
                     'anim_four'  => esc_html__('Animation Four', 'santoi-core'),
                     
                      'anim_five'  => esc_html__('Animation Five', 'santoi-core'),
                      
                       'anim_six'  => esc_html__('Animation Six', 'santoi-core'),
                       
                       'anim_seven'  => esc_html__('Animation Seven', 'santoi-core'),
                       
                        'anim_eight'  => esc_html__('Animation Eight', 'santoi-core'),
                    
                    
                    'animate_hover'  => esc_html__('Animation On Hover', 'santoi-core'),
                ],
            ]
        );
        
        $this->add_control(
			'bubble_image',
			[
				'label' => esc_html__( 'Bubble Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				
			]
		);

		$this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
			'shape_style_tab',
			[
				'label' => esc_html__( 'Icon', 'santoi-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'shape_bg',
				'label' => esc_html__( 'Background', 'santoi-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .stylish-shape-icon, 
                {{WRAPPER}} .stylish-shape-icon-text',
                'condition' => [
                    'shape_style' => ['st_one', 'st_two'],
                ],
			]
		);

		$this->add_control(
			'shape_bg_width',
			[
				'label' => esc_html__( 'Background Width', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'shape_style' => ['st_one'],
                ],
			]
		);
        $this->add_control(
			'shape_bg_height',
			[
				'label' => esc_html__( 'Background Height', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'shape_style' => ['st_one'],
                ],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'shape_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'santoi-core' ),
				'selector' => '{{WRAPPER}} .stylish-shape-icon, 
                {{WRAPPER}} .stylish-shape-icon-text',
                'condition' => [
                    'shape_style' => ['st_one', 'st_two'],
                ],
			]
		);

        // Icon Size for Font Icon
        $this->add_control(
			'shape_font_icon_size',
			[
				'label' => esc_html__( 'Icon Size for Fonts Icon', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon i, 
                    {{WRAPPER}} .stylish-shape-icon-text i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'shape_style' => ['st_one', 'st_two'],
                ],
			]
		);
        $this->add_control(
			'shape_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon-text i, {{WRAPPER}} .stylish-shape-icon i' => 'color: {{VALUE}}',
				],
                'condition' => [
                    'shape_style' => ['st_one', 'st_two'],
                ],
			]
		);
        $this->add_control(
			'shape_icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon-text i' => 'background: {{VALUE}}',
				],
                'condition' => [
                    'shape_style' => ['st_two'],
                ],
			]
		);

        // Icon Size for SVG Icon
        $this->add_control(
			'shape_svg_icon_size',
			[
				'label' => esc_html__( 'Icon Size for SVG', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon svg, 
                    {{WRAPPER}} .stylish-svg-shape-icon svg,
                    {{WRAPPER}} .stylish-shape-icon-text svg' => 'width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'shape_style' => [ 'st_icon', 'st_one', 'st_two' ],
                ],
			]
		);
		
		$this->add_control(
			'svg_align',
			[
				'label' => esc_html__( 'Alignment', 'santoi-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'santoi-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'santoi-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'santoi-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				
				'toggle' => true,
				
				'condition' => [
                    'shape_style' => [ 'st_icon', 'st_one', 'st_two' ],
                ],
                
                'selectors' => [
					'{{WRAPPER}} .stylish-svg-shape-icon' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'svg_color',
			[
				'label' => esc_html__( 'Svg Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stylish-svg-shape-icon svg,
					{{WRAPPER}} .stylish-svg-shape-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		
			$this->add_control(
			'svg_dark_color',
			[
				'label' => esc_html__( 'Svg Dark Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.sp-night-mode-on {{WRAPPER}} .stylish-svg-shape-icon svg,
					.sp-night-mode-on {{WRAPPER}} .stylish-svg-shape-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
    			'txt-font-color',
    			[
    				'label' => __( 'Text Color', 'santoi' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fff',
    				'selectors' => [
    					'{{WRAPPER}} .stylish-shape-icon-text span.stylist-shape-text' => 'color: {{VALUE}}',
    				],
    				 'condition' => [
                    'shape_style' => ['st_two'],
                ],
    			]
    		);
    		
    		$this->add_control(
    			'txt-font-color_alt',
    			[
    				'label' => __( 'Text Alternative Color', 'santoi' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'scheme' => [
    					'type' => \Elementor\Core\Schemes\Color::get_type(),
    					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
    				],
    				'default' => '#fff',
    				'selectors' => [
    					'{{WRAPPER}} .stylish-shape-icon-text p.stylist-shape-alt' => 'color: {{VALUE}}',
    				],
    				 'condition' => [
                    'shape_style' => ['st_two'],
                ],
    			]
    		);
    		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Text Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .stylish-shape-icon-text span.stylist-shape-text',
                 'condition' => [
                    'shape_style' => ['st_two'],
                ],
            ]
        );
        
        	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'alt_text_typography',
                'label' => __( 'Alt Text Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .stylish-shape-icon-text p.stylist-shape-alt',
                 'condition' => [
                    'shape_style' => ['st_two'],
                ],
            ]
        );
           $this->add_control(
			'icon_box_padding',
			[
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon-text,
					{{WRAPPER}} .stylish-shape-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				 'condition' => [
                    'shape_style' => ['st_two'],
                ],
			]
		);
		
		$this->add_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .stylish-shape-icon-text,
					{{WRAPPER}} .stylish-shape-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				 'condition' => [
                    'shape_style' => ['st_one', 'st_two'],
                ],
			]
		);
		
		$this->add_responsive_control(
                'align_text_ment',
                [
                    'label'        => __( 'Text Alignment', 'mayosis' ),
                    'type'         => \Elementor\Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'mayosis' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'mayosis' ),
                            'icon'  => 'eicon-h-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'mayosis' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                    ],
                    'prefix_class' => 'elementor-align-%s',
                    'default'      => 'left',
                    'selectors' => [
                                '{{WRAPPER}} .stylish-shape-icon-text' => 'text-align: {{VALUE}} !important',
                            ],
                             'condition' => [
                    'shape_style' => ['st_two'],
                ],
                ]
            );

		$this->end_controls_section();

	}

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $shape_style = $settings['shape_style'];
        $shape_animation = $settings['shape_animation'];
        $bubble_image = $settings['bubble_image']['url'];



        switch ($shape_style) {
            case "st_icon": ?>
                        <div  class="stylish-svg-shape-icon has_fade_anim medi-<?php echo esc_html($shape_animation);?>" >
                            <?php \Elementor\Icons_Manager::render_icon( $settings['shape_icon'], [ 'aria-hidden' => 'true' ] ); ?>
		                </div>
                    <?php

                break;
            case "st_one": ?>
                        <div  class="stylish-shape-icon has_fade_anim  medi-<?php echo esc_html($shape_animation);?>" >
                            <?php \Elementor\Icons_Manager::render_icon( $settings['shape_icon'], [ 'aria-hidden' => 'true' ] ); ?>
		                </div>
                    <?php

                break;
            case "st_two": ?>
                <div  class="stylish-shape-icon-text  has_fade_anim  medi-<?php echo esc_html($shape_animation);?>" >
                    <?php \Elementor\Icons_Manager::render_icon( $settings['shape_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <span class="stylist-shape-text"><?php echo $settings['shape_title'];?></span>
                    <?php if($settings['shape_title_alt']){?>
                    <p class="stylist-shape-alt"><?php echo $settings['shape_title_alt'];?></p>
                    <?php } ?>
                </div>
                
                
                  <?php

                break;
            case "st_three": ?>
                <div  class="stylish-shape-message-bubble-one has_fade_anim  medi-<?php echo esc_html($shape_animation);?>" >
                    <img src="<?php echo esc_html($bubble_image);?>" alt="author bubble" class="saasp-author-bubble-i">
                    <div class="stylish-message-bubble-main-part">
                         <div class="type-wrap">
    <div class="santoi-typed-strings">
      <span><?php echo $settings['shape_title'];?></span>
      
     
    </div>
    <span class="santoi-typed"></span>
  </div>
                    </div>
                </div>
                
                
                
                 <?php

                break;
            case "st_four": ?>
                <div  class="stylish-shape-message-bubble-two  has_fade_anim  medi-<?php echo esc_html($shape_animation);?>" >
                    <img src="<?php echo esc_html($bubble_image);?>" alt="author bubble" class="saasp-author-bubble-i">
                    <div class="stylish-message-bubble-main-part">
                         <div class="type-wrap-two">
    <div class="santoi-typed-strings-two">
      <span><?php echo $settings['shape_title'];?></span>
      
     
    </div>
    <span class="santoi-typed-two"></span>
  </div>
                    </div>
                </div>
                
                
                  <?php

                break;
            case "st_five": ?>
                <div  class="stylish-shape-support-bubble-one has_fade_anim  medi-<?php echo esc_html($shape_animation);?>" >
                  
                    <div class="stylish-message-bubble-main-part">
                       
       <span class="stylist-shape-text"><?php echo $settings['shape_title'];?></span>
                    <?php if($settings['shape_title_alt']){?>
                    <p class="stylist-shape-alt"><?php echo $settings['shape_title_alt'];?></p>
                    <?php } ?>
      
     
   
                    </div>
                </div>
        
            <?php

        break;
            
        }
    }

}
\Elementor\Plugin::instance()->widgets_manager->register(new \Santoi_Stylish_Shape());

