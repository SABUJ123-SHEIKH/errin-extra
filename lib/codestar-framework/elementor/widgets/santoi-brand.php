<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_brand_logo extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_brand_logo';
    }

    public function get_title()
    {
        return esc_html__('Santoi Brand Logo', 'Santoi-core');
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
                'label' => esc_html__( 'Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__( 'We Have Had the Pleasure of Working with Some Clients', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
            ]
        );
        $this->add_control(
            'widget_sub_title',
            [
                'label' => esc_html__( 'Sub Title ', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Track your entire project from start to finish with beautiful views that make project planning a breeze manage your resources.', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'brand_logo_image',
            [
                'label' => esc_html__('Brand Logo', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'website_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
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
                'label' => esc_html__('Brand Logo Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Title Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-items-logo-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title typography', 'textdomain' ),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .st1-items-logo-contain h4',
            ]
        );
        $this->add_control(
            'subtext_color',
            [
                'label' => esc_html__( 'Decription Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-items-logo-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Decription typography', 'textdomain' ),
                'name' => 'dcontent_typography',
                'selector' => '{{WRAPPER}} .st1-items-logo-contain p',
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
        <section>
            <div class="container">
                <div class="st1-items-logo-contain">
                    <h4 class="wow fadeInLeft" data-wow-delay="0.90s">
                        <?php echo $settings['widget_title']; ?>
                    </h4>
                    <p class="wow fadeInRight" data-wow-delay="0.90s">
                        <?php echo $settings['widget_sub_title']; ?>
                    </p>
                </div>
                <div class="st1-items-logo-box ">
                    <ul>
                        <?php foreach ($settings['list'] as $item) {
                            ?>
                            <a href="<?php echo $item['brand_logo_image']['url']; ?>">
                                <li class="wow pulse animated" data-wow-delay="0.40s">
                                    <img src="<?php echo $item['brand_logo_image']['url']; ?>" alt="brand"
                                         class="img-fluid">
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- st1-items-logo End -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_brand_logo());

