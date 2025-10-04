<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;

class SantoiElemSection {

	public function __construct() {
		add_action('elementor/frontend/section/before_render', array($this, 'before_render'), 1);
		add_action('elementor/frontend/column/before_render', array($this, 'before_render'), 1);
		add_action('elementor/frontend/container/before_render', array($this, 'before_render'), 1);
		add_action('elementor/element/section/section_layout/after_section_end', array($this, 'register_controls'), 1);
		add_action('elementor/element/section/section_layout/after_section_end', array($this, 'register_controls'), 1);
		add_action('elementor/element/container/section_layout_container/after_section_end', array($this, 'register_controls'), 1);
		add_action('elementor/element/column/layout/after_section_end', array($this, 'register_controls'), 1);
		add_action('elementor/element/container/layout/after_section_end', array($this, 'register_controls'), 1);
	}

	public function register_controls($element) {


		$bg_colors = array(
			"None" 					=> '',
			"Primary"				=> "primary",
			"Secondary"			=> "secondary",
			"Custom Gradient" 		=> 'custom-gradient'
		);
		// echo '<pre>';
		// var_dump($element->get_raw_data()['isInner']);
		// echo '</pre>';
		// die();
		// $test = 'firas';
		// if(!empty($element->get_raw_data()['isInner'])){
		// 	$test = 'firasInnnnnn';
		// }
		$elType = $element->get_title();
		$isColumn = false;
		if ($element->get_name() === 'column') {
			$isColumn = true;
		}
		$element->start_controls_section(
			'santoi_drop_animation_section',
			[
				'label' => __('Santoi:: Common', 'santoi-core'),
				'tab' => Controls_Manager::TAB_LAYOUT
			]
		);

		if (!$isColumn) {
			$element->add_control(
				'santoi_section_name',
				[
					'label' => $elType . ' ' . __('Name', 'elementor'),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __('Enter section name', 'elementor'),
					'default' => '',
					'dynamic'     => array(
						'active'  => true
					),
				]
			);
		}



		$element->add_responsive_control(
			'santoi_overlay_color',
			[
				'label' => __('Background Overlay color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($bg_colors),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-column):before' => 'border-radius: inherit;background: var(--text-{{VALUE}}) !important; content: \' \';position: absolute;width: 100%;height: 100%;top: 0;left: 0;pointer-events: none;z-index: 0;',
					'{{WRAPPER}}.elementor-column .elementor-column-wrap:before' => 'border-radius: inherit;background: var(--text-{{VALUE}}) !important; content: \' \';position: absolute;width: 100%;height: 100%;top: 0;left: 0;pointer-events: none;z-index: 0;',
					'{{WRAPPER}} .elementor-background-video-container' => 'z-index: -1;'
				],
			]
		);

		$element->add_responsive_control(
			'santoi_custom_overlay',
			[
				'label' => esc_html__('Custom Gradient', 'santoi-core'),
				'type' => \Elementor\CustomControl\CustomGradient_Control::CustomGradient,
				'default' => '',
				'class' => '',
				'condition' => [
					'santoi_overlay_color' => 'custom-gradient',
				],
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-column):before' => 'border-radius: inherit;background: {{VALUE}} !important; content: \' \';position: absolute;width: 100%;height: 100%;top: 0;left: 0;pointer-events: none;z-index: 0;',
					'{{WRAPPER}}.elementor-column .elementor-column-wrap:before' => 'border-radius: inherit;background: {{VALUE}} !important; content: \' \';position: absolute;width: 100%;height: 100%;top: 0;left: 0;pointer-events: none;z-index: 0;',
					'{{WRAPPER}} .elementor-background-video-container' => 'z-index: -1;'
				],

			]
		);
		$element->add_responsive_control(
			'santoi_overlay_opacity',
			[
				'label' => __('Overlay opacity', 'elementor'),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'santoi_overlay_color!' => '',
				],
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-column):before' => 'opacity: {{VALUE}} !important;',
					'{{WRAPPER}}.elementor-column .elementor-column-wrap:before' => 'opacity: {{VALUE}} !important;',
				],
				'default' => '',
				'description' => 'The opacity value should be between 0 and 1.',
			]
		);
		$element->add_responsive_control(
			'santoi_overlay_over',
			[
				'label' => __('Display overlay over content', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'0' => [
						'title' => __('No', 'santoi-core'),
						'icon' => 'eicon-close',
					],
					'100' => [
						'title' => __('Yes', 'santoi-core'),
						'icon' => 'eicon-check',
					]
				],
				'condition' => [
					'santoi_overlay_color!' => '',
				],
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-column):before' => 'z-index: {{VALUE}} !important;',
					'{{WRAPPER}}.elementor-column .elementor-column-wrap:before' => 'z-index: {{VALUE}} !important;',
				],
				'default' => '0',
			]
		);



		if ($isColumn) {

			$element->add_responsive_control(
				'santoi_elementor_shadow',
				[
					'label' => __('Shadow Style', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						"" 			=> "Default",
						"none" 				=> "None",
						"shadow-sm"     	=> "Small shadow",
						"shadow"     		=> "Medium shadow",
						"shadow-lg"     	=> "Large shadow",
						"shadow-inverse-sm" => "Inverse Small shadow",
						"shadow-inverse"    => "Inverse Medium shadow",
						"shadow-inverse-lg" => "Inverse Large shadow",
					],
					'selectors_dictionary' => [
						'none' 				=> 'box-shadow: none;',
						'shadow-sm' 		=> 'box-shadow: 0 1px 5px 0 rgba(0,0,0,0.15);',
						'shadow' 			=> 'box-shadow: 0 .125rem .375rem rgba(0,0,0, 0.05), 0 .5rem 1.2rem rgba(0,0,0,0.1);',
						'shadow-lg' 		=> 'box-shadow: 0 .25rem .5rem rgba(0,0,0, .05), 0 1.5rem 2.2rem rgba(0,0,0, .1);',
						"shadow-inverse-sm" => "box-shadow: 0 3px 8px 0 rgba(0,0,0,0.15);",
						"shadow-inverse"    => "box-shadow: 0 .125rem .375rem rgba(0,0,0, .05), 0 .625rem 1.5rem rgba(0,0,0, .15);",
						"shadow-inverse-lg" => "box-shadow: 0 .5rem 1.2rem rgba(0,0,0, .1), 0 2rem 3rem rgba(0,0,0, .15);"
					],
					'selectors' => [
						'{{WRAPPER}} > .elementor-widget-wrap' => '{{VALUE}}'
					],
					'hide_in_top' => true
				]
			);

			$element->add_responsive_control(
				'santoi_elementor_shadow_hover',
				[
					'label' => __('Shadow Hover Style', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						"" 							=> "Default",
						"none" 						=> "None",
						"shadow-hover-sm"       	=> "Small hover shadow",
						"shadow-hover"       		=> "Medium hover shadow",
						"shadow-hover-lg"       	=> "Large hover shadow",
						"shadow-inverse-hover-sm"   => "Inverse Small hover shadow",
						"shadow-inverse-hover"      => "Inverse Medium hover shadow",
						"shadow-inverse-hover-lg"   => "Inverse Large hover shadow",
					],
					'selectors_dictionary' => [
						'none' 						=> 'box-shadow: none;',
						'shadow-hover-sm' 			=> 'box-shadow: 0 3px 8px 0 rgba(0,0,0,0.15);',
						'shadow-hover' 				=> 'box-shadow: 0 .125rem .375rem rgba(0,0,0, .05), 0 .625rem 1.5rem rgba(0,0,0, .15);',
						'shadow-hover-lg' 			=> 'box-shadow: 0 .5rem 1.2rem rgba(0,0,0, .1), 0 2rem 3rem rgba(0,0,0, .15);',
						"shadow-inverse-hover-sm" 	=> "box-shadow: 0 1px 5px 0 rgba(0,0,0,0.15);",
						"shadow-inverse-hover"    	=> "box-shadow: 0 .125rem .375rem rgba(0,0,0, 0.05), 0 .5rem 1.2rem rgba(0,0,0,0.1);",
						"shadow-inverse-hover-lg" 	=> "box-shadow: 0 .25rem .5rem rgba(0,0,0, .05), 0 1.5rem 2.2rem rgba(0,0,0, .1);"
					],
					'selectors' => [
						'{{WRAPPER}} > .elementor-widget-wrap' => 'transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);backface-visibility: hidden;',
						'{{WRAPPER}} > .elementor-widget-wrap:hover' => '{{VALUE}}'
					],
				]
			);

			$element->add_responsive_control(
				'santoi_elementor_effect_hover',
				[
					'label' => __('Hover Animation', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						"" 					=> "Default",
						"none" 				=> "None",
						"fly-sm"       		=> "Fly Small",
						"fly"    			=> "Fly Medium",
						"fly-lg"       		=> "Fly Large",
						"scale-sm"       	=> "Scale Small",
						"scale"       		=> "Scale Medium",
						"scale-lg"       	=> "Scale Large",
						"scale-inverse-sm"  => "Scale Inverse Small",
						"scale-inverse"     => "Scale Inverse Medium",
						"scale-inverse-lg"  => "Scale Inverse Large",
					],
					'selectors_dictionary' => [
						'none' 				=> 'transform: initial;',
						'fly-sm' 			=> 'transform: translate(0,-3px);',
						'fly' 				=> 'transform: translate(0,-6px);',
						'fly-lg' 			=> 'transform: translate(0,-9px);',
						"scale-sm" 			=> "transform: scale(1.05);",
						"scale"    			=> "transform: scale(1.1);",
						"scale-lg" 			=> "transform: scale(1.15);",
						"scale-inverse-sm" 	=> "transform: scale(0.95);",
						"scale-inverse" 	=> "transform: scale(0.925);",
						"scale-inverse-lg" 	=> "transform: scale(0.9);"
					],
					'selectors' => [
						'{{WRAPPER}} > .elementor-widget-wrap' => 'transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;',
						'{{WRAPPER}} > .elementor-widget-wrap, {{WRAPPER}} *' => 'backface-visibility: hidden;',
						'{{WRAPPER}} > .elementor-widget-wrap:hover' => '{{VALUE}}'
					],
				]
			);


		
		} else {

			$element->add_responsive_control(
				'santoi_elementor_shadow',
				[
					'label' => __('Shadow Style', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						"" 			=> "Default",
						"none" 				=> "None",
						"shadow-sm"     	=> "Small shadow",
						"shadow"     		=> "Medium shadow",
						"shadow-lg"     	=> "Large shadow",
						"shadow-inverse-sm" => "Inverse Small shadow",
						"shadow-inverse"    => "Inverse Medium shadow",
						"shadow-inverse-lg" => "Inverse Large shadow",
					],
					'selectors_dictionary' => [
						'none' 				=> 'box-shadow: none;',
						'shadow-sm' 		=> 'box-shadow: 0 1px 5px 0 rgba(0,0,0,0.15);',
						'shadow' 			=> 'box-shadow: 0 .125rem .375rem rgba(0,0,0, 0.05), 0 .5rem 1.2rem rgba(0,0,0,0.1);',
						'shadow-lg' 		=> 'box-shadow: 0 .25rem .5rem rgba(0,0,0, .05), 0 1.5rem 2.2rem rgba(0,0,0, .1);',
						"shadow-inverse-sm" => "box-shadow: 0 3px 8px 0 rgba(0,0,0,0.15);",
						"shadow-inverse"    => "box-shadow: 0 .125rem .375rem rgba(0,0,0, .05), 0 .625rem 1.5rem rgba(0,0,0, .15);",
						"shadow-inverse-lg" => "box-shadow: 0 .5rem 1.2rem rgba(0,0,0, .1), 0 2rem 3rem rgba(0,0,0, .15);"
					],
					'selectors' => [
						'{{WRAPPER}}' => '{{VALUE}}'
					],
					'hide_in_top' => true
				]
			);

			$element->add_responsive_control(
				'santoi_elementor_shadow_hover',
				[
					'label' => __('Shadow Hover Style', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						"" 							=> "Default",
						"none" 						=> "None",
						"shadow-hover-sm"       	=> "Small hover shadow",
						"shadow-hover"       		=> "Medium hover shadow",
						"shadow-hover-lg"       	=> "Large hover shadow",
						"shadow-inverse-hover-sm"   => "Inverse Small hover shadow",
						"shadow-inverse-hover"      => "Inverse Medium hover shadow",
						"shadow-inverse-hover-lg"   => "Inverse Large hover shadow",
					],
					'selectors_dictionary' => [
						'none' 						=> 'box-shadow: none;',
						'shadow-hover-sm' 			=> 'box-shadow: 0 3px 8px 0 rgba(0,0,0,0.15);',
						'shadow-hover' 				=> 'box-shadow: 0 .125rem .375rem rgba(0,0,0, .05), 0 .625rem 1.5rem rgba(0,0,0, .15);',
						'shadow-hover-lg' 			=> 'box-shadow: 0 .5rem 1.2rem rgba(0,0,0, .1), 0 2rem 3rem rgba(0,0,0, .15);',
						"shadow-inverse-hover-sm" 	=> "box-shadow: 0 1px 5px 0 rgba(0,0,0,0.15);",
						"shadow-inverse-hover"    	=> "box-shadow: 0 .125rem .375rem rgba(0,0,0, 0.05), 0 .5rem 1.2rem rgba(0,0,0,0.1);",
						"shadow-inverse-hover-lg" 	=> "box-shadow: 0 .25rem .5rem rgba(0,0,0, .05), 0 1.5rem 2.2rem rgba(0,0,0, .1);"
					],
					'selectors' => [
						'{{WRAPPER}}' => 'transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);backface-visibility: hidden;',
						'{{WRAPPER}}:hover' => '{{VALUE}}'
					],
					'hide_in_top' => true
				]
			);

			$element->add_responsive_control(
				'santoi_elementor_effect_hover',
				[
					'label' => __('Hover Animation', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						"" 					=> "Default",
						"none" 				=> "None",
						"fly-sm"       		=> "Fly Small",
						"fly"    			=> "Fly Medium",
						"fly-lg"       		=> "Fly Large",
						"scale-sm"       	=> "Scale Small",
						"scale"       		=> "Scale Medium",
						"scale-lg"       	=> "Scale Large",
						"scale-inverse-sm"  => "Scale Inverse Small",
						"scale-inverse"     => "Scale Inverse Medium",
						"scale-inverse-lg"  => "Scale Inverse Large",
					],
					'selectors_dictionary' => [
						'none' 				=> 'transform: initial;',
						'fly-sm' 			=> 'transform: translate(0,-3px);',
						'fly' 				=> 'transform: translate(0,-6px);',
						'fly-lg' 			=> 'transform: translate(0,-9px);',
						"scale-sm" 			=> "transform: scale(1.05);",
						"scale"    			=> "transform: scale(1.1);",
						"scale-lg" 			=> "transform: scale(1.15);",
						"scale-inverse-sm" 	=> "transform: scale(0.95);",
						"scale-inverse" 	=> "transform: scale(0.925);",
						"scale-inverse-lg" 	=> "transform: scale(0.9);"
					],
					'selectors' => [
						'{{WRAPPER}}' => 'transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;',
						'{{WRAPPER}}, {{WRAPPER}} *' => 'backface-visibility: hidden;',
						'{{WRAPPER}}:hover' => '{{VALUE}}transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);'
					],
					'hide_in_top' => true
				]
			);


		
		

			$element->add_control(
				'santoi_sticky_top',
				[
					'label' => __('Sticky box on the top', 'santoi-core'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __('Yes', 'santoi-core'),
					'label_off' => __('No', 'santoi-core'),
					'return_value' => 'true',
					'hide_in_top' => true,
				]
			);

		

		}


		$element->end_controls_section();




		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'd_gradient',
			[
				'label' => __('Use Gradient', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => '1',
				// 'default' => '',
			]
		);
		$repeater->add_control(
			'd_color_1',
			[
				'label' => __('Layer color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f8f9fa',
			]
		);
		$repeater->add_control(
			'd_color_2',
			[
				'label' => __('Layer color 2', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f8f9fa',
				'condition' => [
					'd_gradient' => '1',
				],
			]
		);







		// ===========================================
		// top Dividers
		// ===========================================
		$element->start_controls_section(
			'section_top_dividers',
			[
				'label' => __('Santoi:: Top Dividers', 'elementor'),
				'tab' => Controls_Manager::TAB_LAYOUT
			]
		);



		$fontiocns_opts = array();
		$fontiocns_opts['0'] = array('title' => 'None', 'url' => SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets/images/shape/none.png');
		//$fontiocns_opts['dynamic'] = array('title' => 'Dynamic', 'url' => SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets/images/shape/divider-dynamic.gif');
		$dividersCount = 7;
		$dividersCount = 7;
		for ($x = 1; $x <= $dividersCount; $x++) {
			$fontiocns_opts[$x] = array('title' => 'Style ' . $x, 'url' => SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets/images/shape/divider-' . $x . '.png');
		}

		$element->add_control(
			'top_divider_select',
			[
				'label' => esc_html__('Divider shape', 'santoi-core'),
				'type' => \Elementor\CustomControl\ImgSelector_Control::ImgSelector,
				'options'	=> $fontiocns_opts,
				'default' => '0',
				'class' => 'santoi-top-dividers-select',
			]
		);


		$element->add_control(
			'top_moving_divider_color',
			[
				'label' => __('top Dividers', 'santoi-core'),
				'type' => Controls_Manager::REPEATER,
				'default'	=> [
					['d_gradient'	=> ''],
					[]
				],
				'fields' => $repeater->get_controls(),
				// 'fields' => [
				//     [
				//         'name' => 'd_gradient',
				//         'label' => __( 'Use Gradient', 'santoi-core' ),
				//         'type' => \Elementor\Controls_Manager::SWITCHER,
				//         'label_on' => __( 'Yes', 'santoi-core' ),
				//         'label_off' => __( 'No', 'santoi-core' ),
				//         'return_value' => '1',
				//         'default' => '',
				//     ],
				//     [
				//         'name' => 'd_color_1',
				//         'label' => __( 'Layer color', 'santoi-core' ),
				//         'type' => \Elementor\Controls_Manager::COLOR,
				//         'default' => '#f8f9fa',
				//     ],
				//     [
				//         'name' => 'd_color_2',
				//         'label' => __( 'Layer color 2', 'santoi-core' ),
				//         'type' => \Elementor\Controls_Manager::COLOR,
				//         'default' => '#f8f9fa',
				//         'condition' => [
				//             'd_gradient!' => '',
				//         ],
				//     ]
				//
				//
				//
				// ],
				'condition' => [
					'top_divider_select' => 'dynamic',
				],
			]
		);



		$element->add_control(
			'top_layers',
			[
				'label' => __('The number of Layers', 'santoi-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
					"1"       => "1 Layer",
					"2"       => "2 Layers",
					"3"       => "3 Layers",
				),
				'condition' => [
					'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);




		$element->add_control(
			't_divider_in_front',
			[
				'label' => __('Bring the divider in front of the content', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				'default' => false,
				'condition' => [
					'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);
		$element->add_control(
			't_flip_h',
			[
				'label' => __('Flip the divider', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
				'condition' => [
					'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);
		$element->add_responsive_control(
			't_custom_height',
			[
				'label' => __('Divider custom height (Optional)', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('', 'santoi-core'),
				'placeholder' => __('With unit, e.g: 200px', 'santoi-core'),
				'selectors_dictionary' => [
					'' => 'auto',
					'0' => 'auto'
				],
				'selectors' => [
					'{{WRAPPER}} .santoi-divider.santoi-top-divider svg' => 'height: {{VALUE}} !important;'
				],
				'condition' => [
					'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);

		


		// Top layers tabs
		$element->start_controls_tabs(
			'top_layers_tabs',
			[
				'condition' => [
					'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);

		$element->start_controls_tab(
			'santoi_top_layer_1',
			[
				'label' => esc_html__('Layer 1', 'plugin-name'),
				'condition' => [
					'top_layers' => array("1", "2", "3")
				],
			]
		);

		$element->add_control(
			't_1_is_gradient',
			[
				'label' => __('Use gradient for the first layer', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
				// 'condition' => [
				// 	'top_layers!' => '',
				// ],
			]
		);
		$element->add_control(
			't_1_color',
			[
				'label' => __('Layer 1 color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$element->add_control(
			't_1_color_2',
			[
				'label' => __('Layer 1 second gradient color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					't_1_is_gradient' => 'true',
				],
			]
		);
	
	

		$element->end_controls_tab();

		$element->start_controls_tab(
			'santoi_top_layer_2',
			[
				'label' => esc_html__('Layer 2', 'plugin-name'),
				'condition' => [
					'top_layers' => array("2", "3")
				],
			]
		);


		$element->add_control(
			't_2_is_gradient',
			[
				'label' => __('Use gradient for the second layer', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
				// 'condition' => [
				// 	'top_layers!' => '',
				// ],
			]
		);
		$element->add_control(
			't_2_color',
			[
				'label' => __('Layer 2 color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.6)',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$element->add_control(
			't_2_color_2',
			[
				'label' => __('Layer 2 second gradient color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					't_2_is_gradient' => 'true',
				],
			]
		);
	


		$element->end_controls_tab();


		$element->start_controls_tab(
			'santoi_top_layer_3',
			[
				'label' => esc_html__('Layer 3', 'plugin-name'),
				'condition' => [
					'top_layers' => array("3")
				],
			]
		);


		$element->add_control(
			't_3_is_gradient',
			[
				'label' => __('Use gradient for the third layer', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
			]
		);
		$element->add_control(
			't_3_color',
			[
				'label' => __('Layer 3 color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.3)',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$element->add_control(
			't_3_color_2',
			[
				'label' => __('Layer 3 second gradient color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					't_3_is_gradient' => 'true',
				],
			]
		);
		
	


		$element->end_controls_tab();
		$element->end_controls_tabs();
		




		$element->end_controls_section();




		$element->start_controls_section(
			'section_bottom_dividers',
			[
				'label' => __('Santoi:: Bottom Dividers', 'elementor'),
				'tab' => Controls_Manager::TAB_LAYOUT
			]
		);


		// $fontiocns_opts = array();
		// $fontiocns_opts['0'] = array('title' => 'None', 'url' => SANTOI_ELEMENTOR_PL_ROOT_URL.'functions/images/shapes/none.png' );
		// $fontiocns_opts['dynamic'] = array('title' => 'Dynamic', 'url' => SANTOI_ELEMENTOR_PL_ROOT_URL.'assets/images/shape/divider-dynamic.gif' );
		// for ($x = 1; $x <= 26; $x++) {
		// 	$fontiocns_opts[$x] = array('title' => 'Style '.$x, 'url' => SANTOI_ELEMENTOR_PL_ROOT_URL.'assets/images/shape/divider-'.$x.'.png' );
		// }

		$element->add_control(
			'bottom_divider_select',
			[
				'label' => esc_html__('Divider shape', 'santoi-core'),
				'type' => \Elementor\CustomControl\ImgSelector_Control::ImgSelector,
				'options'	=> $fontiocns_opts,
				'default' => '0',
				'class' => 'firas',

			]
		);



		$element->add_control(
			'bottom_moving_divider_color',
			[
				'label' => __('Bottom Dividers', 'santoi-core'),
				'type' => Controls_Manager::REPEATER,
				'default'	=> [
					['d_gradient'	=> ''],
					[]
				],
				'fields' => $repeater->get_controls(),
				'condition' => [
					'bottom_divider_select' => 'dynamic',
				],
			]
		);



		$element->add_control(
			'bottom_layers',
			[
				'label' => __('The number of Layers', 'santoi-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
					"1"       => "1 Layer",
					"2"       => "2 Layers",
					"3"       => "3 Layers",
				),
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);

	


		$element->add_control(
			'b_divider_in_front',
			[
				'label' => __('Bring the divider in front of the content', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				'default' => false,
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);
		$element->add_control(
			'b_flip_h',
			[
				'label' => __('Flip the divider', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				'default' => false,
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);

		$element->add_responsive_control(
			'b_custom_height',
			[
				'label' => __('Divider custom height (Optional)', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('', 'santoi-core'),
				'placeholder' => __('With unit, e.g: 200px', 'santoi-core'),
				'selectors_dictionary' => [
					'' => 'auto',
					'0' => 'auto'
				],
				'selectors' => [
					'{{WRAPPER}} .santoi-divider.santoi-bottom-divider svg' => 'height: {{VALUE}} !important;'
				],
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);




		// Bottom layers tabs
		$element->start_controls_tabs(
			'bottom_layers_tabs',
			[
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26")
				],
			]
		);

		$element->start_controls_tab(
			'santoi_bottom_layer_1',
			[
				'label' => esc_html__('Layer 1', 'plugin-name'),
				'condition' => [
					'bottom_layers' => array("1", "2", "3")
				],
			]
		);


		$element->add_control(
			'b_1_is_gradient',
			[
				'label' => __('Use gradient for the first layer', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
				// 'condition' => [
				// 	'bottom_layers!' => '',
				// ],
			]
		);
		$element->add_control(
			'b_1_color',
			[
				'label' => __('Layer 1 color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$element->add_control(
			'b_1_color_2',
			[
				'label' => __('Layer 1 second gradient color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'b_1_is_gradient' => 'true',
				],
			]
		);
	
	


		$element->end_controls_tab();

		$element->start_controls_tab(
			'santoi_bottom_layer_2',
			[
				'label' => esc_html__('Layer 2', 'plugin-name'),
				'condition' => [
					'bottom_layers' => array("2", "3")
				],
			]
		);


		$element->add_control(
			'b_2_is_gradient',
			[
				'label' => __('Use gradient for the second layer', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
				// 'condition' => [
				// 	'bottom_layers!' => '',
				// ],
			]
		);
		$element->add_control(
			'b_2_color',
			[
				'label' => __('Layer 2 color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.6)',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$element->add_control(
			'b_2_color_2',
			[
				'label' => __('Layer 2 second gradient color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'b_2_is_gradient' => 'true',
				],
			]
		);
	
	


		$element->end_controls_tab();


		$element->start_controls_tab(
			'santoi_bottom_layer_3',
			[
				'label' => esc_html__('Layer 3', 'plugin-name'),
				'condition' => [
					'bottom_layers' => array("3")
				],
			]
		);

		$element->add_control(
			'b_3_is_gradient',
			[
				'label' => __('Use gradient for the third layer', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'santoi-core'),
				'label_off' => __('No', 'santoi-core'),
				'return_value' => 'true',
				// 'default' => false,
			]
		);
		$element->add_control(
			'b_3_color',
			[
				'label' => __('Layer 3 color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.3)',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$element->add_control(
			'b_3_color_2',
			[
				'label' => __('Layer 3 second gradient color', 'santoi-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'b_3_is_gradient' => 'true',
				],
			]
		);


		$element->end_controls_tab();
		$element->end_controls_tabs();
		$element->end_controls_section();
	}

	public function before_render($element) {
		$settings = $element->get_settings();

		if (!empty($settings['santoi_elementor_effect_hover']) && $settings['santoi_elementor_effect_hover'] !== 'none') {
			$element->add_render_attribute('_wrapper', ['class' => 'santoi-base-transition']);
		}
		if (!empty($settings['santoi_section_name'])) {
			$element->add_render_attribute('_wrapper', ['data-section-name' => $settings['santoi_section_name']]);
		}
		if (!empty($settings['bottom_divider_select']) || !empty($settings['top_divider_select'])) {
			$out = sc_santoi_dividers($settings);
			$element->add_render_attribute('_wrapper', ['data-santoi-dividers' => $out]);
		}
		if (!empty($settings['santoi_sticky_top'])&&$settings['santoi_sticky_top']) {
			$element->add_render_attribute('_wrapper', ['class' => 'sticky-top santoi-sticky-top-adjust']);
		}
		
	
	}
}
