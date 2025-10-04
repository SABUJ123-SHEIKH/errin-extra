<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_blog extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_blog';
    }

    public function get_title() {
        return esc_html__('Santoi Blog', 'santoi-core');
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
                'label' => esc_html__('Widget Style Section', 'woodly-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'Widget-Style',
            [
                'label' => esc_html__('Select Widget Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_1' => esc_html__('Style 1', 'textdomain'),
                    'style_2' => esc_html__('Style 2', 'textdomain'),
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Latest Insigths', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_5'],
                ],
            ]
        );
        $this->add_control(
            'decription_title',
            [
                'label' => esc_html__('Decription Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('LATEST BLOGS', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),

            ]
        );

        $this->add_control(
            'item_per_page',
            [
                'label' => __('Number of Post to Show', 'nikstore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,

            ]
        );
        $this->add_control(
            'category',
            [
                'label' => esc_html__('Select Category', 'nikstore'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => array_flip(santoi_elements_categories('category', array(
                    'sort_order' => 'ASC',
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ))),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read Details', 'textdomain'),
                'placeholder' => esc_html__('Type your button title here', 'textdomain'),
            ]
        );

        $this->end_controls_section();
      
        $this->start_controls_section(
            'Title-style',
            [
                'label' => esc_html__('Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Title-color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-blog-sc-title-box h4,
                    {{WRAPPER}} .st2-news-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Title-typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-blog-sc-title-box h4,
                {{WRAPPER}} .st2-news-contain h4',
            ]
        );
        
         $this->add_control(
            'descd-color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-blog-sc-title-box p,
                    {{WRAPPER}} .st2-news-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desd-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-blog-sc-title-box p,
                {{WRAPPER}} .st2-news-contain p',
            ]
        );
        
        
        $this->end_controls_section();
        $this->start_controls_section(
            'Description-style',
            [
                'label' => esc_html__('Description Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_2'],
                ],
            ]
        );
        $this->add_control(
            'Description-color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-footer-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Description-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-footer-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Post-style',
            [
                'label' => esc_html__('Post Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
          $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'backgroundblog',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .st2-news-box',
            ]
        );
     
        $this->add_control(
            'Container-BG-color',
            [
                'label' => esc_html__('Container BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .Container BG Color' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Post-box-Hover-border-color',
            [
                'label' => esc_html__('Post Box Hover Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr5-blog-card:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => ['style_2'],
                ],
            ]
        );
        $this->add_control(
            'Meta-options',
            [
                'label' => esc_html__('Meta Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Meta-color',
            [
                'label' => esc_html__('Meta Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Meta-typography',
                'label' => esc_html__('Meta Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box span',
            ]
        );

        $this->add_control(
            'Post-Title-options',
            [
                'label' => esc_html__('Post Title Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Post-Title-color',
            [
                'label' => esc_html__('Post Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box h4 a' => 'color: {{VALUE}}!important',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Post-Title-typography',
                'label' => esc_html__('Post Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box h4 a',
            ]
        );
        $this->add_control(
            'Post-Title-Hover-color',
            [
                'label' => esc_html__('Post Title Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box h4 a' => 'color: {{VALUE}}!important',

                ],
            ]
        );

        $this->add_control(
            'Post-Description-options',
            [
                'label' => esc_html__('Post Description Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',

            ]
        );
        $this->add_control(
            'Post-Description-color',
            [
                'label' => esc_html__('Post Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box p' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Post-Description-typography',
                'label' => esc_html__('Post Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box p',

            ]
        );

        $this->add_control(
            'Post-Button-options',
            [
                'label' => esc_html__('Post Button Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Post-Button-color',
            [
                'label' => esc_html__('Post Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a.st__blog_two_btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Post-Button-typography',
                'label' => esc_html__('Post Button Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box a.st__blog_two_btn',
            ]
        );
        $this->add_control(
            'Post-Button-BG-color',
            [
                'label' => esc_html__('Post Button BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a' => 'background-color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'Post-Button-Hover-color',
            [
                'label' => esc_html__('Post Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Post-Button-Hover-bg-color',
            [
                'label' => esc_html__('Post Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a:hvoer' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $item_per_page = $settings['item_per_page'];
        $category = $settings['category'];

        $post_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $item_per_page,
        );

        if (!empty($category[0])) {
            $post_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'terms' => $category,
                )
            );
        }

        $the_query = new \WP_Query($post_args);


        if ('style_1' == $settings['Widget-Style']) {
            santoi_blog_style_1($settings, $the_query);
        } elseif ('style_2' == $settings['Widget-Style']) {
            santoi_blog_style_2($settings, $the_query);
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_blog());

