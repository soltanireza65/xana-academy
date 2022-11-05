<?php
// add_action('admin_enqueue_scripts', 'dw_scripts');
// function dw_scripts($hook) {
//     // wp_enqueue_script('xana_admin_script', plugin_dir_url(__FILE__) . 'resources/dist/admin/js/admin.js', array('jquery'), '1.0', true);
//     // $screen = get_current_screen();
//     // if ('dashboard' === $screen->id) {
//     //     // wp_enqueue_style('dw_style', plugin_dir_url(__FILE__) . 'path/to/style.css', array(), '1.0');
//     // }
//     //wp_enqueue_script('jquery');

//     wp_register_script('xana_admin_script', get_template_directory_uri() . 'resources/dist/admin/js/admin.js', array('jquery'), '', true);

//     wp_enqueue_script('xana_admin_script');
// }

add_action('wp_enqueue_scripts', 'xana_scripts');
function xana_scripts() {
    if (get_post_type(get_the_ID()) == 'help') {
        wp_register_script('help_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/help/Single.js', [], '1.1', true);
        wp_enqueue_script('help_script');
        wp_localize_script('help_script', 'xana', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('ajax_nonce'),
            "site_url" => get_site_url(),
        ]);
    }
    // if (is_post_type_archive('help')) {
    //     wp_register_script('help_archive_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/help/Archive.js', [], '1.1', true);
    //     wp_enqueue_script('help_archive_script');
    //     wp_localize_script('help_archive_script', 'xana', [
    //         'ajaxUrl' => admin_url('admin-ajax.php'),
    //         'ajax_nonce' => wp_create_nonce('ajax_nonce'),
    //         "site_url" => get_site_url(),
    //     ]);
    // }
    // if (is_account_page()) {
    //     wp_register_script('downloads_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/downloads/Downloads.js', [], '1.1', true);
    //     wp_enqueue_script('downloads_script');
    //     wp_localize_script('downloads_script', 'xana', [
    //         'ajaxUrl' => admin_url('admin-ajax.php'),
    //         'ajax_nonce' => wp_create_nonce('ajax_nonce'),
    //         "site_url" => get_site_url(),
    //     ]);
    // }


    // wp_add_inline_script('goftino', '
    // !function() {
    //     var i = "9BiGFT",
    //         a = window,
    //         d = document;
    //     function g() {
    //         var g = d.createElement("script"),
    //             s = "https://www.goftino.com/widget/" + i,
    //             l = localStorage.getItem("goftino_" + i);
    //         g.async = !0, g.src = l ? s + "?o=" + l : s;
    //         d.getElementsByTagName("head")[0].appendChild(g);
    //     }
    //     "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !1);
    // }();
    // ', 'after');
}




add_action('wp_print_scripts', 'xana_print_goftino_scripts');
function xana_print_goftino_scripts() {
?>
    <script type="text/javascript">
        ! function() {
            var i = "9BiGFT",
                a = window,
                d = document;

            function g() {
                var g = d.createElement("script"),
                    s = "https://www.goftino.com/widget/" + i,
                    l = localStorage.getItem("goftino_" + i);
                g.async = !0, g.src = l ? s + "?o=" + l : s;
                d.getElementsByTagName("head")[0].appendChild(g);
            }
            "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !1);
        }();
    </script>
<?php
}
