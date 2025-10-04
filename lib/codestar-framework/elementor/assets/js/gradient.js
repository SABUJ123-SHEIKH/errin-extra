!(function ($) {
    window.addEventListener('elementor/init', () => {
        var santoigradient = elementor.modules.controls.BaseData.extend({
            onReady() {
                var self = this;
                this.$el.find('.santoi-gradient-picker-el').each(function (i, el) {
                    let $el = $(el);
                    let $preview = $(el)
                        .closest('.santoi-gradient-picker-container')
                        .find('.santoi-gradient-picker-preview');
                    var swType = $(el)
                        .closest('.santoi-gradient-picker-container')
                        .find('.switch-type:first');
                    var swAngle = $(el)
                        .closest('.santoi-gradient-picker-container')
                        .find('.switch-angle:first');
                    var res = $(el)
                        .closest('.elementor-control-field')
                        .find('.santoi_param_val:first');

                    const gp = new Grapick({
                        el: el,
                        colorEl: '<input class="santoi-colorpicker"/>',
                    });
                    gp.setValue(res.val());
                    if (gp.getDirection()) {
                        let dirVal = gp.getDirection();
                        dirVal = santoiCleanGradientDirection(dirVal);
                        swAngle.val(dirVal);
                    }
                    if (gp.getType()) {
                        swType.val(gp.getType());
                    }

                    let hs = gp.getHandlers();
                    hs.forEach(function (handler) {
                        const el = handler.el;
                        const $el = $(el).find('.santoi-colorpicker');
                        $el.spectrum({
                            color: handler.getColor(),
                            showAlpha: true,
                            showInput: true,
                            preferredFormat: 'hex3',
                            change(color) {
                                handler.setColor(color.toRgbString());
                            },
                            move(color) {
                                handler.setColor(color.toRgbString(), 0);
                            },
                        });
                    });

                    gp.setColorPicker((handler) => {
                        const el = $(handler.getEl()).find(
                            '.santoi-colorpicker:first'
                        );
                        const $el = $(el);

                        $el.spectrum({
                            color: handler.getColor(),
                            showAlpha: true,
                            showInput: true,
                            preferredFormat: 'hex3',
                            change(color) {
                                handler.setColor(color.toRgbString());
                            },
                            move(color) {
                                handler.setColor(color.toRgbString(), 0);
                            },
                        });
                        // return a function in order to destroy the custom color picker
                        return () => {
                            $el.spectrum('destroy');
                        };
                    });

                    $preview.css({
                        background: gp.getValue(),
                    });

                    // Do stuff on change of the gradient
                    gp.on('change', (complete) => {
                        res.val(gp.getValue());
                        self.saveValue();
                        $preview.css({
                            background: gp.getValue(),
                        });
                    });

                    res.on('change keydown paste input', function (e) {
                        let cVal = gp.getValue();
                        let self = this;
                        setTimeout(() => {
                            let newVal = $(self).val();
                            if (cVal != newVal) {
                                gp.setValue(newVal);
                            }
                        }, 200);
                    });

                    swType.on('change keydown paste input', function (e) {
                        gp && gp.setType(this.value || 'linear');
                    });

                    swAngle.on('change keydown paste input', function (e) {
                        let newVal = this.value;
                        newVal = santoiCleanGradientDirection(newVal);
                        gp && gp.setDirection(newVal || 'right');
                    });
                });

                function santoiCleanGradientDirection(dirVal) {
                    if (dirVal == 'circle at center') {
                        dirVal = 'center';
                    } else if (dirVal.startsWith('to ')) {
                        dirVal = dirVal.replace('to ', '');
                    }
                    return dirVal;
                }
            },
            saveValue() {
                this.setValue(this.$el.find('.santoi_param_val:first').val());
            },
            onBeforeDestroy() {
                this.saveValue();
            },
        });

        elementor.addControlView('santoi_gradient_selector', santoigradient);
        
        
    });

    
    
    

})(window.jQuery);
