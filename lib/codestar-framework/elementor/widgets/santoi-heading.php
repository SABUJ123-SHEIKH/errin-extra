<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_heading extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_heading';
    }

    public function get_title() {
        return esc_html__('Santoi Heading', 'santoi-core');
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
                'label' => esc_html__('1st Heading', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Create Content in  ', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Middle Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Image Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .st2-banner-part-3-img-2' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'counter_secund_title',
            [
                'label' => esc_html__('2nt Heading', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Single Click With AI Power', 'textdomain'),
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image_2',
            [
                'label' => esc_html__('Second Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'image_2_list',
            [
                'label' => esc_html__('2nd Image List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false
            ]
        );
        $this->add_responsive_control(
            'Second-image_width',
            [
                'label' => esc_html__('Second Image Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .st2-banner-part-2-img-2' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'counter_third_title',
            [
                'label' => esc_html__('3rd Heading', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('', 'textdomain'),
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $this->add_control(
            'counter_secund_decription',
            [
                'label' => esc_html__('Decription', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,

                'default' => esc_html__(' AI content writing features can vary depending on the specific AI platform or tool you are using, but there are several common features that are typically found in AI content writing software.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__('Typing Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Blog Article', 'textdomain'),
                'label_block' => true,
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
                        'list_title' => esc_html__('Blog Article', 'textdomain'),

                    ],
                    [
                        'list_title' => esc_html__('Product Description', 'textdomain'),

                    ],
                ],
                'title_field' => '{{{ list_title }}}',
                'prevent_empty' => false
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
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'Title-align',
            [
                'label' => esc_html__('Title Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .st2-nav-bar-contain h2' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sec_title_typography',
                'label' => esc_html__('Title Secondary Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} h2 .santoi_headeing_secondary_title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sec_animated_title_typography',
                'label' => esc_html__('Title Animated Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} h2 #saasplate-title-typed',
            ]
        );

        $this->add_control(
            'sec_animated_title_color',
            [
                'label' => esc_html__('Animated Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h2 #saasplate-title-typed' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'decription_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'decription_typography',
                'label' => esc_html__('Decription Color', 'textdomain'),
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- Heading Start -->
        <div class="st2-nav-bar-contain wow fadeInUp" data-wow-delay="0.90s">
            <h2 class="has_char_anim">
                <?php
                if ($settings['counter_title']) {
                    ?>
                    <?php echo $settings['counter_title']; ?>
                    <?php
                }
                ?>
                <?php
                if ($settings['image']['url']) {
                    ?>
                    <img class="st2-banner-part-3-img-2 has_fade_anim" src=" <?php echo $settings['image']['url']; ?>"
                         alt="">
                    <?php
                }
                ?>
                <?php
                if ($settings['counter_secund_title']) {
                    ?>
                    <span class="santoi_headeing_secondary_title"><?php echo $settings['counter_secund_title']; ?></span>
                    <?php
                }
                ?>
                <div class="st2__banner-img-wrap">
                    <?php
                    foreach ($settings['image_2_list'] as $item) {
                        ?>

                            <img class="st2-banner-part-2-img-2 has_fade_anim" src=" <?php echo $item['image_2']['url']; ?>" alt="">

                        <?php
                    }
                    ?>
                </div>

                <?php
                if ($settings['counter_third_title']) {
                    ?>
                    <span class="santoi_headeing_secondary_title"><?php echo $settings['counter_third_title']; ?></span>
                    <?php
                }
                ?>
                <?php if ($settings['list']) { ?>
                    <div id="saasplate-title-typebox">
                        <?php foreach ($settings['list'] as $item) { ?>
                            <span><?php echo $item['list_title']; ?></span>
                        <?php } ?>

                    </div>
                    <span id="saasplate-title-typed"></span>
                <?php } ?>

            </h2>
            <?php
            if ($settings['counter_secund_decription']) {
                ?>
                <p class="has_fade_anim">
                    <?php echo $settings['counter_secund_decription']; ?>
                </p>
                <?php
            }
            ?>
        </div>
        </div>

        <!-- Heading End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_heading());

