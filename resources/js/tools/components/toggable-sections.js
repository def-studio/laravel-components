if ($('.section-toggle-switch').length > 0) {
    $(document).on('change', '.section-toggle-switch', function () {
        deftools.sync_toggable_sections();
    })

    deftools.sync_toggable_sections = ($context = null) => {

        $context = $context ?? $(document);

        hide_toggable_sections($context);

        show_activated_sections($context);

    }


    function hide_toggable_sections($context) {
        $context.find('.toggable-section').addClass('hidden');
    }

    function show_activated_sections($context) {
        const switches = retrieve_switches_status($context);

        const $toggable_sections = $context.find('.toggable-section');

        for (const switch_key in switches) {
            if (switches.hasOwnProperty(switch_key)) {
                this[switch_key] = switches[switch_key];
            }
        }

        $toggable_sections.each(function () {
            const $toggable_section = $(this);
            const condition = $toggable_section.data('toggle-if');

            if (!condition) return;

            const visible = eval(condition);

            if (visible) {
                $toggable_section.removeClass('hidden');
            }
        })
    }

    function retrieve_switches_status($context) {
        let $toggle_switches = $context.find('.section-toggle-switch');

        let switches = {}

        $toggle_switches.each(function () {
            let $switch = $(this);
            if ($switch.prop('tagName') === 'SELECT') {
                const selected_value = $switch.val();
                const switch_id = get_switch_id($switch);

                $switch.find('option').each(function () {
                    const option_key = $(this).attr('value');

                    switches[`${switch_id}_${option_key}`] = option_key === selected_value;
                });
            } else {
                $switch = $switch.find('.custom-control-input');
                const switch_id = get_switch_id($switch);
                switches[switch_id] = !!$switch.prop('checked');
            }
        });
        return switches;

    }


    function get_switch_id($switch) {
        let switch_id = $switch.data('switch-name');

        if (!switch_id) {
            switch_id = $switch.attr('id');
        }

        return switch_id;
    }


    deftools.sync_toggable_sections();
}
