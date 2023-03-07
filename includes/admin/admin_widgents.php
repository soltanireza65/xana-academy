<?php
add_action('wp_dashboard_setup', 'xana_dashboard_widgets');

function xana_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'Xana Support', 'xana_dashboard_help');
}

function xana_dashboard_help() { ?>
    <div class="" id="ccom_regenerate">
        <p>
            <a href="#" id="test" class="wp-core-ui button">
                test
            </a>
        </p>
        <p>
            <a href="#" id="ccom_regenerate_button" class="wp-core-ui button">
                بروزرسانی درسترسی های دانلود برای تمام سفارشات
            </a>
        </p>
    </div>
<?php
}
