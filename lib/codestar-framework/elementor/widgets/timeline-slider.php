<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_timeline extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_timeline';
    }

    public function get_title()
    {
        return esc_html__('Santoi Timeline', 'Santoi-core');
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
            'Brand-Logo-Content',
            [
                'label' => esc_html__('Brand Logo Content', 'textdomain'),
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
            'left_image',
            [
                'label' => esc_html__('Left Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'left_background',
                'types' => ['gradient', 'video'],
                'selector' => '{{WRAPPER}} .st1-about-news-img-box-two',
                'separator' => 'after',
                'fields_options' => [
                    'background' => [
                        'label' => 'Left Image Bg'
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'right_title_number',
            [
                'label' => esc_html__('Year / Title ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2023', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'right_title',
            [
                'label' => esc_html__('Title ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('  Make your cloud storage feel like', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'right_sub_text',
            [
                'label' => esc_html__('Right Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Make your cloud storage feel like a physical hard drive with our revolutionary drive mounting software.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
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
                    [
                    ],
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
            'Brand_Logo_Content',
            [
                'label' => esc_html__('Timeline Section', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => ['classic', 'gradient', 'video'],
                'default' => '#1C1B46',
                'selector' => '{{WRAPPER}} .timeline-section',
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-news-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title typography', 'textdomain'),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .st1-about-news-contain h4',
            ]
        );
        $this->add_control(
            'subtext_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-news-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Decription typography', 'textdomain'),
                'name' => 'dcontent_typography',
                'selector' => '{{WRAPPER}} .st1-about-news-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'timeline_slide_year',
            [
                'label' => esc_html__('Year Section', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'year_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-news-number-box' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'year_color_active',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-news-number-box.slick-slide.slick-current' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'year_typography',
                'selector' => '{{WRAPPER}} .st1-about-news-number-box',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'timeline_slide_right_total',
            [
                'label' => esc_html__('Timeline Right Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
    
        $this->add_control(
            'timeline_slide_right_total_title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-news-contain-box h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'timeline_slide_right_total_title_typo',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-news-contain-box h2',
            ]
        );
     
       
     
        
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $count = 1;
        ?>

        <!-- st1-items-logo start -->
        <!-- st1-about-news Start -->
        <section class="timeline-section">
            <div class="container">

                <div class="st1-about-news-contain">
                    <h4 class="has_text_reveal_anim">
                        <?php echo _e($settings['widget_title']); ?>
                    </h4>
                    <div class="has_text_move_anim">
                         <p>
                            <?php echo _e($settings['widget_sub_title']); ?>
                        </p>
                    </div>
                   
                </div>
                <div class="container">
                    <div class="row">
                        <div class="large-7 medium-8 columns">
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails st1-about-news-thumbnails has_fade_anim">
                                <?php
                                foreach ($settings['list'] as $item) {
                                    ?>
                                    <div class="st1-about-news-number-box">
                                <span class="">
                                    <?php echo _e($item['right_title_number']); ?>
                                </span>
                                        <br>
                                        <span class="st1-about-news-span-icons">
                                    <i class="fa-regular fa-circle-dot"></i>
                                </span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- MAIN SLIDES -->
                            <div class="slidersa">
                                <?php
                                foreach ($settings['list'] as $item) {

                                    ?>
                                    <!-- st1-about-news-box-1 -->
                                    <div class="row st1-about-row-box">
                                        <div class="col-12 col-md-6 wow fadeInLeft">

                                            <div class="st1-about-news-img-box">
                                                <div class="st1-about-news-img-box-one img_anim_reveal">
                                                    <img src="<?php echo _e($item['left_image']['url']); ?>"
                                                         alt="about-news" data-speed=".7">
                                                </div>
                                                <div class="st1-about-news-img-box-two">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 has_fade_anim">

                                            <div class="st1-about-news-contain-box">
                                                

                                                <h2 class="has_char_anim">
                                                    <?php echo _e($item['right_title']); ?>
                                                </h2>
                                            <div class="has_text_move_anim">
                                                
                                           
                                                <p>
                                                    <?php echo _e($item['right_sub_text']); ?>
                                                </p>
                                            </div>
                                               

                                            </div>

                                        </div>
                                    </div>
                                    <!-- st1-about-news-box-1 -->
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- st1-about-news End -->
        <!-- st1-items-logo End -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_timeline());

