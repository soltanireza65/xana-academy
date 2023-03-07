<?php

/**
 * Plugin Name
 *
 * @package     XanaAcademy
 * @author      Reza Soltani
 * @copyright   2021 Reza Soltani
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: xana-academy
 * Description: xana academy plugin
 * Version:     1.0.0
 * Author:      Reza Soltani
 * Text Domain: xana
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


define('XANA_VERSION', '1.0.0');
define('XANA__PLUGIN_DIR', __DIR__);
define('XANA__PLUGIN_URL', plugin_dir_url(__FILE__));
define('XANA__PLUGIN_WOO', XANA__PLUGIN_URL  . '/templates/woocommerce/');



include  __DIR__ . "/includes/admin/regenerate_woo_permissions.php";
include  __DIR__ . "/includes/admin/enqueue.php";
include  __DIR__ . "/includes/admin/menu.php";
include  __DIR__ . "/includes/admin/ajax.php";
include  __DIR__ . "/includes/admin/post_types.php";
include  __DIR__ . "/includes/override_templates.php";
include  __DIR__ . "/includes/admin/widgets.php";
include  __DIR__ . "/includes/woocommerce/index.php";
include  __DIR__ . "/includes/rest/menu/wp-rest-menus.php";

// include  __DIR__ . "/includes/csf/index.php";
// include  __DIR__ . "/includes/csf/options/product-options.php";
