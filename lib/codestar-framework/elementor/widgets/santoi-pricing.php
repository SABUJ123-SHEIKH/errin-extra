<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_pricing extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_pricing';
    }

    public function get_title() {
        return esc_html__('Santoi Pricing', 'santoi-core');
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
        
        $this->add_control(
            'monthly_label',
            [
                'label' => esc_html__('Monthly Label', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Monthly', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        
        
        $this->add_control(
            'yearly_label',
            [
                'label' => esc_html__('Yearly Label', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Yearly', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        
        $this->add_control(
            'discount_label',
            [
                'label' => esc_html__('Discount Label', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Save 10%', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        
        $this->add_control(
            'discount_label_mobile',
            [
                'label' => esc_html__('Discount Label Mobile', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Save 10% on Yearly Plans', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        
        $this->add_control(
            'featured_column_text',
            [
                'label' => esc_html__('Featured Column Text', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Most Popular Plan', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
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
                    '{{WRAPPER}} .st1-package-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .st1-package-contain h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-contain h2',
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
                    '{{WRAPPER}} .st1-package-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Description-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Pricing-Tab-style',
            [
                'label' => esc_html__('Pricing Tab Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style-tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'Pricing-Tab-BG-color',
            [
                'label' => esc_html__('Pricing Tab BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #pricing-container .price-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Pricing-Tab-Title-color',
            [
                'label' => esc_html__('Pricing Tab Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #pricing-container .price-card' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Pricing-Tab-Title-typography',
                'label' => esc_html__('Pricing Tab Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} #pricing-container .price-card',
            ]
        );
        $this->end_controls_tab();
        /*END STYLE NORMAL TAB*/
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'Pricing-Tab-Active-BG-color',
            [
                'label' => esc_html__('Pricing Tab BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-pills #pricing-container .price-card:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Pricing-Tab-Active-Title-color',
            [
                'label' => esc_html__('Pricing Tab Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-pills #pricing-container .price-card:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE HOVER TAB*/
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'Pricing-style',
            [
                'label' => esc_html__('Pricing Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Pricing Box Background', 'textdomain'),
                'name' => 'Pricing-Box-background',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .st1-package-box',
            ]
        );
        $this->add_control(
            'Package-Title-color',
            [
                'label' => esc_html__('Package Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Package-Title-typography',
                'label' => esc_html__('Package Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-box h4',
            ]
        );

        $this->add_control(
            'Package-Price-color',
            [
                'label' => esc_html__('Package Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Package-Price-typography',
                'label' => esc_html__('Package Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-box h2',
            ]
        );

        $this->add_control(
            'Package-Period-color',
            [
                'label' => esc_html__('Package Period Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box h2 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Package-Period-typography',
                'label' => esc_html__('Package Period Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-box h2 span',
            ]
        );

        $this->add_control(
            'Package-Feature-color',
            [
                'label' => esc_html__('Package Feature Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Package-Feature-typography',
                'label' => esc_html__('Package Feature Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-box ul li',
            ]
        );
        $this->add_control(
            'Package-Feature-Icon-color',
            [
                'label' => esc_html__('Package Feature Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box ul li i' => 'color: {{VALUE}}',
                ],
            ]
        );
//        Button Style
        $this->start_controls_tabs('style-tabs-Button');

        $this->start_controls_tab(
            'style_normal_tabButton',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-typography',
                'label' => esc_html__('Button Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-package-box a',
            ]
        );
        $this->add_control(
            'Button-Background--color',
            [
                'label' => esc_html__('Button Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Border-Radius',
            [
                'label' => esc_html__('Button Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st1-package-box a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE NORMAL TAB*/
        $this->start_controls_tab(
            'style_hover_tab_Button',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Hover-color',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-button-color:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-hover-BG-color',
            [
                'label' => esc_html__('Button hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-button-color::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE HOVER TAB*/
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $monthly_label = $settings['monthly_label'];
        $yearly_label = $settings['yearly_label'];
        $discount_label = $settings['discount_label'];
        $discount_label_mob = $settings['discount_label_mobile'];
        $feat_text = $settings['featured_column_text'];
        
        ?>
        <!-- st1-package-area Start -->
       <section id="pricing-container" class="has_fade_anim">
       <div class="container">
           
           
             <div class="st1-package-contain">
                    <h2 class="has_text_reveal_anim">
                        <?php echo $settings['section_title']; ?>
                    </h2>
                    <div class="has_text_move_anim">
                    <p>
                        <?php echo $settings['section_info']; ?>
                    </p>
                    </div>
                </div>
           
           
           
	<div id="pricing-switch">

		<span class="switch-label switch-label-monthly"><?php echo $monthly_label;?></span>
		<label class="switch" id="">
            <input type="checkbox" checked="checked">
            <span class="slider"></span>
        </label>
		<span class="switch-label switch-label-yearly active"><?php echo $yearly_label;?> <span class="save-money"><?php echo $discount_label;?></span></span>
	
		<div class="save-money--mobile"><?php echo $discount_label_mob;?></div>

	</div>
	<!-- end of pricing-switch -->

	<div id="pricing-cards">

		<!-- ============================= -->
		<!-- = Premium Subscription Card = -->
		<!-- ============================= -->
		
		  <?php
                        $args = array(
                            'post_type' => array('pricingtable')
                        );
                        $query = new WP_Query($args);
                        
                          if ($query->have_posts()) {
                            $i = 0;
                            while ($query->have_posts()) {
                                $i++;
                                $query->the_post();
                                $page_slug = get_post_field('post_name');

                                $meta = get_post_meta(get_the_ID(), 'med_pricing_table');
                                ?>
                                
                                 <?php
                                        $x = 0;
                                        foreach ($meta as $list) {
                                            foreach ($list as $item) {
                                                
                                        $ptb_featured = $item['ptb_featured'];
                                              
                                              if($ptb_featured== true){
                                                  $feat= 'price-card--hero';
                                              } else {
                                                  $feat= '';
                                              }
                                                ?>
		<div class="price-card <?php echo $feat;?>">

			<div class="price-card--header">
				<h4><?php echo $item['title']; ?></h4>
				<!-- <p>for growing your business</p> -->
			</div>
<?php   if($ptb_featured== true){ ?>
	<div class="price-card--hero-text">
				<?php echo $feat_text;?>
			</div>
			<?php } ?>
			
			<div class="price-card--price">
				<div class="price-card--price-text">
					<sup class="sp-currency-m"><?php echo $item['currency']; ?></sup> <div class="price-card--price-number toggle-price-content odometer" data-price-monthly="<?php echo $item['price']; ?>" data-price-yearly="<?php echo $item['price_yearly']; ?>"><?php echo $item['price_yearly']; ?></div> <span class="sp-timeframe-m"><?php echo $item['duration']; ?></span>
				</div>
				<div class="price-card--price-conditions">
					<div class="toggle-price-content" data-price-monthly="<?php echo $item['monthly_b_text']; ?>" data-price-yearly="<?php echo $item['yearly_b_text']; ?>"><?php echo $item['yearly_b_text']; ?></div>
					
				</div>
			</div>

		

			<div class="price-card--features">

				<ul class="price-card--features--list">
				     <?php foreach ($item['pricing-item'] as $item_list) { 
				     
				 
				     ?>
					<li class="price-card--features--item"><i class="<?php echo $item_list['icon']; ?>"></i><?php echo $item_list['pt-title']; ?>
						
					</li>
			<?php } ?>

				</ul>
			</div>
			
			<div class="price-card--cta">
				<a class="price-card--cta--button btn st1-button-hover-anim-st price-card--cta--button-monthly" href="<?php echo $item['btn_url']; ?>"><span><?php echo $item['btn_text']; ?></span></a>
				
				<a class="price-card--cta--button btn st1-button-hover-anim-st price-card--cta--button-yearly" href="<?php echo $item['btn_url_yr']; ?>"><span><?php echo $item['btn_text']; ?></span></a>
			</div>

			<div class="price-card--mobile-features-toggle"></div>

		</div>
		
		<?php
                                            }
                                        } ?>
		
		  <?php
                            }
                            wp_reset_postdata();
                        }
                        ?>
		<!-- End of Card -->

	

	

	</div>
	<!--    end of pricing-cards -->

</div>
</section>
        
        
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_pricing());

