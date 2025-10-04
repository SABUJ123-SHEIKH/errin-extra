<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_hero_section extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi-hero-section';
    }

    public function get_title() {
        return esc_html__('Santoi Hero Section', 'santoi-core');
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
            'section_bg_img',
            [
                'label' => esc_html__('Section BG Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'section-title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Fuel your vision with Art-making AI', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'section-description',
            [
                'label' => esc_html__('Section Description', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Image Generator', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'banner_img',
            [
                'label' => esc_html__('Banner Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        
         $repeater->add_control(
            'banner_hvr_img',
            [
                'label' => esc_html__('Banner Hover Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Banner Image List', 'textdomain'),
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
        $this->add_responsive_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Title Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st1-banner-contain' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Image Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .santoi_distort_images,
                    {{WRAPPER}} .santoi_distort_images img,
                    {{WRAPPER}} .santoi_distort_images canvas,
                    {{WRAPPER}} .santoi_distort_images_center,
                    {{WRAPPER}} .santoi_distort_images_center img,
                    {{WRAPPER}} .santoi_distort_images_center canvas,
                    {{WRAPPER}} .st1-banner-fg-img-mob img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Section Background', 'textdomain'),
                'name' => 'background',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .st1-hero-area::before',
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
                    '{{WRAPPER}} .st1-banner-contain h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-banner-contain h2',
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
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Section Description Background', 'textdomain'),
                'name' => 'section-Description-background',
                'types' => ['classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .st1-banner-contain p',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Description-typography',
                'label' => esc_html__('Section Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-banner-contain p',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- st1-nav-bar-area Start -->
        <section class="st1-hero-area">
            <div class="container st1-container-navbar santoi-animated-section">
                <div class="st1-banner-contain">
                    <h2 class="has_char_anim" data-on-scroll="0" data-duration="2">
                        <?php echo $settings['section-title']; ?>
                    </h2>
                    <p class="has_fade_anim" data-delay="01">
                        <?php echo $settings['section-description']; ?>
                    </p>
                </div>
                <div class="row justify-content-center st1-banner-img-row has_fade_anim">
                    <div class="col-12 col-xl-3">
                        <div class="st1-banner-contain-img">
                            <?php
                                $i = 0;
                                foreach ($settings['list'] as $item){
                                    $i++;
                                    if ($i == 2){
                                        break;
                                    }
                            ?>
                                
                                     <div class="santoi_distort_images d-none d-md-block">
			<img class="dis-front-image" src="<?php echo $item['banner_img']['url']; ?>" alt="static image" />
			<img class="dis-hover-image" src="<?php echo $item['banner_hvr_img']['url']; ?>" alt="hover image" />
			<img class="distort-image" src="<?php echo get_template_directory_uri();?>/assets/images/distort.jpg" alt="distort Image" />
		</div>
		
		<div class="d-block d-md-none st1-banner-fg-img-mob">
		    <img class="dis-front-image" src="<?php echo $item['banner_img']['url']; ?>" alt="static image" />
		</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="st1-banner-contain-img st1-banner-img-2nd d-none d-md-flex">
                        <?php
                        $i = 0;
                        foreach ($settings['list'] as $item){
                            $i++;
                            if ($i == 1){
                                continue;
                            }
                            if ($i == 5){
                                break;
                            }
                            ?>
                                                <div class="santoi_distort_images_center">
			<img class="dis-front-image" src="<?php echo $item['banner_img']['url']; ?>" alt="static image" />
			<img class="dis-hover-image" src="<?php echo $item['banner_hvr_img']['url']; ?>" alt="hover image" />
			<img class="distort-image" src="<?php echo get_template_directory_uri();?>/assets/images/distort.jpg" alt="distort Image" />
		</div>
		
		
		
                            <?php } ?>
                        </div>
                        
                        
                        
                        <div class="st1-banner-contain-img st1-banner-contain-img-mob st1-banner-fg-img-mob st1-banner-img-2nd d-flex d-md-none">
                        <?php
                        $i = 0;
                        foreach ($settings['list'] as $item){
                            $i++;
                            if ($i == 1){
                                continue;
                            }
                            if ($i == 5){
                                break;
                            }
                            ?>
                                                	<img class="dis-front-image" src="<?php echo $item['banner_img']['url']; ?>" alt="static image" />
		
		
		
                            <?php } ?>
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                    <div class="col-12 col-xl-3">
                        <div class="st1-banner-contain-img">
                        <?php
                        $i = 0;
                        foreach ($settings['list'] as $item){
                            $i++;
                            if ($i < 5){
                                continue;
                            }
                            if ($i == 6){
                                break;
                            }
                            ?>
                            
                         <div class="santoi_distort_images d-none d-md-block">
			<img class="dis-front-image" src="<?php echo $item['banner_img']['url']; ?>" alt="static image" />
			<img class="dis-hover-image" src="<?php echo $item['banner_hvr_img']['url']; ?>" alt="hover image" />
			<img class="distort-image" src="<?php echo get_template_directory_uri();?>/assets/images/distort.jpg" alt="distort Image" />
		</div>
		<div class="d-block d-md-none st1-banner-fg-img-mob">
		  	<img class="dis-front-image" src="<?php echo $item['banner_img']['url']; ?>" alt="static image" />
		</div>
		    
                       
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </section>
        
           
        <!-- st1-nav-bar-area End -->
<?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_hero_section());

