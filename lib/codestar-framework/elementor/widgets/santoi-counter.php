<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_counter extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_counter';
    }

    public function get_title() {
        return esc_html__('Santoi Counter', 'santoi-core');
    }

    public function get_icon() {
        return 'teconce-custom-icon';
    }

    public function get_categories() {
        return ['santoi-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'Widget-style-section',
            [
                'label' => esc_html__('Widget Style Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_title',
            [
                'label' => esc_html__('Counter Number', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2021', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'extra_counter_text',
            [
                'label' => esc_html__('Right Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('M', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
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
        $this->end_controls_section();


        $this->start_controls_section(
            'Section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF9B00',
                'selectors' => [
                    '{{WRAPPER}} .santoi-counter' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',

                'selector' => '{{WRAPPER}} .santoi-counter',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- Counter Start -->
        <div class="counter">
                 <span class="count santoi-counter">
                    <?php echo $settings['counter_title']; ?>
                </span>
                <span class="santoi-counter santoi-counter-text"> <?php echo $settings['extra_counter_text']; ?></span>
                <?php
                if ($settings['icon']) {
                    ?>
                    <span class="santoi-counter-pluse"> <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?> </span>
                    <?php
                } ?>

        </div>

        <!-- Counter End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_counter());

