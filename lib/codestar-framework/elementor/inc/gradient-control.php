<?php

namespace Elementor\CustomControl;

use \Elementor\Base_Data_Control;

class CustomGradient_Control extends Base_Data_Control {


    public function includes() {
    }

    const CustomGradient = 'santoi_gradient_selector';

    /**
     * Set control type.
     */
    public function get_type() {
        return self::CustomGradient;
    }

    /**
     * Enqueue control scripts and styles.
     */
    public function enqueue() {

        wp_enqueue_script('spectrum-picker', SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets/js/param/spectrum.min.js', array('jquery'), SANTOI_TEMPLATES_FOR_ELEMENTOR_VERSION, true);
        wp_enqueue_script('santoi-gradien-picker', SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets/js/param/grapick.min.js', array('jquery'), SANTOI_TEMPLATES_FOR_ELEMENTOR_VERSION, true);
        wp_enqueue_style('spectrum-picker', SANTOI_ELEMENTOR_PL_ROOT_URL . '/assets/js/param/spectrum.min.css', false, SANTOI_TEMPLATES_FOR_ELEMENTOR_VERSION, 'all');
        wp_enqueue_style('santoi-gradient-picker', SANTOI_ELEMENTOR_PL_ROOT_URL . '/assets/js/param/grapick.min.css', false, SANTOI_TEMPLATES_FOR_ELEMENTOR_VERSION, 'all');

        wp_enqueue_script('santoi-elementor-gradient-selector', SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets/js/gradient.js', array('jquery'), SANTOI_TEMPLATES_FOR_ELEMENTOR_VERSION, true);
    }

    /**
     * Set default settings
     */
    protected function get_default_settings() {
        return [
            'label_block' => true,
            'toggle' => true,
            'options' => [],
        ];
    }

    /**
     * control field markup
     */
    public function content_template() {


        $control_uid = $this->get_control_uid();
?>
<style>
    .elementor-gradient-control-field{
        flex-wrap:wrap !important;
    }
    .elementor-control-santoi-gradient-wrapper{
        width: 100%;
    float: left;
    margin-top: 30px;
    }
</style>
        <div class="elementor-gradient-content">
        <div class="elementor-control-field elementor-gradient-control-field {{ data.class }}">
            <div class="santoi-gradient-label" style="width:100%;display:flex;align-items:center">
                <label class="elementor-control-title">{{{ data.label }}}</label>
            </div>
            <div class="elementor-control-santoi-gradient-wrapper">
                <div>
                    <div class="santoi-gradient-picker-container">
                        <div class="santoi-gradient-picker-el"></div>
                        <div class="inputs" style="display:flex;gap:10px">
                            <select class="form-control switch-type">
                                <option value="">- Select Type -</option>
                                <option value="radial">Radial</option>
                                <option value="linear">Linear</option>
                                <option value="repeating-radial">Repeating Radial</option>
                                <option value="repeating-linear">Repeating Linear</option>
                            </select>

                            <select class="form-control switch-angle">
                                <option value="">- Select Direction -</option>
                                <option value="top">Top</option>
                                <option value="right">Right</option>
                                <option value="center">Center</option>
                                <option value="bottom">Bottom</option>
                                <option value="left">Left</option>
                                <option value="45deg">Top Right</option>
                                <option value="135deg">Bottom Right</option>
                            </select>
                        </div>
                        <div class="santoi-gradient-picker-label"><?php echo esc_attr__('Preview', 'santoi-core'); ?>:</div>
                        <div class="santoi-gradient-picker-preview-container">
                            <div class="santoi-gradient-picker-preview"></div>
                        </div>
                    </div>
                    <div class="santoi-gradient-picker-label santoi-label-margin"><?php echo esc_attr__('Gradient CSS output', 'santoi-core'); ?>:</div>
                    <input class="santoi_param_val" id="<?php echo $control_uid; ?>" type="text" name="elementor-gradient-selector-{{ data.name }}-{{ data._cid }}" data-setting="{{ data.name }}">
                </div>
            </div>
        </div>
        </div>
        <# if ( data.description ) { #>
            <div class="elementor-control-field-description">{{{ data.description }}}</div>
            <# } #>
        <?php
    }
}
