<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_testimonial extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_testimonial';
    }

    public function get_title() {
        return esc_html__('Santoi Testimonials', 'santoi-core');
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
            'Widget-Style',
            [
                'label' => esc_html__('Testimonial Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style-one',
                'options' => [
                    'style_1' => esc_html__('Style One', 'textdomain'),
                    'style_2' => esc_html__('Style Two', 'textdomain'),
                    'style_3' => esc_html__('Style Three', 'textdomain'),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Section Background', 'textdomain'),
                'name' => 'section-background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .st1-info-area, {{WRAPPER}} .st2-customers-area',
            ]
        );
        $this->add_control(
            'section_quote_icon',
            [
                'label' => esc_html__('Section Quote Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'isax icon-quote-up1',
                    'library' => 'isax',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'section_subtitle',
            [
                'label' => esc_html__('Section Subtitle', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What They Say?', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What They Say?', 'textdomain'),
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
        $this->end_controls_section();
        $this->start_controls_section(
            'Testimonial-Content',
            [
                'label' => esc_html__('Testimonial Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_quote_icon',
            [
                'label' => esc_html__('Quote Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'isax icon-quote-up1',
                    'library' => 'isax',
                ],
            ]
        );
        $repeater->add_control(
            'user_comment',
            [
                'label' => esc_html__('User Comment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Ipsum is that it has a more-or-less normal distribution of letters', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Name', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Nazmus Tuhin', 'textdomain'),
                'placeholder' => esc_html__('Type your Name here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__('Designation', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Freelancer', 'textdomain'),
                'placeholder' => esc_html__('Type your Designation here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'author_img',
            [
                'label' => esc_html__('Author Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'revive',
            [
                'label' => esc_html__('Revive', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Testimonial List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'name' => esc_html__('Nazmus Tuhin', 'textdomain'),
                    ],
                    [
                        'name' => esc_html__('Nazmus Tuhin', 'textdomain'),
                    ],
                    [
                        'name' => esc_html__('Nazmus Tuhin', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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
                    '{{WRAPPER}} .st1-info-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .st2-customers-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Section-Quote-Icon-color',
            [
                'label' => esc_html__('Section Quote Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-info-contain-svg i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st1-info-contain-svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Section-Subtitle-color',
            [
                'label' => esc_html__('Section Subtitle Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-customers-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Subtitle-typography',
                'label' => esc_html__('Section Subtitle Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-customers-contain h4',
            ]
        );
        $this->add_control(
            'Section-Title-color',
            [
                'label' => esc_html__('Section Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-info-contain h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st2-customers-contain h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-info-contain h4,
                {{WRAPPER}} .st2-customers-contain h2',
            ]
        );
        $this->add_control(
            'Section-Info-color',
            [
                'label' => esc_html__('Section Info Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-info-contain p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st2-customers-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Info-typography',
                'label' => esc_html__('Section Info Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-info-contain p , {{WRAPPER}} .st2-customers-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Testimonial-style',
            [
                'label' => esc_html__('Testimonial Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Testimonial-Quote-icon-color',
            [
                'label' => esc_html__('Testimonial Quote icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-testimonial-content-part p i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st1-testimonial-content-part p path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .testimonial__quote_icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial__quote_icon path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Comment-color',
            [
                'label' => esc_html__('Comment Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-testimonial-content-part p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st2-customers-info ul li p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Comment-typography',
                'label' => esc_html__('Comment Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-testimonial-content-part p,
                {{WRAPPER}} .st2-customers-info ul li p',
            ]
        );
        $this->add_control(
            'Name-color',
            [
                'label' => esc_html__('Name Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-testimonial-content-part h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st2-customers-info-Details span h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Name-typography',
                'label' => esc_html__('Name Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-testimonial-content-part h5,
                {{WRAPPER}} .st2-customers-info-Details span h4',
            ]
        );
        $this->add_control(
            'Designation-color',
            [
                'label' => esc_html__('Designation Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-testimonial-content-part .st1-testimonial-content-p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st2-customers-info-Details span .st2-customers-info-Details-p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Designation-typography',
                'label' => esc_html__('Designation Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-testimonial-content-part .st1-testimonial-content-p,
                {{WRAPPER}} .st2-customers-info-Details span .st2-customers-info-Details-p',
            ]
        );
        $this->add_control(
            'Number-color',
            [
                'label' => esc_html__('Number Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-testimonial-bullets .swiper-pagination-bullet' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .st1-testimonial-bullets .swiper-pagination-bullet-active::after' => 'background-color: {{VALUE}} !important',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'testimonial-Box-BG-color',
            [
                'label' => esc_html__('Testimonial Box BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-customers-info ul li' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if ('style_1' == $settings['Widget-Style']) {
            ?>
            <section class="st1-info-area">
                <div class="container">
                    <div class="st1-info-contain has_fade_anim">
                        <div class="st1-info-contain-svg">
                            <?php \Elementor\Icons_Manager::render_icon($settings['section_quote_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <?php if ($settings['section_title']) { ?>
                            <h4 class="has_text_reveal_anim">
                                <?php echo $settings['section_title']; ?>
                            </h4>
                        <?php } ?>
                        <?php if ($settings['section_info']) { ?>
                          <div class="has_text_move_anim">
                            <p>
                                <?php echo $settings['section_info']; ?>
                            </p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="st1-tesimonial-container">
                        <div class="st1-testimonial-gallery row">
                            <div class="swiper-container st1-testimonial-slider col-12 col-md-7">
                                <!---Main Slider Start-->
                                <div class="swiper-wrapper wow fadeInUp" data-wow-delay="0.40s">
                                    <?php foreach ($settings['list'] as $item) { ?>
                                        <div class="swiper-slide st1-testimonial-content-part ">
                                           
                                            <span class="stl1-qoute-icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['testimonial_quote_icon'], ['aria-hidden' => 'true']); ?>
                                            </span>
                                             <p class="has_text_reveal_anim" data-stagger="0.08" data-on-scroll="0"
                            data-duration="1">
                                                <?php echo $item['user_comment']; ?>
                                            </p>
                                            <h5><?php echo $item['name']; ?></h5>
                                            <p class="st1-testimonial-content-p has_text_reveal_anim" data-on-scroll="0"><?php echo $item['designation']; ?></p>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!---Main Slider End-->

                            <!---Thumb Slider Start-->

                            <div class="swiper-container st1-testimonial-thumbs col-12 col-md-5 wow fadeInRight" data-wow-delay="0.40s">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['list'] as $item) { ?>
                                        <div class="swiper-slide st1-testimonial-thumb-author"><img src="<?php echo $item['author_img']['url']; ?>" alt=""></div>
                                    <?php } ?>

                                </div>

                                <div class="snp-pagination st1-testimonial-bullets swiper-pagination-bullets"></div>
                            </div>


                            <!---Thumb Slider End-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
            <?php
        } elseif('style_2' == $settings['Widget-Style']) {
            ?>
            <!-- st2-customers-area Start -->
            <section class="st2-customers-area">
                <div class="container">
                    <div class="row align-items-center st2-995-row">
                        <div class="col-12 col-md-6">
                            <div class="st2-customers-contain">
                                <?php if ($settings['section_subtitle']) { ?>
                                    <h4 class="has_text_reveal_anim">
                                        <?php echo $settings['section_subtitle']; ?>
                                    </h4>
                                <?php } ?>
                                <?php if ($settings['section_title']) { ?>
                                    <h2  class="has_text_reveal_anim">
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
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="st2-customers-info has_fade_anim">
                                <div class="st2-csd-overlay-top"></div>
                                <div class="st2-csd-overlay-bottom"></div>

                                <ul class="swiper st2-customer-carousel">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['list'] as $item) { ?>
                                            <li class="swiper-slide">
                                                <p>
                                                    <?php echo $item['user_comment']; ?>
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="st2-customers-info-Details">
                                                        <div class="st2-customers-author-img">
                                                            <?php if ($item['author_img']['url']) { ?>
                                                                <?php echo wp_get_attachment_image( $item['author_img']['id'], 'santoi-navigation-image' ); ?>
                                                            <?php } ?>
                                                        </div>
                                                        <span>
                                                        <h4>
                                                            <?php echo $item['name']; ?>
                                                        </h4>
                                                        <p class="st2-customers-info-Details-p">
                                                            <?php echo $item['designation']; ?>
                                                        </p>
                                                    </span>
                                                    </div>
                                                    <div class="st2-customers-info-star">
                                                        <div class="st2-customers-info-star-main">
                                                            <div class="testimonial__quote_icon">
                                                                <?php \Elementor\Icons_Manager::render_icon($item['testimonial_quote_icon'], ['aria-hidden' => 'true']); ?>
                                                            </div>
                                                            <span>
                                                            <?php if (1 == $item['revive']) { ?>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                            <?php } elseif (2 == $item['revive']) {
                                                                ?>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <?php
                                                            } elseif (3 == $item['revive']) {
                                                                ?>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>

                                                                <?php
                                                            } elseif (4 == $item['revive']) {
                                                                ?>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                                <?php
                                                            } elseif (5 == $item['revive']) {
                                                                ?>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <?php
                                                            }
                                                            ?>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                        <?php } ?>
                                    </div>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- st2-customers-area End -->
            <?php
        }else{
            ?>
            <section class="st3__testimonial-section">
                <div class="swiper-container st3-testimonial-slider-init">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['list'] as $item){ ?>
                            <div class="swiper-slide st3-testimonial-slider-content">
                            <?php if ($item['author_img']['url']) { ?>
                            <div class="st3__testimonial-img">
                                <img src="<?php echo $item['author_img']['url']; ?>" alt="">
                            </div>
                            <?php } ?>
                            <div class="st3__testimonial-content-wrap">

                                <?php \Elementor\Icons_Manager::render_icon($item['testimonial_quote_icon'], ['aria-hidden' => 'true']); ?>
                                <h4 class="st3__author-comment">
                                    <?php echo $item['user_comment']; ?>
                                </h4>
                                <div class="st3__testimonial-review">
                                    <?php if (1 == $item['revive']) { ?>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    <?php } elseif (2 == $item['revive']) {
                                        ?>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <?php
                                    } elseif (3 == $item['revive']) {
                                        ?>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>

                                        <?php
                                    } elseif (4 == $item['revive']) {
                                        ?>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <?php
                                    } elseif (5 == $item['revive']) {
                                        ?>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <h5 class="st3__author-name">
                                    <?php echo $item['name']; ?>
                                </h5>
                                <h6 class="st3__author-designation">
                                    <?php echo $item['designation']; ?>
                                </h6>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php

        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_testimonial());

