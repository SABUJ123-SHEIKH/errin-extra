<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_counter_with_image extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_counter_with_image';
    }

    public function get_title() {
        return esc_html__('Santoi Counter With Image', 'santoi-core');
    }

    public function get_icon() {
        return 'teconce-custom-icon';
    }

    public function get_categories() {
        return ['santoi-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section-Content',
            [
                'label' => esc_html__('Section Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('An ever-growing gallery of free AIgenerated visuals', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'title_sub',
            [
                'label' => esc_html__('Section Sub Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('An ever-growing gallery of free AIgenerated visuals', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => esc_html__('Info', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Track your entire project from start to finish with beautiful views that make project planning a breeze. Manage your resources on a List, Box, Gantt.', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'counter_number',
            [
                'label' => esc_html__('Counter Number', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 52,
            ]
        );
        $repeater->add_control(
            'counter_suffix',
            [
                'label' => esc_html__('Counter Suffix', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('M', 'textdomain'),
                'placeholder' => esc_html__('Type your counter suffix here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'counter_title',
            [
                'label' => esc_html__('Counter Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Social Media Platforms', 'textdomain'),
                'placeholder' => esc_html__('Type your counter title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Counter List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'counter_title' => esc_html__('Social Media Platforms', 'textdomain'),
                    ],
                    [
                        'counter_title' => esc_html__('Powerful AI Tools', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ counter_title }}}',
            ]
        );

        $this->add_control(
            'section_img',
            [
                'label' => esc_html__('Section Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
         $this->add_control(
            'section_img_hvr',
            [
                'label' => esc_html__('Section Image Hover', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'container-width',
            [
                'label' => esc_html__('Container Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2560,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .custom-container-width' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section-Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st1-growing-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Section-BG-color',
            [
                'label' => esc_html__('Section BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-growing-container' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'image_border_radius_d',
            [
                'label' => esc_html__('Image Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .santoi_distort_images_ab_block canvas' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Section-title-color',
            [
                'label' => esc_html__('Section title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-growing-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-title-typography',
                'label' => esc_html__('Section title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-growing-contain h4',
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-subtitle-typography',
                'label' => esc_html__('Section Subtitle title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-growing-contain .st1-about-contain-subtitle',
            ]
        );
        
         $this->add_control(
            'Section-subtitle-color',
            [
                'label' => esc_html__('Section Subtitle Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-growing-contain .st1-about-contain-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->add_control(
            'Section-Info-color',
            [
                'label' => esc_html__('Section Info Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-growing-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Info-typography',
                'label' => esc_html__('Section Info Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-growing-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Counter-Box-style',
            [
                'label' => esc_html__('Counter Box Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Box Background', 'textdomain'),
                'name' => 'background',
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} .st1-growing-contain ul li',
            ]
        );
        $this->add_control(
            'Number-color',
            [
                'label' => esc_html__('Number Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter.st__counter-items' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Number-typography',
                'label' => esc_html__('Number Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .counter.st__counter-items',
            ]
        );
        $this->add_control(
            'Counter-title-color',
            [
                'label' => esc_html__('Counter title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-growing-contain ul li p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Counter-title-typography',
                'label' => esc_html__('Counter title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-growing-contain ul li p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- st1-growing start -->
        <section class="st1-growing-container">
            <div class="container custom-container-width">
                <div class="row gx-5">
                    <div class="col-12 col-md-6">

                        <div class="st1-growing-contain">
                            <?php if ($settings['title']) { ?>
                                <h4 class="has_char_anim"><?php echo $settings['title']; ?></h4>
                            <?php } ?>
                             <?php if ($settings['title_sub']) { ?>
                                <span class="st1-about-contain-subtitle  has_text_reveal_anim"><?php echo $settings['title_sub']; ?></span>
                            <?php } ?>
                            
                            <?php if ($settings['info']) { ?>
                            <div class="has_text_move_anim">
                                <p><?php echo $settings['info']; ?></p>
                            </div>
                                
                            <?php } ?>

                            <ul>
                                <?php
                                foreach ($settings['list'] as $item) {
                                    ?>
                                    <li class="has_fade_anim">

                                        <div class="counter st__counter-items">
                                            <span class="count santoi-counter_two">
                                                <?php echo $item['counter_number']; ?>
                                            </span>
                                            <span class="santoi-counter-text_two">
                                                <?php echo $item['counter_suffix']; ?>
                                            </span>
                                        </div>
                                        <p><?php echo $item['counter_title']; ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="col-12 col-md-6">

                        <div class="st1-growing-img">
                            <?php if ($settings['section_img']['url']) { ?>
                            
                              <div class="santoi_distort_images_ab_block">
			<img class="dis-front-image" src="<?php echo $settings['section_img']['url']; ?>" alt="static image" />
			<img class="dis-hover-image" src="<?php echo $settings['section_img_hvr']['url']; ?>" alt="hover image" />
			<img class="distort-image" src="<?php echo get_template_directory_uri();?>/assets/images/distort.jpg" alt="distort Image" />
		</div>
                               
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- st1-growing End -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_counter_with_image());

