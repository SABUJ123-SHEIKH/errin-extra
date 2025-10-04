<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_step extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_step';
    }

    public function get_title()
    {
        return esc_html__('Santoi Process', 'santoi-core');
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
            'Widget-style-section',
            [
                'label' => esc_html__('Widget Style Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_title_main',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Instruct to our AI and generate copy', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'counter_secund_title_sub',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Track your entire project from start to finish with beautiful views that make project planning a breeze manage your resources.', 'textdomain'),
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number_title_main',
            [
                'label' => esc_html__('Number', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('01', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
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
        $repeater->add_control(
            'step_title_main',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Select writing template', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'step_counter_secund_title_sub',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Simply choose a template from available list to write content.', 'textdomain'),
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Step Section', 'textdomain'),
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
            'Section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_responsive_control(
            'Section-Padding',
            [
                'label' => esc_html__('Title Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-contain' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',

                'selector' => '{{WRAPPER}} .st2-Instruct-contain h4',
            ]
        );
        $this->add_control(
            'decription_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'decription_typography',
                'label' => esc_html__('Decription Color', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-Instruct-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-style_step',
            [
                'label' => esc_html__('Step Process', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'step_number_color',
            [
                'label' => esc_html__('Number Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1B1D6D',
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-box h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'step_number__typography',
                'label' => esc_html__('Number Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-Instruct-box h2',
            ]
        );
        
         $this->add_control(
            'step_icon_color',
            [
                'label' => esc_html__('Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1B1D6D',
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-box h2 span svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'step_title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-box h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'step_title__typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-Instruct-box h4',
            ]
        );
        $this->add_control(
            'step_decription_color',
            [
                'label' => esc_html__('Sub Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#A1A3C7',
                'selectors' => [
                    '{{WRAPPER}} .st2-Instruct-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'step_decription__typography',
                'label' => esc_html__('Sub Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-Instruct-box p',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $f = 1;
        ?>
        <!-- st2-Instruct-area Start -->
        <section class="st2-Instruct-area">
            <div class="container">
                <div class="st2-Instruct-contain">
                    <h4 class="has_text_reveal_anim">
                        <?php echo $settings['counter_title_main']; ?>
                    </h4>
                    <div class="has_text_move_anim">
                        <p>
                        <?php echo $settings['counter_secund_title_sub']; ?>

                    </p>
                    </div>
                    
                </div>

                <div class="row st2-Instruct-row">
                    <?php
                    foreach ($settings['list'] as $item) {

                        ?>
                        <div class="col-12 col-md-4">
                            <div class="st2-Instruct-box has_fade_anim">
                                <h2>
                                    <?php echo $item['number_title_main']; ?>
                                    <span>
                            	<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                <?php

                                ?>
                        </span>
                                </h2>
                                <h4>
                                    <?php echo $item['step_title_main']; ?>

                                </h4>
                                <p>
                                    <?php echo $item['step_counter_secund_title_sub']; ?>

                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- st2-Instruct-area End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_step());

