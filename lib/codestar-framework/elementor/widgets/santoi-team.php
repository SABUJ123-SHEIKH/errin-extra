<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_team extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_team';
    }

    public function get_title()
    {
        return esc_html__('Santoi Santoi Team', 'Santoi-core');
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
                'label' => esc_html__('Santoi Team Content', 'textdomain'),
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
            'team_logo_image',
            [
                'label' => esc_html__('Santoi Team Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'team__name',
            [
                'label' => esc_html__('Team Name', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('Yolanda Stevenson', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'team_name_link',
            [
                'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team__designation',
            [
                'label' => esc_html__('Team Designation', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => esc_html__('UI & UX DESIGNER', 'textdomain'),
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
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Santoi_Logo_Content',
            [
                'label' => esc_html__('Santoi Team Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .st1-team-section',
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-team-member-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title typography', 'textdomain'),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .st1-team-member-contain h4',
            ]
        );
        $this->add_control(
            'subtext_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-team-member-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Decription typography', 'textdomain'),
                'name' => 'dcontent_typography',
                'selector' => '{{WRAPPER}} .st1-team-member-contain p',
            ]
        );
        $this->add_control(
            'name_color',
            [
                'label' => esc_html__('Name Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-team-member-box h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Name typography', 'textdomain'),
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .st1-team-member-box h4',
            ]
        );
        $this->add_control(
            'dagisnation_color',
            [
                'label' => esc_html__('Dagisnation Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-team-member-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Dagisnation typography', 'textdomain'),
                'name' => 'dagisnation_typography',
                'selector' => '{{WRAPPER}} .st1-team-member-box p',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        $count = 1;
        ?>
        <section class="st1-team-section">
            <div class="container">
                <div class="st1-team-member-contain">
                    <h4 class="has_text_reveal_anim">
                        <?php echo _e($settings['widget_title']); ?>
                    </h4>
                    <div class="has_text_move_anim">
                          <p>
                        <?php echo _e($settings['widget_sub_title']); ?>
                    </p>
                    </div>
                  
                </div>

                <div class="row">
                    <?php foreach ($settings['list'] as $item) {
                        ?>
                        <div class="col-12 col-md-4 has_fade_anim">
                            <div class="st1-team-member-box">
                                <div class="st1-team-member-img">
                                    <img src="  <?php echo _e($item['team_logo_image']['url']); ?>"
                                         alt="team member-1.png">
                                </div>
                                <h4>
                                    <a href=" <?php echo $item['team_name_link']['url']; ?>"><?php echo _e($item['team__name']); ?></a>
                                </h4>
                                <p>
                                    <?php echo _e($item['team__designation']); ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_team());

