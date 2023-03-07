<?php

add_action('wp_enqueue_scripts', 'xana_scripts');
function xana_scripts() {
    if (get_post_type(get_the_ID()) == 'help') {
        wp_register_script('TradingPlatformHelp_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/TradingPlatformHelp/Single.js', [], '1.1', true);
        wp_enqueue_script('TradingPlatformHelp_script');
        wp_localize_script(
            'TradingPlatformHelp_script',
            'xana',
            [
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'ajax_nonce' => wp_create_nonce('ajax_nonce'),
                "site_url" => get_site_url(),
            ]
        );
    }
    if (get_post_type(get_the_ID()) == 'xana_help') {
        wp_register_script('xana_help_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/XanaHelp/Single.js', [], '1.1', true); //D:\laragon\www\academy.xana\wp-content\plugins\xana-academy\resources\dist\js\pages\XanaHelp\Single.js
        wp_enqueue_script('xana_help_script');
        wp_localize_script(
            'xana_help_script',
            'xana',
            [
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'ajax_nonce' => wp_create_nonce('ajax_nonce'),
                "site_url" => get_site_url(),
            ]
        );
    }
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
