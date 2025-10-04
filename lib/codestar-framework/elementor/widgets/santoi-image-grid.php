<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_image_grid extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_image_grid';
    }

    public function get_title() {
        return esc_html__('Santoi Image Grid', 'santoi-core');
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
            'section_title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore the Best generative Images', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'section_info',
            [
                'label' => esc_html__('Section Info', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Track your entire project from start to finish with beautiful views that make project planning a breeze manage your resources.', 'textdomain'),
                'placeholder' => esc_html__('Type your info here', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img_link',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Image List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    ],
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
            'section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .about-area-img-row' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Section Background', 'textdomain'),
                'name' => 'background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .about-area-img-row',
                'exclude' => ['image']
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Title-style',
            [
                'label' => esc_html__('Section Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Title-color',
            [
                'label' => esc_html__('Section Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-area-img-text h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-area-img-text h2',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Description-style',
            [
                'label' => esc_html__('Section Description Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Description-color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-area-img-text p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Description-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-area-img-text p',
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="about-area-img-row">
            <div class="st1-about-area-img-text">
                <?php if ($settings['section_title']) { ?>
                    <h2 class="has_text_reveal_anim">
                        <?php echo $settings['section_title']; ?>
                    </h2>
                <?php } ?>
                <?php if ($settings['section_info']) { ?>
                <div class="has_text_move_anim">
                    <p>
                        <?php echo $settings['section_info']; ?>
                    </p>
                    </div>
                <?php } ?>
            </div>
            <div class="">
                <div class="gridzy st1-about-img-area img_anim_group_scale has_fade_anim" data-gridzy-spaceBetween="32">
                    <?php
                    $i = 0;
                    foreach ($settings['list'] as $item){
                        $i += 10;
                        ?>
                    <img src="<?php echo $item['img_link']['url']; ?>" alt="">
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_image_grid());

